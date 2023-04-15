<span class="spinner"></span> 

<div class="inside">

    <?php if(!empty($bt_shipment_tracking->current_status)){ ?>  		
        <div>
            <h3><?php echo $bt_shipment_tracking->current_status; ?></h3>
            <small>via</small> <?php echo $bt_shipment_tracking->courier_name; ?>
        </div>
    <?php } ?>
    <?php if(!empty($bt_shipment_tracking->etd)){ ?>
  		<br>
        <div>
            ETD: <?php echo $bt_shipment_tracking->etd; ?>
        </div>
    <?php } ?>    

    <?php if(!empty($bt_shipping_awb_number)){ ?>
  		<br>
        <div>
            AWB# <a target="_blank" href="<?php echo $bt_shipment_tracking->get_tracking_link(); ?>"><?php echo $bt_shipping_awb_number; ?></a> <a id="add_awb_number" class="awb_number"><span class="dashicons dashicons-edit"></span></a> 
        </div>
    <?php }else{ ?>
        <br>
        <div>
            AWB# -- <a id="add_awb_number" class="awb_number"><span class="dashicons dashicons-edit"></span></a> 
        </div>
    <?php } ?>
    <?php if(!empty($bt_shipping_provider)){ ?>
  		<br>
        <div>
            Logistic Partner: <?php echo $bt_shipping_provider; ?>
        </div>
    <?php } ?>
    <a id="bt_notify_popup" style="display:none;" href="#TB_inline?&width=200&height=150&inlineId=bt_notify_popup_content" class="thickbox"></a>
    <div id="bt_notify_popup_content" style="display:none;">
    <div style="text-align:center">        
        <h2 id="bt_notify_popup_content_title">
            .. 
        </h2>
        <h4>Click OK to refresh the page.</h4>
        <button class="button button-primary align-center" onclick="location.reload()">OK</button>
    </div>
</div>
  	<br>
    <button type="button" id="sync_manual" class="button save_order" href='#'>Sync Tracking Now</button>
    <?php add_thickbox(); ?>
    <script>
        jQuery('#sync_manual').click(function () {
            jQuery('#sync_manual').addClass("disabled");
            jQuery('#bt_sync-box .spinner').addClass("is-active");

            jQuery.ajax({
                method: "POST",
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                dataType: "json",
                data: {
                    'order_id': '<?php echo $_GET['post']; ?>',
                    'action': 'force_sync_tracking'
                }, success: function (response) {
                 
                    jQuery('#sync_manual').removeClass("disabled");
                    jQuery('#bt_sync-box .spinner').removeClass("is-active");
                    if (response != null && response.status !=false) {
                        //location.reload();  //Reload the page if response received
                        bt_st_show_info("Tracking Synced.");
                    } else {
                        alert(response.response);
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {
                    jQuery('#sync_manual').removeClass("disabled");
                    jQuery('#bt_sync-box .spinner').removeClass("is-active");
                    alert('Something went wrong! Error: ' + errorThrown);
                    return false;
                }
            });
        });

        jQuery('#add_awb_number').click(function () {
            var current_awb = '<?php echo $bt_shipping_awb_number; ?>';
            var shipment_provider = '<?php echo $bt_shipping_provider; ?>';

            var awb_number = prompt("Enter new awb number of " + shipment_provider,current_awb);
            awb_number = awb_number.trim();

            if(awb_number==""){
                return;
            }            
            if(awb_number===current_awb){               
                return;
            } 
          

            jQuery('#add_awb_number').addClass("disabled");
            jQuery('#bt_sync-box .spinner').addClass("is-active");

            jQuery.ajax({
                method: "POST",
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                dataType: "json",
                data: {
                    'order_id': '<?php echo $_GET['post']; ?>',
                    'awb_number': awb_number,
                    'action': 'save_order_awb_number'
                }, success: function (response) {
                    jQuery('#add_awb_number').removeClass("disabled");
                    jQuery('#bt_sync-box .spinner').removeClass("is-active");
                    if (response != null && response.status !=false) {
                        bt_st_show_info("AWB updated & Tracking Synced.");
                    } else {
                        alert(response.response);
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {
                    jQuery('#add_awb_number').removeClass("disabled");
                    jQuery('#bt_sync-box .spinner').removeClass("is-active");
                    alert('Something went wrong! Error: ' + errorThrown);
                    return false;
                }
            });
        });

        function bt_st_show_info(info_text){
            //jQuery('#bt_notify_popup').attr("href","#TB_inline?&width=200&height=150&inlineId=bt_notify_popup_content");
            jQuery('#bt_notify_popup_content_title').text(info_text);
            jQuery('#bt_notify_popup').trigger("click");
        }

    </script>
</div>