<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
 
	
	<h1 class="h3 mb-3">My Profile </h1>
	<div class="row">
		<div class="col-12 col-lg-12 col-xxl-12 d-flex">
	<div class="card flex-fill"> 
		<div class="card-body">
	    <div class="mb-3">
	    	<div class="row">
	    		<div class="col-2">
	        		<label class="col-form-label">First Name:</label> 
	    		</div>
	    		<div class="col-6">
	        		<input type="text" class="form-control" name="first_name" value="<?= $first_name ?>" readonly="readonly">
	    		</div>
	    	</div>
	    </div>
	   
	    <div class="mb-3">
	    	<div class="row">
	    		<div class="col-2">
	        <label class="col-form-label">Last Name:</label>
	        </div>
	    		<div class="col-6">
	        <input type="text" class="form-control" name="last_name" value="<?= $last_name ?>" readonly="readonly">
	    </div>
	    </div>
	</div>

	    <div class="mb-3">
	    	<div class="row">
	    		<div class="col-2">
	        <label class="col-form-label">Mobile Number:</label>
	        </div>
	    		<div class="col-6">
	        <input type="text" class="form-control" name="mobile_number" value="<?= $mobile_number ?>" readonly="readonly">
	    </div>
	    </div>
	</div>

	    <div class="mb-3">
	    	<div class="row">
	    		<div class="col-2">
	        <label class="col-form-label">Email-Id:</label>
	        </div>
	    		<div class="col-6">
	        <input type="email" class="form-control" name="email" value="<?= $email ?>" readonly="readonly"> 
	        <div class="mt-3">
	        <span>Your mail id is <?= $mail_status ?></span>
	        <?php if ($mail_status=='Not Verified') { ?>
	        	<a class="btn btn-info btn-sm" href="<?= base_url('verify-mail') ?>">Verify Now</a>
	        <?php } ?>
	        </div>
	    </div>
	    </div>
	</div> 
	</div>
	</div>

	</div>
	</div> 

<?= $this->endSection(); ?>