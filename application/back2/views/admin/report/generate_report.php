<!----- HEADER ----------------->
<?php $this->load->view('inc/header'); ?>
<!----- HEADER ----------------->
</head>

<body>
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="theme-loader">
      <div class="loader-p"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php $this->load->view('inc/pageheader'); ?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        <div class="container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-6">
                <h3>Report </h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                  <li class="breadcrumb-item">Report </li>
                  <li class="breadcrumb-item">Report Generate</li>
                </ol>
              </div>

            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">

          <div class="col-sm-12">
            <div class="card">


              <?php
              $success = $this->session->flashdata('success');
              if ($success) {
              ?>
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php } ?>


              <form action="<?php echo base_url('get_report') ?>" id="" class="form-horizontal " method="post">
                <div class="social-tab" style="text-align: center;">
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav nav-tabs" id="top-tab" role="tablist">
                      <input type="text" class="form-control" name="datepicker" id="datepicker" required/>
                      <input type="hidden" class="form-control" name="userId" id="userId" value="<?php echo $result[0]['userId']; ?>" />
                    </li>
                    <li class="nav nav-tabs" id="top-tab" role="tablist">
                      <input type="submit" name="submit" value="submit" class="btn btn-info">
                    </li>
                  </ul>
                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- Container-fluid Ends-->
      </div>
      <!-- footer start-->
      <?php $this->load->view('inc/footer'); ?>
      <!-- footer end-->

    </div>
  </div>
  <!-- footer script start-->
  <?php $this->load->view('inc/footerscript'); ?>
  <!-- footer script end-->

  <script type="text/javascript">
    $("#datepicker").datepicker({
      format: "yyyy-mm",
      startView: "months",
      minViewMode: "months"
    });
  </script>

</body>

</html>