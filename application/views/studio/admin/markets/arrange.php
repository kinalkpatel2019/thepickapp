<!-- BEGIN #content -->
<style>
.ui-state-default{border:none !important}
</style>
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Market : <?php echo $market['title']; ?></h1>
                        <hr class="mb-4">
                        <div class="card">
                            <div class="card-body">
                                <form name="frmsort" action="<?php echo site_url('admin/markets/updateSort'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $market['id']; ?>"/>
                            <div class="row" id="sortable">
                                <?php $i=0; foreach($vendors as $vendor) { ?>
                                    <div class="ui-state-default col-xl-3 vendor" data-id="<?php echo $vendor['id']; ?>">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $vendor['businessname']; ?></h5>
                                            <input type="hidden" class="txtvendors" name="vendor[<?php echo  $vendor['id']; ?>]" value="<?php echo $i; ?>"/>
                                            </div>
                                            <?php if(!empty($vendor['image']) && file_exists('./uploads/users/'.$vendor['image'])) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/users/<?php echo $vendor['image']; ?>" class="card-img-top" alt="" />
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>uploads/users/vendor.png" class="card-img-middle" alt="" />
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php } ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update Position</button>
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
</diiv>