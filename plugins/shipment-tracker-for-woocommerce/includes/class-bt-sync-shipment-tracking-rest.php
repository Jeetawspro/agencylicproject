<?php


class Bt_Sync_Shipment_Tracking_Rest {

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

    private $rest_route;

    private $rest_route_cart;

    private $rest_functions;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $shiprocket, $shyplite, $nimbuspost, $manual ) {

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bt-sync-shipment-tracking-rest-functions.php';

		$this->plugin_name = $plugin_name;
		$this->version = "v1.0.0";
        $this->rest_route = "bt-sync-shipment-tracking";
        $this->rest_route_shiprocket = "bt-sync-shipment-tracking-shiprocket";
        $this->rest_route_nimbuspost = "bt-sync-shipment-tracking-nimbuspost";

        $this->rest_functions = new Bt_Sync_Shipment_Tracking_Rest_Functions($shiprocket,$shyplite,$nimbuspost, $manual);
    }

    public function rest_shiprocket_webhook(){
        register_rest_route( $this->rest_route_shiprocket . '/' . $this->version , 'webhook_receiver', array(
            'methods' => 'POST',
            'callback' => array($this->rest_functions,"shiprocket_webhook_receiver"),
            'permission_callback' => '__return_true',
        ));

        $random_rest_route = get_option( 'bt-sync-shipment-tracking-random-route' );
        if(!empty($random_rest_route)){
            register_rest_route( $random_rest_route ,$random_rest_route, array(
                'methods' => 'POST',
                'callback' => array($this->rest_functions,"shiprocket_webhook_receiver"),
                'permission_callback' => '__return_true',
            ));
        }

    }

    function generate_random_webhook_string(){
        $random_rest_route = get_option( 'bt-sync-shipment-tracking-random-route' );
        if($random_rest_route==false){
            $random_rest_route = $this->getRandomBytes();
            update_option('bt-sync-shipment-tracking-random-route',$random_rest_route);
        }
    }

    function generate_random_webhook_secret_key(){
        $random_rest_secret = get_option( 'bt-sync-shipment-tracking-random-secret-key' );
        if($random_rest_secret==false){
            $random_rest_secret = $this->getRandomBytes();
            update_option('bt-sync-shipment-tracking-random-secret-key',$random_rest_secret);
        }

        //generate/set nimbuspost secret key
        carbon_set_theme_option( 'bt_sst_nimbuspost_webhook_secretkey', $random_rest_secret);
    }

    function getRandomBytes($length = 16)
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes($length / 2);
        } else {
            $bytes = openssl_random_pseudo_bytes($length / 2);
        }
        return bin2hex($bytes);
    }

    public function rest_shyplite(){
        register_rest_route( $this->rest_route . '/' . $this->version , 'shyplite', array(
            'methods' => 'GET',
            'callback' => array($this->rest_functions,"rest_shyplite"),
            'permission_callback' => '__return_true',
        ));
    }

    public function rest_nimbuspost_webhook(){
        register_rest_route( $this->rest_route_nimbuspost . '/' . $this->version , 'webhook_receiver', array(
            'methods' => 'POST',
            'callback' => array($this->rest_functions,"nimbuspost_webhook_receiver"),
            'permission_callback' => '__return_true',
        ));
    }







}
