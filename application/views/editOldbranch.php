  <!----- HEADER ----------------->
  <?php $this->load->view('inc/header.php'); ?>

  <?php
    $branchId  = $userInfo->branchId;
    // $bcode = $userInfo->bcode;
    $bname = $userInfo->bname;
    $address = $userInfo->address;
    $district = $userInfo->district;
    $state = $userInfo->state;
    $zipcode  = $userInfo->zipcode;
    ?>
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

                      <div class="box box-primary">
                          <div class="box-header">
                              <h3 class="box-title">Enter User Details</h3>
                          </div><!-- /.box-header -->
                          <!-- form start -->

                          <form role="form" action="<?php echo base_url() ?>editbranch/<?php echo $branchId; ?>" method="post" id="editUser" enctype="multipart/form-data" role="form">
                              <div class="box-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fname">Branch Name</label>
                                              <input type="hidden" value="<?php echo $branchId; ?>" name="userId" id="userId" />
                                              <input type="text" class="form-control" id="fname" placeholder="Branch Name" name="bname" value="<?php echo $bname; ?>" maxlength="128">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email">Branch address</label>
                                              <input type="text" class="form-control" id="email" placeholder="Enter address" name="address" value="<?php echo $address; ?>" maxlength="400">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="cpassword">Branch State</label>
                                              <select class="form-control select2" onChange="getdistrict(this.value);" name="state" id="state">

                                                  <option value="">Select state</option>

                                                  <?php

                                                    if (isset($plants) && !empty($plants)) :

                                                        foreach ($plants as $key => $value) : ?>

                                                          <option value="<?php echo $value->StCode; ?>" <?php echo $value->StateName == $userInfo->state ? 'selected="selected"' : ""; ?>>

                                                              <?php echo $value->StateName; ?>

                                                          </option>

                                                      <?php endforeach; ?>

                                                  <?php endif; ?>

                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email">Branch District</label>
                                              <select class="form-control select2" name="district" id="district">
                                                  <option value="">Select District</option>
                                                  <?php

                                                    if (isset($districtes) && !empty($districtes)) :

                                                        foreach ($districtes as $keyes => $values) : ?>

                                                          <option value="<?php echo $values->DistCode; ?>" <?php echo $values->DistrictName == $userInfo->district ? 'selected="selected"' : ""; ?>>

                                                              <?php echo $values->DistrictName; ?>

                                                          </option>

                                                      <?php endforeach; ?>

                                                  <?php endif; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="mobile">Branch Zipcode</label>
                                              <input type="text" class="form-control" id="mobile" placeholder="Enter Zipcode" name="zipcode" value="<?php echo $zipcode; ?>" maxlength="10">
                                          </div>
                                      </div>
                                  </div>
                              </div><!-- /.box-body -->

                              <div class="box-footer">
                                  <input type="submit" class="btn btn-primary" value="Submit" />
                                  <input type="reset" class="btn btn-default" value="Reset" />
                              </div>
                          </form>
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
      <script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
      <script>
          function getdistrict(val) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/branches/getdistrict'); ?>",
                  data: 'state_id=' + val,
                  datatype: "json",
                  success: function(rep) {
                      var data = JSON.parse(rep);
                      console.log(data.msg);
                      $('#district').find('option').not(':first').remove();
                      var html = "";
                      $.each(data.data, function(i, value) {
                          html += ('<option value="' + value.DistCode + '">' + value.DistrictName + '</option>');
                      });
                      $("#district").html(html);
                  }
              });
          }
      </script>
  </body>

  </html>