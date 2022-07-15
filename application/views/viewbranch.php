  <!----- HEADER ----------------->
  <?php
  //  echo "<pre>";
  // print_r($beneficiary); die();
  ?>
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
                    <li class="breadcrumb-item"><a href="../ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Branch</li>
                    <li class="breadcrumb-item">Branch View</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="card">

              <div class="card-body  ">
                <div class="row details-about">
                  <div class="col-sm-6">
                    <div class="your-details">
                      <h6 class="f-w-600">Branch Name</h6>
                      <p><?php echo set_value("bname", html_entity_decode($userInfo->bname)); ?></p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="your-details your-details-xs">
                      <h6 class="f-w-600">Branch address</h6>
                      <p><?php echo set_value("address", html_entity_decode($userInfo->address)); ?></p>
                    </div>
                  </div>
                </div>
                <div class="row details-about">
                  <div class="col-sm-6">
                    <div class="your-details">
                      <h6 class="f-w-600">Branch District</h6>
                      <p><?php echo set_value("district", html_entity_decode($userInfo->district)); ?></p>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="your-details your-details-xs">
                      <h6 class="f-w-600">Branch State</h6>
                      <p><?php echo set_value("state", html_entity_decode($userInfo->state)); ?></p>
                    </div>
                  </div>
                </div>
                <div class="row details-about">
                  <div class="col-sm-6">
                    <div class="your-details">
                      <h6 class="f-w-600">Branch Zipcode</h6>
                      <p><?php echo set_value("zipcode", html_entity_decode($userInfo->zipcode)); ?></p>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row">
              <?php if (isset($results) and !empty($results)) {  ?>
                <?php foreach ($results as $key => $value) { ?>
                  <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                      <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                              <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                              <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                              <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg></div>
                          <div class="media-body"><span class="m-0"><?php if (!empty($value->pname)) {
                                                                      echo $value->pname;
                                                                    } ?></span>
                            <h4 class="mb-0 counter"><?php if (!empty($value->assign_quantity)) {
                                                        echo $value->assign_quantity;
                                                      }else{
                                                        echo "0";
                                                      }
                                                       ?></h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg">
                              <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                              <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                              <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>
            </div>


            <div class="col-sm-12">
              <div class="card">




                <div class="social-tab">
                  <div class="input-group">
                    <h6 class="mb-0 f-w-700">All Beneficiary</h6>
                  </div>
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav-item">Minimum date : <input type="text" id="min" name="min"></li>
                    <li class="nav-item">Maximum date: <input type="text" id="max" name="max"></li>
                  </ul>
                </div>




                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="basic-1">

                      <thead>



                        <tr>
                          <th> Sr No.</th>

                          <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>



                          <th> Full Name </th>


                          <th> Mobile</th>

                          <th> CreatedOn</th>

                          <th> Action</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php if (isset($beneficiary) and !empty($beneficiary)) {



                          $count = 1;



                        ?>

                          <?php

                          foreach ($beneficiary as $key => $value) {



                          ?>

                            <tr id="hide<?php echo $value->bId; ?>">


                              <th><?php if (!empty($value->bId)) {
                                    echo $count;
                                    $count++;
                                  } ?></th>
                              <th><?php if (!empty($value->fname)) {
                                    echo $value->fname;
                                  } ?></th>

                              <th><?php if (!empty($value->mobile)) {
                                    echo $value->mobile;
                                  } ?></th>
                              <th><?php if (!empty($value->createdDtm)) {
                                    echo date("d-m-Y", strtotime($value->createdDtm));
                                  } ?></th>


                              <th class="action-width">

                                <a href="<?php echo base_url() ?>beneficiary/view/<?php echo $value->bId; ?>" title="View">

                                  <span class="btn btn-info "><i class="fa fa-eye"></i></span>

                                </a>
                                <a href="<?php echo base_url() ?>beneficiary/edit/<?php echo $value->bId; ?>" title="Edit">

                                  <span class="btn btn-info "><i class="fa fa-edit"></i></span>

                                </a>




                              </th>

                            </tr>

                        <?php

                          }
                        } else {

                          echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                        } ?>

                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-sm-12">
              <div class="card">




                <div class="social-tab">
                  <div class="input-group">
                    <h6 class="mb-0 f-w-700">Kit Assigned History</h6>
                  </div>
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav-item">Minimum date : <input type="text" id="min1" name="min1"></li>
                    <li class="nav-item">Maximum date: <input type="text" id="max1" name="max1"></li>
                  </ul>
                </div>




                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="basic-kit">

                      <thead>



                        <tr>
                          <th> Sr No.</th>

                          <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>



                          <th>Product Name</th>

                          <th>Branch Name</th>

                          <th> Quantity</th>

                          <th> Action</th>

                          <th> Date</th>


                        </tr>

                      </thead>

                      <tbody>

                        <?php if (isset($stocks) and !empty($stocks)) {



                          $count = 1;



                        ?>

                          <?php

                          foreach ($stocks as $key => $value) {



                          ?>

                            <tr id="hide<?php echo $value->id; ?>">


                              <th><?php if (!empty($value->id)) {
                                    echo $count;
                                    $count++;
                                  } ?></th>
                              <th><?php if (!empty($value->pid)) {
                                    echo $value->pid;
                                  } ?></th>

                              <th><?php if (!empty($value->bname)) {
                                    echo $value->bname;
                                  } ?></th>

                              <th><?php if (!empty($value->qun)) {
                                    echo $value->qun;
                                  } ?></th>


                              <th><?php if (!empty($value->action)) {
                                    if ($value->action == 0) {
                                      echo "Add";
                                    } elseif ($value->action == 1) {
                                      echo "Assign";
                                    } else {
                                      echo "Remove";
                                    }
                                  } ?></th>
                              <th><?php if (!empty($value->createdDtm)) {
                                    echo date("d-m-Y", strtotime($value->createdDtm));
                                  } ?></th>





                            </tr>

                        <?php

                          }
                        } else {

                          echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                        } ?>

                      </tbody>


                    </table>
                  </div>
                </div>
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

    <script>
      $.fn.dataTable.Api.register('filter.push', function(fn, draw) {
        if (!this.__customFilters) {
          var filters = this.__customFilters = []
          this.on('mousedown preDraw.dt', function() {
            $.fn.dataTable.ext.search = filters
          })
        }
        this.__customFilters.push(fn)
        $.fn.dataTable.ext.search = this.__customFilters
        this.draw()
      });

      $.fn.dataTable.Api.register('filter.pop', function() {
        if (!this.__customFilters) return
        this.__customFilters.pop()
      });


      // var table = $('#').DataTable({})  
      // var table1 = $('#').DataTable({})  


      var table = $('#basic-1').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });




      var table1 = $('#basic-kit').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });




      table.filter.pop();
      table1.filter.pop();
      $(document).ready(function() {
        // Create date inputs
        minDate1 = new DateTime($('#min1'), {
          format: 'MMMM Do YYYY'
        });
        maxDate1 = new DateTime($('#max1'), {
          format: 'MMMM Do YYYY'
        });

        // DataTables initialisation

        // Refilter the table
        $('#min, #max').on('change', function() {
          table.filter.push(function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[3].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))

            if (
              (min === null && max === null) ||
              (min === null && date <= max) ||
              (min <= date && max === null) ||
              (min <= date && date <= max)
            ) {
              return true;
            }
            return false;
          })
        });
      });


      $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
          format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
          format: 'MMMM Do YYYY'
        });

        // DataTables initialisation

        // Refilter the table
        $('#min1, #max1').on('change', function() {
          table1.filter.push(function(settings, data, dataIndex) {
            var min1 = minDate1.val();
            var max1 = maxDate1.val();
            var date1 = new Date(data[5].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))
            console.log("min1 : " + min1);
            console.log("max1 : " + max1);
            console.log("date1 : " + date1);
            if (
              (min1 === null && max1 === null) ||
              (min1 === null && date1 <= max1) ||
              (min1 <= date1 && max1 === null) ||
              (min1 <= date1 && date1 <= max1)
            ) {
              return true;
            }
            return false;
          })
        });





















      });
    </script>


  </body>

  </html>