<style>
.vendor{cursor:pointer}
</style> 
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vendors</h1>
</div>
<!-- Content Row -->
<div class="row">
    <?php foreach($vendors as $vendor) { ?>
    <div class="col-lg-3 vendor" data-id="<?php echo $vendor['id']; ?>">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $vendor['firstname']; ?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="img-responsive" src="<?php echo base_url(); ?>uploads/products/sampleimage.png" width="100%"/>
                        <br/>
                        Vendor Info Goes here
                       
                    </div>
                    <div class="col-lg-6">
                        Vendor Description Gose Here 
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<script>
    $(document).ready(function(){
        $(".vendor").click(function(){
            var id=$(this).attr('data-id');
            window.location.href='<?php echo site_url('consumer/vendors/setVendor/'); ?>'+id;
        });
    });
</script>