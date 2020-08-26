<div class="login">
  <!-- BEGIN login-content -->
  <div class="login-content">
    <form action="<?php echo site_url('users/updatepassword'); ?>" method="POST" name="frmresetpassword" id="frmresetpassword">
      <h1 class="text-center title-color">Reset Password</h1>
      <?php if(!empty($error)) { ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php } ?>
					<?php if(!empty($success)) { ?>
						<div class="alert alert-success">
							<?php echo $error; ?>
						</div>
					<?php } ?>
					<?php if(!empty(validation_errors())) { ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>
					<div class="form-group" id="pwdstrength-container">
						<label class="d-flex align-items-center title-color">Password <span class="text-danger">*</span>
						<div class="pwstrength_viewport_progress ml-auto width-200"></div>
						</label>
						<input type="password" name="password" id="password" class="form-control form-control-lg fs-15px" value="" />
						<small id="passwordHelpBlock" class="form-text text-muted">
							<label class="txt-color">Your password must be 6-15 characters long.</label>
						</small>
					</div>
      <button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3 btn-color">Reset Password</button>
    </form>
  </div>
  <!-- END login-content -->
</div>
<!-- END login -->