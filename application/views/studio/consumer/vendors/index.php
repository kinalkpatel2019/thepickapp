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
                                <div class="col-xl-3 vendor" data-id="<?php echo $vendor['id']; ?>" data-open="<?php echo $vendor['status']; ?>" data-popupstatus="<?php echo $vendor['popupstatus']; ?>">
                                    <div class="popupcontent" style="display:none;">
                                        <?php echo $vendor['popup']; ?>
                                    </div>
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
</div>
<div class="modal fade" id="showopup" tabindex="-1" role="dialog" aria-labelledby="showopupTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Message From Vendor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body" id="popupbody">
        </div>
        <div class="modal-footer">
            <a id="pouplink" href="" class="btn btn-primary">Go To Store</a>
        </div>
    </div>
  </div>
</div>
