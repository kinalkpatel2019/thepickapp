<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="<?php echo site_url('users/authenticate'); ?>" method="POST" name="frmlogin" id="frmlogin">
					<h1 class="text-center title-color">Sign In</h1>
					<div class="text-muted text-center mb-4">
						<p class="txt-color">For your protection, please verify your identity.</p>
					</div>
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
						<label class="title-color">Email Address</label>
						<input type="email" name="email" class="form-control form-control-lg fs-15px" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" placeholder="username@address.com" />
					</div>
					<div class="form-group">
						<div class="d-flex">
							<label class="title-color">Password</label>
							<a href="<?php echo site_url('users/forgotpassword'); ?>" class="ml-auto title-color txt-color">Forgot password?</a>
						</div>
						<input type="password" name="password" class="form-control form-control-lg fs-15px" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Enter your password" />
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input class="custom-control-input" type="checkbox" value="" id="remember" />
							<label class="custom-control-label fw-500 title-color" for="remember" <?php if(isset($_COOKIE["email"])) { ?> checked="checked" <?php } ?>>Remember me</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3 btn-color ">Sign In</button>
					<div class="text-center text-muted ">
						<label class="title-color">Don't have an account yet? </label> <a class="txt-color" href="<?php echo site_url('users/register'); ?>"> Sign up</a>.
					</div>
				</form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->