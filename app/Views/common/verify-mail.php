<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
 
	
	<h1 class="h3 mb-3">Verify email address </h1>
	<div class="row">
		<div class="col-12 col-lg-12 col-xxl-12 d-flex">
	<div class="card flex-fill"> 
		<div class="card-body">
			<?= form_open($action) ?>
	    <div class="mb-3">
	    	<div class="row">
	    		<div class="col-2">
	        		<label class="col-form-label">Email-Id:</label>
	        	</div>
		    	<div class="col-6">
		        	<input type="email" class="form-control" name="email" value="<?= $email ?>" readonly="readonly"> 
		    	</div>
	    	</div>

	    	<?php if ($otp_field=='show') { ?>
	    	<div class="row mt-3">
	    		<div class="col-2">
	        		<label class="col-form-label">Enter OTP:</label>
	        	</div>
		    	<div class="col-6">
		        	<input type="number" class="form-control" name="otp" value="" required> 
		    	</div>
	    	</div>
	    	<?php } ?>

	        <div class="mt-3">
	        	<input type="submit" class="btn btn-info btn-sm" value="<?= $btn_name ?>">
	        </div>
	    </div>
	</div>
	<?= form_close() ?> 
	</div>
	</div>

	</div> 

<?= $this->endSection(); ?>