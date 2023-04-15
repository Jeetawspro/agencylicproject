<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://amitmittal.tech
 * @since      1.0.0
 *
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/public
 * @author     Amit Mittal <amitmittal@bitsstech.com>
 */
class Bt_Sync_Shipment_Tracking_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bt_Sync_Shipment_Tracking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bt_Sync_Shipment_Tracking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_style( 'bt-sync-shipment-tracking-public-css', plugin_dir_url( __FILE__ ) . 'css/bt-sync-shipment-tracking-public.css', array(), $this->version, 'all' );
	
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bt_Sync_Shipment_Tracking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bt_Sync_Shipment_Tracking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_script('bt-sync-shipment-tracking-public',plugin_dir_url( __FILE__ ) . 'js/bt-sync-shipment-tracking-public.js',array ('jquery'),$this->version, true);
		
	}
	/**
	 * Adds a new column to the "My Orders" table in the account.
	 *
	 * @param string[] $columns the columns in the orders table
	 * @return string[] updated columns
	*/
	public function wc_add_my_account_orders_column($columns){

		$new_columns = array();

		foreach ( $columns as $key => $name ) {

			$new_columns[ $key ] = $name;

			// add ship-to after order status column
			if ( 'order-status' === $key ) {
				$new_columns['order-shipment'] = __( 'Shipment', 'textdomain' );
			}
		}

		return $new_columns;

	}

	/**
	 * Adds data to the custom "ship to" column in "My Account > Orders".
	 *
	 * @param \WC_Order $order the order object for the row
	 */
	function wc_my_orders_shipment_column( $order ) {
		$bt_shipment_tracking = Bt_Sync_Shipment_Tracking_Shipment_Model::get_tracking_by_order_id($order->get_id());
		$bt_shipping_provider = $bt_shipment_tracking->shipping_provider;
		include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/order_shipment_details.php';

	}

    function bt_shipping_tracking_form() {
		wp_enqueue_style('bt-sync-shipment-tracking-public-css');
		wp_enqueue_script('bt-sync-shipment-tracking-public');
		ob_start();
        include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/bt-sync-shipment-tracking-public-display.php';
        return ob_get_clean();
        
    }

}
