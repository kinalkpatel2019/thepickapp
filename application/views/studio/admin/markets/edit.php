<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Edit Market</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmmarket" action="<?php echo site_url('admin/markets/updatemarket'); ?>" id="frmmarket" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="id" value="<?php echo $market['id']; ?>"/>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $market['title']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" name="location" id="location" value="<?php echo $market['location']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Description</label>
                                                        <textarea name="description" id="description" class="form-control"><?php echo $market['description']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Fee(%)</label>
                                                        <input type="number" class="form-control" name="fee" id="fee" value="<?php echo $market['fee']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control" name="image" id="image">
                                                        <?php if(!empty($market['image'])) { ?>
                                                            <img class="img-responsive" width="150px" src="<?php echo base_url(); ?>uploads/markets/<?php echo $market['image']; ?>"/>
                                                        <?php } ?>
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