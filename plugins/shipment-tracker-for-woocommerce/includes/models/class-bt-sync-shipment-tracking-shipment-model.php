<?php


class Bt_Sync_Shipment_Tracking_Shipment_Model{

    public $shipping_provider;
    public $order_id;
    public $awb;
    public $current_status;
    public $courier_name;
    public $etd;
    public $scans;
    public $tracking_url;

    public function __construct() {
    }

    public static function get_tracking_by_order_id($order_id) {
        $bt_shipment_tracking = get_post_meta( $order_id, '_bt_shipment_tracking', true );
        if(!empty($bt_shipment_tracking) && $bt_shipment_tracking instanceof Bt_Sync_Shipment_Tracking_Shipment_Model){
            $bt_shipping_provider = get_post_meta( $order_id, '_bt_shipping_provider', true );
            $bt_shipping_awb_number = get_post_meta( $order_id, '_bt_shipping_awb', true );
            if(!empty($bt_shipping_awb_number)){
                $bt_shipment_tracking->awb = $bt_shipping_awb_number;//for backward compatibility
            }            
            $bt_shipment_tracking->shipping_provider = $bt_shipping_provider;           
            $bt_shipment_tracking->tracking_url = $bt_shipment_tracking->get_tracking_link();   
        }else{
            $bt_shipment_tracking = new Bt_Sync_Shipment_Tracking_Shipment_Model();
            $bt_shipping_provider = get_post_meta( $order_id, '_bt_shipping_provider', true );
            $bt_shipping_awb_number = get_post_meta( $order_id, '_bt_shipping_awb', true );
            $bt_shipment_tracking->shipping_provider = $bt_shipping_provider==false?"":$bt_shipping_provider;
            $bt_shipment_tracking->awb = $bt_shipping_awb_number==false?"":$bt_shipping_awb_number;
        }
        
        return $bt_shipment_tracking;
		   
    }

    public static function save_tracking($order_id,$shipment_obj) {

        $bt_shipment_tracking_old = Bt_Sync_Shipment_Tracking_Shipment_Model::get_tracking_by_order_id($order_id);
        update_post_meta($order_id, '_bt_shipment_tracking', $shipment_obj);
        update_post_meta($order_id, '_bt_shipping_provider', $shipment_obj->shipping_provider );
        update_post_meta($order_id, '_bt_shipping_awb', $shipment_obj->awb  );
        do_action( 'bt_shipment_status_changed',$order_id,$shipment_obj,$bt_shipment_tracking_old);      
    }

    public static function get_awb_by_order_id($order_id) {
        $bt_shipment_tracking_old = Bt_Sync_Shipment_Tracking_Shipment_Model::get_tracking_by_order_id($order_id);
		return $bt_shipment_tracking_old->awb;        
    }

    //returns array of order ids associated with an awb number.
    public static function get_orders_by_awb_number($awb){  
        $orderids = wc_get_orders( array(
            'limit'        => 50,//set max for performance
            'meta_key'     => '_bt_shipping_awb',
            'meta_value'     => $awb,
            'meta_compare' => '==',
            'return' => 'ids',
        ));        
        return $orderids;        
    }


    public function get_tracking_link(){
        if($this->shipping_provider=="shyplite"){
            return "https://tracklite.in/track/" . $this->awb;
        }else if($this->shipping_provider=="shiprocket"){
            return "https://shiprocket.co/tracking/" . $this->awb;
        }else if($this->shipping_provider=="nimbuspost"){
            return "https://ship.nimbuspost.com/shipping/tracking/" . $this->awb;
        }else if($this->shipping_provider=="manual" && !empty($this->tracking_url)){  
            if (strpos($this->tracking_url, "http") === 0) {
                return $this->tracking_url;
            } else{
                return 'http://' . $this->tracking_url;
            }
            
        }else{
            return "#";
        }
    }
}
