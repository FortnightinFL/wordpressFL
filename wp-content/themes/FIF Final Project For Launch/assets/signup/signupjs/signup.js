jQuery(document).ready(function($) {

/* Sign Up form Submission */
$('#fifSignUpForm').on('submit', function(e){

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
      action: 'fif_save_user_signup_form'

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

});//jQuery(document).ready( function($)
