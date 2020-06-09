<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Market Message</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">

                                            <form name="frmpopup" action="<?php echo site_url('vendor/marketpopups/updatepopup'); ?>" id="frmpopup" method="post" enctype="multipart/form-data">
                                                
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
                                                <input type="hidden" name="market_id" value="<?php echo $message['market_id']; ?>"/>
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label>Market</label>
                                                            <input type="text" class="form-control-plaintext" name="firstname" id="firstname" value="<?php echo $message['title'] ;?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label>status</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="1" <?php echo ($message['status']==1) ? "selected=''" : ""; ?>>Show</option>
                                                                <option value="0" <?php echo ($message['status']==0) ? "selected=''" : ""; ?>>Hide</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea name="text" name="content" class="summernote form-control" title="Contents"><?php echo $message['message']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            Update Message
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