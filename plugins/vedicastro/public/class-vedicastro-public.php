<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sohamsolution.com/
 * @since      1.0.0
 *
 * @package    Vedicastro
 * @subpackage Vedicastro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vedicastro
 * @subpackage Vedicastro/public
 * @author     Ravi Yadav <adisrini1103@gmail.com>
 */
class Vedicastro_Public {

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
		add_action( 'wp_ajax_vedicastro_prediction_ajax', array( $this, 'vedicastro_prediction_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_prediction_ajax', array( $this, 'vedicastro_prediction_ajax' ) );
		add_action( 'wp_ajax_vedicastro_kundali_ajax', array( $this, 'vedicastro_kundali_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_kundali_ajax', array( $this, 'vedicastro_kundali_ajax' ) );
		add_action( 'wp_ajax_vedicastro_matching_ajax', array( $this, 'vedicastro_matching_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_matching_ajax', array( $this, 'vedicastro_matching_ajax' ) );
		add_action( 'wp_ajax_vedicastro_panchang_moon_ajax', array( $this, 'vedicastro_panchang_moon_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_panchang_moon_ajax', array( $this, 'vedicastro_panchang_moon_ajax' ) );
		add_action( 'wp_ajax_vedicastro_panchang_ajax', array( $this, 'vedicastro_panchang_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_panchang_ajax', array( $this, 'vedicastro_panchang_ajax' ) );
		add_action( 'wp_ajax_vedicastro_retro_ajax', array( $this, 'vedicastro_retro_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_retro_ajax', array( $this, 'vedicastro_retro_ajax' ) );
		add_action( 'wp_ajax_vedicastro_numberology_ajax', array( $this, 'vedicastro_numberology_ajax' ) );
		add_action( 'wp_ajax_nopriv_vedicastro_numberology_ajax', array( $this, 'vedicastro_numberology_ajax' ) );
		add_action( 'wp_body_open', array( $this, 'vedicastro_preloader' ) );
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
		 * defined in Vedicastro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedicastro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'vedicastro-circle', VEDICASTRO_URL . 'public/css/vedicastro-circle.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, VEDICASTRO_URL . 'public/css/vedicastro-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'vedicastro-reset', VEDICASTRO_URL . 'public/css/vedicastro-reset.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'vedicastro-responsive', VEDICASTRO_URL . 'public/css/vedicastro-responsive.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap', false );
		$custom_css = $vedicastro_setting = '';
		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		$vedicastro_bg_color = !empty( $vedicastro_setting['vedicastro_bg_color']) ? $vedicastro_setting['vedicastro_bg_color'] : esc_attr__( '#ebf5ff', 'vedicastro' );
		$vedicastro_form_border_color = !empty( $vedicastro_setting['vedicastro_form_border_color'] ) ? $vedicastro_setting['vedicastro_form_border_color'] : esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_form_color = !empty( $vedicastro_setting['vedicastro_form_color'] ) ? $vedicastro_setting['vedicastro_form_color'] : esc_attr__( '#000000', 'vedicastro' );
		$vedicastro_button_bg_color = !empty( $vedicastro_setting['vedicastro_button_bg_color'] ) ? $vedicastro_setting['vedicastro_button_bg_color'] : esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_button_color = !empty( $vedicastro_setting['vedicastro_button_color'] ) ? $vedicastro_setting['vedicastro_button_color'] : esc_attr__( '#ffffff', 'vedicastro' );
		$vedicastro_button_border_color = !empty( $vedicastro_setting['vedicastro_button_border_color'] ) ? $vedicastro_setting['vedicastro_button_border_color'] : esc_attr__( '#007bff', 'vedicastro' );
		$vedicastro_button_tab_color = !empty( $vedicastro_setting['vedicastro_button_tab_color'] ) ? $vedicastro_setting['vedicastro_button_tab_color'] :  esc_attr__( '#ebf5ff', 'vedicastro' );
		$vedicastro_button_tab_bg_color = !empty( $vedicastro_setting['vedicastro_button_tab_bg_color'] ) ? $vedicastro_setting['vedicastro_button_tab_bg_color'] : esc_attr__( '#007bff', 'vedicastro' );
		if( !empty( $vedicastro_bg_color ) || !empty( $vedicastro_form_border_color ) ) :
			$custom_css .= '.bg-sky-blue {
						    	background: ' . esc_attr( $vedicastro_bg_color ) . ' !important;
						    	border: 1px solid ' . esc_attr( $vedicastro_form_border_color ) . ' !important;
						    }';
		endif;
		if( !empty( $vedicastro_form_color ) ) : 
			$custom_css .= '.text-color , ::-webkit-input-placeholder { 
								color: ' . esc_attr( $vedicastro_form_color ) . ' !important;
						   }';
		endif;
		if( !empty( $vedicastro_button_color ) || !empty( $vedicastro_button_bg_color ) || !empty( $vedicastro_button_border_color ) ) :
			$custom_css .= '.vedicastro_tab_button a.active {
								background: ' . esc_attr( $vedicastro_button_bg_color ) . ' !important;
			    				color: ' . esc_attr( $vedicastro_button_color ) . ' !important;
			    				border: 1px solid ' . esc_attr( $vedicastro_button_border_color ) . ' !important;
							}';
		endif;
		if( !empty( $vedicastro_button_tab_bg_color ) || !empty( $vedicastro_button_tab_color ) ) :
			$custom_css .= '.vedicastro_button {
				    			color: ' . esc_attr( $vedicastro_button_tab_color ) . ' !important;
				    			background: ' . esc_attr( $vedicastro_button_tab_bg_color ) . ' !important;
							}';
		endif;
        wp_add_inline_style( $this->plugin_name, $custom_css );

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
		 * defined in Vedicastro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vedicastro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_script( 'vedicastro-google', VEDICASTRO_URL . 'public/js/vedicastro-google.js', array( 'jquery' ), $this->version, false );
        $google_api_key = $this->vedicastro_google_api_key();
		wp_enqueue_script( 'google-place', 'https://maps.googleapis.com/maps/api/js?v=3.43&key=' . esc_attr( $google_api_key ) . '&callback=initAutocomplete&libraries=places&v=weekly"
      async', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, VEDICASTRO_URL . 'public/js/vedicastro-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'vedicastro_public_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	/**
	 * Vedicastro preloader
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_preloader(){
    	$output = '';
    	$output = '<section class="Preloader" style="display:none;">
				      	<div class="LoaderSection">
							<div class="loader_center">
								<div class="loader">
									<img src="' . esc_url( VEDICASTRO_URL . 'public/images/loader2.gif' ) . '" class="img_fluid">
							 	</div>
							 	<div class="status fs-24">' . __( 'Vedic Astro', 'vedicastro' ) . '</div>
				        	</div>
				      	</div>
				   </section>';
    	echo __( $output );
    }

	/**
	 * Vedicastro google api key
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_google_api_key(){
    	$output = '';
    	$vedicastro_setting = json_decode( get_option('vedicastro_setting' ), true);
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_google_apikey':
						$vedicastro_google_apikey = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
    	$output = $vedicastro_google_apikey;
    	return $output;
    }

    /**
	 * Vedicastro get chart color
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_get_chart_color(){
    	$output = '';
    	$vedicastro_setting = json_decode(get_option('vedicastro_setting'), true);
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_chart_color':
						$vedicastro_chart_color = !empty($valv) ? str_replace( '#', '%23', $valv ) : str_replace( '#', '%23', '#000000' );
					break;
				endswitch;
			endforeach;
		endif;
		if( !empty( $vedicastro_chart_color ) ) :
    		$output = $vedicastro_chart_color;
    	else :
    		$output = str_replace( '#', '%23', '#000000' );
    	endif;
    	return $output;
    }

	/**
	 * Vedicastro api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_prediction_api($prediction, $api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/prediction/'.$prediction.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = json_decode($response['body'], true);
		return $output;
	}

	/**
	 * Vedicastro api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_api($endpoint, $api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/'.$endpoint.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = json_decode($response['body'], true);
		return $output;
	}

	/**
	 * Vedicastro google api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_google_api($api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://maps.google.com/maps/api/geocode/json?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = json_decode($response['body'], true);
		return $output;
	}

	/**
	 * Vedicastro mahadasha api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_mahadasha_api($endpoint, $api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/'.$endpoint.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = json_decode($response['body'], true);
		return $output;
	}

	/**
	 * Vedicastro ashtakvarga api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_ashtakvarga_api($endpoint, $api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/'.$endpoint.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = json_decode($response['body'], true);
		return $output;
	}

	/**
	 * Vedicastro SVG api
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_svg_api($endpoint, $api_data){
		$output = '';
    	$buil_query = build_query($api_data);
    	$url = 'https://api.vedicastroapi.com/json/'.$endpoint.'?'.$buil_query;
    	$response = wp_remote_get($url);
    	$output = $response['body'];
		return $output;
	}
    
    /**
	 * Vedicastro chart data
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_chart_data(){
    	$output = '';
    	$output = array(
                  'D1'     => __( 'Lagna', 'vedicastro'),
				  'D3'     => __( 'Dreshkana', 'vedicastro'),
				  'D3-s'   => __( 'D3-Somanatha', 'vedicastro'),
				  'D7'     => __( 'Saptamsa', 'vedicastro'), 
				  'D9'     => __( 'Navamsa', 'vedicastro'), 
				  'D10'    => __( 'Dasamsa', 'vedicastro'),
				  'D10-R'  => __( 'Dasamsa-EvenReverse', 'vedicastro'),
				  'D12'    => __( 'Dwadasamsa', 'vedicastro'),
				  'D16'    => __( 'Shodashamsa', 'vedicastro'),
			      'D20'    => __( 'Vimsamsa', 'vedicastro'),
				  'D24'    => __( 'ChaturVimshamsha', 'vedicastro'),
				  'D24-R'  => __( 'D24-R', 'vedicastro'),
				  'D30'    => __( 'Trimshamsha', 'vedicastro'),
			      'D40'    => __( 'KhaVedamsa', 'vedicastro'),
				  'D45'    => __( 'AkshaVedamsa', 'vedicastro'),
				  'D60'    => __( 'Shastiamsha', 'vedicastro'),
				  'chalit' => __( 'Bhav-Chalit', 'vedicastro'),
    			  );
    	return $output;
    }

    /**
	 * Vedicastro chart image dropdown
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_chart_img_dropdown($data, $id, $ul_id, $class = ''){
    	$output = '';
    	$chart_data = $this->vedicastro_chart_data();
    	if( !empty( $data ) ) :
    		foreach( $chart_data as $vedicastro_chart_key => $vedicastro_chart_val ) :
    			if( $vedicastro_chart_key == $data) :
    				$text = sprintf( __( '%1$s - %2$s', 'vedicastro' ), $vedicastro_chart_key, $vedicastro_chart_val );
    			endif; 
    		endforeach;
    	else :
    				$text = __( 'D9 Navamsha', 'vedicastro' );
    	endif;
    	if( !empty( $chart_data ) ) :
	    	$output .= '<div class="vedicastro-chart-img-dropdown ' . esc_attr( $class ) . '">
	    					<div class="drop_lagan_chart_content">
								<p class="fs-16 lh-24 fw-700 clr-blue  text_center">' . __( $text ) . '</p>	
								<div class="chart-wrapper" id="' . esc_attr( $ul_id ) . '-wrapper">
									<label>' . __( 'Change', 'vedicastro' ) . '</label>
									<select class="chart-content-menu p_0" id="' . esc_attr( $ul_id ) . '">';
										foreach( $chart_data as $chart_data_key => $chart_data_val ) :
											$output .= '<option value="' . esc_attr( $chart_data_key ) . '" ' . selected( $data, $chart_data_key, false ) . ' data-code="' . esc_attr( $chart_data_key ) . '" data-code-title="' . esc_attr( $chart_data_val ) . '">' . sprintf( __( '%1$s - %2$s', 'vedicastro' ), $chart_data_key, $chart_data_val ) . '</option>';
										endforeach;
						$output .= '</select>
				           		</div>
				           	</div>
					    </div>';
		endif;
    	return $output;
    }

	/**
	 * Vedicastro change style
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_change_style($style, $section){
		$output = $text = '';
		if($style == 'north') :
		   $style = 'south';
		   $text = __( 'Click here for South Style', 'vedicastro' );
		else :
		   $style = 'north';
		   $text = __( 'Click here for North Style', 'vedicastro' );
		endif;
		$output = '<div class="vedicastro-lagan-chart-content" data-section="' . esc_attr( $section ) . '">
						<p class="fs-16 lh-24 fw-700 clr-blue  text_center">' . __( 'Lagna Chart', 'vedicastro' ) . '</p>	
						<a href="javascript:;" data-style="' . esc_attr( $style ) . '">' . __( $text ) . '</a>
				   </div>';
		return $output;
	}

	/**
	 * Vedicastro predection ajax
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_prediction_ajax(){
		$output = '';
		$zodic_sign = sanitize_text_field( $_POST['zodiac'] );
		$cycle = sanitize_text_field( $_POST['cycle'] );
		$type = sanitize_text_field( $_POST['typee'] );
		$todadata = date('d/m/Y');
		switch($cycle) :
			case 'daily':
			    $day = sanitize_text_field( $_POST['day'] );
			    $tomorrow = date("d/m/Y", strtotime("+1 day"));
			    if(!empty($day)) :
					if($day == 'today') :
						$api_data['date'] = $todadata;
					else :
						$api_data['date'] = $tomorrow;
					endif;
				else :
					$api_data['date'] = $todadata;
				endif;
			break;
			case 'weekly':
			    $week = sanitize_text_field( $_POST['week'] );
			    if(!empty($week)) :
					if($week == 'thisweek') :
						$api_data['week'] = 'thisweek';
					else :
						$api_data['week'] = 'nextweek';
					endif;
				else :
					$api_data['week'] = 'thisweek';
				endif;
			break;
		endswitch;
		$vedicastro_setting = json_decode(get_option('vedicastro_setting'), true);
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
					case 'vedicastro_sign_list' :
						$vedicastro_sign = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		$api_data['zodiac'] = $zodic_sign;
		$api_data['show_same'] = true;
		$api_data['type'] = 'big';
		$api_data['split'] = true;
		$api_data['api_key'] = $api_key;
		$prediction = $cycle . $vedicastro_sign;
		$get_data = $this->vedicastro_prediction_api($prediction, $api_data);
		$status = $get_data['status'];
		if($status == 200) :
			$response = $get_data['response'];
			$i = 1;
			foreach( array_reverse($response['bot_response']) as $k => $data ) : 
				if( $data['score'] > 0 && $data['score'] <= 40 ) :
					$class = "red";					
				elseif( $data['score'] > 40 && $data['score'] <= 50 ) :
					$class = "orange";					
				elseif( $data['score'] > 50 && $data['score'] <= 70 ) :
					$class = "yellow";					
				elseif( $data['score'] > 70 && $data['score'] <= 85 ) :
					$class = "darkgreen";
				elseif( $data['score'] > 85 && $data['score'] <= 90 ) :
					$class = "lightgreen";
				elseif( $data['score'] > 90 && $data['score'] <= 100 ) :
					$class = "lightblue";			 
				endif;
				if($i == 1) :
					$new_class = 'vedicastro-horoscope-daily';
				else :
					$new_class = '';
				endif;
	            $output .= '<div class="astro_col-6 ' . esc_attr( $new_class ) . '">
								<div class="mlr-15 daily_horoscope_box_main d_flex">
									<div class="daily_horoscope_box">
									    <div class="daily_horoscope_circle_box">
											<div class="c100 p' . esc_attr( $data['score'] ) . ' big ' . esc_attr( $class ) . '"> 
												<span class="fs-20">' . __( $data['score'], 'vedicastro' ). '<p>' . __( $k, 'vedicastro' ) . '</p></span>
												<div class="slice">
													<div class="bar"></div>
													<div class="fill"></div>
												</div>
											</div>
										</div>
										<div class="daily_content_right">
											<div class="daily_content_right_center">
												<p class="fs-10">' . __( $data['split_response'] , 'vedicastro' ) . '</p>
											</div>
										</div>
									</div>
								</div>
							</div>';
			$i++;
			endforeach;
			echo json_encode( array('status' => 'success', 'html' => $output) );
		else :
			echo json_encode( array('status' => 'error', 'html' => '<div class="error">' . __( $get_data['message'], 'vedicastro' ) . '</div>') );
		endif;
	wp_die();
	}

	/**
	 * Vedicastro kundali ajax
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_kundali_ajax(){
 		parse_str( $_POST['form_data'], $form_data );
		$kundali_name = sanitize_text_field( trim( $form_data['kundali-name'] ) );
		$kundali_date = sanitize_text_field( trim( $form_data['kundali-date'] ) );
		$kundali_time = sanitize_text_field( trim( $form_data['kundali-time'] ) );
		$kundali_location = sanitize_text_field( trim( $form_data['kundali-location'] ) ); 
		$kundali_divisional_chart_code = sanitize_text_field( trim( $form_data['kundali-divisional-chart-code'] ) );
		$style = sanitize_text_field( trim( $form_data['kundali-style'] ) );
		$time_zone = sanitize_text_field( trim( $_POST['time_zone'] ) );
		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		$kundli_endpoint = 'horoscope/vedic';
		$kundli_image_endpoint = 'horoscope/chartimage';
		$mahadasha_endpoint = 'horoscope/mahadasha';
		$antardasha_endpoint = 'horoscope/antardasha';
		$ashtakvarga_endpoint = 'horoscope/ashtakvarga';
		$kaalsarpdosh_endpoint = 'dosha/kaalsarpdosh';
		$mangaldosh_endpoint = 'dosha/mangaldosh';
		$pitradosh_endpoint = 'dosha/pitradosh';
		$papasamaya_endpoint = 'dosha/papasamaya';
		$get_color = $this->vedicastro_get_chart_color();
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		$google_api_key = $this->vedicastro_google_api_key();
		$api_google_data = array(
						    'address' => $kundali_location,
						    'sensor'  => false,
						    'key'     => $google_api_key,
						    );
		$get_google_data = $this->vedicastro_google_api($api_google_data);
	    $get_google_status = $get_google_data['status']; 
		$latitude = $get_google_data['results'][0]['geometry']['location']['lat'];
    	$longitude = $get_google_data['results'][0]['geometry']['location']['lng'];
		$api_data = array(
					'dob' 	   => date( 'd/m/Y', strtotime( $kundali_date ) ),
					'tob' 	   => $kundali_time,
					'lat' 	   => $latitude,
					'lon' 	   => $longitude,
					'tz'  	   => $time_zone,
					'api_key'  => $api_key,
					);
		$api_lagna_data = array(
						  'dob' 	   => date( 'd/m/Y', strtotime( $kundali_date ) ),
						  'tob' 	   => $kundali_time,
						  'lat' 	   => $latitude,
						  'lon' 	   => $longitude,
						  'tz'  	   => $time_zone,
						  'div'        => 'D1',
						  'style'      => $style,
						  'color'      => $get_color,
	 					  'api_key'    => $api_key,
						  );
		$api_navamsa_data = array(
						    'dob' 	   => date( 'd/m/Y', strtotime( $kundali_date ) ),
						    'tob' 	   => $kundali_time,
						    'lat' 	   => $latitude,
						    'lon' 	   => $longitude,
						    'tz'  	   => $time_zone,
						    'div'      => $kundali_divisional_chart_code,
						    'style'    => $style,
						    'color'    => $get_color,
	 					    'api_key'  => $api_key,
						    );
		$api_mahadasha_data = $api_data;
		$api_ashtakvarga_data = $api_data;
		$api_doash_data = $api_data;
		$get_data = $this->vedicastro_api($kundli_endpoint, $api_data);
		$get_lagna_chart_data = $this->vedicastro_svg_api($kundli_image_endpoint, $api_lagna_data);
		$get_navamsa_data = $this->vedicastro_svg_api($kundli_image_endpoint, $api_navamsa_data);
		$get_mahadasha_data = $this->vedicastro_mahadasha_api($mahadasha_endpoint, $api_mahadasha_data);
		$get_antardasha_data = $this->vedicastro_mahadasha_api($antardasha_endpoint, $api_mahadasha_data);
		$get_ashtakvarga_data = $this->vedicastro_ashtakvarga_api($ashtakvarga_endpoint, $api_ashtakvarga_data);
		$get_kaalsarpdosh_data = $this->vedicastro_api($kaalsarpdosh_endpoint, $api_doash_data);
		$get_mangaldosh_data = $this->vedicastro_api($mangaldosh_endpoint, $api_doash_data);
		$get_pitradosh_data = $this->vedicastro_api($pitradosh_endpoint, $api_doash_data);
		$get_papasamaya_data = $this->vedicastro_api($papasamaya_endpoint, $api_doash_data);
		$dosh_data = array(
                     'kaalsarpdosh' => $get_kaalsarpdosh_data,
                     'mangaldosh'   => $get_mangaldosh_data,
                     'pitradosh'    => $get_pitradosh_data,
                     'papasamaya'   => $get_papasamaya_data,
					 );
		$status = $get_data['status'];
		if($status == 200) :
			$response = $get_data['response'];
			$lagna_response = $get_lagna_chart_data;
			$navamsa_response = $get_navamsa_data;
			$mahadasha_response = $get_mahadasha_data['response'];
			$antardasha_response = $get_antardasha_data['response'];
			$ashtakvarga_response = $get_ashtakvarga_data['response'];
			$response['name'] = $kundali_name;
			$response['date_of_birth'] = date( 'd/m/Y', strtotime( $kundali_date ) );
			$response['time_of_birth'] = $kundali_time;
			$response['place_of_birth'] = $kundali_location;
			$html = $this->vedicastro_kundali_result_tab($response);
			$mahadasha_html = $this->vedicastro_mahadasha_details($mahadasha_response, $antardasha_response);
			$ashtakvarga_html = $this->vedicastro_ashtakvarga_details($ashtakvarga_response);
			$dosh = $this->vedicastro_dosh_details($dosh_data);
			$img_dropdown = $this->vedicastro_chart_img_dropdown($kundali_divisional_chart_code, 'vedicastro-chart-image', 'chart_content_menu_data', 'vedicastro-kundali');
			$lagna_text_data = $this->vedicastro_change_style($style, 'vedicastro-kundli-section');
        	echo json_encode( array( 'status' => 'success', 'html' => $html, 'lagna_data' => $lagna_response, 'lagna_text_data' => $lagna_text_data, 'imgdata' => $img_dropdown, 'navamsa_data' => $navamsa_response, 'mahadasha_data' => $mahadasha_html, 'ashtakvarga_data' => $ashtakvarga_html, 'dosh_data' => $dosh ) );
		else :
			echo json_encode( array( 'status' => 'error', 'message' => $get_data['response'] ) );
		endif;
 		wp_die();
 	}
    
    /**
	 * Vedicastro kundali tab data
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_kundali_tab_data(){
 		$output = '';
 		$output = array(
                  'birth-details' => __( 'Birth Details', 'vedicastro' ),
                  'planets'       => __( 'Planets', 'vedicastro' ),
                  'mahadasha'     => __( 'Mahadasha', 'vedicastro' ),
                  'ashtakvarga'   => __( 'Ashtakvarga', 'vedicastro' ),
                  'doshas'        => __( 'Doshas', 'vedicastro' ),
 				  );
 		return $output;
 	}
    
    /**
	 * Vedicastro kundali result tab
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_kundali_result_tab($response){
 		$output = '';
 		$data = $this->vedicastro_kundali_tab_data();
 		$output .= '<div class="astro_content_tabs lagan_chart_tabs_main_data">
						<ul class="astro_content_menu p_0 display_flex lagan_chart_tabs_menu" id="lagan_chart_tabs_menu_data">';
							if( !empty( $data ) ) :
								$i = 1;
								foreach( $data as $key => $val ) :
									if( $i == 1 ) :
										$class = 'kundali active';
									else :
										$class = 'kundali';
									endif;
									$output .= '<li class="' . esc_attr( $class ) . '" data-lagan-id="' . esc_attr( $key ) . '">	
													<a href="javascript:;" class="clr-gray fs-16 lh-24">' . __( $val, 'vedicastro' ) . '</a> 
												</li>';
								$i++;
							    endforeach;	
							endif;
			$output .= '</ul>
					</div>';
			$output .= $this->vedicastro_birth_details($response);
 		return $output;
 	}

 	/**
	 * Vedicastro birth details
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_birth_details($response){
 		$output = '';
 		$data = array();
 		$planets = array();
 		$key_array = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
 		if( !empty( $response ) ) :
 			foreach( $response as $key => $val ) :
 				if( in_array( $key, $key_array, true) ) :
 					$planets[$key] = $val;
 					unset($response[$key]);
 				endif;
 			endforeach;
 		endif;
 		$new_key = array('name', 'date_of_birth', 'day_of_birth', 'time_of_birth', 'place_of_birth', 'current_dasa', 'birth_dasa', 'yoga', 'lucky_gem', 'lucky_num', 'lucky_colors', 'lucky_letters', 'lucky_name_start');
 		$child_key = array('ayanamsa', 'karna', 'yoga', 'day_of_birth', 'day_lord', 'hora_lord', 'sunrise_at_birth', 'sunset_at_birth', 'tithi');
 		if( !empty( $response ) ) :
 			foreach( $response as $key => $val ) :
 				if( in_array( $key, $new_key, true) ) :
 					if( is_array( $val ) ) :
 						$data[$key] = implode( ',', $val );
 					else :
 						$data[$key] = $val;
 					endif;
 				elseif( $key == 'panchang' && is_array($val) ) :
 					foreach( $val as $val_key => $val_val) :
 						if( in_array( $val_key, $child_key) ) :
 							switch($val_key) :
 								case 'ayanamsa':
 								case 'day_of_birth':
 								case 'day_lord':
 								case 'hora_lord':
 								case 'sunrise_at_birth':
 								case 'sunset_at_birth':
 								case 'tithi':
 									$data[$val_key] = $val_val;
 								break;
 								case 'karna':
 									$data[$val_key] = $val_val['name'];
 								break;
 								case 'yoga':
 									$data[$val_key] = $val_val['name'];
 								break;
 							endswitch;
 						endif;
 					endforeach;
 				endif;
 			endforeach;
 		endif;
 		$output .= '<div class="lagan_chart_birth display_block" data-lagan-content="birth-details">
						<div class="lagan_chart_birth_title">
							<h4 class="fs-20 lh-24 fw-500">' . __( 'Birth Details', 'vedicastro' ) . '</h4>
						</div>
						<div class="choose_services_row">
							<div class="astro_col-5">
								<div class="lagan_chart_birth_table mlr-15">
									<table class="lagan_birth_table_data" border="1">		
										<thead>
											<tr>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Title', 'vedicastro' ) . '</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Value', 'vedicastro' ) . '</span>
												</th>
											</tr>
										</thead>
										<tbody>';
								if( !empty( $data ) ) :
									foreach( $data as $res_key => $res_val ) :
										switch($res_key) :
											case 'name':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Name', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'date_of_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Date of Birth', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'day_of_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Day of Birth', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'time_of_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Time of Birth', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'place_of_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Place of Birth', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'current_dasa':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Current Dasa', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'birth_dasa':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Dasha at Birth', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'hora_lord':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Hora Lord', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'day_lord':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Day Lord', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'yoga':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Yoga', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'karana':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Karana', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'tithi':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Tithi', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'sunrise_at_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Sunrise', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'sunset_at_birth':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Sunset', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
											case 'ayanamsa':
												$output .= '<tr>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( 'Ayanamsa', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $res_val, 'vedicastro' ) . '</span>
																</td>
															</tr>';
											break;
									    endswitch;
									endforeach;
								endif;
							$output .= '</tbody>
									</table>
								</div>
							</div>
							<div class="astro_col-5">
								<div class="kundli_lagan_chart kundli_lagan_chart_part mlr-15 position_relative" id="kundli-navamsa">
								</div>
							</div>
						</div>
					</div>';
					$output .= $this->vedicastro_planetary_details($planets);
 		return $output;
 	}
    
    /**
	 * Vedicastro planetary details
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_planetary_details($planetary_data){
 		$output = '';
 		if( !empty( $planetary_data ) ) :
	 		$output .= '<div class="lagan_chart_birth" data-lagan-content="planets">
							<div class="lagan_chart_birth_title">
								<h4 class="fs-20 lh-24 fw-500">' . __( 'Planetary Details', 'vedicastro' ) . '</h4>
							</div>
							<div class="choose_services_row">
								<div class="astro_col-12">
									<div class="lagan_chart_birth_table mlr-15">
										<table class="lagan_birth_table_data planetary_table_data" border="1">
											<thead>
												<tr>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Planet', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'House', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Zodiac', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Nakshatra', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees in Sign', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees', 'vedicastro' ) . '</span>
													</th>
												</tr>
											</thead>
											<tbody>';
											    foreach( $planetary_data as $planetary_key => $planetary_val ) :
													$output .= '<tr>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['full_name'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['house'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['zodiac'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['nakshatra'], 'vedicastro' ) . '( Pada  ' . __( $planetary_val['nakshatra_pada'], 'vedicastro' ) . ' )</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['local_degree'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['global_degree'], 'vedicastro' ) . '</span>
																	</td>
																</tr>';
												endforeach;
								$output .= '</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>';
		endif;
 		return $output;
 	}

 	/**
	 * Vedicastro mahadasha details
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_mahadasha_details($mahadasha_details, $antardasha_details){
 		$output = '';
 		if( !empty( $mahadasha_details ) ) :
	 		$output .= '<div class="lagan_chart_birth mahadashas_antradashas" data-lagan-content="mahadasha">
							<div class="lagan_chart_birth_title">
								<h4 class="fs-20 lh-24 fw-500">' . __( 'Mahadashas &amp; Antradashas', 'vedicastro' ) . '</h4>
							</div>
							<div class="choose_services_row position_relative">
								<div class="astro_col-5">
									<div class="lagan_chart_birth_table mlr-15">
										<table class="lagan_birth_table_data mahadasha_table_data" border="1">
											<thead>
												<tr>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Planet', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'MahaDasha (End date)', 'vedicastro' ) . '</span>
													</th>
												</tr>
											</thead>
											<tbody>';
												if( !empty( $mahadasha_details['mahadasha'] ) ) :
													$i = 0;
													foreach( $mahadasha_details['mahadasha'] as $mahadasha_key => $mahadasha_val ) :
														$output .= '<tr mahadasha-id="' . esc_attr( $mahadasha_details['mahadasha'][$i] ) . '">
																		<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $mahadasha_details['mahadasha'][$i], 'vedicastro' ) . '</span>
																		</td>
																		<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $mahadasha_details['mahadasha_order'][$i], 'vedicastro' ) . '</span>
																		</td>
																	</tr>';
												    $i++;
													endforeach;
												endif;
								$output .= '</tbody>
										</table>
									</div>';
						if( !empty( $mahadasha_details['mahadasha'] ) ) :
							for( $l = 0; $l< ( count( $mahadasha_details['mahadasha'] )  ); $l++ ) :
								$output .= '<div class="lagan_chart_birth_table mlr-15 mahadasha_hover display_none" mahadasha-content="' . esc_attr( $mahadasha_details['mahadasha'][$l] ) . '">
												<table class="lagan_birth_table_data mahadasha_hover_data" border="1">
													<thead>
														<tr>
															<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Antardasha Planet', 'vedicastro' ) . '</span>
															</th>
															<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'End Dates', 'vedicastro' ) . '</span>
															</th>
														</tr>
													</thead>
													<tbody>';
														if( !empty( $antardasha_details['antardashas'][$l] ) ) :
															$j = 0;
															$k = 0;
															foreach( $antardasha_details['antardashas'] as $mahadasha_key => $mahadasha_val ) :
																$output .= '<tr>
																				<td><span class="fw-400 lh-20 fs-14 clr-black1">' . __( $antardasha_details['antardashas'][$l][$k], 'vedicastro' ) . '</span>
																				</td>
																				<td><span class="fw-400 lh-20 fs-14 clr-black1">' . __( $antardasha_details['antardasha_order'][$l][$k], 'vedicastro' ) . '</span>
																				</td>
																			</tr>';
															$k++;
															endforeach;
														endif;				
										$output .= '</tbody>
												</table>
											</div>';
							endfor;
						endif;
					$output .= '</div>
							</div>
						</div>';
		endif;
 		return $output;
 	}

 	/**
	 * Vedicastro ashtakvarga details
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_ashtakvarga_details($ashtakvarga_details){
 		$output = '';
 		if( !empty( $ashtakvarga_details ) ) :
 			$row = count( $ashtakvarga_details['ashtakvarga_order'] );
 			$col = count( $ashtakvarga_details['ashtakvarga_points'] );
 			$ashtakvarga_details['ashtakvarga_total'];
	 		$output .= '<div class="lagan_chart_birth ashtakvarga" data-lagan-content="ashtakvarga">
							<div class="lagan_chart_birth_title">
								<h4 class="fs-20 lh-24 fw-500">' . __( 'Ashtakvarga', 'vedicastro' ) . '</h4>
							</div>
							<div class="choose_services_row">
								<div class="astro_col-10">
									<div class="lagan_chart_birth_table mlr-15">
										<table class="lagan_birth_table_data planetary_table_data" border="1">
											<colgroup>
												<col span="8" style="background-color:#fff;">
													<col span="1" style="background-color:#E9ECEF;">
											</colgroup>
											<thead>
												<tr>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Zodiacs', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Sun', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Moon', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Mars', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Mercury', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Jupiter', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Venus', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Saturn', 'vedicastro' ) . '</span>
													</th>
													<th>
														<span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Total', 'vedicastro' ) . '</span>
													</th>
												</tr>
											</thead>
											<tbody>';
												for($i = 0; $i<$row; $i++) :
													$output .= '<tr>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $ashtakvarga_details['ashtakvarga_order'][$i], 'vedicastro' ) . '</span>
																	</td>';
                                                                    for($j = 0; $j<$col; $j++) :
			                                                             $output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $ashtakvarga_details['ashtakvarga_points'][$i][$j], 'vedicastro' ) . '</span>
																				</td>';
                                                                    endfor;
			                                                        $output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $ashtakvarga_details['ashtakvarga_total'][$i], 'vedicastro' ) . '</span>
																				</td>';
													$output .= '</tr>';	
												endfor;
								$output .= '</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>';
		endif;
 		return $output;
 	}
    
    /**
	 * Vedicastro dosh factors
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_dosh_factors(){
    	$output = '';
    	$output = array('mars', 'moon', 'venus', 'saturn', 'rahu');
    	return $output;
    }

	/**
	 * Vedicastro dosh factors title
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_dosh_factors_title(){
    	$output = '';
    	$output = array(
    			  'mars'   => __( 'Mars', 'vedicastro' ),
    			  'moon'   => __( 'Moon', 'vedicastro' ),
    			  'venus'  => __( 'Venus', 'vedicastro' ),
    			  'saturn' => __( 'Saturn', 'vedicastro' ),
    			  'rahu'   => __( 'Rahu', 'vedicastro' ),
    			  );
    	return $output;
    }

	/**
	 * Vedicastro dosh details
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_dosh_details($dosh_details){
 		$output = '';
		if( !empty( $dosh_details ) ) :
			$dosh_factors = $this->vedicastro_dosh_factors();
			$dosh_factors_title = $this->vedicastro_dosh_factors_title();
			$kaalsarpdosh = $dosh_details['kaalsarpdosh']['response'];
			$mangaldosh = $dosh_details['mangaldosh']['response'];
			$pitradosh = $dosh_details['pitradosh']['response'];
			$papasamaya = $dosh_details['papasamaya']['response'];
	 		$output .= '<div class="lagan_chart_birth dashas" data-lagan-content="doshas">
							<div class="lagan_chart_birth_title">
								<h4 class="fs-20 lh-24 fw-500">' . __( 'Doshas', 'vedicastro' ) . '</h4>
							</div>
							<div class="dashas_group">';
							    if( !empty( $kaalsarpdosh['is_dosha_present'] ) && $kaalsarpdosh['is_dosha_present'] == 1 ) :
								$output .= '<div class="choose_services_row">
												<div class="astro_col-12">
													<div class="dashas_dosh mlr-15 ptlr_15">
														<div class="choose_services_row">
															<div class="astro_col-6">
																<div class="dashas_dosh_content mlr-15">';
																    if( $kaalsarpdosh['is_dosha_present'] == 1 ) :
																		$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Kaal Sarp Dosh', 'vedicastro' ) . ' :</span>  <span>  ' . __( 'Yes, Present', 'vedicastro' ) . '</span>
																		</p>';
																	endif;
																	if( $kaalsarpdosh['kalatra_by_saturn'] == 1 ) :
																		$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Kalatra Dosh by Saturn', 'vedicastro' ) . ' :</span>  <span>  ' . __( 'Yes, Present', 'vedicastro' ) . '</span>
																		</p>';
																	endif;
																	if( $kaalsarpdosh['kalatra_by_rahuketu'] == 1 ) :
																		$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Kalatra Dosh by Rahu &amp; Ketu', 'vedicastro' ) . ' :</span>  <span>  ' . __( 'Yes, Present', 'vedicastro' ) . '</span>
																		</p>';
																	endif;
													$output .= '</div>
															</div>
															<div class="astro_col-6">
																<div class="dashas_dosh_content mlr-15 bg-light-green p_15">
																	<p class="fs-14 lh-20 fw-400 clr-dark-green">' . __( $kaalsarpdosh['bot_response'], 'vedicastro' ) . '</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>';
								endif;
				    if( !empty( $mangaldosh ) && $mangaldosh['is_dosha_present'] == 1 ) :
				    	if(empty($mangaldosh['score'])) :
				    		$mangaldosh['score'] = 0;
				    	endif;
						$output .= '<div class="choose_services_row">
										<div class="astro_col-12">
											<div class="dashas_dosh mlr-15 ptlr_15">
												<div class="choose_services_row">
													<div class="astro_col-10">
														<div class="dashas_dosh_content mlr-15">
															<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Mangal Dosh', 'vedicastro' ) . ' :</span>  <span>  ' . __( $mangaldosh['bot_response'], 'vedicastro' ) . '</span>
															</p>';
															if( !empty( $mangaldosh['factors'] ) ) :
																$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Dosha Factors', 'vedicastro' ) . ' :-</span>
																</p>';
																foreach( $mangaldosh['factors'] as $factors_key => $factors_val ) :
																	if( in_array( $factors_key, $dosh_factors ) ) :
																		$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( $dosh_factors_title[$factors_key], 'vedicastro' ) . ' :</span>  <span>  ' . __( $factors_val, 'vedicastro' ) . '</span>
																		</p>';
																	endif;	
																endforeach;
															endif;
											 $output .= '</div>
													</div>
												</div>
											</div>
										</div>
									</div>';
					endif;
					if( !empty( $pitradosh ) && $pitradosh['is_dosha_present'] == 1 ) :
					    $output .= '<div class="choose_services_row">
										<div class="astro_col-12">
											<div class="dashas_dosh mlr-15 ptlr_15">
												<div class="choose_services_row">
													<div class="astro_col-10">
														<div class="dashas_dosh_content mlr-15">
															<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Pitra Dosha :', 'vedicastro' ) . '</span>  <span>' . __( $pitradosh['bot_response'], 'vedicastro' ) . '</span>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>';
					endif;
					if( !empty( $papasamaya ) ) :
						$output .= '<div class="choose_services_row">
										<div class="astro_col-12">
											<div class="dashas_dosh mlr-15 ptlr_15">
												<div class="choose_services_row">
													<div class="astro_col-10">
														<div class="dashas_dosh_content mlr-15">
															<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Papasamaya Points', 'vedicastro' ) . '</span><span> </span> 
															</p>';
															if( !empty( $papasamaya['rahu_papa'] ) ) :
																$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Papa points by Rahu :    ', 'vedicastro' ) . '</span>  <span> ' . __( $papasamaya['rahu_papa'], 'vedicastro' ) . '</span>
																</p>';
															endif;
															if( !empty( $papasamaya['sun_papa'] ) ) :
																$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Papa points by Saturn :    ', 'vedicastro' ) . '</span>  <span> ' . __( $papasamaya['sun_papa'], 'vedicastro' ) . '</span>
																</p>';
															endif;
															if( !empty( $papasamaya['saturn_papa'] ) ) :
																$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Papa points by Mars :    ', 'vedicastro' ) . '</span>  <span> ' . __( $papasamaya['saturn_papa'], 'vedicastro' ) . '</span>
																</p>';
															endif;
															if( !empty( $papasamaya['mars_papa'] ) ) :
																$output .= '<p class="fs-14 lh-20 fw-400"> <span class="fw-700">' . __( 'Papa points by Mars :    ', 'vedicastro' ) . '</span>  <span> ' . __( $papasamaya['mars_papa'], 'vedicastro' ) . '</span>
																</p>';
															endif;
											$output .= '</div>
													</div>
												</div>
											</div>
										</div>
									</div>';
					endif;	
				  $output .= '</div>
						</div>';
		endif;
 		return $output;
 	}
    
    /**
	 * Vedicastro maching ajax
	 *
	 * @since    1.0.0
	 */
   public function vedicastro_matching_ajax(){
    	$output = $indian_endpoint = $style = $india_face = $matching_html = $score = $bot_response = $total = $lagna_style ='';
    	parse_str( $_POST['form_data'], $form_data );
		$boy_name = sanitize_text_field( trim( $form_data['boy-name'] ) );
		$boy_date = sanitize_text_field( trim( $form_data['boy-date'] ) );
		$boy_time = sanitize_text_field( trim( $form_data['boy-time'] ) );
		$boy_location = sanitize_text_field( trim( $form_data['boy-location'] ) );
		$boy_chart_code = sanitize_text_field( trim( $form_data['boy-divisional-chart-code'] ) );
		$boy_style = sanitize_text_field( trim( $form_data['boy-style'] ) );

		$girl_name = sanitize_text_field( trim( $form_data['girl-name'] ) );
		$girl_date = sanitize_text_field( trim( $form_data['girl-date'] ) );
		$girl_time = sanitize_text_field( trim( $form_data['girl-time'] ) );
		$girl_location = sanitize_text_field( trim( $form_data['girl-location'] ) );
		$girl_chart_code = sanitize_text_field( trim( $form_data['girl-divisional-chart-code'] ) );
		$girl_style = sanitize_text_field( trim( $form_data['girl-style'] ) );

		$time_zone = sanitize_text_field( trim( $_POST['time_zone'] ) );
		$button_id = sanitize_text_field( trim( $_POST['buttonid'] ) );
		$get_color = $this->vedicastro_get_chart_color();
		if( $button_id == 'north-indian' ) :
			$indian_endpoint = 'matching/ashtakoot';
			$style = __( 'North Style', 'vedicastro' );
			$lagna_style = __( 'north', 'vedicastro' );
			$india_face = __( 'Ashtakoot', 'vedicastro' );
			$total = 36;
		elseif( $button_id == 'south-indian' ) :
			$indian_endpoint = 'matching/dashakoot';
			$style = __( 'South Style', 'vedicastro' );
			$lagna_style = __( 'south', 'vedicastro' );
			$india_face = __( 'Dashakoot', 'vedicastro' );
			$total = 10;
		endif;

    	$aggregate_endpoint = 'matching/aggregate';
    	$starmatch_endpoint = 'matching/starmatch';
    	$papasamaya_endpoint = 'matching/papasamaya';
    	$western_endpoint = 'matching/western';
    	$google_api_key = $this->vedicastro_google_api_key();
    	$api_google_boy_data = array(
						       'address' => $boy_location,
						       'sensor'  => false,
						       'key'     => $google_api_key,
						       );
		$get_google_boy_data = $this->vedicastro_google_api($api_google_boy_data);
	    $get_google_boy_status = $get_google_boy_data['status']; 
		$boy_latitude = $get_google_boy_data['results'][0]['geometry']['location']['lat'];
    	$boy_longitude = $get_google_boy_data['results'][0]['geometry']['location']['lng'];
        
        $api_google_girl_data = array(
						        'address' => $girl_location,
						        'sensor'  => false,
						        'key'     => $google_api_key,
						        );
    	$get_google_girl_data = $this->vedicastro_google_api($api_google_girl_data);
    	$get_google_girl_status = $get_google_girl_data['status']; 
		$girl_latitude = $get_google_girl_data['results'][0]['geometry']['location']['lat'];
    	$girl_longitude = $get_google_girl_data['results'][0]['geometry']['location']['lng'];

    	$vedicastro_setting = json_decode(get_option('vedicastro_setting'), true);
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;

    	$boy_dob = $boy_date;
    	$boy_tob = $boy_time;
    	$boy_lat = $boy_latitude;
    	$boy_lon = $boy_longitude;
    	$boy_tz = $time_zone;
    	$girl_dob = $girl_date;
    	$girl_tob = $girl_time;
    	$girl_lat = $girl_latitude;
    	$girl_lon = $girl_longitude;
    	$girl_tz = $time_zone;
    	$api_data = array(
    		        'boy_dob'  => date( 'd/m/Y', strtotime( $boy_dob ) ),
    		        'boy_tob'  => $boy_tob,
    		        'boy_lat'  => $boy_lat,
    		        'boy_lon'  => $boy_lon,
    		        'boy_tz'   => $boy_tz,
    		        'girl_dob' => date( 'd/m/Y', strtotime( $girl_dob ) ),
    		        'girl_tob' => $girl_tob,
    		        'girl_lat' => $girl_lat,
    		        'girl_lon' => $girl_lon,
    		        'girl_tz'  => $girl_tz,
    		        'api_key'  => $api_key,
    	            );
    	$datap = array('tara', 'gana', 'yoni', 'bhakoot', 'grahamaitri', 'vasya', 'nadi', 'varna', 'dina', 'mahendra', 'sthree', 'rasi', 'rasiathi', 'rajju', 'vedha');
    	$area_of_life = array(
    		            'tara'        => __( 'Destiny', 'vedicastro' ), 
    		            'gana'        => __( 'Guna Level', 'vedicastro' ), 
    		            'yoni'        => __( 'Mentality', 'vedicastro' ), 
    		            'bhakoot'     => __( 'Love', 'vedicastro' ), 
    		            'grahamaitri' => __( 'Temperaments', 'vedicastro' ), 
    		            'vasya'       => __( 'Dominance', 'vedicastro' ), 
    		            'nadi'        => __( 'Health', 'vedicastro' ), 
    		            'varna'       => __( 'Work', 'vedicastro' ), 
    		            'dina'        => __( 'Health', 'vedicastro' ), 
    		            'mahendra'    => __( 'Progency and status', 'vedicastro' ), 
    		            'sthree'      => __( 'Prosperity', 'vedicastro' ), 
    		            'rasi'        => __( 'Progency Continuity', 'vedicastro' ), 
    		            'rasiathi'    => __( 'Mental Compatibility', 'vedicastro' ), 
    		            'rajju'       => __( 'Bond Longevity', 'vedicastro' ), 
    		            'vedha'       => __( 'Stability', 'vedicastro' ),
    		            );
    	$data_title = array(
    				  'tara'         => __( 'Tara', 'vedicastro' ), 
    				  'gana'         => __( 'Gana', 'vedicastro' ),
    				  'yoni'         => __( 'Yoni', 'vedicastro' ),
    				  'bhakoot'      => __( 'Bhakoot', 'vedicastro' ),
    				  'grahamaitri'  => __( 'Grahamaitri', 'vedicastro' ),
    				  'vasya'        => __( 'Vasya', 'vedicastro' ),
    				  'nadi'         => __( 'Nadi', 'vedicastro' ),
    				  'varna'        => __( 'Varna', 'vedicastro' ),
    				  'dina'         => __( 'Dina', 'vedicastro' ),
    				  'mahendra'     => __( 'Mahendra', 'vedicastro' ),
    				  'sthree'       => __( 'Sthree', 'vedicastro' ), 
    				  'rasi'         => __( 'Rasi', 'vedicastro' ), 
    				  'rasiathi'     => __( 'Rasiathi', 'vedicastro' ),
    				  'rajju'        => __( 'Rajju', 'vedicastro' ), 
    				  'vedha'        => __( 'Vedha', 'vedicastro' ), 
    				  );
    	$response_data = array(
    		             'tara'        => array('boy_tara', 'girl_tara', 'tara'), 
    		             'gana'        => array('boy_gana', 'girl_gana', 'gana'), 
    		             'yoni'        => array('boy_yoni', 'girl_yoni', 'yoni'), 
    		             'bhakoot'     => array('boy_rasi_name', 'girl_rasi_name', 'bhakoot'), 
    		             'grahamaitri' => array('boy_lord', 'girl_lord', 'grahamaitri'), 
    		             'vasya'       => array('boy_vasya', 'girl_vasya', 'vasya'), 
    		             'nadi'        => array('boy_nadi', 'girl_nadi', 'nadi'), 
    		             'varna'       => array('boy_varna', 'girl_varna', 'varna'), 
    		             'dina'        => array('boy_star', 'girl_star', 'dina'), 
    		             'mahendra'    => array('boy_star', 'girl_star', 'mahendra'), 
    		             'sthree'      => array('boy_star', 'girl_star', 'sthree'), 
    		             'rasi'        => array('boy_rasi', 'girl_rasi', 'rasi'), 
    		             'rasiathi'    => array('boy_lord', 'girl_lord', 'rasiathi'), 
    		             'rajju'       => array('boy_rajju', 'girl_rajju', 'rajju'), 
    		             'vedha'       => array('boy_star', 'girl_star', 'vedha'), 
    		             );
    	$matching_data = $this->vedicastro_api($indian_endpoint, $api_data);
    	$matching_endpoint = 'horoscope/vedic';
    	$api_boy_data = array(
					'dob'     => date( 'd/m/Y', strtotime( $boy_dob ) ),
    		        'tob'     => $boy_tob,
    		        'lat'     => $boy_lat,
    		        'lon'     => $boy_lon,
    		        'tz'      => $boy_tz,
					'api_key' => $api_key,
					);
    	$api_girl_data = array(
					'dob'     => date( 'd/m/Y', strtotime( $girl_dob ) ),
    		        'tob'     => $girl_tob,
    		        'lat'     => $girl_lat,
    		        'lon'     => $girl_lon,
    		        'tz'      => $girl_tz,
					'api_key' => $api_key,
					);
    	$get_boy_data = $this->vedicastro_api($matching_endpoint, $api_boy_data);
    	$get_girl_data = $this->vedicastro_api($matching_endpoint, $api_girl_data);
    	$status = $matching_data['status'];
		$matching_image_endpoint = 'horoscope/chartimage';

		$api_lagna_boy_data = array(
						  'dob' 	   => date( 'd/m/Y', strtotime( $boy_dob ) ),
						  'tob' 	   => $boy_tob,
						  'lat' 	   => $boy_lat,
						  'lon' 	   => $boy_lon,
						  'tz'  	   => $boy_tz,
						  'div'        => 'D1',
						  'style'      => $boy_style,
						  'color'      => $get_color,
	 					  'api_key'    => $api_key,
						  );
		$api_lagna_girl_data = array(
						  'dob' 	   => date( 'd/m/Y', strtotime( $girl_dob ) ),
						  'tob' 	   => $girl_tob,
						  'lat' 	   => $girl_lat,
						  'lon' 	   => $girl_lon,
						  'tz'  	   => $girl_tz,
						  'div'        => 'D1',
						  'style'      => $boy_style,
						  'color'      => $get_color,
	 					  'api_key'    => $api_key,
						  );
		$api_navamsha_boy_data = array(
						  'dob' 	   => date( 'd/m/Y', strtotime( $boy_dob ) ),
						  'tob' 	   => $boy_tob,
						  'lat' 	   => $boy_lat,
						  'lon' 	   => $boy_lon,
						  'tz'  	   => $boy_tz,
						  'div'        => $boy_chart_code,
						  'style'      => $boy_style,
						  'color'      => $get_color,
	 					  'api_key'    => $api_key,
						  );
		$api_navamsha_girl_data = array(
						  'dob' 	   => date( 'd/m/Y', strtotime( $girl_dob ) ),
						  'tob' 	   => $girl_tob,
						  'lat' 	   => $girl_lat,
						  'lon' 	   => $girl_lon,
						  'tz'  	   => $girl_tz,
						  'div'        => $girl_chart_code,
						  'style'      => $boy_style,
						  'color'      => $get_color,
	 					  'api_key'    => $api_key,
						  );
		$get_lagna_boy_chart_data = $this->vedicastro_svg_api($matching_image_endpoint, $api_lagna_boy_data);
		$get_navamsha_boy_chart_data = $this->vedicastro_svg_api($matching_image_endpoint, $api_navamsha_boy_data);
		$get_navamsha_girl_chart_data = $this->vedicastro_svg_api($matching_image_endpoint, $api_navamsha_girl_data);
		$get_lagna_girl_chart_data = $this->vedicastro_svg_api($matching_image_endpoint, $api_lagna_girl_data);
		if( $status == 200 ) :
			$get_boy_response = $get_boy_data['response'];
			$get_lagna_boy_response = $get_lagna_boy_chart_data;
			$get_girl_response = $get_girl_data['response'];
			$get_lagna_girl_response = $get_lagna_girl_chart_data;
			$get_navamsha_boy_response = $get_navamsha_boy_chart_data;
			$get_navamsha_girl_response = $get_navamsha_girl_chart_data;
		endif; 	
		if( !empty( $matching_data['response'] ) ) :
    	 $output .= '<div class="match_details">
						<div class="match_title">
							<h4 class="clr-black fw-500 fs-20 lh-24">' . sprintf( __( '%1$s Match Details (%2$s)', 'vedicastro' ), $india_face, $style) . '</h4>
						</div>
						<div class="choose_services_row position_relative">
							<div class="astro_col-9">
								<div class="lagan_chart_birth_table mlr-15 maching_table">
									<table class="lagan_birth_table_data maching_table_data" border="1">
										<thead>
											<tr>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Planet', 'vedicastro' ) . '</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">
												' . __( 'Boy', 'vedicastro' ) . '
												</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">
												' . __( 'Girl', 'vedicastro' ) . '
												</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">
												' . __( 'Score', 'vedicastro' ) . '
												</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">
												' . __( 'Area of Life', 'vedicastro' ) . '
												</span>
												</th>
											</tr>
										</thead>
										<tbody>';
												$score = array();
												$score_msg = array();
											    	foreach( $matching_data['response'] as $matching_data_key => $response ) :
											    		if( $matching_data_key == 'score' ) :
											    			$score[] = $response;
											    		endif;
											    		if( $matching_data_key == 'bot_response' ) :
											    			$score_msg[] = $response;
											    		endif;
											    		if( in_array( $matching_data_key, $datap ) ) :
											    			$output .= '<tr>
											    							<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $matching_data_key, 'vedicastro' ) . '</span>
											    						</td>';
											    		endif;
											    	  	foreach( $response as $response_key => $response_value ) :
											    	  		if( $button_id == 'south-indian' ) :
												    	  		$output .= '<td class="clr-black1">
												    	  						<span class="fw-400 lh-20 fs-14">' . __( $response_value, 'vedicastro' ) . '</span>
												    	  					</td>';
											    	  	    elseif( $response_key != 'boy_rasi' && $response_key != 'girl_rasi' ) :  
													    	  	$output .= '<td class="clr-black1">
													    	  				 	<span class="fw-400 lh-20 fs-14">' . __( $response_value, 'vedicastro' ) . '</span>
													    	  			   </td>';
											    		    endif;
											    	    endforeach;
											    	 	if( in_array($matching_data_key, $datap ) ) :  
											    	  		$output .= '<td class="clr-black1">
											    	  						<span class="fw-400 lh-20 fs-14">' . __( $area_of_life[$matching_data_key], 'vedicastro' ) . '</span>
											    	  			  		</td>';
												    	endif;
											    	endforeach;
										    	$str = $score_msg[0];
										        $str_value = explode( ",", $str );
										    	$output .= '<tr>
																<td class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Total', 'vedicastro' ) . '</span>
																</td>
																<td class="clr-black1"><span class="fw-700 lh-20 fs-14"></span>
																</td>
																<td class="clr-black1"><span class="fw-700 lh-20 fs-14"></span>
																</td>
																<td class="clr-black1"><span class="fw-700 lh-20 fs-14"><span>
																' . __($score[0], 'vedicastro' ) . '</span>  <span class="fw-400">/ ' . __( $total, 'vedicastro' ) . '</span></span>
																</td>
																<td class="clr-black1"><span class="fw-700 lh-20 fs-14">
																' . __( end( $str_value ), 'vedicastro' ) . '</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="astro_col-3">
												<div class="maching_info mlr-15">
													<div class="maching_info_data text_center">
														<h4 class="clr-black fw-500 fs-28 m_0"><span class="fw-700 fs-56">
														' . __( $score[0], 'vedicastro' ) . '
														</span>/
														' . __( $total, 'vedicastro' ) . '
														</h4>
														<p class="clr-black fw-400 fs-16 m_0">
														' . __( end( $str_value ), 'vedicastro' ) . '
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>';	
									$output .= '<div class="lagan_chart_tabs_main">
													<div class="astro_content_tabs lagan_chart_tabs_main_data">
										   				<ul class="astro_content_menu p_0 display_flex lagan_chart_tabs_menu maching_data_menu" id="maching_data">
										      				<li class="active" maching_chart-id="1">	
										      					<a href="javascript:void(0)" class="clr-gray fs-16 lh-24">' . __( 'Chart Details', 'vedicastro' ) . '</a> 
										      				</li>
										      				<li maching_chart-id="2" class="">	
										      					<a href="javascript:void(0)" class="clr-gray fs-16 lh-24">' . __( 'Planets', 'vedicastro' ) . '</a> 
										      				</li>
										   				</ul>
													</div>';	
													$output .= '<div class="maching_tab_data display_block" maching_chart-content="1">';
													$output .= $this->vedicastro_matching_chart($get_lagna_boy_response,$get_lagna_girl_response,$get_navamsha_boy_response,$get_navamsha_girl_response,$boy_chart_code,$girl_chart_code, $boy_style, $girl_style);
													$output .= '</div><div class="maching_tab_data display_none" maching_chart-content="2">';
													$output .= $this->vedicastro_matching_plante_boy($get_boy_response);
													$output .= $this->vedicastro_matching_plante_girl($get_girl_response);
													$output .= '</div></div>';				
													echo json_encode( array( 'status' => 'success', 'maching_results' => $output ) );	
	   else :
	   												echo json_encode( array( 'status' => 'false', 'maching_results' => __( 'No result found', 'vedicastro' ) ) );
	   endif;
       wp_die();
    }
    
	/**
	 * Vedicastro matching plante boy
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_matching_plante_boy($get_boy_response){
 		$planets = array();
 		$key_array = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
 		if( !empty( $get_boy_response ) ) :
 			foreach( $get_boy_response as $key => $val ) :
 				if( in_array( $key, $key_array, true) ) :
 					$planets[$key] = $val;
 					unset($get_boy_response[$key]);
 				endif;
 			endforeach;
 		endif;
 		$output .= '<div class="boy_planetary">
      					<div class="lagan_chart_birth_title">
         					<h4 class="fs-20 lh-24 fw-500">' . __( 'Boy’s Planetary Details', 'vedicastro' ) . '</h4>
      					</div>
      					<div class="choose_services_row">
         					<div class="astro_col-12">
            					<div class="lagan_chart_birth_table mlr-15">
               						<table class="lagan_birth_table_data planetary_table_data" border="1">
                  						<thead>
											<tr>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Planet', 'vedicastro' ) . '</span>
												</th>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'House', 'vedicastro' ) . '</span>
												</th>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Zodiac', 'vedicastro' ) . '</span>
												</th>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Nakshatra', 'vedicastro' ) . '</span>
												</th>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees in Sign', 'vedicastro' ) . '</span>
												</th>
												<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees', 'vedicastro' ) . '</span>
												</th>
											</tr>
										</thead>
                  					<tbody>';
				   					foreach( $planets as $planetary_key => $planetary_val ) :
										$output .= '<tr>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['full_name'], 'vedicastro' ) . '</span>
														</td>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['house'], 'vedicastro' ) . '</span>
														</td>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['zodiac'], 'vedicastro' ) . '</span>
														</td>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['nakshatra'], 'vedicastro' ) . '( Pada  ' . __( $planetary_val['nakshatra_pada'], 'vedicastro' ) . ' )</span>
														</td>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['local_degree'], 'vedicastro' ) . '</span>
														</td>
														<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['global_degree'], 'vedicastro' ) . '</span>
														</td>
													</tr>';
									endforeach;
						$output .= '</tbody>
               					</table>
            				</div>
         				</div>
      				</div>
   				</div>';
 			return $output;
    }

    /**
	 * Vedicastro matching plante girl
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_matching_plante_girl($get_girl_response){
 		$girl_planets = array();
 		$key_array = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
 		if( !empty( $get_girl_response ) ) :
 			foreach( $get_girl_response as $key => $val ) :
 				if( in_array( $key, $key_array, true) ) :
 					$girl_planets[$key] = $val;
 					unset($get_girl_response[$key]);
 				endif;
 			endforeach;
 		endif;
 		$output .= '<div class="boy_planetary">
      					<div class="lagan_chart_birth_title">
         					<h4 class="fs-20 lh-24 fw-500">' . __( 'Girl’s Planetary Details', 'vedicastro' ) . '</h4>
      					</div>
      						<div class="choose_services_row">
         						<div class="astro_col-12">
            						<div class="lagan_chart_birth_table mlr-15">
               							<table class="lagan_birth_table_data planetary_table_data" border="1">
                  							<thead>
												<tr>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Planet', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'House', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Zodiac', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Nakshatra', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees in Sign', 'vedicastro' ) . '</span>
													</th>
													<th><span class="fw-700 lh-20 fs-14 clr-black1">' . __( 'Degrees', 'vedicastro' ) . '</span>
													</th>
												</tr>
											</thead>
					                    <tbody>';
				   						foreach($girl_planets as $planetary_key => $planetary_val ) :
											$output .= '<tr>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['full_name'], 'vedicastro' ) . '</span>
															</td>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['house'], 'vedicastro' ) . '</span>
															</td>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['zodiac'], 'vedicastro' ) . '</span>
															</td>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['nakshatra'], 'vedicastro' ) . '( Pada  ' . __( $planetary_val['nakshatra_pada'], 'vedicastro' ) . ' )</span>
															</td>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['local_degree'], 'vedicastro' ) . '</span>
															</td>
															<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $planetary_val['global_degree'], 'vedicastro' ) . '</span>
															</td>
														</tr>';
										endforeach;
							$output .= '</tbody>
               						</table>
            					</div>
         					</div>
      					</div>
   					</div>';
 		return $output;
    }

    /**
	 * Vedicastro matching chart
	 *
	 * @since    1.0.0
	 */
	public  function vedicastro_matching_chart( $get_lagna_boy_response,$get_lagna_girl_response,$get_navamsha_boy_response,$get_navamsha_girl_response,$boy_chart_code,$girl_chart_code, $boy_style, $girl_style ){
		$output .= '<div class="maching_tab_data display_block" maching_chart-content="1">
   						<div class="maching_data_main_tab maching_data_boy_tab">
      						<div class="lagan_chart_birth_title">
         						<h4 class="fs-20 lh-24 fw-500">' . __( 'Boy’s Charts (Name)', 'vedicastro' ) . '</h4>
     	 					</div>
      						<div class="choose_services_row">
         						<div class="astro_col-6">
         							<div class="kundli_lagan_chart mlr-15">
            							' . __( $get_lagna_boy_response, 'vedicastro' ) . '
									</div>';
									$output .= $this->vedicastro_change_style($boy_style, 'vedicastro-boychart-name');
         			$output .= '</div>
         						<div class="astro_col-6">
          							<div class="kundli_lagan_chart mlr-15">
            							' . __( $get_navamsha_boy_response, 'vedicastro' ) . '
									</div>';
									$output .= $this->vedicastro_chart_img_dropdown($boy_chart_code, 'vedicastro-boy-chart-image', 'chart_content_menu_data_boy', 'vedicastro-boy-chart');
         			 $output .= '</div>
      						</div>
      						<div class="maching_data_main_tab maching_data_girl_tab">
         						<div class="lagan_chart_birth_title">
            						<h4 class="fs-20 lh-24 fw-500">' . __( 'Girls’s Charts (Name) ', 'vedicastro' ) . '</h4>
         						</div>
         					</div>
         					<div class="choose_services_row">
            					<div class="astro_col-6">
             						<div class="kundli_lagan_chart mlr-15">
               							' . __( $get_lagna_girl_response, 'vedicastro' ) . '
									</div>';
									$output .= $this->vedicastro_change_style($girl_style, 'vedicastro-girlchart-name');
            		$output .= '</div>
             				<div class="astro_col-6">
              					<div class="kundli_lagan_chart mlr-15">
            						' . __( $get_navamsha_girl_response, 'vedicastro' ) . '
								</div>';
								$output .= $this->vedicastro_chart_img_dropdown($girl_chart_code, 'vedicastro-girl-chart-image', 'chart_content_menu_data_girl', 'vedicastro-girl-chart');
         			 $output .= '</div>
         				</div>
      				</div>
   				</div>
			</div>';
		return $output;
	}

	/**
	 * Vedicastro panchang ajax
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_panchang_ajax(){
 		$output = '';
 		parse_str( $_POST['form_data'], $form_data );
		$panchang_date = sanitize_text_field( trim( $form_data['panchang-date'] ) );
		$panchang_time = sanitize_text_field( trim( $form_data['panchang-time'] ) );
		$panchang_location = sanitize_text_field( trim( $form_data['panchang-location'] ) );
		$time_zone = sanitize_text_field( trim( $_POST['time_zone'] ) );
		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
					case 'vedicastro_sign_list' :
						$vedicastro_sign = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		$api_panchang_data = array(
						     'date' 	=> date( 'd/m/Y', strtotime( $panchang_date ) ),
						     'time'     => $panchang_time,
						     'tz'  	    => $time_zone,
	 					     'api_key'  => $api_key,
						     );
		$panchang_endpoint = 'panchang/getpanchang';
		$sunrise_endpoint = 'panchang/sunrise';
		$sunset_endpoint = 'panchang/sunset';
		$moonphase_endpoint = 'panchang/moonphase';
		$get_data = $this->vedicastro_api($panchang_endpoint, $api_panchang_data);
		$status = $get_data['status'];
		if( $status == 200 ) :
			$response = $get_data['response'];
			$time_data = array('rahukaal', 'gulika', 'yamakanta');
			$time_title = array(
						  'rahukaal'  => __( 'Rahu Kaal', 'vedicastro' ), 
						  'gulika'    => __( 'Gulika', 'vedicastro' ), 
						  'yamakanta' => __( 'Yama kanta', 'vedicastro' ),
						  );
			$day_data = array('tithi', 'nakshatra', 'karna', 'yoga', 'ayanamsa', 'rasi');
			$day_title = array(
                         'tithi'     => __( 'Tithi', 'vedicastro' ),
                         'nakshatra' => __( 'Nakshatra', 'vedicastro' ),
                         'karna'     => __( 'Karana', 'vedicastro' ),
                         'yoga'      => __( 'Yoga', 'vedicastro' ),
                         'ayanamsa'  => __( 'Ayanamsa', 'vedicastro' ),
                         'rasi'      => __( 'Rasi', 'vedicastro' ),
						 );
			$timing_details = array();
			if( !empty( $response ) ) :
				foreach( $response as $key => $val ) :
					if( in_array( $key, $time_data ) ) :
						$timing_details[$key] = $val;
					endif;
				endforeach;
			endif;
			$day_details = array();
			if( !empty( $response ) ) :
				foreach( $response as $key => $val ) :
					if( in_array( $key, $day_data ) ) :
						$day_details[] = array_merge( array( 'title' => $day_title[$key] ), $val  );
					endif;
				endforeach;
			endif;
			$google_api_key = $this->vedicastro_google_api_key();
			$api_google_data = array(
						    'address' => $panchang_location,
						    'sensor'  => false,
						    'key'     => $google_api_key,
						    );
			$get_google_data = $this->vedicastro_google_api($api_google_data);
		    $get_google_status = $get_google_data['status']; 
			$latitude = $get_google_data['results'][0]['geometry']['location']['lat'];
	    	$longitude = $get_google_data['results'][0]['geometry']['location']['lng'];
			$api_sunrise_data = array(
								'date' 	   => date( 'd/m/Y', strtotime( $panchang_date ) ),
								'lat' 	   => $latitude,
								'lon' 	   => $longitude,
								'tz'  	   => $time_zone,
								'api_key'  => $api_key,
								);
			$get_sunrise_data = $this->vedicastro_api($sunrise_endpoint, $api_sunrise_data);
			$sunrise_status = $get_sunrise_data['status'];
			$api_sunset_data = array(
								'date' 	   => date( 'd/m/Y', strtotime( $panchang_date ) ),
								'lat' 	   => $latitude,
								'lon' 	   => $longitude,
								'tz'  	   => $time_zone,
								'api_key'  => $api_key,
								);
			$get_sunset_data = $this->vedicastro_api($sunset_endpoint, $api_sunset_data);
			$sunset_status = $get_sunset_data['status'];			
			$api_moonphase_data = array(
								  'date' 	   => date( 'd/m/Y', strtotime( $panchang_date ) ),
								  'tz'  	   => $time_zone,
								  'api_key'    => $api_key,
								  );
			$get_moonphase_data = $this->vedicastro_api($moonphase_endpoint, $api_moonphase_data);
			$moonphase_status = $get_moonphase_data['status'];
			$output .= '<div class="lagan_chart_birth_title">
						<h2 class="fs-32 fw-500 clr-black">' . sprintf( __( 'It’s a %s, rising from the Aquarius sign', 'vedicastro' ), $response['day']['name'] ) . '</h2>
					</div>
					<div class="aquarius_sign_data  d_flex">';
					    if( !empty( $sunrise_status ) && $sunrise_status == 200 ) :
							$output .= '<div class="aquarius_part d_flex">
											<div class="aquarius_content">	<span>
												<img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/image2.png' ) . '" class="image_fluid">
												</span>
											</div>
											<div class="aquarius_content">	<span>
												<p class="m_0 fs-14 lh-20 fw-400 clr-black">' . __( $get_sunrise_data['response']['bot_response'], 'vedicastro' ) . '</p>
												</span>
											<div></div>
											</div>
										</div>';
						endif;
						if( !empty( $sunset_status )  && $sunset_status == 200 ) :
							$output .= '<div class="aquarius_part d_flex">
											<div class="aquarius_content">	<span>
												<img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/Image1.png' ) . '" class="image_fluid">
												</span>
											</div>
											<div class="aquarius_content">	<span>
												<p class="m_0 fs-14 lh-20 fw-400 clr-black">' . __( $get_sunset_data['response']['bot_response'], 'vedicastro' ) . '</p>
											</span>
											<div></div>
										</div>
									</div>';	
						endif;
					if( !empty( $moonphase_status )  && $moonphase_status == 200 ) :
					$output .= '<div class="aquarius_part d_flex">
									<div class="aquarius_content">	<span>
										<img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/image3.png' ) . '" class="image_fluid">
										</span>
									</div>
									<div class="aquarius_content">	<span>
										<p class="m_0 fs-14 lh-20 fw-400 clr-black">' . __( $get_moonphase_data['response']['bot_response'], 'vedicastro' ) . '<br>' . sprintf( __( 'phase %1$s in %2$s', 'vedicastro' ), $get_moonphase_data['response']['phase'], $get_moonphase_data['response']['paksha'] ) . '</p>
											</span>
											<div></div>
										</div>
									</div>
								</div>';
					endif;
		$output .= '<div class="panchang_aquarius">';
		if( !empty( $timing_details ) ) :
			$output .= '<div class="panchang_timing_details">
							<div class="lagan_chart_birth_title">
								<h4 class="fs-20 lh-24 fw-500">' . __( 'Timing Details', 'vedicastro' ) . '</h4>
							</div>
							<div class="choose_services_row">
								<div class="astro_col-5">
									<div class="lagan_chart_birth_table panchang_table mlr-15">
										<table class="lagan_birth_table_data panchang_table_data" border="1">
											<tbody>';
											    foreach( $timing_details as $timing_key => $timing_val ) :
													$output .= '<tr>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $time_title[$timing_key], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $timing_val, 'vedicastro' ) . '</span>
																	</td>
																</tr>';
												endforeach;
								 $output .= '</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>';
		endif;
		if( !empty( $day_details ) ) :
		$output .= '<div class="panchang_timing_details panchang_day_details">
						<div class="lagan_chart_birth_title">
							<h4 class="fs-20 lh-24 fw-500">' . __( 'Day Details', 'vedicastro' ) . '</h4>
						</div>
						<div class="choose_services_row">
							<div class="astro_col-9">
								<div class="lagan_chart_birth_table panchang_table mlr-15">
									<table class="lagan_birth_table_data panchang_table_data" border="1">
										<thead>
											<tr>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Title', 'vedicastro' ) . '</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Name', 'vedicastro' ) . '</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Start', 'vedicastro' ) . '</span>
												</th>
												<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'End', 'vedicastro' ) . '</span>
												</th>
											</tr>
										</thead>
										<tbody>';
										    foreach( $day_details as $day_key => $day_val) :
										    	$count = count($day_val);
										    	if( $count > 2 ) :
										    		$start_date = date('d-M-Y', strtotime($day_val['start_date']));
										    		$end_date = date('d-M-Y', strtotime($day_val['end_date']));
										   			$output .= '<tr>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $day_val['title'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $day_val['name'], 'vedicastro' ) . '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . sprintf( __( ' %1$s @ %2$s' ), $start_date, $day_val['start_time'] ). '</span>
																	</td>
																	<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . sprintf( __( ' %1$s @ %2$s' ), $end_date, $day_val['end_time'] ). '</span>
																	</td>
																</tr>';
										    	else :
										    		$output .= '<tr>
																	<td class="clr-black1" colspan="4"><span class="fw-400 lh-20 fs-14">' . sprintf( __( ' %1$s @ %2$s' ), $day_val['title'], $day_val['name'] ). '</span>
																	</td>
																</tr>';
										    	endif;
										    endforeach;
							$output .= '</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>';
		endif;
 		echo json_encode( array( 'status' => 'success', 'html' => $output ) );
 		wp_die();
		endif;
 	}

    /**
	 * Vedicastro retro ajax
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_panchang_moon_ajax(){
    	$output = '';
    	parse_str( $_POST['form_data'], $form_data );
		$panchang_moon_date = sanitize_text_field( trim( $form_data['panchang-moon-date'] ) );
		$expload_data = explode( '-',$panchang_moon_date );
		$year = (int)$expload_data[0];
		$month = (int)$expload_data[1];
		$total_days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$panchang_moon_location = sanitize_text_field( trim( $form_data['panchang-moon-location'] ) );
		$time_zone = sanitize_text_field( trim( $form_data['$time-zone'] ) );
		$moonphase_endpoint = 'panchang/moonphase';
		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		$get_moonphase_data = array();
		if( !empty( $total_days ) ) :
			for($i = 1; $i <= $total_days; $i++) :
				$ndate = $month . '/'.$i.'/'.$year;
				$api_moonphase_data = array(
								  'date' 	   => date( 'd/m/Y', strtotime( $ndate ) ),
								  'tz'  	   => $time_zone,
								  'api_key'    => $api_key,
								  );
				$get_moonphase_data[$i] = array_merge( $this->vedicastro_api($moonphase_endpoint, $api_moonphase_data), array('day-date' => date( 'd - M - Y', strtotime( $ndate ) )));
			endfor;
		endif;
		if( !empty( $get_moonphase_data ) ) :
	    	$output .= '<div class="panchang_aquarius">
							<div class="panchang_timing_details panchang_day_details ">
								<div class="lagan_chart_birth_title">
									<h4 class="fs-20 lh-24 fw-500">' . __( 'Phase Details', 'vedicastro' ) . '</h4>
								</div>
								<div class="choose_services_row">
									<div class="astro_col-9">
										<div class="lagan_chart_birth_table panchang_table mlr-15">
											<table class="lagan_birth_table_data panchang_moon_data" border="1">
												<thead>
													<tr>
														<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Date', 'vedicastro' ) . '</span>
														</th>
														<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Phase', 'vedicastro' ) . '</span>
														</th>
														<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Luminance', 'vedicastro' ) . '</span>
														</th>
														<th class="clr-black1"><span class="fw-700 lh-20 fs-14">' . __( 'Paksha', 'vedicastro' ) . '</span>
														</th>
													</tr>
												</thead>
												<tbody>';
												foreach( $get_moonphase_data as $get_moonphase_key => $get_moonphase_val ) :
													if( $get_moonphase_val['status'] == 200 ) :
														$response = '';
														$response = $get_moonphase_val['response'];
														$output .= '<tr>
																		<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $get_moonphase_val['day-date'], 'vedicastro' ) . '</span>
																		</td>';
																		if( !empty( $response['status'] ) ) :
																			$output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . sprintf( __( '%1$s (%2$s%%)', 'vedicastro' ), $response['status'], $response['phase']  ) . '</span>
																				</td>';
																		elseif( !empty( $response['state'] ) ) :
																				$output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . sprintf( __( '%1$s (%2$s%%)', 'vedicastro' ), $response['state'], $response['phase']  ) . '</span>
																				</td>';
																		endif;
																		if( !empty( $response['luminance'] ) ) :
																				$output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $response['luminance'], 'vedicastro' ) . '</span>';
																		elseif( !empty( $response['lluminance'] ) ) :
																				$output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $response['lluminance'], 'vedicastro' ) . '</span>
																				</td>';
																		endif;
																				$output .= '<td class="clr-black1"><span class="fw-400 lh-20 fs-14">' . __( $response['paksha'], 'vedicastro' ) . '</span>
																				</td>
																	</tr>';
													endif;
												endforeach;
								    $output .= '</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>';
		endif;
    	echo json_encode( array( 'status' => 'success', 'html' => $output ) );
    	wp_die();
    }

	/**
	 * Vedicastro retro ajax
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_retro_ajax(){
 		parse_str( $_POST['form_data'], $form_data );
		$retro_year = sanitize_text_field( trim($form_data['retro-year'] ) );
 		$output = '';
 		$planets_data = array(
                        'sun'     => __( 'Sun', 'vedicastro' ),
                        'moon'    => __( 'Moon', 'vedicastro' ),
                        'mercury' => __( 'Mercury', 'vedicastro' ),
                        'venus'   => __( 'Venus', 'vedicastro' ),
                        'earth'   => __( 'Earth', 'vedicastro' ),
                        'mars'    => __( 'Mars', 'vedicastro' ),
                        'jupiter' => __( 'Jupiter', 'vedicastro' ),
                        'saturn'  => __( 'Saturn', 'vedicastro' ),
                        'uranus'  => __( 'Uranus', 'vedicastro' ),
                        'neptune' => __( 'Neptune', 'vedicastro' ),
                        'pluto'   => __( 'Pluto', 'vedicastro' ),
 		                );
 		$findretro_endpoint = 'panchang/findretro';
 		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		if( !empty( $planets_data ) ) :
			foreach( $planets_data as $planets_key => $planets_val ) :
				$api_retro_data[] = array(
								    'year' 	   => $retro_year,
								    'planet'   => $planets_key,
								    'api_key'  => $api_key,
								    );
			endforeach;
		endif;
		if( !empty( $api_retro_data ) ) :
			foreach( $api_retro_data as $api_retro_key => $api_retro_val ) :
				$get_all_planet_data[] = array_merge( $this->vedicastro_api($findretro_endpoint, $api_retro_val), array( 'planet' => $api_retro_data[$api_retro_key]['planet'] ) );
			endforeach;
		endif;
		if( !empty( $get_all_planet_data ) ) :
			$output .= '<div class="choose_services_row">';
			foreach( $get_all_planet_data as $get_all_planet_key => $get_all_planet_val ) :
				if( $get_all_planet_val['status'] == 200 && $get_all_planet_val['response']['status'] == 1 ) :
					$output .= '<div class="astro_col-6">
									<div class="retro_planites_box mlr-15 position_relative">
										<p class="fs-16 lh-24 text-black fw-400">' . __( $get_all_planet_val['response']['bot_response'], 'vedicastro' ) . '</p>
										<div class="planites">
											<img src="' . esc_url( VEDICASTRO_URL . 'public/images/planet/' . esc_attr( $get_all_planet_val['planet'] ) . '.png' ) . '" class="img_fluid">	<span class="fs-20 fw-500 lh-24 clr-black">' . __( $planets_data[$get_all_planet_val['planet']], 'vedicastro' ) . '</span>
										</div>
									</div>
								</div>';
				endif;
			endforeach;
			$output .= '</div>';
		endif;
		echo json_encode( array( 'status' => 'success', 'html' => $output ) );
		wp_die();
 		return $output;
 	}
    
 	/**
	 * Vedicastro numberology ajax
	 *
	 * @since    1.0.0
	 */
 	public function vedicastro_numberology_ajax(){
 		$personal_day_number = '';
 		parse_str( $_POST['form_data'], $form_data );
		$numberology_name = sanitize_text_field( trim( $form_data['numberology-name'] ) );
		$numberology_date = sanitize_text_field( trim($form_data['numberology-date'] ) );
		$numberology_time = sanitize_text_field( trim($form_data['numberology-time'] ) );
		$numberology_personal_day_endpoint = 'prediction/daynumber';
		$numerology_endpoint = 'prediction/numerology';
		$vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
		if(!empty($vedicastro_setting)) :
			foreach($vedicastro_setting as $valk => $valv) :
				switch($valk) :
					case 'vedicastro_apikey':
						$api_key = !empty($valv) ? $valv : '';
					break;
				endswitch;
			endforeach;
		endif;
		$api_daynumber  = array(
                          'name'    => $numberology_name,
                          'date'    => date( 'd/m/Y', strtotime( $numberology_date ) ),
                          'api_key' => $api_key
		                  );
		$numberology_personal_day_data = $this->vedicastro_api($numberology_personal_day_endpoint, $api_daynumber);
		$day_number_status = $numberology_personal_day_data['status'];
		$numerology_data = $this->vedicastro_api($numerology_endpoint, $api_daynumber);
		$numerology_status = $numerology_data['status'];
		if( !empty( $day_number_status ) && $day_number_status == 200 ) :
	 		$personal_day_number = '<div class="kundli_vedic mlr-15 bdr-gray bg-white">
								 		<div class="kundli_vedic_form Numerology_vedic_form Numerology_vedic_form1">
											<div class="kundli_vedic_login_form Numerology_form_get">
												<h4 class="fs-20 lh-24 fw-500 clr-black m_0">' . __( $numberology_personal_day_data['response']['title'], 'vedicastro' ) . '</h4>
												<div class="Numerology_vedic_number text_center">
													<h4 class="fs-48 m_0 clr-pink fw-500">' . __( $numberology_personal_day_data['response']['number'], 'vedicastro' ) . '</h4>';
													if( $numberology_personal_day_data['response']['master'] == true) :
													$personal_day_number .= '<span class="clr-pink fs-8 lh-12 fw-700">' . __( 'Master Number', 'vedicastro' ) . '</span>';
												    endif;
						$personal_day_number .= '</div>';
						                        if( !empty( $numberology_personal_day_data['response']['meaning'] ) ) :
														$personal_day_number .= '<div class="Numerology_vedic_content">
																					<p class="fs-10 lh-15 text-black">' . __( $numberology_personal_day_data['response']['meaning'], 'vedicastro' ) . '</p>
																				</div>';
												endif;
					$personal_day_number .= '</div>
										</div>
									</div>';
		endif;
		if( !empty( $numerology_status ) && $numerology_status == 200 ) :
			$response = $numerology_data['response'];
			$numerology_html = '<div class="Numerology_count_number_box">';
                                    if( !empty( $response ) ) :
                                    	foreach( $response as $response_key => $response_val ) :
                                    		switch($response_key) :
                                    			case 'destiny':
                                    				$numerology_html .= '<div class="choose_services_row">
																			<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>
																		</div>';
                                    			break;
                                    			case 'personality':
                                    			case 'attitude':
                                    			   	if( $response_key == 'personality' ) :
                                    			   	$numerology_html .= '<div class="choose_services_row">';
														$numerology_html .= '<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>';
																elseif( $response_key == 'attitude' ) :
																	$numerology_html .= '<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>';
											$numerology_html .= '</div>';
																endif;
                                    			break;
                                    			case 'character':
                                    			case 'soul':
                                    			   	if( $response_key == 'character' ) :
                                    			   		$numerology_html .= '<div class="choose_services_row">';
														$numerology_html .= '<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>';
																elseif( $response_key == 'soul' ) :
																	$numerology_html .= '<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>';
										    $numerology_html .= '</div>';
																endif;
                                    			break;
                                    			case 'agenda':
                                    				$numerology_html .= '<div class="choose_services_row">
																			<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>
																		</div>';

                                    			break;
                                    			case 'purpose':
                                    				$numerology_html .= '<div class="choose_services_row">
																			<div class="astro_col-6">
																				<div class="lagan_chart_birth_title">
																					<h4 class="fs-20 lh-24 fw-500">' . __( $response_val['title'], 'vedicastro' ) . '</h4>
																				</div>
																				<div class="mlr-15 daily_horoscope_box_main d_flex">
																					<div class="daily_horoscope_box">
																						<div class="daily_horoscope_circle">
																							<div class="daily_horoscope_circle_content">
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0"</h4>  
																								<h4 class="clr-pink fs-32 fw-500 lh-24 m_0">' . __( $response_val['number'], 'vedicastro') . '</h4>';
																								if( $response_val['master'] == true ) :  
																									$numerology_html .= '<span class="clr-pink fs-8 fw-500 lh-12">' . __( 'Master Number', 'vedicastro' ) . '</span>'; 
																								endif;
																		$numerology_html .= '</div>
																						</div>';
																						if( !empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['meaning'], 'vedicastro' ) . '</p>
																							</div>';
																						elseif( empty( $response_val['meaning'] ) && !empty( $response_val['description'] ) ) :
																							$numerology_html .= '<div class="daily_content_right">
																								<p class="fs-10">' . __( $response_val['description'], 'vedicastro' ) . '</p>
																							</div>';
																						endif;
																$numerology_html .= '</div>
																				</div>
																			</div>
																		</div>';

                                    			break;
                                    		endswitch;
                                    	endforeach;
                                    endif;
			$numerology_html .= '</div>';
		endif;
 		echo json_encode( array( 'status' => 'success', 'personal_day_number' => $personal_day_number, 'numerology_html' => $numerology_html ) );
 		wp_die();
 	} 
}