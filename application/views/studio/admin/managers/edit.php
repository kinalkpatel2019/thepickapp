<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Edit Market Manager User</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmadminuser" action="<?php echo site_url('admin/managers/updateuser'); ?>" id="frmadminuser" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>"/>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user['firstname']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user['lastname']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control-plaintext" name="email" id="email" value="<?php echo $user['email']; ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Assign Markets</label>
                                                        <select name="markets[]" id="markets" class="form-control selectpicker" multiple="multiple" data-style="btn-default">
                                                            <?php $selected=explode(',',$user['markets']); ?>
                                                            <?php foreach($markets as $market){ ?>
                                                                    <option value="<?php echo $market['id']; ?>" <?php echo (in_array($market['id'],$selected)) ? 'selected=""' : ''; ?>><?php echo $market['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                    
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Update User</button>
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