<style>
.market{cursor:pointer}
</style> 
<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Markets</h1>
                        <hr class="mb-4">
                            <div class="row">

                            <?php foreach($markets as $market) { ?>
                                <div class="col-xl-3 market" data-id="<?php echo $market['id']; ?>">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $market['title']; ?></h5>
                                            <p> Market Description Gose Here </p>
                                        </div>
                                        <img src="https://via.placeholder.com/600x400/c9d2e3/212837" class="card-img-top" alt="" />
                                       <p>Market Location Goes Here</p>
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