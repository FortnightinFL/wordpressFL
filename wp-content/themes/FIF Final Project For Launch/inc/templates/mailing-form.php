<form id="fifMailingForm" class="fif-mailing-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<div class="form-group">
		<input type="text" class="form-control fif-form-control" placeholder="Your Name" id="name" autocomplete='name' name="name">
		<small class="text-danger form-control-msg">Your Name is Required</small>
	</div>

	<div class="form-group">
		<input type="email" class="form-control fif-form-control" placeholder="Your Email" id="email" autocomplete='email' name="email">
		<small class="text-danger form-control-msg">Your Email is Required</small>
	</div>

	<div class="form-button">
		<button type="submit" class="btn btn-default btn-lg btn-fif-form">Submit</button>
		<small class="text-info form-control-msg js-mailing-form-submission">Your details are being processed, please wait...</small>
		<small class="text-success form-control-msg js-mailing-form-success">Your details have been successfully submitted, thank you! Click here to go to the home page.</small>
		<small class="text-danger form-control-msg js-mailing-form-error">There was a problem with the mailing list form, please try again!</small>
	</div>

</form>
