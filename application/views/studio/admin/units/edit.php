<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Edit Unit</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmunit" action="<?php echo site_url('admin/units/updateunit'); ?>" id="frmunit" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="id" value="<?php echo $unit['id']; ?>"/>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $unit['title']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Code</label>
                                                        <input type="text" class="form-control" name="code" id="code" value="<?php echo $unit['code']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Is Container?</label>
                                                        <select name="iscontainer" id="iscontainer" class="form-control">
                                                            <option value="0" <?php echo ($unit['iscontainer']==0) ? 'selected=""' : ''; ?>>No</option>
                                                            <option value="1" <?php echo ($unit['iscontainer']==1) ? 'selected=""' : ''; ?>>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Update Unit</button>
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