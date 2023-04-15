<?php
class Vedicastro_Shortcode {

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
		add_shortcode( 'vedicastro-services-shortcode', array( $this, 'vedicastro_choose_services_shortcode' ) );
		add_shortcode( 'vedicastro-all-in-one-shortcode', array( $this, 'vedicastro_all_in_one_shortcode' ) );
		add_shortcode( 'vedicastro-horoscope-shortcode', array( $this, 'vedicastro_horoscope_shortcode' ) );
		add_shortcode( 'vedicastro-kundali-shortcode', array( $this, 'vedicastro_kundali_shortcode' ) );
		add_shortcode( 'vedicastro-matching-shortcode', array( $this, 'vedicastro_matching_shortcode' ) );
		add_shortcode( 'vedicastro-panchang-shortcode', array( $this, 'vedicastro_panchang_shortcode' ) );
		add_shortcode( 'vedicastro-panchang-moon-calendar-shortcode', array( $this, 'vedicastro_panchang_moon_calendar_shortcode' ) );
		add_shortcode( 'vedicastro-retro-shortcode', array( $this, 'vedicastro_retro_shortcode' ) );
		add_shortcode( 'vedicastro-numberology-shortcode', array( $this, 'vedicastro_numberology_shortcode' ) );
	}
    
    /**
	 * Vedicastro zodics list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_zodics_list(){
		$zodics = '';
		$zodics = array(
                  'aries'       => __( 'Aries', 'vedicastro' ),
                  'taurus'      => __( 'Taurus', 'vedicastro' ),
                  'gemeni'      => __( 'Gemeni', 'vedicastro' ),
                  'cancer'      => __( 'Cancer', 'vedicastro' ),
                  'leo'         => __( 'Leo', 'vedicastro' ),
                  'virgo' 	    => __( 'Virgo', 'vedicastro' ),
                  'libra'  	    => __( 'Libra', 'vedicastro' ),
                  'scorpio'     => __( 'Scorpio', 'vedicastro' ),
                  'sagittarius' => __( 'Sagittarius', 'vedicastro' ),
                  'capricorn'   => __( 'Capricorn', 'vedicastro' ),
                  'aquarius'    => __( 'Aquarius', 'vedicastro' ),
                  'pisces'      => __( 'Pisces', 'vedicastro' ),
				  );
		return $zodics;
	}

	/**
	 * Vedicastro cycles list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_cycles_list(){
		$cycles = '';
		$cycles = array(
                  'daily'       => __( 'Daily', 'vedicastro' ),
                  'weekly'      => __( 'Weekly', 'vedicastro' ),
				  );
		return $cycles;
	}

	/**
	 * Vedicastro cycles list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_days_list(){
		$days = '';
		$days = array(
                'today'       => __( 'Today', 'vedicastro' ),
                'tomorrow'    => __( 'Tomorrow', 'vedicastro' ),
			    );
		return $days;
	}

	/**
	 * Vedicastro weekly list
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_weekly_list(){
		$weekly = '';
		$weekly = array(
                  'thisweek'    => __( 'This Week', 'vedicastro' ),
                  'nextweek'    => __( 'Next Week', 'vedicastro' ),
				  );
		return $weekly;
	}

	/**
	 * Vedicastro choose services
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_services_data(){
    	$data = '';
    	$data = array(
                'id'    => 'choose-a-service',
                'title' => __( 'Choose a service', 'vedicastro' ),
                'data'  => array(
	                	       array(
	                	       'id'    => 'service-horoscope',
	                	       'title' => __( 'Horoscope', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/horoscope',
	                	       'type'  => 'png',
	                		   ),
	                		   array(
	                	       'id'    => 'service-kundli',
	                	       'title' => __( 'Kundli', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/kundli',
	                	       'type'  => 'png',
	                		   ),
	                		   array(
	                	       'id'    => 'service-matching',
	                	       'title' => __( 'Matching', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/matching',
	                	       'type'  => 'png',
	                		   ),
	                		   array(
	                	       'id'    => 'service-panchang',
	                	       'title' => __( 'Panchang', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/panchang',
	                	       'type'  => 'png',
	                		   ),
	                		   array(
	                	       'id'    => 'service-retro',
	                	       'title' => __( 'Retro', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/retro',
	                	       'type'  => 'png',
	                		   ),
	                		   array(
	                	       'id'    => 'service-numerology',
	                	       'title' => __( 'Numerology', 'vedicastro' ),
	                	       'image' => VEDICASTRO_URL . 'public/images/numerology',
	                	       'type'  => 'png',
	                		   ),
                	      ),
    			);
    	return $data;
    }

	/**
	 * Vedicastro get previous page url 
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_get_previous_page_url(){
    	$output = '';
    	if( isset( $_SERVER['HTTP_REFERER'] ) && !empty( $_SERVER['HTTP_REFERER'] ) ) :
    		$output = $_SERVER['HTTP_REFERER'];
    	else :
    		$output = '#';
        endif;
    	return $output;
    }

	/**
	 * Vedicastro choose services
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_choose_services_shortcode(){
		$output = '';
		$data = $this->vedicastro_services_data();
		if( !empty( $data ) ) :
			$output .= '<section class="choose_services p-15" id="choose_services_data">
							<div class="astro_container">
								<div class="choose_services_box bdr-gray">
									<div class="astro_box prl-40">
										<div class="choose_services_box_content">';
										    if( !empty($data['title'] ) ) :
												$output .= '<div class="choose_services_title">
																<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">' . __( $data['title'], 'vedicastro' ) . '</h2> 
															</div>';
											endif;
								$output .= '<div class="choose_services_row">';
                                                if( !empty( $data['data'] ) ) :
                                                	$i=1;
                                                	foreach( $data['data'] as $data_key => $data_val ) :
                                                		if( $i==1 ) :
                                                			$class = 'choose_services_col_box active bdr-gray mlr-15';
                                                		else :
                                                			$class = 'choose_services_col_box bdr-gray mlr-15';
                                                		endif;
														$output .= '<div class="choose_services_col-3">
																		<div class="' . esc_attr( $class ) . '">
																			<a href="#' . esc_attr( $data_val['id'] ) . '">
																				<div class="astro_logo text_center">
																					<img src="' . esc_url( $data_val['image'] . '.' . $data_val['type'] ) . '" class="img_fluid">
																				</div>
																				<div class="astro_logo_content text_center">
																					<h3 class="fs-16 lh-20 m_0 clr-black1 fw-700">' . __($data_val['title'], 'vedicastro') . '</h3> 
																				</div>
																			</a>
																		</div>
																	</div>';
													$i++;
													endforeach;
												endif;
								$output .= '</div>
										</div>
									</div>
								</div>
							</div>
						</section>';
		endif;
		return $output;
	}

	/**
	 * Vedicastro horoscope shortcode
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_horoscope_result(){
    	$output = '';
    	$vedicastro_public = new Vedicastro_Public($this->plugin_name, $this->version);
    	$zodic_sign = 1;
		$cycle = 'daily';
		$date = date('d/m/Y');
	    $vedicastro_setting = json_decode( get_option('vedicastro_setting'), true );
			if( !empty( $vedicastro_setting ) ) :
				foreach( $vedicastro_setting as $valk => $valv ) :
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
			$api_data = array(
						'zodiac'    => $zodic_sign,
						'show_same' => true,
						'date' 	    => $date,
						'type'      => 'big',
						'split'     => true,
						'api_key'   => $api_key,
						);
			$prediction = $cycle . $vedicastro_sign;
			$get_data = $vedicastro_public->vedicastro_prediction_api($prediction, $api_data);
			$status = $get_data['status'];
			if($status == 200) :
				$response = $get_data['response'];
				$i = 1;
				if (!empty($vedicastro_sign)) {
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
			}
			endif;
			
    	return $output;
    }

	/**
	 * Vedicastro horoscope shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_all_in_one_shortcode(){
		$output = '';
		$output .= do_shortcode('[vedicastro-services-shortcode]');
		$output .= do_shortcode('[vedicastro-horoscope-shortcode]');
		$output .= do_shortcode('[vedicastro-kundali-shortcode]');
		$output .= do_shortcode('[vedicastro-matching-shortcode]');
		$output .= do_shortcode('[vedicastro-panchang-shortcode]');
		$output .= do_shortcode('[vedicastro-panchang-moon-calendar-shortcode]');
		$output .= do_shortcode('[vedicastro-retro-shortcode]');
		$output .= do_shortcode('[vedicastro-numberology-shortcode]');
		return $output;
	}

	/**
	 * Vedicastro horoscope shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_horoscope_shortcode(){
		$output = $zodics = $cycles = '';
		$zodics = $this->vedicastro_zodics_list();
		$cycles = $this->vedicastro_cycles_list();
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="horoscope p-15" id="service-horoscope">
						<div class="astro_container">
							<div class="choose_services_box bdr-gray">
								<div class="astro_box prl-40">
									<div class="choose_services_box_content">
										<div class="choose_services_title">
											<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
                         <span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span> <span>' . __( 'Horoscope', 'vedicastro' ) . '</span>
                      </h2> 
										</div>
										<div class="zodic_sign">
											<div class="choose_services_row">';
											    if(!empty($zodics)) :
											    	$i=1;
											    	foreach($zodics as $key => $val) :
											    		if($i==1) :
											    			$class = 'zodics_sign_tab mlr-5 active';
											    		else :
											    			$class = 'zodics_sign_tab mlr-5';
											    		endif;
														$output .= '<div class="astro_col-1">
																		<div class="' . esc_attr( $class ) . '">
																			<a href="javascript:void(0)" class="vedicastro-zodic-sign vedicastro-click" data-click="zodic-sign" zodic-id="' . esc_attr( $i ) . '" data-title="' . esc_attr( $key ) . '">
																				<div class="zodics_icon text_center">
																					<img src="' . esc_url( VEDICASTRO_URL . 'public/images/zodics/' ) . esc_attr( $key ) . '.svg" class="img_fluid">
																					<img src="' . esc_url( VEDICASTRO_URL . 'public/images/zodics/' ) . esc_attr( $key ) . '_w.svg" class="img_fluid">
																				</div>
																				<div class="zodics_content text_center">
																					<p class="m_0 fs-10 clr-blue">' . __( $val, 'vedicastro' ) . '</p>
																				</div>
																			</a>
																		</div>
																	</div>';
													$i++;
												    endforeach;
												endif;
									$output .= '</div>
										</div>
										<div class="horoscope_main_tab display_block" zodic-content="1">';
										    if(!empty($cycles)) :
												$output .= '<div class="astro_content_tabs">
																<ul class="astro_content_menu p_0 display_flex" id="astro_content_menu_data">';
																    $j=1;
																	foreach($cycles as $cycles_key => $cycles_val) :
																	    if($j==1) :
																	    	$cycles_class = 'vedicastro-click cycles active';
																	    else :
																	    	$cycles_class = 'vedicastro-click cycles';
																	    endif; 
																		$output .= '<li class="' . esc_attr( $cycles_class ) . '" data_id="' . esc_attr( $j ) . '" data-click="cycles" data-title="' . esc_attr( $cycles_key ) . '"> <a href="javascript:void(0)" class="clr-gray fs-16 lh-24" data-prediction="' . esc_attr( $cycles_key ) . '">' . __( $cycles_val , 'vedicastro' ) . '</a> 
																		</li>';
																	$j++;
																	endforeach;
													$output .= '</ul>
														</div>';
												$k=1; 
												foreach($cycles as $cycles_key => $cycles_val) :
													if($k == 1) :
														$section_class = 'astro_content_sub_tab_main display_block';
													else :
														$section_class = 'astro_content_sub_tab_main';
													endif;
													$output .= '<div class="' . esc_attr( $section_class ) . '" data_content="' . esc_attr( $k ) . '">';
														switch($cycles_key) :
															case 'daily':
																$days = $this->vedicastro_days_list();
																if(!empty($days)) :
																$output .= '<div class="astro_content_sub_tab display_block">
																				<ul class="astro_content_sub_menu p_0 display_flex" id="astro_content_menu_data">';
																				    $l=1;
																				    foreach($days as $day_key => $day_val) :
																				    	if($l==1) :
																				    		$day_class = 'vedicastro-click days active';
	                                                                                    else :
	                                                                                    	$day_class = 'vedicastro-click days';
																				    	endif;
																						$output .= '<li class="' . esc_attr( $day_class ) . '" data_sub_id="' . esc_attr( $l ) . '" data-click="days" data-title="' . esc_attr( $day_key ) . '">
																								<a href="javascript:void(0)" class="clr-gray fs-16 lh-24">' . __( $day_val, 'vedicastro' ) . '</a> 
																							</li>';
																				    $l++;
																					endforeach;
																	 $output .= '</ul>
																			</div>';
																endif;
															break;
															case 'weekly':
																$weekly = $this->vedicastro_weekly_list();
																if(!empty($weekly)) :
																$output .= '<div class="astro_content_sub_tab display_block">
																				<ul class="astro_content_sub_menu p_0 display_flex" id="astro_content_menu_data">';
																				    $m=1;
																				    foreach($weekly as $weekly_key => $weekly_val) :
																				    	if($m==1) :
																				    		$weekly_class = 'vedicastro-click weekly active';
	                                                                                    else :
	                                                                                    	$weekly_class = 'vedicastro-click weekly';
																				    	endif;
																						$output .= '<li class="' . esc_attr( $weekly_class ) . '" data_sub_id="' . esc_attr( $m ) . '" data-click="weekly" data-title="' . esc_attr( $weekly_key ) . '">
																									<a href="javascript:void(0)" class="clr-gray fs-16 lh-24">' . __( $weekly_val, 'vedicastro' ) . '</a> 
																							</li>';
																				    $m++;
																					endforeach;
																	 $output .= '</ul>
																			</div>';
																endif;
															break;
															case 'monthly':
															break;
															case 'yearly':
															break;
														endswitch;
													$output .= '</div>';
													$k++;
												endforeach;
												$output .= '<div class="daily_horoscope ptb-30 display_block">
																<div class="choose_services_row" id="choose_services_row">';
																	$output .= $this->vedicastro_horoscope_result();
													$output .= '</div>
															</div>';
											endif;
							$output .= '</div>
								</div>
							</div>
						</div>
					</section>';
		return $output;
	}
    
    /**
	 * Vedicastro form field data
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_form_field_data(){
    	$output = '';
    	$output = array(
    		      'options' => array(
                                   array(
                                   'id'          => 'kundali-name',
                                   'name'        => 'kundali-name',
                                   'type'        => 'text',
                                   'title'       => __( 'Name', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Name', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'kundali-date',
                                   'name'        => 'kundali-date',
                                   'type'        => 'date',
                                   'title'       => __( 'Date', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Date', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'kundali-time',
                                   'name'        => 'kundali-time',
                                   'type'        => 'time',
                                   'title'       => __( 'Time', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Time', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'kundali-location',
                                   'name'        => 'kundali-location',
                                   'type'        => 'text',
                                   'title'       => __( 'location', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'location', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check location',
                                   ),
                                   array(
                                   'id'          => 'kundali-divisional-chart-code',
                                   'name'        => 'kundali-divisional-chart-code',
                                   'type'        => 'hidden',
                                   'label-class' => 'fs-16 lh-24',
                                   'input-class' => 'fs-16 lh-24 check location',
                                   'value'       => 'D9',
                                   ),
                                   array(
                                   'id'          => 'kundali-style',
                                   'name'        => 'kundali-style',
                                   'type'        => 'hidden',
                                   'label-class' => 'fs-16 lh-24',
                                   'input-class' => 'fs-16 lh-24 check location',
                                   'value'       => 'north',
                                   ),
                                   array(
                                   'id'          => 'kundali-submit',
                                   'name'        => 'kundali-submit',
                                   'type'        => 'submit',
                                   'input-class' => 'get_submit vedicastro_button',
                                   'value'       => __( 'Get Kundli', 'vedicastro' ),
                                   ),
    		                   ),
    			  );
    	return $output;
    }
    
	 /**
	 * Vedicastro kundali form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_form($args){
    	$output = '';
    	$data = $this->vedicastro_form_field_data();
    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
					<div class="kundli_vedic_login_form">';
						if( !empty( $data['options'] ) ) :
							foreach($data['options'] as $key => $val ) :
								switch($key) :
									case 0 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 1:
									case 2:
										if($key == 1) :
											$output .= '<div class="choose_services_row">';
											$output .= '<div class="astro_col-8">
															<div class="kundli_vedic_group">';
																$output .= $this->vedicastro_form_field($val);
											     $output .= '</div>
														</div>';
										endif;
										if($key == 2) :
											$output .= '<div class="astro_col-4">
															<div class="kundli_vedic_group">';
															$output .= $this->vedicastro_form_field($val);
												$output .= '</div>
														</div>';
										endif;
										if($key == 2) :
											$output .= '</div>';
										endif; 
									break;
									case 3 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 4 :
										$output .= $this->vedicastro_form_field($val);
									break;
									case 5 :
										$output .= $this->vedicastro_form_field($val);
									break;
									case 6 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
								endswitch;
							endforeach;
						endif;
			$output .= '</div>
				</form>';
    	return $output;
    }

	/**
	 * Vedicastro kundali form
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_panchang_form_field_data(){
		$output = '';
		$output = array(
    		      'options' => array(
                                   array(
                                   'id'          => 'panchang-date',
                                   'name'        => 'panchang-date',
                                   'type'        => 'date',
                                   'title'       => __( 'Date', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Date', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'panchang-time',
                                   'name'        => 'panchang-time',
                                   'type'        => 'time',
                                   'title'       => __( 'Time', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Time', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'panchang-location',
                                   'name'        => 'panchang-location',
                                   'type'        => 'text',
                                   'title'       => __( 'location', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'location', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check location',
                                   ),
                                   array(
                                   'id'          => 'panchang-submit',
                                   'name'        => 'panchang-submit',
                                   'type'        => 'submit',
                                   'input-class' => 'get_submit vedicastro_button',
                                   'value'       => __( 'Get Panchang', 'vedicastro' ),
                                   ),
    		                   ),
    			  );
		return $output;
	}

	 /**
	 * Vedicastro panchang form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_panchang_form($args){
    	$output = '';
    	$data = $this->vedicastro_panchang_form_field_data();
    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
					<div class="kundli_vedic_login_form">';
						if( !empty( $data['options'] ) ) :
							foreach($data['options'] as $key => $val ) :
								switch($key) :
									case 0:
									case 1:
										if($key == 0) :
											$output .= '<div class="choose_services_row">';
											$output .= '<div class="astro_col-8">
															<div class="kundli_vedic_group">';
																$output .= $this->vedicastro_form_field($val);
											     $output .= '</div>
														</div>';
										endif;
										if($key == 1) :
											$output .= '<div class="astro_col-4">
															<div class="kundli_vedic_group">';
															$output .= $this->vedicastro_form_field($val);
												$output .= '</div>
														</div>';
										endif;
										if($key == 1) :
											$output .= '</div>';
										endif; 
									break;
									case 2 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 3 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
								endswitch;
							endforeach;
						endif;
			$output .= '</div>
				</form>';
    	return $output;
    }

	/**
	 * Vedicastro form field
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_form_field($fields){
    	$output = '';
	    	switch($fields['type']) :
	    		case 'hidden':
	    			$output .= '<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="hidden" value="' . esc_attr( $fields['value'] ) . '" class="' . esc_attr( $fields['input-class'] ) . ' text-color ">';
				break;
				case 'text':
	    			$output .= '<label for="' . esc_attr( $fields['id'] ) . '" class="' . esc_attr( $fields['label-class'] ) . ' text-color ">' . __( $fields['title'], 'vedicastro') . '</label>
								<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="text" placeholder="' . esc_attr( $fields['placeholder'] ) . '" class="' . esc_attr( $fields['input-class'] ) . ' text-color ">';
				break;
				case 'date':
	    			$output .= '<label for="' . esc_attr( $fields['id'] ) . '" class="' . esc_attr( $fields['label-class'] ) . ' text-color">' . __( $fields['title'], 'vedicastro') . '</label>
								<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="date" placeholder="' . esc_attr( $fields['placeholder'] ) . '" class="' . esc_attr( $fields['input-class'] ) . ' text-color">';
	    		break;
	    		case 'time':
	    			$output .= '<label for="' . esc_attr( $fields['id'] ) . '" class="' . esc_attr( $fields['label-class'] ) . ' text-color">' . __( $fields['title'], 'vedicastro') . '</label>
								<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="time" placeholder="' . esc_attr( $fields['placeholder'] ) . '" class="' . esc_attr( $fields['input-class'] ) . ' text-color">';
				break;
				case 'month':
	    			$output .= '<label for="' . esc_attr( $fields['id'] ) . '" class="' . esc_attr( $fields['label-class'] ) . '">' . __( $fields['title'], 'vedicastro') . '</label>
								<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="month" placeholder="' . esc_attr( $fields['placeholder'] ) . '" class="' . esc_attr( $fields['input-class'] ) . ' text-color">';
				break;
				case 'anchor':
	    			$output .= '<a href="javascript:;" class="' . esc_attr( $fields['input-class'] ) . ' text-color" data-match-id="' . esc_attr( $fields['data-id'] ) . '">' . __( $fields['value'], 'vedicastro' ) . '</a>';
				break;
				case 'submit':
					$output .= '<input id="' . esc_attr( $fields['id'] ) . '" name="' . esc_attr( $fields['name'] ) . '" type="submit" class="' . esc_attr( $fields['input-class'] ) . '" value="' . esc_attr( $fields['value'] ) . '">';
				break;
	    	endswitch; 
    	return $output;
    }

	 /**
	 * Vedicastro kundali shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_kundali_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-kundali',
                'form-id'   => 'form-kundali',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="choose_services p-15 kundli_sec" id="service-kundli">
					<div class="astro_container">
						<div class="choose_services_box bdr-gray">
							<div class="astro_box prl-40">
								<div class="choose_services_box_content">
									<div class="choose_services_title">
										<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
			                           <span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'Kundli', 'vedicastro' ) . '</span>
			                       	 </h2>
									</div>
									<div class="astro_box_vedic_kundli">
										<div class="choose_services_row">
											<div class="astro_col-5">
												<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue">
													<div class="kundli_vedic_form">';
														$output .= $this->vedicastro_form($args);			 
										$output .= '</div>
												</div>
											</div>
											<div class="astro_col-5">
												<div class="kundli_lagan_chart mlr-15" id="kundli-lagan-chart">
												</div>
											</div>
										</div>
										<div class="lagan_chart_tabs_main" id="lagan-chart-tabs-main-kundli">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>';
		return $output;
	}	
    
    /**
	 * Vedicastro matchiing field data
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_matching_form_field_data(){
		$output = '';
		$output = array(
    		      'options' => array(
    		      	            'boy-form' => array(
    		      	            	            'title' => __( 'Boy’s Details', 'vedicastro' ),
    		      	            	            'field' => array(  
    		      	            	            	           array(
							                                   'id'          => 'boy-name',
							                                   'name'        => 'boy-name',
							                                   'type'        => 'text',
							                                   'title'       => __( 'Name', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Name', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'boy-date',
							                                   'name'        => 'boy-date',
							                                   'type'        => 'date',
							                                   'title'       => __( 'Date', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Date', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'boy-time',
							                                   'name'        => 'boy-time',
							                                   'type'        => 'time',
							                                   'title'       => __( 'Time', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Time', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'boy-location',
							                                   'name'        => 'boy-location',
							                                   'type'        => 'text',
							                                   'title'       => __( 'location', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'location', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   ),
							                                   array(
							                                   'id'          => 'boy-divisional-chart-code',
							                                   'name'        => 'boy-divisional-chart-code',
							                                   'type'        => 'hidden',
							                                   'label-class' => 'fs-16 lh-24',
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   'value'       => 'D9',
							                                   ),
							                                   array(
							                                   'id'          => 'boy-style',
							                                   'name'        => 'boy-style',
							                                   'type'        => 'hidden',
							                                   'label-class' => 'fs-16 lh-24',
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   'value'       => 'north',
							                                   ),
							                                )
                                				),
    		      	            'girl-form' => array(
    		      	            	            'title' => __( 'Girl’s Details', 'vedicastro' ),
    		      	            	            'field' => array(  
    		      	            	            	           array(
							                                   'id'          => 'girl-name',
							                                   'name'        => 'girl-name',
							                                   'type'        => 'text',
							                                   'title'       => __( 'Name', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Name', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'girl-date',
							                                   'name'        => 'girl-date',
							                                   'type'        => 'date',
							                                   'title'       => __( 'Date', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Date', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'girl-time',
							                                   'name'        => 'girl-time',
							                                   'type'        => 'time',
							                                   'title'       => __( 'Time', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'Time', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check',
							                                   ),
							                                   array(
							                                   'id'          => 'girl-location',
							                                   'name'        => 'girl-location',
							                                   'type'        => 'text',
							                                   'title'       => __( 'location', 'vedicastro' ),
							                                   'label-class' => 'fs-16 lh-24',
							                                   'placeholder' => __( 'location', 'vedicastro' ),
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   ),
							                                   array(
							                                   'id'          => 'girl-divisional-chart-code',
							                                   'name'        => 'girl-divisional-chart-code',
							                                   'type'        => 'hidden',
							                                   'label-class' => 'fs-16 lh-24',
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   'value'       => 'D9',
							                                   ),
							                                   array(
							                                   'id'          => 'girl-style',
							                                   'name'        => 'girl-style',
							                                   'type'        => 'hidden',
							                                   'label-class' => 'fs-16 lh-24',
							                                   'input-class' => 'fs-16 lh-24 check location',
							                                   'value'       => 'north',
							                                   ),
							                                )
                                				),
    		                   ),
    			  );
		return $output;
	}
    
	/**
	 * Vedicastro matching form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_matching_form($args){
    	$output = '';
    	$data = $this->vedicastro_matching_form_field_data();
    	if( !empty( $data['options'] ) ) :
	    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
	    					<div class="choose_services_row">';
	    					    foreach( $data['options'] as $data_key => $data_val ) :
		    						$output .= '<div class="astro_col-5">';
		    						                if( $data_key == 'girl-form' ) :
		    						                	$output .= '<div class="kundli_vedic_form maching_data_form">';
		    						                endif;
		    						                if( !empty( $data_val['title'] ) ) :
														$output .= '<div class="kundli_vedic_login_form maching_data_form_login">
																		<h4 class="fs-20 lh-24 fw-700 clr-black text-color m_0">' . __( $data_val['title'], 'vedicastro' ) . '</h4>';
																foreach($data_val['field'] as $data_val_key => $data_val_val ) :
																	switch( $data_val_key ) :
																		case 0 :
																		$output .= '<div class="kundli_vedic_group">';
																						$output .= $this->vedicastro_form_field($data_val_val);
																		$output .= '</div>';
																	    break;
																	    case 1 :
																	    case 2 :
																	        if( $data_val_key == 1 ) :
																		    	$output .= '<div class="choose_services_row">
																								<div class="astro_col-8">
																									<div class="kundli_vedic_group">';
																										$output .= $this->vedicastro_form_field($data_val_val);				
																						$output .= '</div>
																								</div>';
																			endif;
																			if( $data_val_key == 2 ) :
																				$output .= '<div class="astro_col-4">
																								<div class="kundli_vedic_group">';
																									$output .= $this->vedicastro_form_field($data_val_val);				
																					$output .= '</div>
																							</div>
																						</div>';
																			endif;
																	    break;
																	    case 3 :
																	    	$output .= '<div class="kundli_vedic_group">';
																	    					$output .= $this->vedicastro_form_field($data_val_val);	
																			$output .=	'</div>';
																	    break;
																	    case 4 :
																			$output .= $this->vedicastro_form_field($data_val_val);
																		break;
																		case 5 :
																			$output .= $this->vedicastro_form_field($data_val_val);
																		break;
																	endswitch;
																endforeach;
														$output .= '</div>';
													endif;
													if( $data_key == 'girl-form' ) :
														$output .= '</div>';
													endif;
								    $output .= '</div>';
								endforeach;
				$output .= '</div>
					</form>';
		endif;
    	return $output;
    }

	/**
	 * Vedicastro matching button
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_matching_button(){
		$button = '';
		$button = array(
	                  array(
	                   'id'          => 'north-indian-submit',
	                   'name'        => 'north-indian-submit',
	                   'type'        => 'anchor',
	                   'input-class' => 'fs-16 lh-24 fw-400 active matching-button vedicastro_button ',
	                   'data-id'     => 'north-indian',
	                   'value'       => __( 'Get North Indian Matching', 'vedicastro' ),
	                   ),
	                   array(
	                   'id'          => 'south-indian-submit',
	                   'name'        => 'south-indian-submit',
	                   'type'        => 'anchor',
	                   'input-class' => 'fs-16 lh-24 fw-400 matching-button vedicastro_button',
	                   'data-id'     => 'south-indian',
	                   'value'       => __( 'Get South Indian matching', 'vedicastro' ),
	                   )
				  );
		return $button;
	}

	/**
	 * Vedicastro matching button wrapper
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_matching_buttion_wrapper(){
		$output = '';
		$data = $this->vedicastro_matching_button();
		if( !empty( $data ) ) :
		    $output .= '<div class="indian_maching_data">
							<div class="choose_services_row">';
							    foreach( $data as $data_key => $data_val ) :
									$output .= '<div class="astro_col-6">
													<div class="indian_maching vedicastro_tab_button  mlr-15">';
														$output .= $this->vedicastro_form_field($data_val);
										 $output .= '</div>
												</div>';
								endforeach;
			     $output .= '</div>
						</div>';
		endif;
		return $output;
	}

	 /**
	 * Vedicastro matching shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_matching_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-matching',
                'form-id'   => 'form-matching',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="choose_services p-15 kundli_sec matching_sec" id="service-matching">
						<div class="astro_container">
							<div class="choose_services_box bdr-gray maching_vedic">
								<div class="astro_box prl-40">
									<div class="choose_services_box_content">
										<div class="choose_services_title">
											<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
					                           <span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'matching', 'vedicastro' ) . '</span>
					                       	 </h2>
										</div>
										<div class="astro_box_vedic_kundli">
											<div class="choose_services_row ">
												<div class="astro_col-12">
													<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue maching_data_vedic">
																<div class="kundli_vedic_form maching_data_form">';
																	$output .= $this->vedicastro_matching_form($args);
													$output .= '</div>';
														$output .= $this->vedicastro_matching_buttion_wrapper();
										$output .= '</div>
												</div>
											</div>
											<div class="maching_main_tab_all_chart display_block" id="maching-results">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>';
		return $output;
	}	

	/**
	 * Vedicastro panchang shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_panchang_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-panchang',
                'form-id'   => 'form-panchang',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output = '<section class="choose_services p-15 kundli_sec" id="service-panchang">
					<div class="astro_container">
						<div class="choose_services_box bdr-gray">
							<div class="astro_box prl-40">
								<div class="choose_services_box_content">
									<div class="choose_services_title">
										<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
			                           <span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'Panchang', 'vedicastro' ) . '</span>
			                       	 </h2>
									</div>
									<div class="astro_box_vedic_kundli">
										<div class="choose_services_row">
											<div class="astro_col-5">
												<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue panchang_vedic">
													<div class="kundli_vedic_form">';
														$output .= $this->vedicastro_panchang_form($args);
										$output .= '</div>
												</div>
											</div>
										</div>
										<div class="aquarius_sign" id="vedicastro-panchang">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>';
		return $output;
	}
	
    /**
	 * Vedicastro panchang moon field data
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_panchang_moon_field_data(){
		$output = '';
		$output = array(
    		      'options' => array(
                                   array(
                                   'id'          => 'panchang-moon-date',
                                   'name'        => 'panchang-moon-date',
                                   'type'        => 'month',
                                   'title'       => __( 'Month', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Month', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'panchang-moon-location',
                                   'name'        => 'panchang-moon-location',
                                   'type'        => 'text',
                                   'title'       => __( 'location', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'location', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check location',
                                   ),
                                   array(
                                   'id'          => 'panchang-moon-submit',
                                   'name'        => 'panchang-moon-submit',
                                   'type'        => 'submit',
                                   'input-class' => 'get_submit vedicastro_button',
                                   'value'       => __( 'Get Moon Calendar', 'vedicastro' ),
                                   ),
    		                   ),
    			  );
		return $output;
	}
    
	/**
	 * Vedicastro panchang moon form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_panchang_moon_form($args){
    	$output = '';
    	$data = $this->vedicastro_panchang_moon_field_data();
    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
					<div class="kundli_vedic_login_form">';
						if( !empty( $data['options'] ) ) :
							foreach($data['options'] as $key => $val ) :
								switch($key) :
									case 0:
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 1:
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 2:
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
								endswitch;
							endforeach;
						endif;
			$output .= '</div>
				</form>';
    	return $output;
    }

	/**
	 * Vedicastro panchang moon calendar shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_panchang_moon_calendar_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-panchang-moon',
                'form-id'   => 'form-panchang-moon',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="choose_services p-15 panchang__moon_sec" id="panchang-moon">
					<div class="astro_container">
						<div class="choose_services_box bdr-gray panchang__moon_calendar">
							<div class="astro_box prl-40">
								<div class="choose_services_box_content">
									<div class="choose_services_title">
									    <h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
			                           <span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'Panchang - Moon Calendar', 'vedicastro' ) . '</span>
			                       	 </h2>
									</div>
									<div class="astro_box_vedic_kundli panchang__moon_calendar_vedic">
										<div class="choose_services_row">
											<div class="astro_col-5">
												<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue panchang__moon_calendar_vedic_data">
													<div class="kundli_vedic_form">';
												 		$output .= $this->vedicastro_panchang_moon_form($args);
									    $output .= '</div>
												</div>
											</div>
										</div>
										<div class="aquarius_sign" id="panchang-moon-data">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>';
		return $output;
	}
    
    /**
	 * Vedicastro retro form field data
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_retro_form_field_data(){
		$output = '';
		$output = array(
    		      'options' => array(
                                   array(
                                   'id'          => 'retro-year',
                                   'name'        => 'retro-year',
                                   'type'        => 'text',
                                   'title'       => __( 'Year', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Year', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'retro-submit',
                                   'name'        => 'retro-submit',
                                   'type'        => 'submit',
                                   'input-class' => 'get_submit vedicastro_button',
                                   'value'       => __( 'Get RetroGrade Data', 'vedicastro' ),
                                   ),
    		                   ),
    			  );
		return $output;
	}

	/**
	 * Vedicastro panchang form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_retro_form($args){
    	$output = '';
    	$data = $this->vedicastro_retro_form_field_data();
    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
					<div class="kundli_vedic_login_form">';
						if( !empty( $data['options'] ) ) :
							foreach($data['options'] as $key => $val ) :
								switch($key) :
									case 0:
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 1 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
								endswitch;
							endforeach;
						endif;
			$output .= '</div>
				</form>';
    	return $output;
    }

	 /**
	 * Vedicastro retro shortcode
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_retro_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-retro',
                'form-id'   => 'form-retro',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="choose_services p-15 retro_sec" id="service-retro">
						<div class="astro_container">
							<div class="choose_services_box bdr-gray retro_main">
								<div class="astro_box prl-40">
									<div class="choose_services_box_content retro_content">
										<div class="choose_services_title">
											<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
											<span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'Retro', 'vedicastro' ) . '</span>
				                       	 </h2>
										</div>
										<div class="astro_box_vedic_kundli retro_vedic">
											<div class="choose_services_row">
												<div class="astro_col-5">
													<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue retro_vedic_data">
														<div class="kundli_vedic_form">';
															$output .= $this->vedicastro_retro_form($args);				
											$output .= '</div>
													</div>
												</div>
											</div>
											<div class="retro_planites" id="retro-planites">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>';
		return $output;
	}

	/**
	 * Vedicastro numberology form field data
	 *
	 * @since    1.0.0
	 */
	public function vedicastro_numberology_form_field_data(){
		$output = '';
		$output = array(
    		      'options' => array(
                                   array(
                                   'id'          => 'numberology-name',
                                   'name'        => 'numberology-name',
                                   'type'        => 'text',
                                   'title'       => __( 'Name', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Name', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'numberology-date',
                                   'name'        => 'numberology-date',
                                   'type'        => 'date',
                                   'title'       => __( 'Date', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Date', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'numberology-time',
                                   'name'        => 'numberology-time',
                                   'type'        => 'time',
                                   'title'       => __( 'Time', 'vedicastro' ),
                                   'label-class' => 'fs-16 lh-24',
                                   'placeholder' => __( 'Time', 'vedicastro' ),
                                   'input-class' => 'fs-16 lh-24 check',
                                   ),
                                   array(
                                   'id'          => 'numberology-submit',
                                   'name'        => 'numberology-submit',
                                   'type'        => 'submit',
                                   'input-class' => 'get_submit vedicastro_button',
                                   'value'       => __( 'Get Numerology Report', 'vedicastro' ),
                                   ),
    		                   ),
    			  );
		return $output;
	}

	/**
	 * Vedicastro numberology form
	 *
	 * @since    1.0.0
	 */
    public function vedicastro_numberology_form($args){
    	$output = '';
    	$data = $this->vedicastro_numberology_form_field_data();
    	$output .= '<form method="' . esc_attr( $args['method'] ) . '" name="' . esc_attr( $args['form-name'] ) . '" id="' . esc_attr( $args['form-id'] ) . '">
					<div class="kundli_vedic_login_form">';
						if( !empty( $data['options'] ) ) :
							foreach($data['options'] as $key => $val ) :
								switch($key) :
									case 0:
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
									case 1:
									case 2:
										if($key == 1) :
											$output .= '<div class="choose_services_row">';
											$output .= '<div class="astro_col-8">
															<div class="kundli_vedic_group">';
																$output .= $this->vedicastro_form_field($val);
											     $output .= '</div>
														</div>';
										endif;
										if($key == 2) :
											$output .= '<div class="astro_col-4">
															<div class="kundli_vedic_group">';
															$output .= $this->vedicastro_form_field($val);
												$output .= '</div>
														</div>';
										endif;
										if($key == 2) :
											$output .= '</div>';
										endif; 
									break;
									case 3 :
										$output .= '<div class="kundli_vedic_group">';
										$output .= $this->vedicastro_form_field($val);
										$output .= '</div>';
									break;
								endswitch;
							endforeach;
						endif;
			$output .= '</div>
				</form>';
    	return $output;
    }

     /**
	  * Vedicastro numberology shortcode
	  *
	  * @since    1.0.0
	  */
	public function vedicastro_numberology_shortcode(){
		$output = '';
		$args = array(
                'method'    => 'post',
                'form-name' => 'form-numberology',
                'form-id'   => 'form-numberology',
		        );
		$previous_page_url = $this->vedicastro_get_previous_page_url();
		$output .= '<section class="choose_services p-15 numerology_sec" id="service-numerology">
						<div class="astro_container">
							<div class="choose_services_box bdr-gray numerology_main">
								<div class="astro_box prl-40">
									<div class="choose_services_box_content numerology_content">
										<div class="choose_services_title">
											<h2 class="fs-40 lh-48 clr-black1 fw-700 m_0">
											<span><a href="' . esc_url( $previous_page_url ) . '"><img src="' . esc_url( VEDICASTRO_URL . 'public/images/icon/arrow_left.png' ) . '" class="img_fluid"></a></span>	<span>' . __( 'Numerology', 'vedicastro' ) . '</span>
				                       	 </h2>
										</div>
										<div class="astro_box_vedic_kundli numerology_vedic">
											<div class="choose_services_row">
												<div class="astro_col-5">
													<div class="kundli_vedic mlr-15 bdr-sky-blue bg-sky-blue">
														<div class="kundli_vedic_form Numerology_vedic_form">';
															$output .= $this->vedicastro_numberology_form($args);			
											$output .= '</div>
													</div>
												</div>
												<div class="astro_col-5" id="personal-day-number">
												</div>
											</div>
											<div class="Numerology_count_number" id="numerology-data">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>';
		return $output;
	}
}
?>