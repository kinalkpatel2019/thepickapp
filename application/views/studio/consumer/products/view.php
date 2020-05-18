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
                                <?php if(!empty($product['image']) && file_exists('./uploads/products/'.$product['image'])) { ?>
                                                <img src="<?php echo base_url(); ?>uploads/products/<?php echo $product['image']; ?>" class="img-responsive" alt="" width="100%" />
                                            <?php } else { ?>
                                                <img class="img-responsive" src="https://via.placeholder.com/600x400/c9d2e3/212837" width="100%"/>
                                            <?php } ?>  
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
                <?php if(!empty($images)) { ?>
                <!-- BEGIN gallery-content-container -->
				<div class="gallery-content-container">
					<!-- BEGIN scrollbar -->
					<div data-scrollbar="true" data-height="100%">
						<!-- BEGIN gallery-content -->
						<div class="gallery-content">
							<!-- BEGIN gallery -->
							<div class="gallery">
								<!-- BEGIN gallery-title -->
								<div class="gallery-title">
									<a href="#">
										Product Images <i class="fa fa-chevron-right"></i>
									</a>
								</div>
								<!-- END gallery-title -->
								<!-- BEGIN gallery-image -->
								<div class="gallery-image">
									<ul class="gallery-image-list">
                                        <?php foreach($images as $image) { ?>
										<li><a href="<?php echo base_url(); ?>uploads/products/images/<?php echo $image['image']; ?>" itemprop="contentUrl" data-size="752x502"><img src="<?php echo base_url(); ?>uploads/products/images/<?php echo $image['image']; ?>" itemprop="thumbnail" alt="Wedding Image 1" class="img-portrait" /></a></li>
                                        <?php } ?>
									</ul>
								</div>
								<!-- END gallery-image -->
							</div>
							<!-- END gallery -->
						</div>
						<!-- END gallery-content -->
					</div>
					<!-- END scrollbar -->
				</div>
				<!-- END gallery-content-container -->
                <?php } ?>
            </div>
        </div>
    </div>
</diiv>