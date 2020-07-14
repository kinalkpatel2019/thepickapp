<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Reports</h1>
						 <hr class="mb-4">
                        <div class="card">
                         <div class="card-body">
                        <table id="datatableDefault" class="table">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Order Date & Time</th> 
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Market</th>
                            <th>Total Amount</th>
                            <th>Fee</th>
                            <th>Grand Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Order Date & Time</th> 
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Market</th>
                            <th>Total Amount</th>
                            <th>Fee</th>
                            <th>Grand Total</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($orders as $order) { ?>
                          <tr>
                            <th><?php echo $order['id']; ?></th>
                            <th><?php echo $order['created_at']; ?></th>
                            <th><?php echo $order['firstname'].' '.$order['lastname']; ?></th>
                            <th><?php echo $order['email']; ?></th>
                            <th><?php echo $order['title']; ?></th>
                            <th><?php echo $order['totalamount']; ?></th>
                            <th><?php echo $order['fee']; ?></th>
                            <th><?php echo $order['grandtotal']; ?></th>
                            <th><a href="<?php echo site_url('admin/orders/view/'.$order['id']); ?>">View</a></th>
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