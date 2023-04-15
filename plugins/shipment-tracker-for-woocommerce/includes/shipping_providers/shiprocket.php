<?php

/**
 * The shiprocket-specific functionality of the plugin.
 *
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/shiprocket
 * @author     Amit Mittal <amitmittal@bitsstech.com>
 */
class Bt_Sync_Shipment_Tracking_Shiprocket {

    //used tool: https://csvjson.com/csv2json
    private const COURIERS_JSON = '{"4":"Amazon Shipping 5Kg","6":"DTDC Surface","10":"Delhivery","14":"Ecom Express Surface 500gms","18":"DTDC 5kg","19":"Ecom Express Surface 2kg","23":"Xpressbees 1kg","24":"Xpressbees 2kg","25":"Xpressbees 5kg","29":"Amazon Shipping 1Kg","32":"Amazon Shipping 2Kg","35":"Aramex International","39":"Delhivery Surface 5 Kgs","43":"Delhivery Surface","44":"Delhivery Surface 2 Kgs","45":"Ecom Express Reverse","46":"Shadowfax Reverse","51":"Xpressbees Surface","54":"Ekart Logistics Surface","58":"Shadowfax Surface","60":"Ecom Express Air 500gms","61":"Delhivery Reverse","69":"Kerry Indev Express Surface","82":"DTDC 2kg","95":"Shadowfax Local","97":"Dunzo Local","99":"Ecom Express ROS Reverse","100":"Delhivery Surface 10 Kgs","101":"Delhivery Surface 20 Kgs","106":"Borzo","107":"Borzo 5 Kg","125":"Xpressbees Reverse","137":"Delhivery Reverse 2kg","140":"Shiprocket International","id":"name"}';

    private const API_BASE_URL = "https://apiv2.shiprocket.in";
    private const API_GET_LOCALITY = "/v1/external/open/postcode/details?postcode=";
    private const API_TRACK_BY_ORDER_ID = "/v1/external/orders?search=";
    private const API_TRACK_BY_AWB_NUMBER = "/v1/external/courier/track/awb/";

    private $auth_token;

    private $username;
    private $password;
    private $channel_id;

	public function __construct() {
    }

    function init_params() {
        $username=carbon_get_theme_option( 'bt_sst_shiprocket_apiusername' );
		$password=carbon_get_theme_option( 'bt_sst_shiprocket_apipassword' );
		$channel_id=carbon_get_theme_option( 'bt_sst_shiprocket_channelid' );

        $this->username=trim($username);
        $this->password=trim($password);
        $this->channel_id=trim($channel_id);
    }

    public function get_locality($postcode){
        $this->init_params();
        $auth_token = $this->get_token();

        if(!empty($auth_token)){

            $args = array(
                'headers'     => array(
                    'Authorization' => 'Bearer ' . $auth_token,
                ),
            );

            $response = wp_remote_get( self::API_BASE_URL . self::API_GET_LOCALITY . $postcode, $args );

            $body     = wp_remote_retrieve_body( $response );

            $resp = json_decode($body,true);

            if($resp["success"]){
                return array(
                    "postcode"=>$resp["postcode_details"]["postcode"],
                    "city"=>$resp["postcode_details"]["city"],
                    "state"=>$resp["postcode_details"]["state"],
                    "state_code"=>$resp["postcode_details"]["state_code"],
                    "country"=>$resp["postcode_details"]["country"],
                );
            }

        }else{
            return null;
        }


    }

    function generate_token(){

        if(empty($this->username) || empty($this->password)){
            return null;
        }

        $body = array(
            'email'    => $this->username,
            'password'   => $this->password,
        );

        $args = array(
            'body'        => $body,
            'headers'     => array(
                "Content-Type: application/json"
              ),
        );

        $response = wp_remote_post( "https://apiv2.shiprocket.in/v1/external/auth/login", $args );

        $body = wp_remote_retrieve_body( $response );

        return json_decode($body,true)["token"];

    }

