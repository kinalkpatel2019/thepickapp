<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">My Orders</h1>
                        <hr class="mb-4">
                        <table id="datatableDefault" class="table text-nowrap" data-order='[0, "desc"]'>
                          <thead>
                          <tr>
                            <th>Order Id</th> 
                            <th>Market</th>
                            <th>Total Items</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Order Id</th>
                              <th>Market</th>
                              <th>Total Items</th>
                              <th>Total Amount</th>
                              <th>Status</th>
                              </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($orders as $order) { ?>
                          <tr>
                            <td><a href="<?php echo site_url('consumer/orders/view/'.$order['id']); ?>"><?php echo $order['id']; ?></a></td>
                            <td><?php echo $order['title']; ?></td>
                            <td><?php echo $order['total_items']; ?></td>
                            <td><?php echo $order['totalamount']; ?></td>
                            <td><?php echo ucfirst($order['status']); ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                          </table>                                                               
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>