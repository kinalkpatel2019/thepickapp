<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="<?php echo site_url('admin/users/authenticate'); ?>" method="POST" name="frmlogin" id="frmlogin">
					<h1 class="text-center">Sign In</h1>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control form-control-lg fs-15px" value="" placeholder="username@address.com" />
					</div>
					<div class="form-group">
						<div class="d-flex">
							<label>Password</label>
						</div>
						<input type="password" name="password" class="form-control form-control-lg fs-15px" value="" placeholder="Enter your password" />
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Sign In</button>
				</form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->