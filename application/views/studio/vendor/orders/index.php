<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">My Orders</h1>
                        <hr class="mb-4">
                        <table id="datatableDefault" class="table text-nowrap">
                          <thead>
                          <tr>
                            <th>Order Id</th> 
                            <th>Order Date & Time</th>
                            <th>Market</th>
                            <th>Total Items</th>
                            <th>Total Amount</th>
                            <th>Total Tax</th>
                            <th>Site Fee</th>
                            <th>Vendor Amount</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Order Id</th> 
                              <th>Order Date & Time</th>
                              <th>Market</th>
                              <th>Total Items</th>
                              <th>Total Amount</th>
                              <th>Total Tax</th>
                              <th>Site Fee</th>
                              <th>Vendor Amount</th>
                              <th>View</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($orders as $order) { ?>
                          <tr>
                            <th><?php echo $order['id']; ?></th>
                            <th><?php echo $order['created_at']; ?></th>
                            <th><?php echo $order['title']; ?></th>
                            <th><?php echo $order['items']; ?></th>
                            <th><?php echo $order['total']; ?></th>
                            <th><?php echo $order['tax']; ?></th>
                            <th><?php echo $order['sitefee']; ?></th>
                            <th><?php echo $order['vendoramount']; ?></th>
                            <th><a href="<?php echo site_url('vendor/orders/view/'.$order['id']); ?>">View</a></th>
                          </tr>
                        <?php } ?>
                      </tbody>
                          </table>                                                               
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>