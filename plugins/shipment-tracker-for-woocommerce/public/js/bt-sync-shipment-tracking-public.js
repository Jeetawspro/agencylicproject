(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 jQuery('#_bt_shipping_tracking_from').on('submit', function (e) {
        e.preventDefault();

        var _bt_track_order_id = jQuery('#_bt_track_order_id').val();
        if(_bt_track_order_id == null || _bt_track_order_id == ''){
            alert('Please provide order id!');
            return false;
        }

        jQuery.ajax({
            method: "POST",
            url: '/wp-admin/admin-ajax.php',
            dataType: "json",
            data: {
                'order_id': _bt_track_order_id,
                'bt_get_tracking_form_nonce': jQuery('input[name="bt_get_tracking_form_nonce"]').val(),
                'action': 'bt_get_tracking_data'
            }, success: function (response) {
                if (response != null && response.status !=null) {
                    if(response.status == true) {
                        jQuery('#_bt_shipping_tracking_table tbody').html('');   //hide before insert new

                        var responseTable = '<tr>';
                        responseTable += '<td>' + _bt_track_order_id + '</td>';
                        responseTable += '<td>' + response.data.order_status + '</td>';
                        if(response.has_tracking) {
                            var response_obj = response.data.obj;
                            responseTable += '<td>' + response_obj.awb + '<br/><small><a target="_blank" href="' + response.data.tracking_link + '">Track</a></small>' + '</td>';
                            responseTable += '<td>' + response_obj.current_status + '</td>';
                            responseTable += '<td>' + response_obj.courier_name + '</td>';
                            responseTable += '<td>' + response_obj.etd + '</td>';
                        } else {
                            responseTable += '<td colspan="4" style="text-align: center"><strong>' + response.message    + '</strong></td>';
                        }
                        responseTable += '</tr>';
                        jQuery('#_bt_shipping_tracking_table tbody').append(responseTable);
                        jQuery('#_bt_shipping_tracking_table').show();
                    } else {
                        alert(response.message);
                    }
                }
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert('Something went wrong! Error: ' + errorThrown);
                return false;
            }
        });
    });

})( jQuery );
