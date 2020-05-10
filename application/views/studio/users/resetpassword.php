<div class="login">
  <!-- BEGIN login-content -->
  <div class="login-content">
    <form action="<?php echo site_url('users/updatepassword'); ?>" method="POST" name="frmlogin" id="frmlogin">
      <h1 class="text-center">Reset Password</h1>
      <div class="form-group">
        <label>Email New Password</label>
            <input type="password" class="form-control" name="password" id="password" >
        </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Reset Password</button>
    </form>
  </div>
  <!-- END login-content -->
</div>
<!-- END login -->