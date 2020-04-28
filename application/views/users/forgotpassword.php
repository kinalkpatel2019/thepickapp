<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
            </div>
            <form class="user" name="frmlogin" id="frmlogin" action="<?php echo site_url('users/otp'); ?>" method="post">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Send OTP
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>