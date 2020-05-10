<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Coupon</h1>
</div>
<!-- Content Row -->
<div class="row">

    
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmupdateprofile" action="<?php echo site_url('vendor/coupons/insertCoupon'); ?>" id="frmupdateprofile" method="post"> 
               
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Coupon Code</label>
                        <input type="text" class="form-control" name="code" id="code" value="" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Description</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Discount Type</label>
                        <select name="discount_type" id="discount_type" class="form-control">
                            <option value="1">Fixed</option>
                            <option value="2">Percentage</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                           Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</div>

<!-- Content Row -->