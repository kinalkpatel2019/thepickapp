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
</diiv>