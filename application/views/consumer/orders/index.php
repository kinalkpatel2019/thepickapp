<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">MyOrders</h1>
</div>

<div class="row">
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order Id</th>
                      <th>Vendor</th>
                      <th>Market</th>
                      <th>Total Items</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Order Id</th>
                        <th>Vendor</th>
                        <th>Market</th>
                        <th>Total Items</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>View</th>
                        </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($orders as $order) { ?>
                      <tr>
                        <th><?php echo $order['id']; ?></th>
                        <th><?php echo $order['businessname']; ?></th>
                        <th><?php echo $order['title']; ?></th>
                        <th><?php echo $order['total_items']; ?></th>
                        <th><?php echo $order['totalamount']; ?></th>
                        <th><?php echo $order['status']; ?></th>
                        <th><a href="<?php echo site_url('consumer/orders/view/'.$order['id']); ?>">View</a></th>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            

</div>
</div>
</div>
</div>