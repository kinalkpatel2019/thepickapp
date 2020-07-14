<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Vendor Payment (Unpaid)</h1>
                        <hr class="mb-4">
                        <div class="card">
                                  <div class="card-body">
                        <table id="" class="table">
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
								<th colspan="2">Action</th>
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
                            <th>
							<a href="#" class="payvendor" id="<?php echo $order['id']; ?>">pay</a>
							| <a href="<?php echo site_url('admin/vendorpayments/view/'.$order['id']); ?>">View</a></th>
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
</div>
<div class="modal fade" id="modalvendor">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Vendor Details</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body vendor_data">
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary mr-2">Confirm</button>
			</div>
			
		</div>
	</div>
</div>