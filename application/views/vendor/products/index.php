<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
    <a href="<?php echo site_url('vendor/products/add'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Products</a>
</div>
<!-- Content Row -->
<div class="row">
    <?php foreach($products as $product) { ?>
    <div class="col-lg-6">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $product['title']; ?></h6>
                <?php echo $product['category']; ?>
                <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Actions</div>
                    <a class="dropdown-item" href="<?php echo site_url('vendor/products/edit/'.$product['id']); ?>">Edit Info</a>
                    <a class="dropdown-item" href="<?php echo site_url('vendor/products/inventories/'.$product['id']); ?>">Add/Edit Inventory</a>
                </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="img-responsive" src="<?php echo base_url(); ?>uploads/products/sampleimage.png" width="100%"/>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $product['description']; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php } ?>
</div>