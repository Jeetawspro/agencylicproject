<span class="spinner"></span> <button type="button" id="sync_manual" class="button save_order" href='#'>Sync Tracking Now</button>

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
                    location.reload();  //Reload the page if response received
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
</script>
