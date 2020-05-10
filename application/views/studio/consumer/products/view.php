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
                        <h1 class="page-header"><?php echo $product['title']; ?></h1>
                        <hr class="mb-4">
                            <div class="row">
                                <div class="col-xl-4">
                                    <img class="img-responsive" src="https://via.placeholder.com/600x400/c9d2e3/212837" width="100%"/>
                                </div>
                                <div class="col-xl-8">
                                    <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $product['title']; ?></h5>
                                                <h6 class="card-title"><?php echo $product['category']; ?></h6>
                                                <hr class="mb-4">
                                                <h6 class="card-title">Options</h6>

                                                <form name="addtocart" id="addtocart" method="post" action="<?php echo site_url('consumer/cart/addtocart'); ?>">
                                                    <?php foreach($inventories as $inventory) { ?>
                                                        <div class="form-group">
                                                                <div class="col-sm-3">
                                                                        <?php echo $inventory['unit']; ?>&nbsp;$<?php echo $inventory['price']; ?>
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
            </div>
        </div>
    </div>
</diiv>