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
                                  <h3>Add Stock</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                                      <li class="breadcrumb-item">New Stock</li>
                                      <li class="breadcrumb-item">Add Stock</li>
                                  </ol>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- Container-fluid starts-->
                  <div class="container-fluid">

                      <div class="card">
                          <div class="card-header pb-0">

                              <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                  <div class="box-body">

                                      <?php if ($this->session->flashdata('message')) : ?>

                                          <div class="alert alert-success">

                                              <button type="button" class="close" data-close="alert"></button>

                                              <?php echo $this->session->flashdata('message'); ?>

                                          </div>

                                      <?php endif; ?>






                                      <div class="row">
                                          <div class="col-md-6">
                                              <!-- item_name  Start -->


                                              <div class="form-group">

                                                  <label for="item_name" class="col-sm-3 control-label"> Product Name </label>

                                                  <div>

                                                      <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo set_value("item_name"); ?>">

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("item_name", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>
                                          </div>

                                          <!-- item_name  End -->

                                          <!-- Userid Start -->

                                          <input type="hidden" value="<?php echo $this->session->userdata('userId'); ?>" id="userid" name="userid">

                                          <!-- Userid End -->


                                          <!-- current_quantity Start -->
                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label for="current_quantity" class="col-sm-3 control-label">Current Quantity </label>

                                                  <div>

                                                      <input type="text" class="form-control" id="current_quantity" name="current_quantity" value="<?php echo set_value("current_quantity"); ?>">

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("current_quantity", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>
                                          </div>
                                      </div>

                                      <!-- current_quantity End -->



                                      <div class="row">
                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label for="item_name" class="col-sm-3 control-label"> Remark </label>

                                                  <div>

                                                      <input type="text" class="form-control" id="remark" name="remark" value="<?php echo set_value("remark"); ?>">

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("remark", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>
                                          </div>
                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label for="purchase_date" class="col-sm-3 control-label"> Purchase Date </label>

                                                  <div>

                                                      <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="<?php echo set_value("purchase_date"); ?>">

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("purchase_date", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>

                                          </div>
                                      </div>



                                      <div class="form-group">

                                          <div class="col-sm-3">

                                          </div>

                                          <div class="col-sm-6">

                                              <button type="reset" class="btn btn-default ">Reset</button>

                                              <button type="submit" class="btn btn-info ">Submit</button>

                                          </div>

                                          <div class="col-sm-3">

                                          </div>

                                      </div>

                                  </div>

                                  <!-- /.box-body -->

                                  <div class="box-footer">

                                  </div>

                                  <!-- /.box-footer -->

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

  </body>

  </html>