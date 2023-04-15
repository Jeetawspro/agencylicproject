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
	$(document).ready( function(){

	    /**
		 * Vedicastro tab
		 */
		$('.vedicastro-setting-list ul.tabs li').click(function(){
			var tab_id = $(this).attr('data-tab');
			$('.vedicastro-setting-list ul.tabs li').removeClass('current');
			$('.vedicastro-setting-list .tab-content').removeClass('current');

			$(this).addClass('current');
			$(".vedicastro-setting-list #"+tab_id).addClass('current');
		});
        
        /**
         *  Vedicastro button for saving data
         */
		$('.vedicastro_from_submit_btn').on('click', function(){
			jQuery('.LoderImg').show();
			var form_id = $(this).closest('form').attr('id');
		    switch(form_id){
		    	case 'vedicastro-setting':
		    		var vedicastro_formdata = jQuery("#vedicastro-setting").serialize();
		    	break;
		    }
		    $.ajax({
	    		url: vedicastro_admin_ajax_object.ajax_url,
	    		type: 'post',
	    		data: {
	    			action 	: 'vedicastro_form_data_ajax',
	    			formdata: vedicastro_formdata
	    		},
	    		success: function(res) {
					jQuery('.LoderImg').hide();
					var obj = JSON.parse(res);
					$('#'+obj.form+'-message-success').remove();
					if(obj.form == 'vedicastro-setting'){
						if(obj.status==1){
							$('div[data-tab="'+obj.form+'"] > form').after('<div id="'+obj.form+'-message-success" class="'+obj.form+'-message-success">Your data has been successfully saved.</div>');
							if(obj.api_status == 'connected'){
								jQuery('.status.neutral').removeClass('neutral').addClass('positive').text('Connected');
								jQuery('.tab-link.vedicastro-hide').removeClass('vedicastro-hide').addClass('vedicastro-show');
							}
							setTimeout(function() { 
		            			$('#'+obj.form+'-message-success').remove(); 
		        			}, 3000);
						}else{
							$('div[data-tab="'+obj.form+'"] > form').after('<div id="'+obj.form+'-message-success" class="'+obj.form+'-message-success">Your data has been successfully saved.</div>');
							jQuery('.status.positive').removeClass('positive').addClass('neutral').text('Not Connected');
							jQuery('.tab-link.vedicastro-show').removeClass('vedicastro-show').addClass('vedicastro-hide');
						}
					}
	    		}
			});
		});
	});
})( jQuery );
