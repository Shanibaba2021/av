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
                                  <h3>Admin</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="../ltr/index.html">Home</a></li>
                                      <li class="breadcrumb-item">Admin</li>
                                      <li class="breadcrumb-item">Add Admin</li>
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

										  <label class="col-sm-3 control-label" for="fname">First Name</label>

										  <div>

											  <input type="text" class="form-control"  value="<?php echo set_value("fname"); ?>" id="fname" name="fname" required>

										  </div>

										  <div class="col-sm-5">

											  <?php echo form_error("fname", "<span class='label label-danger'>", "</span>") ?>

										  </div>

									  </div>
									  </div>


									<div class="col-md-6">
									  <div class="form-group">

										  <label class="col-sm-3 control-label" for="lname">Last Name</label>

										  <div >

											  <input type="text" class="form-control"  value="<?php echo set_value("lname"); ?>" id="lname" name="lname" required>

										  </div>

										  <div class="col-sm-5">

											  <?php echo form_error("lname", "<span class='label label-danger'>", "</span>") ?>

										  </div>

									  </div>
									  

								</div>	
							</div>
							
								<div class="row">
								<div class="col-md-6">

								  <div class="form-group">

									  <label class="col-sm-3 control-label" for="email">Email</label>

									  <div>

										  <input type="email" class="form-control"   value="<?php echo set_value("email"); ?>" id="email" name="email" required>

									  </div>

									  <div class="col-sm-5">

										  <?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>

									  </div>

								  </div>
								  </div>
								  <div class="col-md-6">

								  <div class="form-group">

									  <label class="col-sm-3 control-label" for="image">Mobile</label>

									  <div >

										  <input type="text" class="form-control" value="<?php echo set_value("mobile"); ?>" id="mobile" name="mobile" required>

									  </div>

									  <div class="col-sm-5">

										  <?php echo form_error("mobile", "<span class='label label-danger'>", "</span>") ?>

									  </div>

									</div>
								</div>
								  </div>




                             <div class="row">
								<div class="col-md-6">
									  <div class="form-group">

										  <label class="col-sm-3 control-label" for="Password">Password</label>

										  <div >

											  <input type="password" class="form-control"   value="<?php echo set_value("password"); ?>" id="password" name="password" required>

										  </div>

										  <div class="col-sm-5">

											  <?php echo form_error("password", "<span class='label label-danger'>", "</span>") ?>

										  </div>

									  </div>
									  </div>
									  <div class="col-md-6">
									  <div class="form-group">

										  <label class="col-sm-3 control-label" for="Password">Confirm Password</label>

										  <div >

											  <input type="password" class="form-control"  value="<?php echo set_value("cpassword"); ?>" id="cpassword" name="cpassword" required>

										  </div>

										  <div class="col-sm-5">

											  <?php echo form_error("cpassword", "<span class='label label-danger'>", "</span>") ?>

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