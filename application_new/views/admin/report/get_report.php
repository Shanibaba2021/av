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
                                  <h3>Report</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                                      <li class="breadcrumb-item">Report</li>
                                      <li class="breadcrumb-item">Get Report</li>
                                  </ol>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- Container-fluid starts-->
                  <div class="container-fluid ">
                      <div class="card" id="printreport">
                          <div class="card-header pb-0" style="text-align: center;">
                              <h5>Monthly Project Status Report</h5>
                          </div>
                          <div class="card-body" >

                              <div class="box-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fname">Date:-<?php echo date('d-m-Y') ?></label>
                                          </div>

                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fname">Month:-<?php echo date("m", strtotime($get_beneficiary[0]->createdDtm)) ?></label>
                                          </div>

                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email">Name of Field Worker:-<?php echo $user_details[0]['fname'] . ' ' . $user_details[0]['lname'] ?></label>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="password">Emp ID:-<?php echo $user_details[0]['userId'] ?></label>
                                          </div>
                                      </div>
                                  </div>

                              </div><!-- /.box-body -->

                              <div class="row" >
                                  <!-- Zero Configuration  Starts-->
                                  <div class="col-sm-12">
                                      <div class="card-1">

                                          <div class="card">
                                              <div class="table-responsive">

                                                  <table class="table table-bordered table-hover">
                                                      <thead class="thead-dark">
                                                          <tr>
                                                              <th scope="col">Sr.No.</th>
                                                              <th scope="col">Description</th>
                                                              <th scope="col">Particular/Work Done</th>
                                                              
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <th scope="row">1</th>
                                                              <td>Total No Branch</td>
                                                              <td><?php echo $get_branch[0]->total_branch; ?></td>
                                
                                                          </tr>
                                                          <tr>
                                                              <th scope="row">2</th>
                                                              <td>Total No Beneficiary</td>
                                                              <td><?php echo $get_beneficiary[0]->total_beneficiary; ?></td>
                                                       
                                                          </tr>
                                                          <tr>
                                                              <th scope="row">3</th>
                                                              <td>Total No Safety_kit</td>
                                                              <td><?php echo $get_safety_kit[0]->safety_kit; ?></td>
                                          
                                                          </tr>
                                                          <tr>
                                                              <th scope="row">4</th>
                                                              <td>Total No Funcation</td>
                                                              <td><?php echo $get_function[0]->total_function; ?></td>
                                                   
                                                          </tr>
                                                          
                                                      </tbody>
                                                  </table>

                                                  
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- Zero Configuration  Ends-->
                              </div>
                              
                              <div class="box-footer">
                                  <input type="button" class="btn btn-primary" onclick="demo();" value="Download PDF">
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

      <script>
          function demo()
          {
            $('#printreport').printThis();
          }
          
      </script>


  </body>

  </html>