<div class="cawp-settings">
<h1>Horoscope Widget Short Code Settings</h1>
<?php if(isset($_POST['success'])){ echo '<div class="succ_msg" id="succ_msg"><div class="wtn-closebtn"><a href="javascript:onclick=close_succ();">×</a></div><b>Settings Updated Successfully</b></div>';}?>
<h2>Usage &amp; Settings</h2>
<p>To display the horoscope widget in a page or post, add this shortcode to the content area: <strong><code>[ca-horoscope]</code></strong></p>
<p>To activate free horoscope widget on your website sidebar please go to plugins section then select CA-Horoscope and drag it to a sidebar. </p>
<form method="POST" name="cawidsettings" id="cawidsettings">
<div style="width:50%">
<label for="apikey">Enter your API Key : </label>
<input class="widefat"  type="text" name="apikey" id="apikey" value="<?php echo $apikey; ?>" required>
<p>
<label for="horobg_color" style="display:block;">Select Widget Background Color</label> 
<input class="widefat color-picker wp-color-result" id="horobg_color" name="horobg_color" type="text" value="<?php echo $horobg_color;?>" />
</p>
<p><label for="ca-width">Widget Width : </label> 
<input type="radio" name="ca-horowidth" value="0" onclick="hidewidth();" <?php if($cahorowidth=='') { echo "checked='checked'";} ?> /> Auto 
<input type="radio" name="ca-horowidth" value="1" onclick="showwidth();" <?php if($cahorowidth!='') { echo "checked='checked'";} ?> /> Custom
</p>
<div id="ca-widdiv" class="widdivhide">
<hr><p>Enter width in px ( Pixels )</p>
<input type="number" class="" id="cahorowidth" name="cahorowidth" oninput value="<?php echo $cahorowidth;?>"><span id="errorMsg" style="display:none;"> Please enter width between 300 and 800</span>
<hr>
</div>
<p>
<input class="checkbox" type="checkbox" id="display_link" value="On" name="display_link" value="On" onchange="cabacklinkval('display_link')" <?php if ($display_link == "On" || $display_link == '') { echo "checked='checked'"; } ?> >
<label for="" title="Show powered by clickastro.com">Show powered by clickastro.com</label>
<div class="capowered">If the link is Enabled, you'll receive <b>50%</b> revenue share of every reports purchased.<br> <span style="font-size:11px">*All revenue shares are excluding GST</span></div>
</p>
<input type="submit" value="Save Changes" class="button button-primary button-large" >
<input type="hidden" name="success" value="<?php echo rand(0,100);?>">
</div>
</form>
<p>
<a href="https://www.clickastro.com/widget/signup" target="_blank">Get API Key</a> | Version:<?php echo CAHAP_VERSION; ?>
</p>
</div>
<script type="text/javascript">
function hidewidth(){
  document.getElementById('ca-widdiv').style.display ='none';
  document.cawidsettings.cahorowidth.value='';
}
function showwidth(){
  document.getElementById('ca-widdiv').style.display = 'block';
}
function close_succ()
{
    document.getElementById("succ_msg").style.display = "none";
}
jQuery(document).ready(function($) 
{ 
jQuery('#horobg_color').on('focus', function(){
var parent = jQuery(this).parent();
jQuery(this).wpColorPicker()
parent.find('.wp-color-result').click();
}); 
jQuery('#horobg_color').wpColorPicker()
}); 
jQuery( "#cahorowidth" ).keyup(function() {
  if(jQuery('#cahorowidth').val()<300 || jQuery('#cahorowidth').val()>800 ){
    jQuery('#errorMsg').show();
  }
  else{
    jQuery('#errorMsg').hide();
  }
  });
  function cabacklinkval(caclickedid) { 
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
</script>
<style>
.widdivhide {
  display: none;
}
.succ_msg{    background-color: #6ABD6E; padding:10px; width:50%;color:#fff;transition: 0.3s;
}.wtn-closebtn a {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    cursor: pointer;
    transition: 0.3s;
    text-decoration:none;
}
.cawp-settings h1{ font-size:18px;}
.cawp-settings .widefat {
    border-spacing: 0;
    width: 100%;
    clear: both;
    margin: 0;
    font-size:14px;
    
}
.cawp-settings label {
    cursor:none;
    padding:5px 0px 5px 0px;
    font-size:14px;
}
.cawp-settings p{font-size: 14px;
    line-height: 1.5;
    margin: 1em 0;
}
.capowered{ clear:both;}
</style>