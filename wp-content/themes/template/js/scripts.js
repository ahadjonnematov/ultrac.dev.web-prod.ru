$(document).ready(function(){

// video cover fix
  	var vid = $('.mp_screen_one_video');
  	var vid_w_orig = 1280;
	var vid_h_orig = 720;
	$(window).resize(function(){
		var container_w = vid.parent().width(),
			container_h = vid.parent().height(),
			scale_w = container_w / vid_w_orig,
			scale_h = container_h / vid_h_orig,
			scale = scale_w > scale_h ? scale_w : scale_h;
		vid.width(scale * vid_w_orig);
		vid.height(scale * vid_h_orig);
	});
	$(window).trigger('resize');


	function burgerButton(){
		var clickDelay = 300,
		    clickDelayTimer = null;

		$('.burger-click-region').on('click', function(){
			if(clickDelayTimer === null){
			    var burger = $(this);
			    $('body').toggleClass('is-open');
			    burger.toggleClass('active');
			    if(!burger.hasClass('active')){
			      	burger.addClass('closing');
			    }

			    $('.mobile_menu').slideToggle(200);

			    clickDelayTimer = setTimeout(function(){
				    burger.removeClass('closing');
				    clearTimeout(clickDelayTimer);
				    clickDelayTimer = null;
			    }, clickDelay);
			}
		});
	}

	burgerButton();

	$('.mobile_menu .has_submenu').on('click', function(){
		$(this).find('.submenu').slideToggle(200);
	})


	function contentSlider(){
		$('.content_slider').each(function(i, obj){
			var slideCount = $(obj).find('.cs_slide').length,
			slideStart = 1;
			$(obj).find('.cs_slide[data-csslidenum="1"]').show();

			if (slideCount <= 1){
				$(obj).find('.content_slider_controls').hide();
			}

			$(obj).find('.csc_total').text(slideCount);

		    $(obj).find('.csc_prev').on('click', function(){
				slideStart--;
				if(slideStart == 0){
					slideStart = slideCount;
				}

				$(obj).find('.cs_slide').fadeOut(300);
				$(obj).find('.cs_slide[data-csslidenum="'+slideStart+'"]').fadeIn(300);
				$(obj).find('.csc_current').text(slideStart);
		    });

		    $(obj).find('.csc_next').on('click', function(){
				slideStart++;
				if(slideStart == slideCount+1){
					slideStart = 1;
				}

				$(obj).find('.cs_slide').fadeOut(300);
				$(obj).find('.cs_slide[data-csslidenum="'+slideStart+'"]').fadeIn(300);
				$(obj).find('.csc_current').text(slideStart);
		    });
		});
	}
	contentSlider();


	function formControls(){
		$('.modal_close').on('click', function(){
			$('.overlay').fadeOut(200);
			$('html').removeClass('scroll_off');
		});

		$('.req_a_sample, .ask_sample').on('click', function(){
			$('.overlay').css("display", "flex").hide().fadeIn(200);
			$('html').addClass('scroll_off');
		});
	}
	formControls();

	$('.ff_block input[type="text"]').on('focus', function(){
		$(this).closest('.ff_block').find('.ff_err').fadeOut(200);
	});



	$('.ff_send').on('click', function(e){
		e.preventDefault();
		$('.ff_err').fadeOut(200);
		var ff_khim_con=$(".custom_select .current_opt").text().trim();
		var ff_name = $('#ff_name').val(),	
			ff_mail = $('#ff_mail').val(),			
			ff_phone = $('#ff_phone').val(),
			ff_comp = $('#ff_company').val(),		
	    	error = false,
	    	re = /[0-9a-z_]+@[0-9a-z_^.]+\.[a-z]{2,3}/i;

		if (ff_name == "") {
			$('#ff_name').closest('.ff_block').find('.ff_err').fadeIn(200);
			error = true;
		}

		if (ff_phone == "") {
			$('#ff_phone').closest('.ff_block').find('.ff_err').fadeIn(200);
			error = true;
		}

		if (ff_comp == "") {
			$('#ff_company').closest('.ff_block').find('.ff_err').fadeIn(200);
			error = true;
		}

		// if (ff_mail == "" || !re.test(ff_mail)) {
		if (ff_mail == ""){
			$('#ff_mail').closest('.ff_block').find('.ff_err').fadeIn(200);
			error = true;
		}

		if (error==1){
			return false;
		}
		

	 	$.ajax({dataType: "text",
	 		complete:function(result){
				$('.feedback_form').fadeOut(200, function(){
					$('.ff_ty').fadeIn(200);
				});
	 		},
			// url: "/sendform/",
			beforeSend: function(xhr){},
			type: "POST",
			data: {ff_khim_con:ff_khim_con,ff_name: ff_name, ff_mail: ff_mail, ff_comp: ff_comp, ff_phone: ff_phone, form: "feedback"},
			success: function(result){
			}
		});
	});	


	$('.current_opt').on('click', function(){
		$(this).closest('.custom_select').toggleClass('opened').find('.opt_list').slideToggle(200);
	});

	$('.opt_item').on('click', function(){
		var copt = $(this).text();
		$(this).closest('.opt_list').slideUp(200);
		$(this).closest('.custom_select').removeClass('opened').find('.current_opt').text(copt);
	});

	

});