<style>
.vendor{cursor:pointer}
</style> 
<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Vendors</h1>
                        <hr class="mb-4">
                            <div class="row">

                            <?php foreach($vendors as $vendor) { ?>
                                <div class="col-xl-3 vendor" data-id="<?php echo $vendor['id']; ?>" data-open="<?php echo $vendor['status']; ?>">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $vendor['businessname']; ?></h5>
                                            <?php if(!empty($vendor['image']) && file_exists('./uploads/users/'.$vendor['image'])) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/users/<?php echo $vendor['image']; ?>" class="card-img-top" alt="" />
                                            <?php } else { ?>
                                                <img src="https://via.placeholder.com/600x400/c9d2e3/212837" class="card-img-top" alt="" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>

