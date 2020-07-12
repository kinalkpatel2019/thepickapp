<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>The Pick App | Home</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="<?php echo base_url(); ?>assets/studio/css/app.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/studio/css/custom.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
    <!-- ================== BEGIN page-css ================== -->
	<?php foreach($CSSs as $css){ ?>
    	<link href="<?php echo base_url(); ?>assets/studio/<?php echo $css; ?>" rel="stylesheet" />
    <?php } ?>
	<!-- ================== END page-css ================== -->

	<?php foreach($EXC as $css){ ?>
    	<link href="<?php echo $css; ?>" rel="stylesheet" />
    <?php } ?>

</head>
<body>