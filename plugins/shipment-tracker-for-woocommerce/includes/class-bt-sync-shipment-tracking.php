<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://amitmittal.tech
 * @since      1.0.0
 *
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Bt_Sync_Shipment_Tracking
 * @subpackage Bt_Sync_Shipment_Tracking/includes
 * @author     Amit Mittal <amitmittal@bitsstech.com>
 */
class Bt_Sync_Shipment_Tracking {

	const BITSSLOGO ='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAAAyCAYAAABIxaeCAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjlDOERGRkFCN0YxMTFFMzgwMkVFQ0NFOUU5RkNBMDciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjlDOERGRkJCN0YxMTFFMzgwMkVFQ0NFOUU5RkNBMDciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyOUM4REZGOEI3RjExMUUzODAyRUVDQ0U5RTlGQ0EwNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyOUM4REZGOUI3RjExMUUzODAyRUVDQ0U5RTlGQ0EwNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pu0ct6MAADrzSURBVHja7H0HtCRX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';
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Bt_Sync_Shipment_Tracking_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	private $shiprocket;
	private $shyplite;
	private $crons;
    private $nimbuspost;
    private $manual;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'BT_SYNC_SHIPMENT_TRACKING_VERSION' ) ) {
			$this->version = BT_SYNC_SHIPMENT_TRACKING_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'bt-sync-shipment-tracking';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_cron_events();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_rest_apis();


	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Bt_Sync_Shipment_Tracking_Loader. Orchestrates the hooks of the plugin.
	 * - Bt_Sync_Shipment_Tracking_i18n. Defines internationalization functionality.
	 * - Bt_Sync_Shipment_Tracking_Admin. Defines all hooks for the admin area.
	 * - Bt_Sync_Shipment_Tracking_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) )  . '/vendor/autoload.php';
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/models/class-bt-sync-shipment-tracking-shipment-model.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bt-sync-shipment-tracking-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bt-review.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shipping_providers/shiprocket.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shipping_providers/shyplite.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shipping_providers/nimbuspost.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shipping_providers/manual.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-bt-sync-shipment-tracking-public.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-rest.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-crons.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-admin-ajax-functions.php';

		$this->loader = new Bt_Sync_Shipment_Tracking_Loader();
		$this->shiprocket = new Bt_Sync_Shipment_Tracking_Shiprocket();
		$this->shyplite = new Bt_Sync_Shipment_Tracking_Shyplite();
        $this->nimbuspost = new Bt_Sync_Shipment_Tracking_Nimbuspost();
        $this->manual = new Bt_Sync_Shipment_Tracking_Manual();
        ( new Bt_Sync_Shipment_Tracking_Review() )->hooks();
	}

	/**
	 * Defines cron events
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_cron_events() {

		$this->crons = new Bt_Sync_Shipment_Tracking_Crons($this->shiprocket,$this->shyplite, $this->nimbuspost);

		$this->loader->add_action( Bt_Sync_Shipment_Tracking_Crons::BT_SHYPLITE_CRON_NAME, $this->crons, 'sync_shyplite_shipments');


	}

	/**
	 * Defines rest apis generated by the plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_rest_apis() {

		$rest = new Bt_Sync_Shipment_Tracking_Rest( $this->get_plugin_name(), $this->get_version(), $this->shiprocket, $this->shyplite, $this->nimbuspost, $this->manual);

		//shiprocket webhook & apis
		$this->loader->add_action( 'rest_api_init', $rest, 'rest_shiprocket_webhook');
		$this->loader->add_action( 'init', $rest, 'generate_random_webhook_string');

		//shyplite
		$this->loader->add_action( 'rest_api_init', $rest, 'rest_shyplite');
		//$this->loader->add_action( 'rest_api_init', $rest, 'rest_shiprocket_get_postcode');

        //nimbuspost webhook & apis
        $this->loader->add_action( 'rest_api_init', $rest, 'rest_nimbuspost_webhook');
        $this->loader->add_action( 'init', $rest, 'generate_random_webhook_secret_key');

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Bt_Sync_Shipment_Tracking_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Bt_Sync_Shipment_Tracking_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Bt_Sync_Shipment_Tracking_Admin( $this->get_plugin_name(), $this->get_version(),$this->shiprocket,$this->shyplite, $this->nimbuspost, $this->manual );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'manage_shop_order_posts_custom_column', $plugin_admin, 'custom_orders_list_column_content', 20, 2);
		$this->loader->add_filter( 'manage_edit-shop_order_columns', $plugin_admin, 'custom_shop_order_column' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'plugin_admin_menu' );
		$this->loader->add_action( 'woocommerce_admin_order_data_after_shipping_address', $plugin_admin, 'show_order_shipping_admin' );
        $this->loader->add_action( 'add_meta_boxes_shop_order', $plugin_admin, 'add_meta_boxes' );
		$this->loader->add_action( 'woocommerce_process_shop_order_meta', $plugin_admin, 'woocommerce_process_shop_order_meta' );
		$this->loader->add_action( 'after_setup_theme', $this, 'crb_load' );
		$this->loader->add_action( 'carbon_fields_register_fields', $this, 'crb_attach_theme_options' );
		$this->loader->add_action( 'woocommerce_order_status_processing', $plugin_admin, 'woocommerce_order_status_processing',20,1 );
		$this->loader->add_action( 'init', $this->crons, 'schedule_recurring_events');

		$this->loader->add_action( 'bt_shipment_status_changed', $plugin_admin, 'bt_shipment_status_changed',10,3);

		$ajax_functions = new Bt_Sync_Shipment_Tracking_Admin_Ajax_Functions($this->crons, $this->shiprocket, $this->shyplite, $this->nimbuspost, $this->manual );
		$this->loader->add_action( 'wp_ajax_sync_now_shyplite', $ajax_functions, 'bt_sync_now_shyplite',10,2);

        $this->loader->add_action('wp_ajax_force_sync_tracking',$ajax_functions, 'force_sync_tracking');
        $this->loader->add_action('wp_ajax_bt_get_tracking_data',$ajax_functions, 'get_tracking_data_from_db');
        $this->loader->add_action('wp_ajax_nopriv_bt_get_tracking_data',$ajax_functions, 'get_tracking_data_from_db');
        $this->loader->add_action('wp_ajax_bt_tracking_manual',$ajax_functions, 'bt_tracking_manual');
        $this->loader->add_action('wp_ajax_save_order_awb_number',$ajax_functions, 'save_order_awb_number');
        $this->loader->add_action('wp_ajax_post_customer_feedback_to_sever',$ajax_functions, 'post_customer_feedback_to_sever');
	}

	function crb_load() {
		\Carbon_Fields\Carbon_Fields::boot();
	}

	function crb_attach_theme_options() {

			$order_statuses = wc_get_order_statuses();
			$order_statuses['any'] = "Any";

			$container = Container::make( 'theme_options', __( 'Shipment Tracking' ) )
			->set_page_parent( "options-general.php" )
			->add_tab( __( 'General' ), array(
				Field::make( 'set', 'bt_sst_enabled_shipping_providers', __( 'Enabled Shipping Providers' ) )
					->set_options( BT_SHIPPING_PROVIDERS ),
				Field::make( 'select', 'bt_sst_default_shipping_provider', __( 'Default Shipping Provider' ) )
					->add_options( BT_SHIPPING_PROVIDERS_WITH_NONE )
					->set_help_text( 'will be automatically assigned to new orders' ),
				Field::make( 'checkbox', 'bt_sst_complete_delivered_orders', __( 'Automatically Change Status of Delivered Orders to Completed') )
					->set_option_value( 'yes' ),
				Field::make( 'multiselect', 'bt_sst_order_statuses_to_sync', __( 'Orders Statuses' ) )
					->add_options( $order_statuses )->set_default_value( 'wc-processing' ),
				Field::make( 'select', 'bt_sst_sync_orders_date', __( 'Sync Tracking for' ) )
					->set_options( array(
						'10' => '10 Days',
						'15' => '15 Days',
						'20' => '20 Days',
						'30' => '30 Days',
						'45' => '45 Days',
						'60' => '60 Days',
						'90' => '90 Days',
					) )->set_default_value( '30' ),
				Field::make( 'checkbox', 'bt_sst_add_order_note', __( 'Add Order Note when shipment status has changed') )
					->set_option_value( 'yes' ),
				Field::make( 'select', 'bt_sst_order_note_type', __( 'Order Note Type' ) )
					->set_help_text( 'Setting this to "Customer Note" will also send an email to customer when shipment status changes (if enabled in woocommerce settings).' )
					->set_options( array(
						'private' => 'Private Note',
						'customer' => 'Customer Note',
					) )->set_default_value( 'customer' )->set_conditional_logic( array(
						array(
							'field' => 'bt_sst_add_order_note',
							'value' => true,
						)
				) ),
				Field::make( 'text', 'bt_sst_order_note_template', __( 'Order Note Template' ) )
					->set_help_text( 'Available variables: #old_status#, #new_status#, #track_link#. Html not allowed.' )
					->set_attribute( 'placeholder', 'Shipment status has been updated to #new_status#. #track_link#' )
					->set_default_value( 'Shipment status has been updated to #new_status#. #track_link#' )->set_conditional_logic( array(
						array(
							'field' => 'bt_sst_add_order_note',
							'value' => true,
						)
				) ),
			) );

			$enabled_shipping_providers = carbon_get_theme_option( 'bt_sst_enabled_shipping_providers' );

			if(is_array($enabled_shipping_providers) && in_array('shiprocket',$enabled_shipping_providers)){
				$random_rest_route = get_option( 'bt-sync-shipment-tracking-random-route','' );
				$container = $container->add_tab( __( 'Shiprocket' ), array(
					Field::make( 'html', 'bt_sst_shiprocket_webhook_html', __( 'Shiprocket Webhook URL' ) )
						->set_html(
							sprintf( '
								<b>Shiprocket Webhook URL: [<a target="_blank" href="https://app.shiprocket.in/shipment-webhook">Configure Webhook Here</a>] </b> <p>'.get_site_url(null,'/wp-json/'. $random_rest_route.'/'.$random_rest_route).'</p>
							')
						),
					Field::make( 'text', 'bt_sst_shiprocket_apiusername', __( 'Api Username' ) ),
					Field::make( 'text', 'bt_sst_shiprocket_apipassword', __( 'Api Password' ) )
					->set_attribute( 'type', 'password' ),
					Field::make( 'text', 'bt_sst_shiprocket_channelid', __( 'Channel Id' ) ),
					Field::make( 'html', 'bt_sst_shiprocket_generate_api_key_link' )
                        ->set_html(sprintf( "<b>[<a target='_blank' href='https://app.shiprocket.in/api-user'>Click here to get these details</a>]</b>"))
				) );
			}
			if(is_array($enabled_shipping_providers) && in_array('shyplite',$enabled_shipping_providers)){

				$container = $container->add_tab( __( 'Shyplite' ), array(
					Field::make( 'select', 'bt_sst_shyplite_cron_schedule', __( 'Sync Tracking every' ) )
						->add_options( array('never', '1 hour') )
						->set_help_text( 'Tracking information will be periodically synced at this interval' ),
					Field::make( 'text', 'bt_sst_shyplite_sellerid', __( 'Seller Id' ) ),
					Field::make( 'text', 'bt_sst_shyplite_appid', __( 'App Id' ) ),
					Field::make( 'text', 'bt_sst_shyplite_publickey', __( 'Public Key' ) ),
					Field::make( 'text', 'bt_sst_shyplite_secretkey', __( 'Secret Key' ) )
						->set_attribute( 'type', 'password' ),
					Field::make( 'html', 'bt_sst_shyplite_generate_api_key_link' )
                        ->set_html(sprintf( "<b>[<a target='_blank' href='https://app.shyplite.com/settings/api'>Click here to get these details</a>]</b>")),
					Field::make( 'html', 'bt_sst_sync_now_shyplite' )
    					->set_html( '<b>To sync tracking right now, click</b> <button class="button button-default" type="button" id="btn-bt-sync-now-shyplite">Sync Now</button>' )
				) );
			}

            if(is_array($enabled_shipping_providers) && in_array('nimbuspost',$enabled_shipping_providers)){
                $random_rest_secret = get_option( 'bt-sync-shipment-tracking-random-secret-key','' );
                $container = $container->add_tab( __( 'Nimbuspost' ), array(
                    Field::make( 'html', 'bt_sst_nimbuspost_webhook_html', __( 'Nimbuspost Webhook URL' ) )
                        ->set_html(
                            sprintf( '
                                    <b>Nimbuspost Webhook URL: [<a target="_blank" href="https://ship.nimbuspost.com/webhook">Configure Webhook Here</a>] </b> <p>'.get_site_url(null, '/wp-json/bt-sync-shipment-tracking-nimbuspost/v1.0.0/webhook_receiver').'</p>
                                ')
                        ),
                    Field::make( 'text', 'bt_sst_nimbuspost_webhook_secretkey', __( 'Your Secret Key' ) )
                        ->set_attribute( 'readOnly', true ),
                    Field::make( 'text', 'bt_sst_nimbuspost_apikey', __( "Nimbuspost Api Key" ) ),
                    Field::make( 'html', 'bt_sst_nimbuspost_generate_api_key_link' )
                        ->set_html(sprintf( "<b>[<a target='_blank' href='https://ship.nimbuspost.com/user_api'>Click here to get these details</a>]</b>"))
                ) );
            }
			$developer_html = file_get_contents(plugin_dir_path( dirname( __FILE__ ) )  . 'admin/partials/developer-doc.html');
			$container = $container->add_tab( __( 'Developer' ), array(
				Field::make( 'html', 'bt_sst_developer_html', __( 'Developer Options HTML' ) )
					->set_html(
						sprintf( $developer_html)
					),
			) );

			$container = $container->add_tab( __( 'Help' ), array(
				Field::make( 'html', 'bt_sst_help_html', __( 'Help HTML' ) )
					->set_html(
						sprintf( '
							<b>Shiprocket Integration Steps: </b> 
							<p>
								<ol type="1">
									<li>Enable Shiprocket in General Tab.</li>
									<li><a target="_blank" href="https://www.shiprocket.in/">Create & Activate Shiprocket Account</a></li>
									<li><a target="_blank" href="https://app.shiprocket.in/api-user">Create Api User</a></li>
									<li><a target="_blank" href="https://app.shiprocket.in/shipment-webhook">Configure Webhook URL</a></li>
									<li><a target="_blank" href="https://app.shiprocket.in/channels">Get Channel ID</a></li>
									<li>Copy API user, Api password and Channel ID to Shiprocket Tab.</li>
								</ol>
								
							</p>
							<b>Shyplite Integration Steps: </b> 
							<p>
								<ol type="1">
									<li>Enable Shyplite in General Tab.</li>
									<li><a target="_blank" href="https://shyplite.com/">Create & Activate Shyplite Account</a></li>
									<li><a target="_blank" href="https://pitneybowes.shyplite.com/settings/api">Enable API</a></li>
									<li>Copy Seller Id, App ID, Public key and Secret Key to Shyplite Tab.</li>
								</ol>
								
							</p>	
							<b>Nimbuspost Integration Steps: </b> 
							<p>
								<ol type="1">
									<li>Enable Nimbuspost in General Tab.</li>
									<li><a target="_blank" href="https://www.nimbuspost.com/">Create & Activate Nimbuspost Account</a></li>
									<li><a target="_blank" href="https://ship.nimbuspost.com/user_api">Generate Api Key</a></li>
									<li><a target="_blank" href="https://ship.nimbuspost.com/webhook/add">Configure Webhook URL</a></li>
									<li>Copy API key to Nimbuspost Tab.</li>
								</ol>
								
							</p>						
							<b>To force Sync tracking of specific order:</b>
							<p>
									<ol>
										<li>Go to order details page.</li>
										<li>Click edit icon of Shipping info.</li>
										<li>Select for correct Shipping Provider of the order.</li>
										<li>Go to Sync Shipping Tracking meta box in right side.</li>
										<li>Click on "Sync Tracking Now" button.</li>
										<li>The shipment tracking will be synced from respective shipping provider.</li>
									</ol>
									 
							</p>
							<b>To manually add shipment tracking information of specific order:</b>
							<p>
									<ol>
										<li>Go to order details page.</li>
										<li>Click edit icon of Shipping info.</li>
										<li>Select "Manual" option from Shipping Provider dropdown.</li>
										<li>Update order and the shipment tracking fields will be visible in right side meta box.</li>
										<li>Fill the all necessary information and update the order.</li>
										<li>Done!</li>
									</ol>
									 
							</p>
						')
					),
			) );

			$container = $container->add_tab( __( 'About' ), array(
				Field::make( 'html', 'bt_sst_about_html', __( 'About HTML' ) )
					->set_html(
						sprintf( '							
							<img src="'.self::BITSSLOGO.'" alt="Bitss Techniques logo"/><br>
							<b>Developed by: <a target="_blank" href="https://bitss.tech">Bitss Techniques</a></b><br>
							<em>Made in India</em>
							<p>If you find this plugin useful, please <a target="_blank" href="https://wordpress.org/plugins/shipment-tracker-for-woocommerce/#reviews">rate it</a>. For any suggestions/feedback please <a target="_blank" href="https://bitss.tech">contact us</a>.</p>
						')
					),
			) );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Bt_Sync_Shipment_Tracking_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'woocommerce_my_account_my_orders_columns', $plugin_public, 'wc_add_my_account_orders_column' );
		$this->loader->add_action( 'woocommerce_my_account_my_orders_column_order-shipment', $plugin_public, 'wc_my_orders_shipment_column' );
        $this->loader->add_shortcode( 'bt_shipping_tracking_form', $plugin_public,  'bt_shipping_tracking_form' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Bt_Sync_Shipment_Tracking_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
