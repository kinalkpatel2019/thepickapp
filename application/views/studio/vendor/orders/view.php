<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Order #<?php echo $order['id']; ?></h1>
                        <?php if(!empty($mode)) { ?>
                        <h3>Thank You for your order! Below are your order details.</h3>
                        <?php } ?>
                        <hr class="mb-4">
                                <div class="table-responsive">
                                        <table class="table">
                                                <thead>
                                                                <tr>
                                                                        <th>Product</th>
                                                                        <th>Qty</th>
                                                                        <th>Price</th>
                                                                        <th>Tax</th>
                                                                        <th>Total Price</th>
                                                                        <th>Site Fee</th>
                                                                        <th>Vendor Amount</th>
                                                                        <th>Status</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                
                                                        <?php $i = 1; ?>
                                                        <?php $sitefee=0; $vendoramount=0; ?>
                                                        <?php foreach ($order_details as $items){  ?>
                                                                <tr>
                                                                        <td><?php echo $items['itemname']; ?><br/><?php echo $items['unit']; ?>
                                                                                <?php if(!empty($items['comment'])) { ?>
                                                                                <br/>Customer Comment : <b><?php echo $items['comment']; ?></b>
                                                                                <?php } ?>
                                                                        </td>
                                                                        <td><?php echo $items['qty'] ?></td>
                                                                        <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                        <td><?php echo $this->my_cart->format_number($items['tax']); ?></td>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['total']); ?></td>
                                                                        <?php $sitefee+=$items['sitefee']; ?>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['sitefee']); ?></td>
                                                                        <?php $vendoramount+=$items['vendoramount']; ?>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['vendoramount']); ?></td>
                                                                        <td>
                                                                        <?php echo ucfirst($items['status']); ?>
                                                                        <?php if($items['status']=='pending') { ?>
                                                                                <br/><a href="<?php echo site_url('vendor/orders/approveOrderItem/'.$items['id']); ?>">Approve</a>
                                                                        <?php } ?>
                                                                        </td>
                                                                </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                                <tr>
                                                                        <th colspan="4">&nbsp;</th>
                                                                        <th><strong>Total</strong></th>
                                                                        <th>$<?php echo $this->my_cart->format_number($sitefee); ?></th>
                                                                        <th>$<?php echo $this->my_cart->format_number($vendoramount); ?></th>
                                                                        <th>Status</th>
                                                                </tr>
                                                        </tfoot>                                               
                                        </table>
                                        </div>                                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>