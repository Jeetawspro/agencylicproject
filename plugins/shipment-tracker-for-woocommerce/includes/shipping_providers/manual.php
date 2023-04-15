<?php

/**
 * The manual-specific functionality of the plugin.
 *
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/manual
 * @author     Amit Mittal <amitmittal@bitsstech.com>
 */
class Bt_Sync_Shipment_Tracking_Manual {

	public function __construct() {
    }

    public function update_data($order_id, $request){
        $enabled_shipping_providers = carbon_get_theme_option( 'bt_sst_enabled_shipping_providers' );
        if(is_array($enabled_shipping_providers) && in_array('manual',$enabled_shipping_providers)){

            if(!empty($order_id)){
                $shipment_obj = $this->init_model($request, $order_id);
                Bt_Sync_Shipment_Tracking_Shipment_Model::save_tracking($order_id,$shipment_obj);                
                return "Shipment details updated successfully.";
            }
            throw new Exception("Invalid order id.");
        }
        throw new Exception("Sorry, This provider is not enabled.");
    }

    public function init_model($data, $order_id){
        $obj = new Bt_Sync_Shipment_Tracking_Shipment_Model();
        $obj->shipping_provider = "manual";
        $obj->order_id = $order_id;
        $obj->awb = sanitize_text_field($data["awb_number"]);
        $obj->courier_name = sanitize_text_field($data["courier_name"]);
        $obj->etd = sanitize_text_field($data["etd"]);
        $obj->scans = array();
        $obj->current_status = sanitize_text_field($data["shipping_status"]);
        $obj->tracking_url = sanitize_text_field($data["tracking_link"]);
        return $obj;
    }
}
