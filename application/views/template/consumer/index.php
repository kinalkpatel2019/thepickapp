<?php $this->load->view('template/consumer/_header'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php $this->load->view('template/consumer/_sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php $this->load->view('template/consumer/_topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php $this->load->view($main_content); ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php $this->load->view('template/consumer/_footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

 <?php $this->load->view('template/consumer/_additionalfooter'); ?>

 <?php $this->load->view('template/consumer/_footerscripts'); ?>
 
</body>

</html>
