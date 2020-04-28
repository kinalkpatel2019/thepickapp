<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cart</h1>
</div>
<!-- Content Row -->

<div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <form name="updatecart" id="updatecart" action="<?php echo site_url('consumer/cart/updateCart'); ?>" method="post">
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
                                                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                                <tr>
                                                                        <td><a href="<?php echo site_url('consumer/products/view/'.$items['product_id']); ?>">
                                                                                <?php echo $items['name']; ?><br/>
                                                                                <?php echo $items['unit']; ?>
                                                                                </a>
                                                                        </td>
                                                                        <td>
                                                                                <?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','class'=>'form-control')); ?>
                                                                                        
                                                                        </td>
                                                                        <td><?php echo $this->my_cart->format_number($items['price']); ?></td>
                                                                        <td>$<?php echo $this->my_cart->format_number($items['subtotal']); ?></td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                        <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                        <tr>
                                                                <th colspan="2"><button type="submit" class="btn btn-primary">Update Cart</button></th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($this->cart->total()); ?></th>
                                                        </tr>
                                                </tfoot>
                                        </table>
                                </div>
                        </form>
                        <a href="<?php echo site_url('consumer/cart/checkout'); ?>" class="btn btn-primary">Checkout</a>               
                        </div>
                </div>
        </div>
</div>