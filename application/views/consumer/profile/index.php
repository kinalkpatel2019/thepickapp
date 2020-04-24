<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmupdateprofile" action="<?php echo site_url('consumer/profile/updateProfile'); ?>" id="frmupdateprofile" method="post"> 
               
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user['firstname'] ;?>" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user['lastname'] ;?>" readonly="true">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'] ;?>" readonly="true">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Account Type</label>
                        <input type="text" class="form-control" name="accounttype" id="accounttype" value="<?php echo ($user['accounttype']==1) ? "Vendor" : "Consumer";?>" readonly="true">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Address1</label>
                        <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $user['address1'] ;?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Address2</label>
                        <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $user['address2'] ;?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="<?php echo $user['phonenumber'] ;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Update Details
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- Content Row -->