<style>
.product{cursor:pointer}
</style> 
<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Products</h1>
                        <hr class="mb-4">
                            <div class="row">

                            <?php foreach($products as $product) { ?>
                                <div class="col-xl-3 product" data-id="<?php echo $product['id']; ?>">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                             <h5 class="card-title"><?php echo $product['title']; ?></h5>
                                            <?php if(!empty($product['image']) && file_exists('./uploads/products/'.$product['image'])) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/products/<?php echo $product['image']; ?>" class="card-img-top" alt="" />
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