<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Settings</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form name="frmupdateprofile" action="<?php echo site_url('vendor/profile/updateSettings'); ?>" id="frmupdateprofile" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Associated Markets</label>
                                                        <select name="markets[]" id="markets" class="form-control selectpicker" multiple="multiple" data-style="btn-default">
                                                            
                                                            <?php foreach($markets as $market){ ?>
                                                                    <option value="<?php echo $market['id']; ?>" <?php echo (in_array($market['id'],$vendormarkets)) ? 'selected=""' : ''; ?>><?php echo $market['title']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            Update Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                       
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>