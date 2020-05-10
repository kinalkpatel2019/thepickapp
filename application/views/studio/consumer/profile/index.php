<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Profile</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmupdateprofile" action="<?php echo site_url('consumer/profile/updateProfile'); ?>" id="frmupdateprofile" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control-plaintext" name="firstname" id="firstname" value="<?php echo $user['firstname'] ;?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control-plaintext" name="lastname" id="lastname" value="<?php echo $user['lastname'] ;?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control-plaintext" name="email" id="email" value="<?php echo $user['email'] ;?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Account Type</label>
                                                        <input type="text" class="form-control-plaintext" name="accounttype" id="accounttype" value="<?php echo ($user['accounttype']==1) ? "Vendor" : "Consumer";?>" readonly>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>