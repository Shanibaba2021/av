  <!----- HEADER -----------------> 
  <?php $this->load->view('inc/header.php'); ?>
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
	  <?php $this->load->view('inc/pageheader.php'); ?>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
		<?php $this->load->view('inc/sidebar.php'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Branches</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item">Branch Add</li>
                   </ol>
                </div>
 
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">

          
		  
 
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
		<?php $this->load->view('inc/footer.php'); ?>
        <!-- footer end-->

      </div>
    </div>
	    <!-- footer script start-->
		<?php $this->load->view('inc/footerscript.php'); ?>
        <!-- footer script end-->
  
  </body>
</html>