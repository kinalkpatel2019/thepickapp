<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Add Admin User</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmadminuser" action="<?php echo site_url('admin/users/insertuser'); ?>" id="frmadminuser" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="firstname" id="firstname">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lastname" id="lastname">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" id="email">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password" id="password">
                                                    </div>
                                                </div>

                                                    
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Add User</button>
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