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

                      <table class='table table-bordered' style='width:70%;' align='center'>




                          <tr>

                              <td>

                                  <label for="lname" class=" control-label"> Branch Name </label>

                              </td>

                              <td>

                                  <?php echo set_value("bname", html_entity_decode($userInfo->bname)); ?>

                              </td>

                          </tr>



                          <tr>

                              <td>

                                  <label for="email" class="control-label"> Branch addres </label>

                              </td>

                              <td>

                                  <?php echo set_value("address", html_entity_decode($userInfo->address)); ?>

                              </td>

                          </tr>

                          <tr>

                              <td>

                                  <label for="mobile" class="control-label"> Branch District </label>

                              </td>

                              <td>

                                  <?php echo set_value("district", html_entity_decode($userInfo->district)); ?>

                              </td>

                          </tr>

                          <tr>

                              <td>

                                  <label for="mobile" class="control-label"> Branch State </label>

                              </td>

                              <td>

                                  <?php echo set_value("state", html_entity_decode($userInfo->state)); ?>

                              </td>

                          </tr>

                          <tr>

                              <td>

                                  <label for="mobile" class="control-label"> Branch Zipcode </label>

                              </td>

                              <td>

                                  <?php echo set_value("zipcode", html_entity_decode($userInfo->zipcode)); ?>

                              </td>

                          </tr>


                          <tr>

                              <td>

                                  <label for=created" class=" control-label"> Created On</label>

                              </td>

                              <td>

                                  <?php echo set_value("created", date("d-m-Y H:i:s", strtotime(html_entity_decode($userInfo->createdDtm)))); ?>
                              </td>

                          </tr>



                          <!-- <tr>
											<td>
                                            <label for=created" class=" control-label"> Block/Approve</label>
                                            </td>
											<td colspan="2">
												<?php if ($userInfo->isDeleted == 0) { ?>
													<a class="btn btn-sm btn-warning deleteUser" style="padding:7px 15px;" href="#" data-userid="<?php echo $userInfo->userId; ?>" title="Block user"><i class="fa fa-ban">Block</i></a>
												<?php } else { ?>
													<a class="btn btn-sm btn-success approveUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $userInfo->userId; ?>" title="Approve user"><i class="fa fa-check">Approve</i></a>
												<?php } ?>
												<a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a>
											</td>
										</tr> -->

                          <tr>
                              <td colspan="2">
                                  <a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a>
                              </td>
                          </tr>


                      </table>

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