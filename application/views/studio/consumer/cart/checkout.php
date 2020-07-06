<!-- BEGIN #content -->
<style>
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('<?php echo STRIPE_PUBLISH; ?>');
</script>
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">Checkout</h1>
                        <hr class="mb-4">
                                <div class="table-responsive">
                                <form name="frmorder" id="frmorder" action="<?php echo site_url('consumer/orders/placeOrder'); ?>" method="post">
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
                                                                                        <td><?php echo $items['name']; ?><br/>
                                                                                        <?php echo $items['unit']; ?>
                                                                                        From : <?php echo $items['vendor'];?><br/>
                                                                                        <?php if($items['is_comment']==1 && !empty($items['comment'])) { ?>
                                                                                        Your Comment: <b><?php echo $items['comment']; ?></b><br/>
                                                                                        <?php } ?>
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
																<?php 
																$directvendorid=$this->session->userdata('vendorshop');
																if(empty($directvendorid)){
																?>
                                                                <tr>
                                                                        <th colspan="3">&nbsp;</th>
                                                                        <th><strong>Pick Up Date & Time</strong></th>
                                                                        <th>
                                                                        <select name="pickup" class="form-control" id="pickup">
                                                                                <?php foreach($datedropdown as $item){ ?>
                                                                                        <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                        </th>
                                                                </tr>
																<?php } ?>
                                                        <tr>
                                                                <td colspan="3">&nbsp;</td>
                                                                <td><strong>Credit or debit card</strong></td>
                                                                <td>Your Card Will be charged once <br/>all items are approved from vendors.</td>
                                                        </tr>
                                                        <tr>
                                                                <td colspan="3">&nbsp;</td>
                                                                <td colspan="2">
                                                                        <div id="card-element"></div>
                                                                        <div id="card-errors" role="alert"></div>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th>
                                                                        <input type="submit" name="placeorder" id="placeorder" value="Place Order" class="btn btn-primary">
                                                                </th>
                                                        </tr>
                                                </tfoot>                                               
                                        </table>
                                        </form>
                                        </div>         
                                        </div>
                                        </div>                                                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
