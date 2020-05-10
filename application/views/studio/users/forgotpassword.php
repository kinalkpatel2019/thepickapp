<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="<?php echo site_url('users/otp'); ?>" method="POST" name="frmlogin" id="frmlogin">
					<h1 class="text-center">Reset Password</h1>
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