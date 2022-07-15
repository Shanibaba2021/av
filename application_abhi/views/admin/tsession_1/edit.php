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
                                  <h3>Training Video</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                                      <li class="breadcrumb-item">Training Video</li>
                                      <li class="breadcrumb-item">Edit Training Video</li>
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

                                              <div class="form-group">

                                                  <label for="name" class="col-sm-3 control-label">Session Name </label>

                                                  <div>

                                                      <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value("name", html_entity_decode($data->name)); ?>">

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("name", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>
                                          </div>
                                          <div class="col-md-6">

                                              <div class="form-group">

                                                  <label for="safety_kit" class="col-sm-3 control-label"> Loan Id </label>

                                                  <div>

                                                      <input type="text" class="form-control" id="loan_id" name="loan_id" value="<?php echo set_value("loan_id", html_entity_decode($data->loan_id)); ?>">

                                                  </div>

                                                  <div class="col-sm-5">

                                                      <?php echo form_error("loan_id", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>





                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">

                                                  <label for="fid" class="col-sm-3 control-label"> Field Worker </label>

                                                  <div class=" ">

                                                      <select class="form-control " name="fid" id="fid">

                                                          <option value="">Select Field Worker</option>

                                                          <?php

                                                            if (isset($fid) && !empty($fid)) :

                                                                foreach ($fid as $key => $value) : ?>

                                                                  <option value="<?php echo $value->userId; ?>" <?php echo $value->userId == $data->fid ? 'selected="selected"' : ""; ?>>

                                                                      <?php echo $value->fname . " " . $value->lname; ?>

                                                                  </option>

                                                              <?php endforeach; ?>

                                                          <?php endif; ?>

                                                      </select>

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("fid", "<span class='label label-danger'>", "</span>") ?>

                                                  </div>

                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group">

                                                  <label for="bid" class="col-sm-3 control-label"> Branch </label>

                                                  <div class=" ">

                                                      <select class="form-control " name="bid" id="bid">

                                                          <option value="">Select Branch</option>

                                                          <?php

                                                            if (isset($bid) && !empty($bid)) :

                                                                foreach ($bid as $key => $value) : ?>

                                                                  <option value="<?php echo $value->branchId; ?>" <?php echo $value->branchId == $data->bid ? 'selected="selected"' : ""; ?>>

                                                                      <?php echo $value->bname; ?>

                                                                  </option>

                                                              <?php endforeach; ?>

                                                          <?php endif; ?>

                                                      </select>

                                                  </div>

                                                  <div class="col-sm-5">



                                                      <?php echo form_error("bid", "<span class='label label-danger'>", "</span>") ?>

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
              <?php $this->load->view('inc/footer.php'); ?>
              <!-- footer end-->

          </div>
      </div>
      <!-- footer script start-->
      <?php $this->load->view('inc/footerscript.php'); ?>
      <!-- footer script end-->

  </body>

  </html>