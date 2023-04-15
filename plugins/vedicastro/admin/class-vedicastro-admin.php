<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sohamsolution.com/
 * @since      1.0.0
 *
 * @package    Vedicastro
 * @subpackage Vedicastro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vedicastro
 * @subpackage Vedicastro/admin
 * @author     Ravi Yadav <adisrini1103@gmail.com>
 */
class Vedicastro_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'vedicastro_create_admin_menu' ) );
		add_action( 'wp_ajax_vedicastro_form_data_ajax', array( $this, 'vedicastro_form_data_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_form_data_ajax', array($this, 'vedicastro_form_data_ajax' ) );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vedicastro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedicastro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, VEDICASTRO_URL . 'admin/css/vedicastro-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vedicastro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedicastro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, VEDICASTRO_URL . 'admin/js/vedicastro-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'vedicastro_admin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	}

	/**
	 * Vedicastro create admin menu
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_create_admin_menu(){
		add_menu_page('VedicAstro', 'VedicAstro', 'manage_options', 'vedicastro-settings', array($this, 'vedicastro_pages'), esc_url( VEDICASTRO_URL . 'admin/images/vedicastro-white-icon.svg' ) );
	}

	/**
	 * Register vedicastro setting options.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_option_fields(){
   		$data = '';
   		$data = array(
   				'vedicastro_setting'             => array('vedicastro_apikey', 'vedicastro_sign_list', 'vedicastro_bg_color', 'vedicastro_button_bg_color','vedicastro_form_border_color','vedicastro_button_color','vedicastro_button_tab_color','vedicastro_button_tab_bg_color','vedicastro_button_border_color','vedicastro_form_color', 'vedicastro_chart_color', 'vedicastro_google_apikey'),
   				'vedicastro_shortcode_lists'     => $this->vedicastro_shortcode_list(),
   				);
   	    return $data;
	}

	/**
	 * Vedicastro sign list.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_sign_list(){
   		$data = '';
   		$data = array(
   				'sun'	=> esc_html__( 'Sun Sign', 'vedicastro' ),
   				'moon'	=> esc_html__( 'Moon Sign', 'vedicastro' ),
   				);
   	    return $data;
	}

	/**
	 * Vedicastro shortcode list.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_shortcode_list(){
   		$data = '';
   		$data = array(
   				'vedicastro-all-in-one-shortcode'	          => esc_html__( 'All in One Shortcode', 'vedicastro' ),
   				'vedicastro-horoscope-shortcode'	          => esc_html__( 'Horoscope Shortcode', 'vedicastro' ),
   				'vedicastro-kundali-shortcode'	              => esc_html__( 'Kundali Shortcode', 'vedicastro' ),
   				'vedicastro-matching-shortcode'	              => esc_html__( 'Matching Shortcode', 'vedicastro' ),
   				'vedicastro-panchang-shortcode'	              => esc_html__( 'Panchang Shortcode', 'vedicastro' ),
   				'vedicastro-panchang-moon-calendar-shortcode' => esc_html__( 'Panchang Moon Calendar Shortcode', 'vedicastro' ),
   				'vedicastro-retro-shortcode'                  => esc_html__( 'Retro Shortcode', 'vedicastro' ),
   				'vedicastro-numberology-shortcode'            => esc_html__( 'Numberology Shortcode', 'vedicastro' ),
   				);
   	    return $data;
	}

	/**
	 * Vedicastro menu pages.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_pages() {
        $output = $lists = '';
		$output .= '<div class="wrap">
					  	<h1>' . esc_html__( 'Vedicastro Setting', 'vedicastro' ) . '</h1>
					  	<div class="vedicastro-setting-list">
					    	<ul class="tabs">
					      		<li class="tab-link current" data-tab="tab-1"><strong>' . esc_html__( 'API Setting', 'vedicastro' ) . '</strong></li>
					      		<li class="tab-link ' . esc_attr( $add_class ) . '" data-tab="tab-2"><strong>' . esc_html__( 'Vedicastro Shortcode List', 'vedicastro' ) . '</strong></li>
					    	</ul>';
					        $output .= $this->vedicastro_setting_page(); 
					        $output .= $this->vedicastro_shortcode_lists_page(); 
			$output .= '</div>  
					</div>';
	    echo $output;
	}

	/**
	 * Vedicastro setting page.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_setting_page(){
		$output = $args = $vedicastro_apikey = $vedicastro_sign = $status = $api_status = $vedicastro_sign_list = $vedicastro_bg_color = $vedicastro_button_bg_color = $vedicastro_form_border_color = $vedicastro_button_color = $vedicastro_button_tab_color = $vedicastro_button_border_color = $vedicastro_form_color = $vedicastro_chart_color = $vedicastro_google_apikey = '';
        $args = $this->vedicastro_option_fields();
        $vedicastro_bg_color = esc_attr__( '#ebf5ff', 'vedicastro' );
		$vedicastro_form_color = esc_attr__( '#000000', 'vedicastro' );
		$vedicastro_button_bg_color = esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_form_border_color = esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_button_color = esc_attr__( '#ffffff', 'vedicastro' );
		$vedicastro_button_border_color = esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_button_tab_color = esc_attr__( '#ebf5ff', 'vedicastro' );
		$vedicastro_button_tab_bg_color = esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_chart_color = esc_attr__( '#000000', 'vedicastro' );
        if(!empty($args)) :
		    foreach($args as $key => $val) :
		    	switch($key){
		    		case 'vedicastro_setting':
		    			if(!empty($val)) :
		    				$vedicastro_setting = json_decode(get_option('vedicastro_setting'), true);
		    				if(!empty($vedicastro_setting)) :
			    				foreach($vedicastro_setting as $valk => $valv) :
			    					switch($valk) :
			    						case 'vedicastro_apikey':
			    							$vedicastro_apikey = !empty($valv) ? $valv : '';
			    						break;
			    						case 'vedicastro_sign_list' :
			    							$vedicastro_sign = !empty($valv) ? $valv : '';
			    						break;
			    						case 'vedicastro_bg_color' :
			    							$vedicastro_bg_color = !empty($valv) ? $valv : esc_attr__( '#ebf5ff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_form_color' :
			    							$vedicastro_form_color = !empty($valv) ? $valv : esc_attr__( '#000000', 'vedicastro' );
			    						break;
			    						case 'vedicastro_button_bg_color' :
			    							$vedicastro_button_bg_color = !empty($valv) ? $valv : esc_attr__( '#007bff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_form_border_color' :
			     							$vedicastro_form_border_color = !empty($valv) ? $valv : esc_attr__( '#007bff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_button_color' :
			    							$vedicastro_button_color = !empty($valv) ? $valv : esc_attr__( '#ffffff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_button_border_color' :
			    							$vedicastro_button_border_color = !empty($valv) ? $valv : esc_attr__( '#007bff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_button_tab_color' :
			    							$vedicastro_button_tab_color = !empty($valv) ? $valv : esc_attr__( '#ebf5ff', 'vedicastro' );
			    						break;
			    						case 'vedicastro_button_tab_bg_color' :
			    							$vedicastro_button_tab_bg_color = !empty($valv) ? $valv : esc_attr__( '#007bff', 'vedicastro' );
			    						break;
			    						case 'status' :
			    							$status = !empty($valv) ? $valv : '';
			    						break;
			    						case 'api_status' :
			    							$api_status = !empty($valv) ? $valv : '';
			    						break;
			    						case 'vedicastro_chart_color' :
			    							$vedicastro_chart_color = !empty($valv) ? $valv : esc_attr__( '#000000', 'vedicastro' );
			    						break;
			    						case 'vedicastro_google_apikey' :
			    							$vedicastro_google_apikey = !empty($valv) ? $valv : '';
			    						break;
			    					endswitch;
			    				endforeach;
		    				endif;
		    			endif;
		    		break;
		    	}
		    endforeach;
		endif;
		ob_start();
		$vedicastro_sign_list = $this->vedicastro_sign_list();
		$output .= '<div id="tab-1" class="tab-content current" data-tab="vedicastro-setting">
			     	<form id="vedicastro-setting" method="post" action="options.php" class="form-container">';
			     			$output .= settings_fields('vedicastro-setting');
                			$output .= do_settings_sections('vedicastro-setting');
                			$output .= ob_get_clean();
			 $output .= '<div class="form-group w-50 float-left">
  	      					<label for="vedicastro_status">' . esc_html__( 'Status', 'vedicastro' ) . '</label>';
  	      					if(!empty($api_status) && $api_status == 'connected') :
  	      						$output .= '<span class="status positive">' . esc_html__( 'Connected', 'vedicastro' ) . '</span>';
  	      					else :
  	      						$output .= '<span class="status neutral">' . esc_html__( 'Not Connected', 'vedicastro' ) . '</span>';
  	      					endif;
  	         $output .= '</div>
  	    				<div class="form-group w-50 float-left">
  	      					<label for="vedicastro_apikey">' . esc_html__( 'API Key', 'vedicastro' ) . '</label>
  	      					<input type="text" id="vedicastro_apikey" name="vedicastro_apikey" value="' . esc_attr( $vedicastro_apikey ) . '" class="form-control " placeholder="' . esc_attr__( 'Please enter API Key.', 'vedicastro' ) . '">
  	      					<a href="' . esc_url( 'https://vedicastroapi.com/' ) . '" target="_blank">' . __( 'Get Vedic Astro API Here', 'vedicastro' ) . '</a>
  	    				</div>';
  	    				if(!empty($vedicastro_sign_list)) :
	  	    				$output .= '<div class="form-group w-50 float-left">
	  	      								<label for="vedicastro_list">' . esc_html__( 'Vedic Astro Sign', 'vedicastro' ) . '</label>
	  	      								<select id="vedicastro_sign_list" name="vedicastro_sign_list">
	  	      									<option value="">' . esc_html__( 'Select Sign', 'vedicastro' ) . '</option>';
	  	      									foreach($vedicastro_sign_list as $vedicastro_sign_key => $vedicastro_sign_val) :
	  	      										if($vedicastro_sign == $vedicastro_sign_key) :
	  	      											$output .= '<option value="' . esc_attr( $vedicastro_sign_key ) . '" selected>' . esc_html( $vedicastro_sign_val ) . '</option>';
	  	      										else :
	  	      											$output .= '<option value="' . esc_attr( $vedicastro_sign_key ) . '">' . esc_html($vedicastro_sign_val) . '</option>';
	  	      										endif;
	  	      									endforeach;
	  	      					 $output .= '</select>
	  	    							</div>';
  	    				endif;
  	    				$output .= '<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_bg_color">' . esc_html__( 'Background Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_bg_color" name="vedicastro_bg_color" value="' . esc_attr( $vedicastro_bg_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_form_color">' . esc_html__( 'Form Text Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_form_color" name="vedicastro_form_color" value="' . esc_attr( $vedicastro_form_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_bg_color">' . esc_html__( 'Form  Border Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_form_border_color" name="vedicastro_form_border_color" value="' . esc_attr( $vedicastro_form_border_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_bg_color">' . esc_html__( 'Button Background Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_button_bg_color" name="vedicastro_button_bg_color" value="' . esc_attr( $vedicastro_button_bg_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_color">' . esc_html__( 'Button Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_button_color" name="vedicastro_button_color" value="' . esc_attr( $vedicastro_button_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_border_color">' . esc_html__( 'Button border Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_button_border_color" name="vedicastro_button_border_color" value="' . esc_attr( $vedicastro_button_border_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_tab_bg_color">' . esc_html__( 'Button Tab Active Background Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_button_tab_bg_color" name="vedicastro_button_tab_bg_color" value="' . esc_attr( $vedicastro_button_tab_bg_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_button_tab_color">' . esc_html__( 'Button Tab Active Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_button_tab_color" name="vedicastro_button_tab_color" value="' . esc_attr( $vedicastro_button_tab_color ) . '" class="form-control ">
			  	    				</div>
			  	    				<div class="form-group w-50 float-left">
			  	      					<label for="vedicastro_chart_color">' . esc_html__( 'Chart Color', 'vedicastro' ) . '</label>
			  	      					<input type="color" id="vedicastro_chart_color" name="vedicastro_chart_color" value="' . esc_attr( $vedicastro_chart_color ) . '" class="form-control ">';
			  	    	 $output .= '</div>
			  	    				<div class="form-group w-50 float-left">
  	      								<label for="vedicastro_google_apikey">' . esc_html__( 'Google API Key', 'vedicastro' ) . '</label>
  	      								<input type="text" id="vedicastro_google_apikey" name="vedicastro_google_apikey" value="' . esc_attr( $vedicastro_google_apikey ) . '" class="form-control " placeholder="' . esc_attr__( 'Please enter Google API Key.', 'vedicastro' ) . '">
  	      								<a href="' . esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ) . '" target="_blank">' . __( 'Get Google API Here', 'vedicastro' ) . '</a>
  	    							</div>';
  	    				$output .= '<button type="button" id="vedicastro_from_submit_btn" class="btn vedicastro_from_submit_btn" style="position: relative;">' . esc_html__( 'Save', 'vedicastro' ) . '<img src="' . esc_url( plugin_dir_url( __DIR__ ) . 'admin/images/loder.gif' ) . '" class="LoderImg" style="display: none;"></button>
			     	</form>
				   </div>';
		return $output;
	}

	/**
	 * Vedicastro shortcode list page.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_shortcode_lists_page(){
		$output = '';
		$shortcode_list = $this->vedicastro_option_fields();
		if(!empty($shortcode_list['vedicastro_shortcode_lists'])) :
			$output .= '<div id="tab-2" class="tab-content" data-tab="vedicastro-lists">
				     	<h3>' . esc_html__('Vedic Astro Shortcode Lists', 'vedicastro') . '</h3>';
				 $output .= '<div class="form-group w-50 float-left">';
				 				foreach($shortcode_list['vedicastro_shortcode_lists'] as $shortcode_list_key => $shortcode_list_val) :
					                $output .= '<div class="form-group w-25 float-left">
					  	      						<label for="vedicastro_shortcode_name">' . esc_html( $shortcode_list_val ) . '</label>
					  	      			        </div>
					  	      			        <div class="form-group w-25 float-right">[' . esc_html( $shortcode_list_key ) . ']</div>';
	  	      			   		endforeach;
	  	    	 $output .= '</div>
					   </div>';
		endif;
		return $output;
	}

	/**
	 * Register vedicastro setting register.
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_settings_register() {	
		$args = '';
        $args = $this->vedicastro_option_fields();
		if(!empty($args)) :
		    foreach($args as $key => $val) :
		    	switch($key){
		    		case 'vedicastro_setting':
		    		    foreach($val as $valk => $valv) :
		    				register_setting( 'vedicastro-setting', sanitize_text_field( $valv ) );
		    			endforeach;
		    		break;
		    	}
		    endforeach;
		endif;
	}

	/**
	 * Vedicastro form data ajax
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_form_data_ajax(){
    	$data = '';
    	$form_data = array();	
    	parse_str($_POST['formdata'], $form_data);
    	$form_data = wp_unslash($form_data);
    	$vedicastro_apikey = sanitize_text_field( trim( $form_data['vedicastro_apikey'] ) );
    	$vedicastro_sign_list = sanitize_text_field( trim( $form_data['vedicastro_sign_list'] ) );
    	$vedicastro_bg_color = sanitize_text_field( trim( $form_data['vedicastro_bg_color'] ) );
    	$vedicastro_button_bg_color = sanitize_text_field( trim( $form_data['vedicastro_button_bg_color'] ) );
    	$vedicastro_form_border_color = sanitize_text_field( trim( $form_data['vedicastro_form_border_color'] ) );
    	$vedicastro_button_color = sanitize_text_field( trim( $form_data['vedicastro_button_color'] ) );
    	$vedicastro_button_border_color = sanitize_text_field( trim( $form_data['vedicastro_button_border_color'] ) );
    	$vedicastro_button_tab_color = sanitize_text_field( trim( $form_data['vedicastro_button_tab_color'] ) );
    	$vedicastro_button_tab_bg_color = sanitize_text_field( trim( $form_data['vedicastro_button_tab_bg_color'] ) );
    	$vedicastro_form_color = sanitize_text_field( trim( $form_data['vedicastro_form_color'] ) );
    	$vedicastro_chart_color = sanitize_text_field( trim( $form_data['vedicastro_chart_color'] ) );
    	$vedicastro_google_apikey = sanitize_text_field( trim( $form_data['vedicastro_google_apikey'] ) );
    	$prediction = 'daily' . $vedicastro_sign_list;
    	$zodic_sign = 1;
    	$date = date('d/m/Y');
    	$api_key = $vedicastro_apikey;
    	$api_data = array(
					'zodiac'  => $zodic_sign,
					'date' 	  => $date,
					'api_key' => $api_key,
					);
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/prediction/'.$prediction.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$get_data = json_decode($response['body'], true);
    	if($get_data['status'] == 200) :
    		$data = array(
	    			'vedicastro_apikey'    		     => $vedicastro_apikey,
	    			'vedicastro_sign_list' 		     => $vedicastro_sign_list,
	    			'vedicastro_bg_color' 		     => $vedicastro_bg_color,
	    			'vedicastro_button_bg_color'     => $vedicastro_button_bg_color,
	    			'vedicastro_form_border_color'   => $vedicastro_form_border_color,
	    			'vedicastro_button_color'        => $vedicastro_button_color,
	    			'vedicastro_button_border_color' => $vedicastro_button_border_color,
	    			'vedicastro_button_tab_color'    => $vedicastro_button_tab_color,
	    			'vedicastro_button_tab_bg_color' => $vedicastro_button_tab_bg_color,
	    			'vedicastro_form_color'          => $vedicastro_form_color,
	    			'vedicastro_chart_color'         => $vedicastro_chart_color,
	    			'vedicastro_google_apikey'       => $vedicastro_google_apikey,
	    			'status'                         => 1,
	    			'api_status'                     => 'connected',
	    			);
    		update_option('vedicastro_setting', json_encode($data));
        	echo json_encode(array('status' => 1,'form'=> 'vedicastro-setting', 'api_status' => 'connected', 'data' => $data));
    	else :
    		update_option('vedicastro_setting', '');
        	echo json_encode(array('status' => 0,'form'=> 'vedicastro-setting', 'api_status' => 'not-connected'));
    	endif;
    	wp_die();
    }

}
