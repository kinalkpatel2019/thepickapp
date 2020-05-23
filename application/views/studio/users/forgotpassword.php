<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="<?php echo site_url('users/otp'); ?>" method="POST" name="frmforgotpassword" id="frmforgotpassword">
					<h1 class="text-center">Reset Password</h1>
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
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control form-control-lg fs-15px" value="" placeholder="username@address.com" />
					</div>					
					<button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Send OTP</button>
        </form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->