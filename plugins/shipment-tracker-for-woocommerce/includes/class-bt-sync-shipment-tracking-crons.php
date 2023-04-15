<?php

class Bt_Sync_Shipment_Tracking_Crons {

    const BT_SHYPLITE_CRON_NAME="bt_shyplite_cron";
    private $shiprocket;
    private $shyplite;
	
	public function __construct($shiprocket,$shyplite) {
		$this->shiprocket = $shiprocket;
        $this->shyplite = $shyplite;
    }
    
    public function schedule_recurring_events(){
        $shyplite_cron_schedule=carbon_get_theme_option( 'bt_sst_shyplite_cron_schedule' );
        if( $shyplite_cron_schedule =="never" && false !== $timestamp = wp_next_scheduled( self::BT_SHYPLITE_CRON_NAME )){
            wp_unschedule_event( $timestamp, self::BT_SHYPLITE_CRON_NAME );
        }
        else if ( $shyplite_cron_schedule !=="never" && ! wp_next_scheduled( self::BT_SHYPLITE_CRON_NAME ) ) {
            wp_schedule_event( time(), 'hourly', self::BT_SHYPLITE_CRON_NAME );//to do
        }
    }


    public function sync_shyplite_shipments(){
        $orderids = $this->get_orders();
        $objs = $this->shyplite->bulk_update_order_shipment_status($orderids);
        return $objs;
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
        return $orders->posts;
    }
	

}
