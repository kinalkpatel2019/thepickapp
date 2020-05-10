<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Add Market</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmmarket" action="<?php echo site_url('admin/markets/insertmarket'); ?>" id="frmmarket" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" id="title">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" name="location" id="location">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Description</label>
                                                        <textarea name="description" id="description" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Fee(%)</label>
                                                        <input type="number" class="form-control" name="fee" id="fee">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control" name="image" id="image">
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
													<div class="col-sm-6">
														<button type="submit" class="btn btn-primary">Add Market</button>
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