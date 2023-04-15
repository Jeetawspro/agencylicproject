<?php
/*
Plugin Name: Horoscope and Astrology
Plugin URI: https://www.clickastro.com/widget/free-horoscope
Description: Horoscope and Astrology is the first vedic astrology plugin that lets you generate horoscope reports based on the birth details.
Author: Clickastro
Version: 1.2
Author URI: https://www.clickastro.com
*/
define('CAHAP_VERSION', '1.2');
define('CAHAP_URL', plugin_dir_url( __FILE__ ));
define('CAHAP_API_JS', 'https://widgets.clickastro.com/wp'); /*CDN JS path js validation and submit*/
define('CAHAP_API_URL', 'https://api.clickastro.com/wp-widget'); /*API to Check User*/
// Include the required scripts & styles
function cahap_public_scripts(){
   wp_enqueue_style( 'horoscope-style', CAHAP_URL . 'public/css/style.css?ver=1.0' );
}
add_action('wp_enqueue_scripts', 'cahap_public_scripts');

function cahap_enqueue_color_picker() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');
   
}
add_action( 'admin_enqueue_scripts', 'cahap_enqueue_color_picker' );

class cahap_horoscope_plugin extends WP_Widget {
	// constructors
  function cahap_horoscope_plugin() {
	        parent::WP_Widget(false, $name = __('CA-Horoscope Widget', 'wp_widget_plugin') );
  }
// widget form creation
function form($instance) {
// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $apikey = $instance['apikey'];
     $display_link = $instance['display_link'];
     $horobg_color= isset($instance['horobg_color']) ? esc_attr($instance['horobg_color']) : "#dd3333";
} 
else {
     $title = '';
     $apikey = '';
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title (Optional)', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('apikey'); ?>"><?php _e('API KEY:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('apikey'); ?>" name="<?php echo $this->get_field_name('apikey'); ?>" value ="<?php echo $apikey; ?>" ></input>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'horobg_color' ); ?>" style="display:block;"><?php _e( 'Change Widget Color', 'horoscope-widget' ); ?></label> 
<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'horobg_color' ); ?>" name="<?php echo $this->get_field_name( 'horobg_color' ); ?>" type="text" value="<?php echo esc_attr( $horobg_color ); ?>" />
</p>
<p>
<input class="checkbox" type="checkbox" value="On" onchange="cabacklinkval1('<?php echo $this->get_field_id('display_link');?>')" id="<?php echo $this->get_field_id( 'display_link' ); ?>" name="<?php echo $this->get_field_name('display_link'); ?>" 
<?php if ($display_link == On || $display_link == '') { echo "checked='checked'"; } ?> >
<label for="<?php echo $this->get_field_id('display_link'); ?>" title="Show powered by clickastro.com">Show powered by clickastro.com</label>
<div class="capowered">If the backlink is enabled, you'll receive <b>50%</b> revenue share of every reports purchased.<br> <span style="font-size:11px">*All revenue shares are excluding GST</span></div>
</p>
<p>
<a href="https://www.clickastro.com/widget/signup" target="_blank">Get API Key</a> | Version:<?php echo CAHAP_VERSION; ?>
</p>
<script type="text/javascript">
 function cabacklinkval1(caclickedid) { 
    if (document.getElementById(caclickedid).checked == true) {
        return false;
      }
      else
    var box= confirm("If back link Disabled, you'll receive only 25% revenue share. \nAre you sure you want to do this?");
        if (box==true)
        {
            document.getElementById(caclickedid).value="Off";
            return true;
        }
        else
           document.getElementById(caclickedid).checked = true;  
    }
jQuery(document).ready(function($) 
{ 
jQuery('#<?php echo $this->get_field_id( 'horobg_color' ); ?>').on('focus', function(){
var parent = jQuery(this).parent();
jQuery(this).wpColorPicker()
parent.find('.wp-color-result').click();
}); 
jQuery('#<?php echo $this->get_field_id( 'horobg_color' ); ?>').wpColorPicker()
}); 
</script>
<?php
}
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['apikey'] = strip_tags($new_instance['apikey']);
      $instance['horobg_color'] = strip_tags($new_instance['horobg_color']);
      $instance['display_link'] = isset( $new_instance['display_link'] ) ? $new_instance['display_link'] : Off;
      return $instance;
}
   // display widget
