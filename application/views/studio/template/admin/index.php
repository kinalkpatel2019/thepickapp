
<?php $this->load->view('studio/template/admin/partials/_head'); ?>
<!-- BEGIN #app -->
<div id="app" class="app">
    <?php if($admin['accounttype']==1) { ?>
        <?php $this->load->view('studio/template/admin/partials/_header'); ?>
    <?php } else { ?>
        <?php $this->load->view('studio/template/admin/partials/_managerheader'); ?>
    <?php } ?>
    
    <?php if($admin['accounttype']==1) { ?>
        <?php $this->load->view('studio/template/admin/partials/_sidebar'); ?>
    <?php } else { ?>
        <?php $this->load->view('studio/template/admin/partials/_managersidebar'); ?>
    <?php } ?>
    <?php $this->load->view($main_content); ?>
            
    <!-- BEGIN btn-scroll-top -->
    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    <!-- END btn-scroll-top -->
</div>
<!-- END #app -->
<?php $this->load->view('studio/template/admin/partials/_footer'); ?>