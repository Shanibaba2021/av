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
                                  <h3>User</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                                      <li class="breadcrumb-item">User</li>
                                      <li class="breadcrumb-item">Add User</li>
                                  </ol>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- Container-fluid starts-->
                  <div class="container-fluid">


                      <div class="row">
                          <div class="col-sm-12">

                              <div class="card">
                                  <div class="card-header pb-0">
                                      <?php
                                        $success = $this->session->flashdata('success');
                                        if ($success) {
                                        ?>
                                          <div class="alert alert-success alert-dismissable">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                              <?php echo $this->session->flashdata('success'); ?>
                                          </div>
                                      <?php } ?>
                                      <h5>Add New User</h5>
                                  </div>
                                  <div class="card-body">
                                      <?php $this->load->helper("form"); ?>
                                      <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" enctype="multipart/form-data" method="post" role="form">
                                          <div class="box-body">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="fname">First Name</label>
                                                          <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                                          <?php echo form_error("fname", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="fname">Last Name</label>
                                                          <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="lname" name="lname" maxlength="128">
                                                          <?php echo form_error("lname", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>

                                                  </div>
                                              </div>
                                              
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="email">Email address</label>
                                                          <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                                          <?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="password">Password</label>
                                                          <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                                          <?php echo form_error("password", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="cpassword">Confirm Password</label>
                                                          <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                                          <?php echo form_error("cpassword", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="mobile">Mobile</label>
                                                          <input type="text" class="form-control required digit" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10" aria-required="true">
                                                          <?php echo form_error("mobile", "<span class='label label-danger'>", "</span>") ?>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="image">Image</label>
                                                          <input type="file" class="form-control " id="image" name="image" maxlength="20">
                                                      </div>
                                                  </div>
                                                  <!-- <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bcode">Branch</label>
                                                  <select class="form-control select2" name="brname" id="brname">

                                                      <option value="">Select Branch</option>

                                                      <?php

                                                        if (isset($plants) && !empty($plants)) :

                                                            foreach ($plants as $key => $value) : ?>

                                                              <option value="<?php echo $value->branchId; ?>">

                                                                  <?php echo $value->bname; ?>

                                                              </option>

                                                          <?php endforeach; ?>

                                                      <?php endif; ?>

                                                  </select>
                                              </div>
                                          </div> -->
                                              </div>
                                          </div><!-- /.box-body -->

                                          <div class="box-footer">
                                              <input type="submit" class="btn btn-primary" value="Submit" />
                                              <input type="reset" class="btn btn-default" value="Reset" />
                                          </div>
                                      </form>
                                  </div>
                              </div>

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