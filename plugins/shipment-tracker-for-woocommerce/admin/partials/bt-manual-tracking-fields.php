<?php
    $bt_shipment_tracking = (array)get_post_meta( $post_id, '_bt_shipment_tracking', true );
    $bt_shipping_manual_tracking_url = get_post_meta( $post_id, '_bt_shipping_manual_tracking_url', true );
?>
<p class="form-field ">
    <label for="bt_manual_courier_name">Courier Name *</label>
    <input type="text" class="short" style="" name="bt_manual_courier_name" id="bt_manual_courier_name" value="<?php echo isset($bt_shipment_tracking['courier_name']) ? $bt_shipment_tracking['courier_name'] : ''; ?>" placeholder="Enter courier company name">
</p>
<p class="form-field ">
    <label for="bt_manual_awb_number">AWB Number</label>
    <input type="text" class="short" style="" name="bt_manual_awb_number" id="bt_manual_awb_number" value="<?php echo isset($bt_shipment_tracking['awb']) ? $bt_shipment_tracking['awb'] : ''; ?>" placeholder="Enter AWB number">
</p>
<p class="form-field ">
    <?php
        woocommerce_wp_select([
            'class'             => 'select short',
            'style'             => 'width:100%;',
            'id'       => 'bt_manual_shipping_status',
            'label'    => __( 'Shipping Status ', 'woocommerce' ),
            'selected' => true,
            'value'    => isset($bt_shipment_tracking['current_status'])?$bt_shipment_tracking['current_status']:"",
            'options' => BT_SHIPPING_STATUS
        ]);

	?>
    <!-- <input type="text" class="short" style="" name="bt_manual_shipping_status" id="bt_manual_shipping_status" value="<?php //echo $bt_shipment_tracking['current_status'] ? $bt_shipment_tracking['current_status'] : ''; ?>" placeholder="Enter current shipping status"> -->
</p>
<p class="form-field ">
    <label for="bt_manual_etd">Estimated Time Of Delivery</label>
    <input type="date" class="short" style="" name="bt_manual_etd" id="bt_manual_etd" value="<?php echo isset($bt_shipment_tracking['etd']) ? $bt_shipment_tracking['etd'] : ''; ?>" placeholder="Enter expected delivery date">
</p>
<p class="form-field ">
    <label for="bt_manual_tracking_link">Tracking Link</label>
    <input type="text" class="short" style="" name="bt_manual_tracking_link" id="bt_manual_tracking_link" value="<?php echo !empty($bt_shipping_manual_tracking_url) ? $bt_shipping_manual_tracking_url : ''; ?>" placeholder="Enter order tracking Link">
</p>
<span class="spinner"></span> <button type="button" id="bt_manual_save" class="button" href='#'>Save</button>
<script>
    jQuery('#bt_manual_save').click(function () {
        var bt_manual_courier_name = jQuery('#bt_manual_courier_name').val();
        if(bt_manual_courier_name == '' ) {
            alert('Courier name is required');
            return false;
        }
        jQuery('#bt_manual_save').addClass("disabled");
        jQuery('#bt_sync-box .spinner').addClass("is-active");
        jQuery.ajax({
            method: "POST",
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            dataType: "json",
            data: {
                'order_id': '<?php echo $_GET['post']; ?>',
                'courier_name': bt_manual_courier_name,
                'awb_number':  jQuery('#bt_manual_awb_number').val(),
                'shipping_status': jQuery('#bt_manual_shipping_status').val(),
                'etd': jQuery('#bt_manual_etd').val(),
                'tracking_link': jQuery('#bt_manual_tracking_link').val(),
                'action': 'bt_tracking_manual'
            }, success: function (response) {
                jQuery('#bt_manual_save').removeClass("disabled");
                jQuery('#bt_sync-box .spinner').removeClass("is-active");
                if (response != null && response.status != false) {
                    location.reload();  //Reload the page if response received
                } else {
                    alert(response.response);
                }
            }, error: function (jqXHR, textStatus, errorThrown) {
                jQuery('#bt_manual_save').removeClass("disabled");
                jQuery('#bt_sync-box .spinner').removeClass("is-active");
                alert('Something went wrong! Error: ' + errorThrown);
                return false;
            }
        });
    });
</script>
