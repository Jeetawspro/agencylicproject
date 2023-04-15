<?php


class Bt_Sync_Shipment_Tracking_Rest_Functions{

    private $shiprocket;
    private $shyplite;
    private $nimbuspost;
    private $manual;

    public function __construct($shiprocket,$shyplite, $nimbuspost, $manual ) {

        $this->shiprocket = $shiprocket;
        $this->shyplite = $shyplite;
        $this->nimbuspost = $nimbuspost;
        $this->manual = $manual;
    }

    public function shiprocket_webhook_receiver($request){
        return $this->shiprocket->shiprocket_webhook_receiver($request);
    }

    public function shiprocket_get_postcode($request){
        $resp = array(
            "status"=>false,
            "message"=>"",
            "data"=>array()
        );

        return $resp;
    }

    public function rest_shyplite($request){
        //$ob = new Bt_Sync_Shipment_Tracking_Crons();

        //return $ob->sync_shyplite_shipments();
        //$resp= $this->shyplite->get_order_tracking("3591");
       // $resp= $this->shiprocket->get_order_tracking("4569");
        // if(sizeof($resp)>0){
        //     $shipment_obj = $this->shiprocket->init_model($resp[0]);
        //     //update_post_meta($order_id, '_bt_shipment_tracking', $shipment_obj);
        //     return $shipment_obj;
        // }

        //$copyright = carbon_get_theme_option( 'crb_text' );

        return "";// $this->get_orders();
    }

    public function nimbuspost_webhook_receiver($request){
        return $this->nimbuspost->nimbuspost_webhook_receiver($request);
    }

    public function nimbuspost_get_postcode($request){
        $resp = array(
            "status"=>false,
            "message"=>"",
            "data"=>array()
        );

        return $resp;
    }

    function get_orders(){
        $order_statuses=carbon_get_theme_option( 'bt_sst_order_statuses_to_sync' );
        $orders_date= carbon_get_theme_option( 'bt_sst_sync_orders_date' );
        $fromTime = date("Y-m-d",strtotime("-$orders_date day"));
        $filters_orders = array(
            'post_status' =>  $order_statuses,
            'posts_per_page'   => -1,
            'post_type'   => 'shop_order',
            'fields' => 'ids',
             'date_query' => array(
                 'after' => $fromTime
             ),
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query'  => array(
                array(
                    'key'     => '_bt_shipping_provider',
                    'value'   => 'shyplite',
                    'compare' => '=',
                ),
            ),
        );

        $orders = new WP_Query($filters_orders);
        return $orders;
    }
}