    function get_token(){
        if(empty($this->auth_token)){
            $this->auth_token = $this->generate_token();
        }

        return $this->auth_token;
    }

    public function shiprocket_webhook_receiver($request){

        $enabled_shipping_providers = carbon_get_theme_option( 'bt_sst_enabled_shipping_providers' );
        if(is_array($enabled_shipping_providers) && in_array('shiprocket',$enabled_shipping_providers)){
            $order_ids=array();
            if(isset($request["order_id"]) && !empty($request["order_id"])){
                $order_ids[]=$request["order_id"];
            }
            if(isset($request["awb"]) && !empty($request["awb"])){
                $awb_number = $request["awb"];
                if(!empty($awb_order_ids = Bt_Sync_Shipment_Tracking_Shipment_Model::get_orders_by_awb_number($awb_number))){
                    foreach ($awb_order_ids as $awb_order_id) {
                        if(!in_array($awb_order_id,$order_ids)){
                            $order_ids[] = $awb_order_id;
                        }
                    }                    
                }
            }

            if(!empty($order_ids) && is_array($order_ids)){
                foreach ($order_ids as $order_id) {
                    if(!empty($order_id)){
                        if(false !== $order = wc_get_order( $order_id )){
        
                            $bt_sst_order_statuses_to_sync = carbon_get_theme_option( 'bt_sst_order_statuses_to_sync' );
                            $bt_sst_sync_orders_date = carbon_get_theme_option( 'bt_sst_sync_orders_date' );
        
                            $order_status = 'wc-' . $order->get_status();
        
                            if(in_array($order_status,$bt_sst_order_statuses_to_sync) || in_array('any',$bt_sst_order_statuses_to_sync)){
        
                                $date_created_dt = $order->get_date_created(); // Get order date created WC_DateTime Object
                                $timezone        = $date_created_dt->getTimezone(); // Get the timezone
                                $date_created_ts = $date_created_dt->getTimestamp(); // Get the timestamp in seconds
        
                                $now_dt = new WC_DateTime(); // Get current WC_DateTime object instance
                                $now_dt->setTimezone( $timezone ); // Set the same time zone
                                $now_ts = $now_dt->getTimestamp(); // Get the current timestamp in seconds
        
                                $allowed_seconds = $bt_sst_sync_orders_date * 24 * 60 * 60; // bt_sst_sync_orders_date in seconds
        
                                $diff_in_seconds = $now_ts - $date_created_ts; // Get the difference (in seconds)
        
                                if ( $diff_in_seconds <= $allowed_seconds ) {
                                    $shipment_obj = $this->init_model($request, $order_id);
                                    Bt_Sync_Shipment_Tracking_Shipment_Model::save_tracking($order_id,$shipment_obj);                           
                                    return "Thanks Shiprocket! Record updated.";
                                }else{
                                    return "Thanks Shiprocket! Order too old.";
                                }
                            }else{
                                return "Thanks Shiprocket! Order status out of scope.";
                            }
                        }
                    }
                }                    
            }

            
        }

        // ob_start();
        // var_dump($request);
        // $result = ob_get_clean();

        // error_log($result);

        return "Thanks Shiprocket!";
    }

    public function get_order_tracking($order_id){
        $this->init_params();
        $auth_token = $this->get_token();       
        if(!empty($auth_token)){

            $args = array(
                'headers'     => array(
                    'Authorization' => 'Bearer ' . $auth_token,
                ),
            );

            $response = wp_remote_get( self::API_BASE_URL . self::API_TRACK_BY_ORDER_ID . $order_id,$args );

            $body     = wp_remote_retrieve_body( $response );

            $resp = json_decode($body,true);


            return $resp;

        }else{
            return null;
        }
    }

    public function get_order_tracking_by_awb_number($awb_number){
        $this->init_params();
        $auth_token = $this->get_token();

        if(!empty($auth_token)){

            $args = array(
                'headers'     => array(
                    'Authorization' => 'Bearer ' . $auth_token,
                ),
            );

            $response = wp_remote_get( self::API_BASE_URL . self::API_TRACK_BY_AWB_NUMBER . $awb_number,$args );
            $body     = wp_remote_retrieve_body( $response );
            $resp = json_decode($body,true);
            return $resp;

        }else{
            return null;
        }
    }

