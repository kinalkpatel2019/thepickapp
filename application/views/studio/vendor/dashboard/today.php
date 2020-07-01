<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                        <h1 class="page-header">Today Orders</h1>
                        <ht class="mb-4">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label>Select Market</label>
                                <select name="market" id="market" class="form-control">
                                    <option value="">All</option>
                                    <?php foreach($vendor_markets as $market) { ?>
                                      <option value="<?php echo $market['id']; ?>" <?php echo ($market['id']==$selected_market) ? "selected=''" : ''; ?>><?php echo $market['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Select Item</label>
                                <select name="item" id="item" class="form-control">
                                    <option value="">All</option>
                                    <?php foreach($items as $item) { ?>
                                      <option value="<?php echo $item['title']; ?>" <?php echo ($item['title']==$selected_item) ? "selected=''" : ''; ?>><?php echo $item['title']; ?></option>
                                    <?php } ?>
                                </select>
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
                        <?php 
                            $totalitems=0;
                            $totalamount=0;
                            $totaltax=0;
                            $totalsitefee=0;
                            $totalvendoramount=0;
                        foreach($orders as $order) { 
                            $totalitems+=$order['items'];
                            $totalamount+=$order['total'];
                            $totaltax+=$order['tax'];
                            $totalsitefee+=$order['sitefee'];
                            $totalvendoramount+=$order['vendoramount'];
                            ?>
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
                      <tfoot>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td><?php echo $totalitems; ?></td>
                                <td><?php echo $totalamount; ?></td>
                                <td><?php echo $totaltax; ?></td>
                                <td><?php echo $totalsitefee; ?></td>
                                <td><?php echo $totalvendoramount; ?></td>
                            </tr>
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
