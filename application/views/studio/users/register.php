<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form class="user" name="frmregister" id="frmregister" action="<?php echo site_url('users/doRegister'); ?>" method="post">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control " name="password" id="password" placeholder="Password">
                </div>
                <div class="col-sm-6">
                    <select name="accounttype" id="accounttype" class="form-control">
                        <option value="1">Vendor</option>
                        <option value="2">Consumer</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
            </button>
            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo site_url('users/forgotpassword'); ?>">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?php echo site_url('users/login'); ?>">Already have an account? Login!</a>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>