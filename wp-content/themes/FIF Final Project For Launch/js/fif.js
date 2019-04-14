jQuery(document).ready( function($){

  /* contact form submission */
	$('#fifContactForm').on('submit', function(e){

		e.preventDefault();

		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');

		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');

		if( name === '' ){
			$('#name').parent('.form-group').addClass('has-error');
			return;
		}

		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		if( message === '' ){
			$('#message').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submission').addClass('js-show-feedback');

		$.ajax({

			url : ajaxurl,
			type : 'post',
			data : {

				name : name,
				email : email,
				message : message,
				action: 'fif_save_user_contact_form'

			},
			error : function( response ){
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){

					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {

					setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);

				}
			}

		});

	});//$('#fifContactForm').on('submit', function(e)

	/* Mailing List form submission */
	$('#fifMailingForm').on('submit', function(e){

		e.preventDefault();

		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');

		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				ajaxurl = form.data('url');

		if( name === '' ){
			$('#name').parent('.form-group').addClass('has-error');
			return;
		}

		if( email === '' ){
			$('#email').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-mailing-form-submission').addClass('js-show-feedback');

		$.ajax({

			url : ajaxurl,
			type : 'post',
			data : {

				name : name,
				email : email,
				action: 'fif_save_user_mailing_form'

			},
			error : function( response ){
				$('.js-mailing-form-submission').removeClass('js-show-feedback');
				$('.js-mailing-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){

					setTimeout(function(){
						$('.js-mailing-form-submission').removeClass('js-show-feedback');
						$('.js-mailing-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},1500);

				} else {

					setTimeout(function(){
						$('.js-mailing-form-submission').removeClass('js-show-feedback');
						$('.js-mailing-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},1500);

				}
			}

		});

	});//$('#fifMailingForm').on('submit', function(e)
//
//
// 	/* Nav Bar JS */
//
//     //caches a jQuery object containing the header element
//     var header = $('#site-navigation');
//     $(window).scroll(function() {
//        var scroll = $(window).scrollTop();
//        if (scroll >= header.height()) {
//          header.fadeOut();
//        } else {
//         header.fadeIn();
//       }
//     });
//
  /* Socials Home Page Disappear/appear */

	$(window).bind("scroll", function() {
	if ($(this).scrollTop() > 180) { //Fade in at a level of height
		$(".fif-social-wrapper").fadeIn();
		checkOffset(); //Call function
	} else {
		$(".fif-social-wrapper").stop().fadeOut();
	}
});

function checkOffset() {
	if($('.fif-social-wrapper').offset().top + $('.fif-social-wrapper').height() >= $('.site-footer').offset().top) {
		$('.fif-social-wrapper').css('position', 'absolute'); //Stop div at a level of height
	}
	if($(window).scrollTop() + $(window).height() < $('.site-footer').offset().top) {
		$('.fif-social-wrapper').css('position', 'fixed'); //Restore when you scroll up
	}
}//Socials Home Page Disappear/Appear

});//jQuery(document).ready( function($)
