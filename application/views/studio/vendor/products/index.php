<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Products</h1>
                            <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo site_url('vendor/products/add'); ?>';"><i class="fas fa-plus-square"></i>&nbsp;Add Product</button>
                        <hr class="mb-4">
                            <div class="row">

                            <?php foreach($products as $product) { ?>
                                <div class="col-xl-3">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <ul class="nav nav-pills card-header-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('vendor/products/edit/'.$product['id']); ?>">Info</a>
                                                        
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('vendor/products/inventories/'.$product['id']); ?>">Inventory</a>
                                                    </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product['title']; ?></h5>
                                            <p><?php echo $product['category']; ?></p>
                                        </div>
                                        <img src="https://via.placeholder.com/600x400/c9d2e3/212837" class="card-img-top" alt="" />
                                       
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