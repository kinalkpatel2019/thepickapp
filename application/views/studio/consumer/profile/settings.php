<!-- Page Heading -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Settings</h1>
</div>
<!-- Content Row -->
<div class="row">

    
    <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

            <form name="frmupdateSettings" action="<?php echo site_url('vendor/profile/updateSettings'); ?>" id="frmupdateSettings" method="post"> 
               
                <div class="form-group">
                    <div class="col-sm-6">
                        <label>Associated Markets</label>
                        <select name="markets[]" id="markets" class="form-control" multiple="multiple">
                            
                            <?php foreach($markets as $market){ ?>
                                    <option value="<?php echo $market['id']; ?>" <?php echo (in_array($market['id'],$vendormarkets)) ? 'selected=""' : ''; ?>><?php echo $market['title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Update Settings
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</div>

<!-- Content Row -->
<script>
$(document).ready(function(){
    $('#markets').select2({
      placeholder: 'Select Markets',
    });
});
</script>