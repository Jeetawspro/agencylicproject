<?php


class Bt_Sync_Shipment_Tracking_Admin_Ajax_Functions{

    public function __construct( $crons,$shiprocket,$shyplite,$nimbuspost,$manual ) {
        $this->crons = $crons;
        $this->shiprocket = $shiprocket;
        $this->shyplite = $shyplite;
        $this->nimbuspost = $nimbuspost;
        $this->manual = $manual;
    }

    public function bt_sync_now_shyplite(){
        $obj = $this->crons->sync_shyplite_shipments();

        $resp = array(
            "status"=>true,
            "orders_count"=>sizeof($obj)
        );
        echo json_encode($resp);
        wp_die();
    }

    public function force_sync_tracking(){
        $resp = array(
            "status" => false,
            "response" => ''
        );

        if(empty($order_id = $_POST['order_id'])){
            $resp = array(
                "status" => false,
                "response" => 'Invalid order id.'
            );
            wp_send_json($resp);
            wp_die();
        }

        try {
            $tracking_resp = bt_force_sync_order_tracking($order_id);
            if(!empty($tracking_resp)) {
                $resp['status'] = true;
                $resp['response'] = $tracking_resp;
            }else{
                $resp['status'] = false;
                $resp['response'] = "An error occured, please try again later.";
            }
        }
        catch(Exception $e) {
            $resp["response"] = $e->getMessage();
            $resp["status"] = false;
        }


        wp_send_json($resp);
        wp_die();
    }

    public function save_order_awb_number(){
        $resp = array(
            "status" => false,
            "response" => ''
        );

        if(empty($order_id = $_POST['order_id'])){
            $resp = array(
                "status" => false,
                "response" => 'Invalid order id.'
            );
            wp_send_json($resp);
            wp_die();
        }

        if(empty($awb_number = $_POST['awb_number'])){
            $resp = array(
                "status" => false,
                "response" => 'Invalid AWB number.'
            );
            wp_send_json($resp);
            wp_die();
        }

        try {
            update_post_meta($order_id, '_bt_shipping_awb', $awb_number );
            bt_force_sync_order_tracking($order_id);
            $resp['status'] = true;
            $resp['response'] = 'Success';
        }
        catch(Exception $e) {
            $resp["response"] = $e->getMessage();
            $resp["status"] = false;
        }


        wp_send_json($resp);
        wp_die();
    }

    public function get_tracking_data_from_db(){

        $resp = array(
            "status" => false,
            "message" => '',
            'data'  => [],
            'has_tracking' => false
        );

        if (empty($_POST) || !wp_verify_nonce($_POST['bt_get_tracking_form_nonce'],'bt_get_tracking_data') )
        {
            $resp['message'] = 'Sorry, you are not allowed.';
            wp_send_json($resp);
            wp_die();
        }


       $the_order = wc_get_order($_POST['order_id']);
        if(empty($the_order)){
            $resp['message'] = 'Order not found!';
            wp_send_json($resp);
            wp_die();
        }

        $resp['status'] = true;
        $resp['data']['order_status'] = $the_order->get_status();

        $bt_shipment_tracking =Bt_Sync_Shipment_Tracking_Shipment_Model::get_tracking_by_order_id($_POST['order_id']);

        if(!empty($bt_shipment_tracking)) {
            $resp['has_tracking'] = isset($bt_shipment_tracking->awb)&&!empty($bt_shipment_tracking->awb);
            $resp['data']['obj'] = $bt_shipment_tracking;
            $resp['data']['tracking_link'] = $bt_shipment_tracking->get_tracking_link();
        } else {
            $resp['message'] = 'Tracking of this order is not available yet.';
        }

        wp_send_json($resp);
        wp_die();
    }

    public function bt_tracking_manual(){
        $resp = array(
            "status" => false,
            "response" => ''
        );

        try {
            $resp["response"] = $this->manual->update_data($_POST['order_id'], $_POST);
            $resp["status"] = true;
        }
        catch(Exception $e) {
            $resp["response"] = $e->getMessage();
            $resp["status"] = false;
        }

        wp_send_json($resp);
        wp_die();
    }

    public function post_customer_feedback_to_sever() {

        $current_user = wp_get_current_user();
        $body = array(
            'your-message'    => esc_html($_POST['feedback']),
            'your-name'    => esc_html( $current_user->display_name ),
            'your-subject'    => "Plugin Feedback from " . get_site_url(),
            'your-email'    => esc_html(bloginfo('admin_email')),
        );
        $args = array(
            'body'        => $body,
            'headers'     => array(
                "Content-Type: multipart/form-data"
            ),
        );
        $url="https://shipment-tracker-for-woocommerce.bitss.tech/wp-json/contact-form-7/v1/contact-forms/4/feedback";

        $response = wp_remote_post( $url , $args );
        $body = wp_remote_retrieve_body( $response );
        return;
    }

}
