<!-- BEGIN #content -->
<div id="content" class="app-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="page-header">Get Paid</h1>
                        <hr class="mb-4">
                        

                        <div class="row">
                                <div class="col-xl-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <?php if(empty($stripeaccount)) { ?>
                                                <p>In Order To receive Funds into your account. You must connect to stipe.</p>
                                                <a href="<?php echo $stripe_button_url; ?>" class="btn btn-primary">Connect With Stripe</a>
                                            <?php } else {?>
                                                <p>Access Your Stripe Account From Here: </p>
                                                <a href="<?php echo $login_link['url']; ?>" target="_blank" class="btn btn-primary">Access Your Stripe Account</a>
                                            <?php } ?>
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