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
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['totalamount']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Fee</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['fee']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Grand Total</strong></th>
                                                                <th>$<?php echo $this->my_cart->format_number($order['grandtotal']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Order Status</strong></th>
                                                                <th><?php echo ucfirst($order['status']); ?></th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Payment Method</strong></th>
                                                                <th>XXXX XXXX XXXX <?php echo $order['last4']; ?> 
                                                                <?php if($order['paymentstatus']=='unpaid') { ?>
                                                                        <br/><a href="#" data-toggle="modal" data-target="#paymentmethod">Change Card</a>
                                                                <?php } ?>
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Payment Status</strong></th>
                                                                <th><?php echo ucfirst($order['paymentstatus']); ?></th>
                                                        </tr>
                                                        <?php if($order['paymentstatus']=="paid") { ?>
                                                        <tr>
                                                                <th colspan="4">&nbsp;</th>
                                                                <th><strong>Receipt</strong></th>
                                                                <th><a href="<?php echo $order['receipt_url']; ?>" target="_blank">View</a></th>
                                                        </tr>   
                                                        <?php } ?>
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
<?php if($order['paymentstatus']=="unpaid") { ?>
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
<div class="modal fade" id="paymentmethod" tabindex="-1" role="dialog" aria-labelledby="addInventoryModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change PaymentMethod</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="frmorder" id="frmorder" action="<?php echo site_url('consumer/orders/changePaymentMethod'); ?>">
      <input type="hidden" name="id" value="<?php echo $order['id']; ?>"/>
        <div class="modal-body">
            <div class="form-group">
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Card</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>