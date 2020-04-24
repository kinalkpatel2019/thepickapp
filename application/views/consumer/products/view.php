<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $product['title']; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
               <div class="row">
                    <div class="col-xl-4">
                        <img class="img-responsive" src="<?php echo base_url(); ?>uploads/products/sampleimage.png" width="100%"/>
                    </div>
                    <div class="col-xl-8">
                        <h2><?php echo $product['title']; ?></h2>
                        <h4><?php echo $product['category']; ?></h4>
                        <h5>Options</h5>
                        <form name="addtocart" id="addtocart" method="post" action="<?php echo site_url('consumer/cart/addtocart'); ?>">
                        <?php foreach($inventories as $inventory) { ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php echo $inventory['unit']; ?>
                                </div>
                                <div class="cols-sm-6">
                                    <input type="number" class="form-control" name="qty[inventory][<?php echo $inventory['id']; ?>]" id="qty">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add To Cart
                                </button>
                            </div>
                        </div>
                        </form>
                        <p><?php echo $product['description']; ?></p>
                    </div>
               </div>
        </div>
    </div>
    </div>
</div>
<!-- Content Row -->