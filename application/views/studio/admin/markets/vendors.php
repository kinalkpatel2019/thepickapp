<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Market : <?php echo $market['title']; ?></h1>
                        <hr class="mb-4">
                        <div class="card">
                                  <div class="card-body">
                        <table id="datatableDefault" class="table text-nowrap">
                          <thead>
                          <tr>
                            <th>Vendor Id</th>
                            <th>Business Name</th>
                            <th>Approval Status</th>
                          </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Vendor Id</th>
                            <th>Business Name</th>
                            <th>Approval Status</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($vendors as $vendor) { ?>
                          <tr>
                            <td><?php echo $vendor['vendor_id']; ?></td>
                            <td><?php echo $vendor['businessname']; ?></td>
                            <td><?php echo ($vendor['isapprove']==1) ? "Approved" : "Not Approved"; ?>
                            <?php if($vendor['isapprove']==1) { ?>
                                ( <a href="<?php echo site_url('admin/markets/setStatus'); ?>?market_id=<?php echo $vendor['market_id'];?>&vendor_id=<?php echo $vendor['vendor_id'];?>&status=0">Not Approve</a> )
                            <?php } else {?>
                                ( <a href="<?php echo site_url('admin/markets/setStatus'); ?>?market_id=<?php echo $vendor['market_id'];?>&vendor_id=<?php echo $vendor['vendor_id'];?>&status=1">Approve</a> )
                            <?php } ?>
                            </td>
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