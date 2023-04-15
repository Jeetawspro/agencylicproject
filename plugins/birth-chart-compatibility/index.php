<?php 
/*
Plugin Name: Birth Chart Compatibility 
Plugin URI: https://birthchartcompatibility.com
Description: Add the <a href="https://birthchartcompatibility.com" target="_blank">birth chart compatibility</a> plugin to your site's widgets, posts and pages for your readers. Select you and your partners star signs and read your <a href="https://birthchartcompatibility.com" target="_blank">star signs compatibility</a>.

Version: 2.0
Tested up to: 6.0.0
Author: Birth Chart Compatibility 
Author URI: https://BirthChartCompatibility.com
License: GPLv2 
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 
Birth Chart Compatibility is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Birth Chart Compatibility is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details. 

*/

class BirthChartCompatibility_Widget extends WP_Widget {
     
    function __construct() {
    	parent::__construct(
         
	        // base ID of the widget
	        'BirthChartCompatibility_Widget',
	         
	        // name of the widget
	        __('Birth Chart Compatibility Widget', 'BirthChartCompatibility' ),
	         
	        // widget options
	        array (
	            'description' => __( 'Widget to display star sign horoscope compatibility.', 'BirthChartCompatibility' )
	        )
	         
	    );
    }
     
    function form( $instance ) {
    }
     
    function update( $new_instance, $old_instance ) {       
    }
     
    function widget( $args, $instance ) {

    	wp_enqueue_script( 'birthchartcompatibility-script', plugins_url('bcc-script.js',__FILE__), array('jquery'));

    	wp_enqueue_style( 'birthchartcompatibility-style', plugins_url('bcc-style.css',__FILE__));

        $data = array(
            'base_url'            => plugin_dir_url( __FILE__ )
        );

       
        echo '

        <aside class="widget" id="bcc">

        	<div id="bcc-panel">

              <a style="color:black; text-decoration:none" href="https://birthchartcompatibility.com" target="_blank"><h3 class="bcc-heading">Zodiac Signs Compatibility</h3></a>
             
            	<select class="bcc-star1">
	                <option value="00" disabled selected>Select First Star Sign</option>
                    <option value="01">Aries       [March 21st - April 19th]</option>
                    <option value="02">Taurus      [April 20th - May   20th]</option>
                    <option value="03">Gemini      [May   21st - June  20th]</option>
                    <option value="04">Cancer      [June  21st - July  22nd]</option>
                    <option value="05">Leo         [July  23rd - Aug   22nd]</option>
                    <option value="06">Virgo       [Aug   23rd - Sept  22nd]</option>
                    <option value="07">Libra       [Sept  23rd - Oct   22nd]</option>
                    <option value="08">Scorpio     [Oct   23rd - Nov   21st]</option>
                    <option value="09">Sagittarius [Nov   22nd - Dec   21st]</option>
                    <option value="10">Capricorn   [Dec   22nd - Jan   19th]</option>
                    <option value="11">Aquarius    [Jan   20th - Feb   18th]</option>
                    <option value="12">Pisces      [Feb   19th - March 20th]</option>
	            </select>
                
                <select class="bcc-star2">
                    <option value="00" disabled selected>Select Second Star Sign</option>
                    <option value="01">Aries       [March 21st - April 19th]</option>
                    <option value="02">Taurus      [April 20th - May   20th]</option>
                    <option value="03">Gemini      [May   21st - June  20th]</option>
                    <option value="04">Cancer      [June  21st - July  22nd]</option>
                    <option value="05">Leo         [July  23rd - Aug   22nd]</option>
                    <option value="06">Virgo       [Aug   23rd - Sept  22nd]</option>
                    <option value="07">Libra       [Sept  23rd - Oct   22nd]</option>
                    <option value="08">Scorpio     [Oct   23rd - Nov   21st]</option>
                    <option value="09">Sagittarius [Nov   22nd - Dec   21st]</option>
                    <option value="10">Capricorn   [Dec   22nd - Jan   19th]</option>
                    <option value="11">Aquarius    [Jan   20th - Feb   18th]</option>
                    <option value="12">Pisces      [Feb   19th - March 20th]</option>
                </select>

                <p class="bcc-starMsg"></p>

           	</div> 

         </aside>

        ';

    }
     
}

function birthchartcompatibility_widget() {
 
    register_widget( 'birthchartcompatibility_widget' );
 
}

add_action( 'widgets_init', 'birthchartcompatibility_widget' );


function birthchartcompatibility_widget_shortcode($atts) {
    
    global $wp_widget_factory;
    
    // extract(shortcode_atts(array(
    //     'widget_name' => FALSE
    // ), $atts));
    
    $widget_name = 'birthchartcompatibility_widget';
    // $widget_name = wp_specialchars($widget_name);
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;
    
    ob_start();
    the_widget($widget_name, array(), array('widget_id'=>'arbitrary-instance-bcc_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('birth_chart_compatibility','birthchartcompatibility_widget_shortcode'); 
?>