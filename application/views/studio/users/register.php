<!-- BEGIN register -->
<div class="register">
			<!-- BEGIN register-content -->
			<div class="register-content">
            <form class="user" name="frmregister" id="frmregister" action="<?php echo site_url('users/doRegister'); ?>" method="post">
					<h1 class="text-center">Sign Up</h1>
					<p class="text-muted text-center"></p>
					<div class="form-group">
						<label>First name <span class="text-danger">*</span></label>
						<input type="text" name="firstname" id="firstname" class="form-control form-control-lg fs-15px" placeholder="e.g John Smith" value="" />
					</div>
                    <div class="form-group">
						<label>Last Name <span class="text-danger">*</span></label>
						<input type="text" name="lastname" id="lastname" class="form-control form-control-lg fs-15px" placeholder="e.g John Smith" value="" />
					</div>
					<div class="form-group">
						<label>Email Address <span class="text-danger">*</span></label>
						<input type="text" name="email" id="email" class="form-control form-control-lg fs-15px" placeholder="username@address.com" value="" />
					</div>
					<div class="form-group">
						<label>Password <span class="text-danger">*</span></label>
						<input type="password" name="password" id="password" class="form-control form-control-lg fs-15px" value="" />
					</div>
					<div class="form-group">
						<label>Account Type <span class="text-danger">*</span></label>
                        <select name="accounttype" id="accounttype" class="form-control form-control-lg fs-15px">
                            <option value="1">Vendor</option>
                            <option value="2">Consumer</option>
                        </select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg fs-15px fw-500 btn-block">Register</button>
					</div>
					<div class="text-muted text-center">
						Already have an account? <a href="<?php echo site_url('users/login'); ?>">Sign In</a>
					</div>
				</form>
			</div>
			<!-- END register-content -->
		</div>
		<!-- END register -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->