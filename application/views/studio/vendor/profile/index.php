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
                                            <form name="frmupdateprofile" action="<?php echo site_url('vendor/profile/updateProfile'); ?>" id="frmupdateprofile" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-6">

                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control-plaintext" name="firstname" id="firstname" value="<?php echo $user['firstname'] ;?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control-plaintext" name="lastname" id="lastname" value="<?php echo $user['lastname'] ;?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control-plaintext" name="email" id="email" value="<?php echo $user['email'] ;?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Account Type</label>
                                                        <input type="text" class="form-control-plaintext" name="accounttype" id="accounttype" value="<?php echo ($user['accounttype']==1) ? "Vendor" : "Consumer";?>" readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Business Type</label>
                                                        <select name="businesstype_id" id="businesstype_id" class="form-control-plaintext" <?php echo (!empty($user['businesstype_id'])) ? "readonly" : ""; ?>>
                                                            <?php foreach($businesstypes as $businesstype){ ?>
                                                                    <option value="<?php echo $businesstype['id']; ?>" <?php echo ($businesstype['id']==$user['businesstype_id']) ? "selected=''" : ""; ?>><?php echo $businesstype['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Business Name</label>
                                                        <input type="text" class="form-control" name="businessname" id="businessname" value="<?php echo $user['businessname'] ;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Address1</label>
                                                        <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $user['address1'] ;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Address2</label>
                                                        <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $user['address2'] ;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="<?php echo $user['phonenumber'] ;?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Zipcode</label>
                                                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $user['zipcode'] ;?>">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label>Link</label>
                                                        <input type="text" class="form-control" name="link" id="link" 
														<?php if(!empty($user['link'])){ ?>  
															value="<?php echo $user['link'];?>" 
														<?php }else{ ?> 
														value="<?php echo base_url().'users/generatelink/'.$link;?>" <?php } ?> readonly>
														<input type="button" id="btnCopyToClipboard" value="copy"  class="btn btn-space btn-success btn-shade4 btn-lg copyToClipboard">
                                                    </div>
													
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            Update Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Profile Picure</label>
                                                    <input type="file" class="form-control" name="image" id="image"/>
                                                    <input type="hidden" class="form-control" name="filename" id="filename" value="<?php echo $user['image']; ?>"/>
                                                    <?php if(file_exists('./uploads/users/thumb/'.$user['image']) && !empty($user['image'])) { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/users/thumb/<?php echo $user['image']; ?>" class="img-responsive" />
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/users/vendor.png" class="img-responsive" />
                                                    <?php } ?>
                                                </div>
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
</div>
