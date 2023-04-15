<br class="clear" />
<div class="address">
    <b>Shipping Provider:</b> <?php echo $bt_shipping_provider; ?>
</div>
<div class="edit_address">
	<?php
        $all_providers = BT_SHIPPING_PROVIDERS_WITH_NONE;
        $enabled_shipping_providers = carbon_get_theme_option( 'bt_sst_enabled_shipping_providers' );
        foreach ($all_providers as $key => $value) {
            if(!is_array($enabled_shipping_providers) || !in_array($key,$enabled_shipping_providers)){
                if($key=='none') continue;
                unset($all_providers[$key]);
            }
        }

        woocommerce_wp_select([
            'id'       => '_bt_shipping_provider',
            'label'    => __( 'Shipping Provider: ', 'woocommerce' ),
            'selected' => true,
            'value'    => $bt_shipping_provider,
            'options' => $all_providers
        ]);

	?>
</div>
<br class="clear" />
