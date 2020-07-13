<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veggie Theme</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/public/vendor.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/public/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/public/custom.css">
    <script  src="<?php echo base_url(); ?>/assets/public/js/vendor/modernizr.js"></script>
  </head>
  <body>
    <!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Main Header -->
    
    <div class="wrap">
      <header class="main-header-v1">
        <div class="header-top-v-1">
          <div class="container">
                <?php $this->load->view('template/front/partials/_navigation'); ?>
			<div class="logo">          
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/public/images/logo.png" height="164" width="164" alt="">
				</a>         
			</div>
            <?php $this->load->view('template/front/partials/_headersocial'); ?>
      </div>
    </div>
    <?php $this->load->view('template/front/partials/_navigationmobile'); ?>
<?php $this->load->view('template/front/partials/_banner'); ?>
</header>
<!-- Main Header // -->