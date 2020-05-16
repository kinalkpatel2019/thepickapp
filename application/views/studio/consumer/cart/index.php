<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">

                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">Cart</h1>
                        <hr class="mb-4">
                        <form name="updatecart" id="updatecart" action="<?php echo site_url('consumer/cart/updateCart'); ?>" method="post">
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
                                                                
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($this->my_cart->contents() as $items){  ?>
                                                                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                                        <tr>
                                                                                <td><a href="<?php echo site_url('consumer/products/view/'.$items['product_id']); ?>">
                                                                                <?php echo $items['name']; ?></a><br/>
                                                                                <?php echo $items['unit']; ?><br/>
                                                                                From : <?php echo $items['vendor'];?><br/>
                                                                                <?php if($items['is_comment']==1) { ?>
                                                                                        <input class="form-control" type="text" name="<?php echo $i; ?>[comment]" placeholder="Add Your Comment Here" maxlength="100" value="<?php echo $items['comment']; ?>"/>
                                                                                <?php } ?>
                                                                                </td>
                                                                                <td>
                                                                                        <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','class'=>'form-control')); ?>
                                                                                                
                                                                                </td>
                                                                                <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                                <td><?php echo $this->my_cart->format_number($items['tax']); ?>%</td>
                                                                                <td>$<?php echo $this->my_cart->format_number($items['subtotal']); ?></td>
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                                <tr>
                                                                        <th colspan="3"><button type="submit" class="btn btn-primary">Update Cart</button></th>
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
                                                                        <th colspan="4">&nbsp;</th>
                                                                        <th><a href="<?php echo site_url('consumer/cart/checkout'); ?>" class="btn btn-primary">Checkout</a></th>
                                                                </tr>
                                                        </tfoot>                                                
                                        </table>
                                        </div>
                                                                </form>
                                                                
                   
                   
                   
                   
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>