function widget($args, $instance) {
   extract( $args );   
   // these are the widget options
   $title = $instance['title'];
   $apikey = $instance['apikey'];
   $display_link = isset( $instance['display_link'] ) ? $instance['display_link'] : false;
   $horobg_color          = isset($instance['horobg_color']) ? $instance['horobg_color'] : "#dd3333";
   echo $before_widget;
   if(empty($title)){
            $title = '';
        }
        else{
            $title = $instance['title'];
        }
        echo '<div class="horowid_title">'.$title.'</div>';
// Include the required scripts & styles
wp_enqueue_script('astrology-widget-js', CAHAP_API_JS . '/astrology_widget_js.js?ver=1.0');
if($horobg_color != ''){ 
$inline_style = ' style="background:' . $horobg_color  . '"'; 
?>
<style>
.astrowidget-wrapper .ampmtab:checked+label { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .gendertab:checked+label  { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .horobutton { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .horobutton:hover {
background: <?php echo $horobg_color;?>;
}
</style>
<?php
}
if(!empty($apikey)){
$refdomain=$_SERVER['HTTP_HOST']; 
$response = wp_remote_get(CAHAP_API_URL.'?apikey='.$apikey.'&display_link='.$display_link.'&referrer='.$refdomain);
if ( is_array( $response ) ) {
$header = $response['headers']; // array of http header lines
$body = $response['body']; // use the content
}
$horo_resp_data = json_decode($body,true);
$ca_msg = $horo_resp_data['message'];
$client_id = $horo_resp_data['clientid'];
$backlink_text = $horo_resp_data['backlink_text'];
$backlink = $horo_resp_data['backlink'];
echo "<script>jQuery('#apikey').val('$apikey');</script>"; 
echo "<script>jQuery('#clientid').val('$client_id');</script>";
}
?>
<?php if(empty($apikey)){
echo '<div class="horo-widget-error" id="horo-widget-error"></div>';
echo '<script>jQuery("#horo-widget-error").show();</script>'; 
echo '<script>jQuery("#frmplaceorder").remove();</script>'; 
echo '<script>document.getElementById("horo-widget-error").innerHTML = "Horoscope widget requires an API key to generate free horoscope. Get your <a href=\"https://www.clickastro.com/widget/signup\">API Key</a>";</script>';  
} 
else if($horo_resp_data['status']==2){
echo '<div class="horo-widget-error" id="horo-widget-error">Error in fetching API</div><br>'; 
echo '<script>jQuery("#frmplaceorder").remove();</script>';  
}
else if($horo_resp_data['status']==3){
echo '<div class="horo-widget-error" id="horo-widget-error"></div>';    
echo '<script>jQuery("#horo-widget-error").show();</script>'; 
echo '<script>document.getElementById("horo-widget-error").innerHTML = "Your domain is not authorised to access this widget";</script>';
echo '<script>jQuery("#frmplaceorder").remove();</script>';   
}
else if($horo_resp_data['status']==1) {
include_once( dirname(__FILE__) . '/ca-page-form.php');
 }
 else { echo '<div class="horo-widget-error" id="horo-widget-error">Error in fetching API</div><br>';  }
echo $after_widget;
}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("cahap_horoscope_plugin");')); 
//add shortcode
add_shortcode( 'ca-horoscope', 'cahoro_shortcode_widget' ); //page form widget
function cahoro_shortcode_widget() {
$arrval = get_option('widget_cahap_horoscope_plugin');
$apikey = $arrval[2]['apikey'];
$display_link = $arrval[2]['display_link'];   
$cahorowidth = $arrval[2]['cahoro_width'];
$horobg_color = $arrval[2]['horobg_color'];
$refdomain=$_SERVER['HTTP_HOST'];     
$cahoro_get_remote_arr= cahoroget_remote($apikey,$refdomain,$display_link);
$client_id=$cahoro_get_remote_arr['clientid'];
$backlink_text=$cahoro_get_remote_arr['backlink_text'];
$backlink=$cahoro_get_remote_arr['backlink'];
$status=$cahoro_get_remote_arr['status'];
if($horobg_color != ''){ 
$inline_style = ' style="background:' . $horobg_color  . '"'; 
?>
<style>
.astrowidget-wrapper .ampmtab:checked+label { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .gendertab:checked+label  { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .horobutton { background: <?php echo $horobg_color;?> }
.astrowidget-wrapper .horobutton:hover {
background: <?php echo $horobg_color;?>;
}
</style>
<?php
}
wp_enqueue_script('astrology-widget-js', CAHAP_API_JS . '/astrology_widget_js.js?ver=1.0');  
// turn on output buffering to capture script output	
ob_start();
// include file (contents will get saved in output buffer)
if($status==1){
include_once( dirname(__FILE__) . '/ca-page-form.php');
}
else { echo 'Your domain is not authorised to access this widget'; }
// save and return the content that has been output 
$content = ob_get_clean();
return $content;
}
//add admin menu
add_action('admin_menu', 'cahoro_page_create');
function cahoro_page_create() {
    add_menu_page( 'CA Horoscope Admin Page', 'CA Horoscope', 'edit_posts', 'cahoro_settings_page', 'ca_horoscope_page_display', '', 99);
}
function cahoroget_remote($apikey,$refdomain){
    $response = wp_remote_get(CAHAP_API_URL.'?apikey='.$apikey.'&display_link='.$display_link.'&referrer='.$refdomain); 
    if ( is_array( $response ) ) {
    $header = $response['headers']; // array of http header lines
    $body = $response['body']; // use the content
    }
    $horo_resp_data = json_decode($body,true);
    return $horo_resp_data;
}
// in main file
function ca_horoscope_page_display() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user');
    }
    if (isset($_POST['apikey'])) {
        $my_options = get_option('widget_cahap_horoscope_plugin');
        $horobg_color = isset($_POST['horobg_color']) ? $_POST['horobg_color'] : "#dd3333";
        $display_link = isset( $_POST['display_link'] ) ? $_POST['display_link'] : Off;
        $my_options[2]['apikey'] =$_POST['apikey'];
        $my_options[2]['horobg_color'] = $horobg_color;
        $cahorowidth=$_POST['cahorowidth'];
        if( $cahorowidth >=300 && $cahorowidth <=800) { 
            $cahorowidth = $_POST['cahorowidth'];
        }
        else { $cahorowidth=''; }
        $my_options[2]['cahoro_width'] = $cahorowidth;
        $my_options[2]['display_link'] = $display_link;
        update_option('widget_cahap_horoscope_plugin', $my_options);  
    } 
    $arrval = get_option('widget_cahap_horoscope_plugin', 'apikey');
    $apikey = $arrval[2]['apikey'];
    $horobg_color=$arrval[2]['horobg_color'];
    $display_link=$arrval[2]['display_link'];
    $cahorowidth=$arrval[2]['cahoro_width'];
    include 'ca-settings-page.php';
}
?>
