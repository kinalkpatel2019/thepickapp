<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Checkout</h1>
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
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                                
                                                                        <?php foreach ($this->my_cart->contents() as $items){  ?>
                                                                                <tr>
                                                                                        <td><a href="<?php echo site_url('consumer/products/view/'.$items['product_id']); ?>">
                                                                                                <?php echo $items['name']; ?><br/>
                                                                                                <?php echo $items['unit']; ?>
                                                                                                </a>
                                                                                        </td>
                                                                                        <td><?php echo $items['qty'] ?></td>
                                                                                        <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                                        <td><?php echo $this->my_cart->format_number($items['tax']); ?>%</td>
                                                                                        <td>$<?php echo $this->my_cart->format_number($items['subtotal']); ?></td>
                                                                                </tr>
                                                                        <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                        <th colspan="3">&nbsp;</th>
                                                                        <th><strong>Total</strong></th>
                                                                        <th>$<?php echo $this->my_cart->format_number($this->my_cart->total()); ?></th>
                                                                </tr>
                                                                <tr>
                                                                        <th colspan="3">&nbsp;</th>
                                                                        <th><strong>Fee</strong></th>
                                                                        <th>$<?php echo $this->my_cart->format_number($this->my_cart->fee()); ?></th>
                                                                </tr>
                                                                <tr>
                                                                        <th colspan="3">&nbsp;</th>
                                                                        <th><strong>Grad Total</strong></th>
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
    </div>
</diiv>