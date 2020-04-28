<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Coupons</h1>
    <a href="<?php echo site_url('vendor/coupons/add'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50" ></i> Add Coupon</a>
</div>

<div class="row">
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Code</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($coupons as $coupon) { ?>
                      <tr>
                        <td><?php echo $coupon['code']; ?></td>
                        <td><?php echo ($coupon['discount_type']==1) ? "Fixed" : "Percentage"; ?></td>
                        <td><?php echo $coupon['amount']; ?></td>
                        <?php $changestatus=($coupon['status']==1) ? 0 : 1; ?>
                        <td><?php echo ($coupon['status']==1) ? 'Active' : 'Inactive'; ?> ( <a href="<?php echo site_url('vendor/coupons/changeStatus/'.$coupon['id'].'/'.$changestatus); ?>"><?php echo ($coupon['status']==1) ? 'Inactive' : 'Active'; ?></a> )</td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            

</div>
</div>
</div>
</div>