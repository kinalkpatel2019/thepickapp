
<?php $this->load->view('studio/template/consumer/partials/_head'); ?>
<!-- BEGIN #app -->
<div id="app" class="app">
    <?php $this->load->view('studio/template/consumer/partials/_header'); ?>
            
    <?php $this->load->view('studio/template/consumer/partials/_sidebar'); ?>
    <?php $this->load->view($main_content); ?>
            
    <!-- BEGIN btn-scroll-top -->
    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
    <!-- END btn-scroll-top -->
</div>
<!-- END #app -->
<?php $this->load->view('studio/template/consumer/partials/_footer'); ?>