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
                                            <form name="frmsettings" action="<?php echo site_url('admin/adminsettings/updateSettings'); ?>" id="frmsettings" method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label>Consumer Comission (%)</label>
                                                        <input type="number" name="meta_key[CONSUMER_COMMISSION]" id="CONSUMER_COMMISSION" class="form-control" value="<?php echo $consumercommission; ?>" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</diiv>