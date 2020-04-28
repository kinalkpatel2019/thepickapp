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
                                                        <?php foreach ($this->my_cart->contents() as $items){  ?>
                                                                <tr>
                                                                        <td><a href="<?php echo site_url('consumer/products/view/'.$items['product_id']); ?>">
                                                                                <?php echo $items['name']; ?><br/>
                                                                                <?php echo $items['unit']; ?>
                                                                                </a>
                                                                        </td>
                                                                        <td><?php echo $items['qty'] ?></td>
                                                                        <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['subtotal']); ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($this->my_cart->total()); ?></th>
                                                        </tr>
                                                        <?php $coupon=$this->my_cart->coupon(); ?>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                        <?php if(empty($coupon['code'])) { ?>
                                                                                <th><strong>Apply Coupon</strong></th>
                                                                                <th>
                                                                                <form name="applycoupon" id="applycoupon" action="<?php echo site_url('consumer/cart/applyCoupon'); ?>" method="post">
                                                                                        <input type="text" name="code" id="code" value=""/>
                                                                                        <input type="submit" name="apply" id="apply" value="Apply" class="btn btn-primary">
                                                                                </form>
                                                                                </th>
                                                                        <?php } else {  ?>
                                                                                <th><strong>Coupon</strong></th>
                                                                                <th>
                                                                                <form name="removecoupon" id="removecoupon" action="<?php echo site_url('consumer/cart/removeCoupon'); ?>" method="post">
                                                                                        <?php echo $coupon['code']; ?>
                                                                                        <input type="submit" name="remove" id="remove" value="Remove Code" class="btn btn-primary">
                                                                                </form>
                                                                                </th>
                                                                        <?php } ?>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Discount</strong></th>
                                                                <th>$<?php echo (!empty($coupon['discount'])) ? $this->my_cart->format_number($coupon['discount']) : 0 ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Grand Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($this->my_cart->final_total()); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="3">&nbsp;</th>
                                                                <th>
                                                                <form name="order" id="order" action="<?php echo site_url('consumer/orders/placeOrder'); ?>" method="post">
                                                                        <input type="submit" name="remove" id="remove" value="Place Order" class="btn btn-primary">
                                                                </form>
                                                                </th>
                                                        </tr>
                                                </tfoot>
                                        </table>
                                </div>    
                        </div>
                </div>
        </div>
</div>