<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                                        <div class="card-body">
                        <h1 class="page-header">My Reports</h1>
                        <ht class="mb-4">
                        <div class="form-group">
							<div class="row">
								<div class="col-sm-3">
									<label>Select Market</label>
									<select name="market_report" id="market_report" class="form-control" onchange="window.location.href='?market_id='+this.value;">
										<option value="">All</option>
										<?php foreach($vendor_markets as $market) { ?>
										  <option value="<?php echo $market['id']; ?>" <?php echo ($market['id']==$selected_market) ? "selected=''" : ''; ?>><?php echo $market['title']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3">
									<label>Select Category</label>
									<select name="category_market" id="category_market" class="form-control" onchange="window.location.href='?category='+this.value;">
										<option value="">All</option>
										<?php foreach($categories as $Category) { ?>
										  <option value="<?php echo $Category['id']; ?>"<?php echo ($Category['id']==$selected_category) ? "selected=''" : ''; ?>><?php echo $Category['title']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3">
									<label>Start Date</label>
										<input class="form-control" value="<?php if(!empty($selected_from_date)){ echo $selected_from_date;}else { echo date('Y-m-d'); }?>" type="date" id="from_date_market">
								 </div>
								 <div class="col-sm-3">
									<label>End Date</label>
										<input class="form-control" value="<?php if(!empty($selected_to_date)){ echo $selected_to_date;}else { echo date('Y-m-d'); }?>" type="date" id="to_date_market">
								 </div>
							 </div>
                        </div>
                       
                        <table id="datatableDefault" class="table text-nowrap" data-order='[0, "desc"]'>
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
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($orders as $order) { ?>
                          <tr>
                            <td><a href="<?php echo site_url('vendor/orders/view/'.$order['id']); ?>"><?php echo $order['id']; ?></a></td>
                            <td><?php echo $order['created_at']; ?></td>
							<td><?php echo $order['title']; ?></td>
                            <td><?php echo $order['items']; ?></td>
							
                            <td><?php echo $order['total']; ?></td>
                            <td><?php echo $order['tax']; ?></td>
                            <td><?php echo $order['sitefee']; ?></td>
                            <td><?php echo $order['vendoramount']; ?></td>
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