    public function get_courier_by_id($id){
        $couriers = json_decode(self::COURIERS_JSON,true);
        return isset($couriers[$id])?$couriers[$id]:"NA";
    }

    public function init_model($data, $order_id){

        $obj = new Bt_Sync_Shipment_Tracking_Shipment_Model();     

        if(isset($data["tracking_data"])){
            //from the api call
            if($data["tracking_data"]["track_status"] !=0){
                $obj->shipping_provider = 'shiprocket';
                $obj->order_id = $order_id;
                $obj->awb = sanitize_text_field($data["tracking_data"]["shipment_track"][0]["awb_code"]);
                $obj->courier_name = $this->get_courier_by_id(sanitize_text_field($data["tracking_data"]["shipment_track"][0]["courier_company_id"]));
                $obj->etd = sanitize_text_field($data["tracking_data"]["shipment_track"][0]["edd"]);
                $obj->etd = !empty($obj->etd)?$obj->etd:sanitize_text_field($data["tracking_data"]["shipment_track"][0]["delivered_date"]);
                $obj->scans = $data["tracking_data"]["shipment_track_activities"];
                $obj->current_status = sanitize_text_field($data["tracking_data"]["shipment_track"][0]["current_status"]);
            }else{
                $bt_shipment_tracking_old = Bt_Sync_Shipment_Tracking_Shipment_Model::get_tracking_by_order_id($order_id);
                $obj->shipping_provider = 'shiprocket';
                $obj->order_id = $order_id;
                $obj->current_status = 'unknown';
                $obj->awb = $bt_shipment_tracking_old->awb;
               }
            
        } else if(isset($data["data"]) && !empty($data["data"][0])){
            //order search data            
            if($data["data"][0]["channel_order_id"]==$order_id){
                $shipment = !empty($data["data"][0]["shipments"][0])?$data["data"][0]["shipments"][0]:null;

                $obj->shipping_provider = 'shiprocket';
                $obj->order_id = $order_id;
                $obj->awb = sanitize_text_field(!empty($shipment)?$shipment["awb"]:"");
                $obj->courier_name = sanitize_text_field(!empty($shipment)?$shipment["courier"]:"");
                $obj->etd = sanitize_text_field(!empty($shipment)?$shipment["etd"]:"");
                $obj->etd = !empty($obj->etd)?$obj->etd:sanitize_text_field(!empty($shipment)?$shipment["delivered_date"]:"");
                $obj->scans = [];
                $obj->current_status = sanitize_text_field(!empty($data["data"][0]["status"])?$data["data"][0]["status"]:"");
            }
        }
        else{
            //from webhook receiver
            $obj->shipping_provider = 'shiprocket';
            $obj->awb = sanitize_text_field($data["awb"]);
            $obj->courier_name = sanitize_text_field($data["courier_name"]);
            $obj->etd = sanitize_text_field($data["etd"]);
            $obj->scans = $data["scans"];
            $obj->current_status = sanitize_text_field($data["current_status"]);
        }


        return $obj;
    }

    public function update_order_shipment_status($order_id){

        if(!empty($awb_number = Bt_Sync_Shipment_Tracking_Shipment_Model::get_awb_by_order_id($order_id))){
            $resp= $this->get_order_tracking_by_awb_number($awb_number);
        } 
        
        if($resp==null || !isset($resp["tracking_data"]) || $resp["tracking_data"]["track_status"]==0) {
            $resp = $this->get_order_tracking($order_id);            
        }

		if(!empty($resp)){
			$shipment_obj = $this->init_model($resp, $order_id);
            Bt_Sync_Shipment_Tracking_Shipment_Model::save_tracking($order_id,$shipment_obj);          
			return $shipment_obj;
        }
        return null;
    }
}
