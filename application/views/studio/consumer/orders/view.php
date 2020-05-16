<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Order #<?php echo $order['id']; ?></h1>
                       
                        <div class="card mb-3">
                                        <div class="card-body">
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
                                                                        <th>Status</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($order_details as $items){  ?>
                                                                <tr>
                                                                        <td>
                                                                                <?php echo $items['itemname']; ?><br/>
                                                                                <?php echo $items['unit']; ?>
                                                                                <?php if(!empty($items['comment'])) { ?>
                                                                                <br/>Your Comment:<b><?php echo $items['comment']; ?></b>
                                                                                <?php } ?>
                                                                                </td>
                                                                        <td><?php echo $items['qty'] ?></td>
                                                                        <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                        <td><?php echo $this->my_cart->format_number($items['tax']); ?></td>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['total']); ?></td>
                                                                        <td><?php echo ucfirst($items['status']); ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                                <th colspan="3">&nbsp;</th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['totalamount']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="3">&nbsp;</th>
                                                                <th><strong>Fee</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['fee']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="3">&nbsp;</th>
                                                                <th><strong>Grand Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['grandtotal']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="3">&nbsp;</th>
                                                                <th><strong>Order Status</strong></th>
                                                                <th><?php echo ucfirst($order['status']); ?></th>
                                                        </tr>
                                                </tfoot>                                               
                                        </table>
                                        </div>   
                                </div>
                        </div>                                                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>