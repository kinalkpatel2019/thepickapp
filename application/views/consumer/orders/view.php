<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order #<?php echo $order['id']; ?></h1>
</div>
<!-- Content Row -->
<?php if(!empty($mode)) { ?>
    <h3>Thank You for your order! Below are your order details.</h3>
<?php } ?>
<!-- Content Row -->
<div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Market</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order['title'];?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order['businessname'];?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Status</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order['status'];?></div>
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
                                                        <?php foreach ($order_details as $items){  ?>
                                                                <tr>
                                                                        <td><?php echo $items['itemname']; ?><br/><?php echo $items['unit']; ?></td>
                                                                        <td><?php echo $items['qty'] ?></td>
                                                                        <td><?php echo $this->cart->format_number($items['price']); ?></td>
                                                                        <td>$<?php echo $this->cart->format_number($items['total']); ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->cart->format_number($order['totalamount']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Coupon</strong></th>
                                                                <th><?php echo $order['couponcode']; ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Discount</strong></th>
                                                                <th>$<?php echo $this->cart->format_number($order['discount']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="2">&nbsp;</th>
                                                                <th><strong>Grand Total</strong></th>
                                                                <th>$<?php echo $this->cart->format_number($order['grandtotal']); ?></th>
                                                        </tr>
                                                </tfoot>
                                        </table>
                                </div>  
                        </div>
                </div>
        </div>
</div>