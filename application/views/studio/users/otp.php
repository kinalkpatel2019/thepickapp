<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="<?php echo site_url('users/verifyotp'); ?>" method="POST" name="frmlogin" id="frmlogin">
					<h1 class="text-center">Reset Password</h1>
					<?php if(!empty($error)) { ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php } ?>
					<?php if(!empty($success)) { ?>
						<div class="alert alert-success">
							<?php echo $success; ?>
						</div>
					<?php } ?>
					<?php if(!empty(validation_errors())) { ?>
						<div class="alert alert-danger">
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control form-control-lg fs-15px" value="<?php echo $email; ?>" placeholder="username@address.com" disable="true"/>
					</div>				
          <div class="form-group">
						<div class="d-flex">
							<label>OTP</label>
						</div>
						<input type="number" name="otp" id="otp" class="form-control form-control-lg fs-15px" value="" placeholder="Enter your password" />
					</div>	
					<button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Verify OTP</button>
        </form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->