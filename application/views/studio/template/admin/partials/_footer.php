<!-- ================== BEGIN core-js ================== -->
<script src="<?php echo base_url(); ?>assets/studio/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
    <?php foreach($JSs as $js){ ?>
        <script src="<?php echo base_url(); ?>assets/studio/<?php echo $js; ?>"></script>
    <?php } ?>
    <?php foreach($EX as $js){ ?>
        <script src="<?php echo $js; ?>" async defer></script>
    <?php } ?>
	<!-- ================== END page-js ================== -->
</body>
</html>