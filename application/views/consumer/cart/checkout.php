<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Checkout</h1>
</div>
<!-- Content Row -->

<!-- Content Row -->
<div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Market</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $market['title'];?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
        </div>
        </div>
        </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Vendor</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vendor['businessname'];?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
        </div>
        </div>
        </div>
        </div>
</div>

<div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <form name="updatecart" id="updatecart" action="<?php echo site_url('consumer/orders/placeOrder'); ?>" method="post">
                            
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr>
                                                                <th>Product</th>
                                                                <th>Qty</th>
                                                                <th>Price</th>
                                                                <th>Total Price</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($this->cart->contents() as $items){  ?>
                                                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                                <tr>
                                                                        <td><a href="<?php echo site_url('consumer/products/view/'.$items['product_id']); ?>">
                                                                                <?php echo $items['name']; ?><br/>
                                                                                <?php echo $items['unit']; ?>
                                                                                </a>
                                                                        </td>
                                                                        <td><?php echo $items['qty'] ?></td>
                                                                        <td><?php echo $this->cart->format_number($items['price']); ?></td>
                                                                        <td>$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                        <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                        <tr>
                                                                <th colspan="2"><button type="submit" class="btn btn-primary">Place Order</button></th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->cart->format_number($this->cart->total()); ?></th>
                                                        </tr>
                                                </tfoot>
                                        </table>
                                </div>
                        </form>           
                        </div>
                </div>
        </div>
</div>