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
     $(document).ready(function(){

     	/**
     	 * Vedicastro service show
     	 *
     	 */
        $('.choose_services_col_box').on('click', function(){
        	$('.choose_services_col_box.active').removeClass('active');
        	$(this).addClass('active');
        });

	    /**
	     * Vedicastro zodiac sign
	     *
	     */
     	$('.vedicastro-click').on('click', function(){
     		var zodiac_sign = '';
     		var cycle = '';
     		var day = '';
     		var week = '';
     		var typee = '';
     	   	var vedicastro_click = $(this).attr('data-click');
     	   	var vedicastro_title = $(this).attr('data-title');
     	   	switch(vedicastro_click){
     	   		case 'zodic-sign':
     	   			$('.zodics_sign_tab').removeClass('active');
           			$(this).closest('.zodics_sign_tab').addClass('active');
           			zodiac_sign = $(this).attr('zodic-id');
           			cycle = $('.cycles.active > a').attr('data-prediction');
     	   		break;
     	   		case 'cycles':
     	   		    $('.cycles').removeClass('active');
     				$(this).addClass('active');
     				$('.astro_content_sub_tab_main.display_block').removeClass('display_block').addClass('display_none');
     				var get_id = $(this).attr('data_id');
     				$('div[data_content="'+get_id+'"]').removeClass('display_none').addClass('display_block');
     	   			zodiac_sign = $('.zodics_sign_tab.active > a').attr('zodic-id');
     	   			cycle = $('.vedicastro-click.active > a').attr('data-prediction');
     	   		break;
     	   		case 'days':
     	   		    $('.days').removeClass('active');
     				$(this).addClass('active');
     	   			zodiac_sign = $('.zodics_sign_tab.active > a').attr('zodic-id');
     	   			cycle = $('.cycles.active > a').attr('data-prediction');
     	   			day = vedicastro_title;
     	   		break;
     	   		case 'weekly':
     	   		    $('.weekly').removeClass('active');
     				$(this).addClass('active');
     	   			zodiac_sign = $('.zodics_sign_tab.active > a').attr('zodic-id');
     	   			cycle = $('.cycles.active > a').attr('data-prediction');
     	   			week = vedicastro_title;
     	   		break;
     	   	}
     	   	typee = vedicastro_title;
           	$.ajax({
	    		url: vedicastro_public_ajax_object.ajax_url,
	    		type: 'post',
	    		data: {
	    			action 	: 'vedicastro_prediction_ajax',
	    			zodiac  : zodiac_sign,
	    			cycle   : cycle,
	    			day   	: day,
	    			week    : week,
	    			typee   : typee,
	    		},
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
	    		success: function(res) {
                    $(".Preloader").css('display', 'none');
					var obj = JSON.parse(res);
					if(obj.status == 'success'){
						$('#choose_services_row').html(obj.html);
					}else{
						$('#choose_services_row').html(obj.html);
					}
	    		}
			});
     	});

        /**
         * Vedicastro kundali form submit
         *
         */
        $('#kundali-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-kundali").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
            var offset = new Date().getTimezoneOffset();
            var formatted = -(offset / 60);
            var form_data = $('#form-kundali').serialize();
            $.ajax({
                url: vedicastro_public_ajax_object.ajax_url,
                type: 'post',
                data: {
                    action  : 'vedicastro_kundali_ajax',
                    form_data  : form_data,
                    time_zone : formatted,
                },
                beforeSend: function() {
                    $(".Preloader").fadeIn("slow");                                                         
                },
                success: function(res) {
                    $(".Preloader").css('display', 'none');
                    var obj = JSON.parse(res);
                    if(obj.status == 'success'){  
                        $('#lagan-chart-tabs-main-kundli').html(obj.html);
                        $('#kundli-lagan-chart').html(obj.lagna_data);
                        $('div[data-section="vedicastro-kundli-section"]').remove();
                        $('#kundli-lagan-chart').after(obj.lagna_text_data);
                        $('#kundli-navamsa').html(obj.navamsa_data);
                        $('#kundli-navamsa').after(obj.imgdata);
                        $('div[data-lagan-content="planets"]').after(obj.mahadasha_data);
                        $('div[data-lagan-content="mahadasha"]').after(obj.ashtakvarga_data);
                        $('div[data-lagan-content="ashtakvarga"]').after(obj.dosh_data);
                            
                            /**
                             * Vedicastro kundali active tab
                             *
                             */
                            $('.kundali').on('click', function(){
                                $('.kundali.active').removeClass('active');
                                $(this).addClass('active');
                                var lagan_id = $(this).attr('data-lagan-id');
                                if(lagan_id != '' || lagan_id != undefined){
                                    $('.lagan_chart_birth.display_block').removeClass('display_block');
                                    $('div[data-lagan-content="'+lagan_id+'"]').addClass('display_block');
                                }
                            });
                            
                            /**
                             * Vedicastro mahadasha hover
                             */
                            $('.mahadasha_table_data tbody tr').hover(function () {
                                $('.mahadasha_table_data tbody tr').removeClass('active');
                                $(this).addClass('active');
                                var mahadasha_tb = $(this).attr('mahadasha-id');
                                $('.mahadasha_hover').addClass("display_none").removeClass("display_block");
                                $('div[mahadasha-content="' + mahadasha_tb + '"]').addClass("display_block").removeClass("display_none");
                            });
                            
                            /**
                             * Vedicastro mahadasha hover out side click
                             */
                            $('.mahadasha_hover').on('click', function () {
                                $(this).removeClass('display_block');
                                $('.mahadasha_table_data tbody tr').removeClass('active');
                            });

                            /**
                            * Chart image change
                            */
                            $('#chart_content_menu_data').on('change', function(){
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#kundali-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('#kundali-submit').trigger('click');
                            });

                            /**
                            * Chart Style
                            */
                            $('div[data-section="vedicastro-kundli-section"] > a').on('click', function(){
                                var style = $(this).attr('data-style');
                                $('#kundali-style').val(style);
                                $('#kundali-submit').trigger('click');
                            });
                    }else{      
                        $(".Preloader").css('display', 'none');
                        $('#lagan-chart-tabs-main-kundli').html('<div class="error">'+obj.message+'</div>');
                    }
                }
            });
        }
        });

        /**
         * Vedicastro macthing submit
         */
        $('a.matching-button').on( 'click', function(){
           $('a.matching-button').removeClass('active');
            var type = $(this).attr('data-match-id');
             $(this).addClass('active');
            var error = 0;
            var x = $("#form-matching").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                $('#matching-loader').addClass('display_block');
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                var form_data = $('#form-matching').serialize();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_matching_ajax',
                        form_data  : form_data,
                        time_zone : formatted,
                        buttonid : type,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");    
                    },
                    success: function(res) {
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#maching-results').html(obj.maching_results);
                            $('.lagan_chart_tabs_main .maching_data_menu > li').on('click', function () {
                                var maching_chart = $(this).attr('maching_chart-id');
                                $('.lagan_chart_tabs_main .maching_data_menu > li').removeClass('active');
                                $(this).addClass('active');
                                $('.maching_tab_data').addClass("display_none").removeClass("display_block");
                                $('div[maching_chart-content="' + maching_chart + '"]').addClass("display_block").removeClass("display_none");
                            });

                            /**
                            * Boy chart image change
                            */
                            $('#chart_content_menu_data_boy').on('change', function(){
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#boy-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Chart Boy Style
                            */
                            $('div[data-section="vedicastro-boychart-name"] > a').on('click', function(){
                                var style = $(this).attr('data-style');
                                $('#boy-style').val(style);
                                $('#girl-style').val(style);
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Girl chart image change
                            */
                            $('#chart_content_menu_data_girl').on('change', function(){
                                $('.drop_lagan_chart_content p').text(jQuery(this).find(':selected').text());
                                $('#girl-divisional-chart-code').val(jQuery(this).find(':selected').attr('data-code'));
                                $('.vedicastro_button.active').trigger('click');
                            });

                            /**
                            * Chart Girl Style
                            */
                            $('div[data-section="vedicastro-girlchart-name"] > a').on('click', function(){
                                var style = $(this).attr('data-style');
                                $('#boy-style').val(style);
                                $('#girl-style').val(style);
                                $('.vedicastro_button.active').trigger('click');
                            });
                        }
                        else{
                            $('#maching-results').html(obj.maching_results);
                        }
                          $('#matching-loader').removeClass('display_block');
                    }
                });
            }
        });

        /**
        * Vedicastro panchang submit
        */
        $('#panchang-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-panchang").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                var form_data = $('#form-panchang').serialize();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_panchang_ajax',
                        form_data  : form_data,
                        time_zone : formatted,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#vedicastro-panchang').html(obj.html);
                        }else{
                            $('#vedicastro-panchang').html(obj.html);
                        }
                    }
                });
            }
        });


        /**
        * Vedicastro panchang moon submit
        */
        $('#panchang-moon-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-panchang-moon").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var offset = new Date().getTimezoneOffset();
                var formatted = -(offset / 60);
                var form_data = $('#form-panchang-moon').serialize();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_panchang_moon_ajax',
                        form_data  : form_data,
                        time_zone : formatted,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {      
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#panchang-moon-data').html(obj.html);
                        }else{
                            $('#panchang-moon-data').html(obj.html);
                        }
                    }
                });
            }
        });

        /**
        * Vedicastro retro submit
        */
        $('#retro-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-retro").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var form_data = $('#form-retro').serialize();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_retro_ajax',
                        form_data  : form_data,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {      
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#retro-planites').html(obj.html);
                        }else{
                            $('#retro-planites').html(obj.html);
                        }
                    }
                });
            }
        });
        
        /**
        * Vedicastro numberology submit
        */
        $('#numberology-submit').on('click', function(e){
            e.preventDefault();
            var error = 0;
            var x = $("#form-numberology").serializeArray();
            $.each(x, function(i, field){
                if($('#'+field.name).val() == '' ){
                    $('#'+field.name).addClass('kundli-error');
                    error = 1;
                }else{
                    $('#'+field.name).removeClass('kundli-error');
                }
            });
            if(error == 0){
                var form_data = $('#form-numberology').serialize();
                $.ajax({
                    url: vedicastro_public_ajax_object.ajax_url,
                    type: 'post',
                    data: {
                        action  : 'vedicastro_numberology_ajax',
                        form_data  : form_data,
                    },
                    beforeSend: function() {                                
                        $(".Preloader").fadeIn("slow");                           
                    },
                    success: function(res) {      
                        $(".Preloader").css('display', 'none');
                        var obj = JSON.parse(res);
                        if(obj.status == 'success'){
                            $('#personal-day-number').html(obj.personal_day_number);
                            $('#numerology-data').html(obj.numerology_html);
                        }else{
                            $('#numberology-planites').html(obj.html);
                        }
                    }
                });
            }
        });
     });
})( jQuery );