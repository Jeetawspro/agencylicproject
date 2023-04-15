(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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
	$(document).ready(function(){
		$('#btn-bt-sync-now-shyplite').click(function(e){
			e.preventDefault(); 
			if(!confirm('Are you sure?')) return;
			$('#btn-bt-sync-now-shyplite').text('processing...');	
			$('#btn-bt-sync-now-shyplite').prop('disabled',true);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : '/wp-admin/admin-ajax.php',
				data : {action: "sync_now_shyplite"},
				success: function(response) {
					
				   if(response.status == true) {
					alert("Tracking of " + response.orders_count + " Orders Synced from Shyplite.");
				   }
				   else {
					  alert("An error happened, please try again.");
				   }
				},
				complete: function(){
					$('#btn-bt-sync-now-shyplite').text('Sync Now');	
					$('#btn-bt-sync-now-shyplite').prop('disabled',false);
				}
			 }) 
	 	});
	});	

	$(document).ready(function() {
		var review_text=`
				If you find this 100% free plugin useful, please spare a minute to leave a 5 star review on wordpress. 
				<br>
				<a target="_blank" href="https://wordpress.org/support/plugin/shipment-tracker-for-woocommerce/reviews/#new-post">Rate This Plugin (Shipment Tracker)</a>
				<br><br>
				Found an bug/vulnerability please report to <a  target="_blank" href="https://wordpress.org/support/plugin/shipment-tracker-for-woocommerce/">plugin support</a>.
				<br><br>
				For any suggestions/feedback please <a  target="_blank" href="https://bitss.tech/">contact us</a>.
				<br><br>
				Other services we provide:
				<ol>
					<li>
						Developer Friendly enterprise hosting with automatic horizontal & vertical scaling for very busy websites.
						<a target="_blank" href="https://bitss.cloud/">
							See Details
						</a>
					</li>
					<li>
					Effortlessly create website/webstore without doing any dirty work! Fully managed & cost effective, automatic website creator.
						<a target="_blank" href="https://orderpal.in">
						See Details
						</a>
					</li>
					<li>
						Managed low cost hosting for low to medium traffic websites.
						<a target="_blank" href="https://bitss.tech/">
						See Details
						</a>
					</li>
					<li>
						Reliable & Genuine Transactional & OTP SMS APIs
						<a target="_blank" href="https://seriousmarketing.in/">
						See Details	
						</a>
					</li>
					<li>
						Turn your website into a secure windows/android app
						<a target="_blank" href="https://websitekiosker.com/">
						See Details	
						</a>
					</li>
					<li>
						Custom wordpress development/customization services.
						<a target="_blank" href="https://bitss.tech/">
						See Details	
						</a>
					</li>
				</ol>
		`;
		$('.settings_page_crb_carbon_fields_container_shipment_tracking #postbox-container-1').append(review_text);
	});
	

})( jQuery );
