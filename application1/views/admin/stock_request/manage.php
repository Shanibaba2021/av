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
                  <h3>Stock</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                    <li class="breadcrumb-item">Stock</li>
                    <li class="breadcrumb-item">Stock Request List</li>
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

			  
					<div class="social-tab">
					  <div class="input-group">
						<a href="<?php echo $csvlink; ?>"> <span class="btn btn-info">CSV</span></a>
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

                    <th>Sr No.</th>

                    <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>



                    <th> Field Worker Name </th>



                    <th> Branch Name </th>




                    <th> Product Name</th>



                    <th> Request Quantity </th>

                    <th>Request Time</th>


                    <th> Status </th>

                  </tr>

                </thead>

                <tbody>

                  <?php if (isset($results) and !empty($results)) {



                    $count = 1;



                  ?>

                    <?php

                    foreach ($results as $key => $value) {



                    ?>

                      <tr id="hide<?php echo $value->id; ?>">




                        <th><?php if (!empty($value->id)) {
                              echo $count;
                              $count++;
                            } ?></th>
                        <th><?php if (!empty($value->fwid)) {
                              echo $value->fwid;
                            } ?></th>
                        <th><?php if (!empty($value->bid)) {
                              echo $value->bid;
                            } ?></th>
                        <th><?php if (!empty($value->sid)) {
                              echo $value->sid;
                            } ?></th>
                        <th><?php if (!empty($value->request_quantity)) {
                              echo $value->request_quantity;
                            } ?></th>

                        <th><?php if (!empty($value->created)) {
                              echo date("d-m-Y", strtotime($value->created));
                            } ?></th>


                        <th class="action-width">
                          <?php if ($value->status == 0) { ?>

                            <a href="<?php echo base_url() ?>stock/allocate/<?php echo $value->id; ?>" title="View">

                              <span class="btn btn-info ">Allocate</span>

                            </a>

                          <?php } else { ?>

                            <span class="btn btn-info ">Allocated</span>

                          <?php }   ?>


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
      $(document).ready(function() {


        var minDate, maxDate;

        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[5].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))



            console.log(data[5]);
            console.log(date);

            if (
              (min === null && max === null) ||
              (min === null && date <= max) ||
              (min <= date && max === null) ||
              (min <= date && date <= max)
            ) {
              return true;
            }
            return false;
          }
        );

        // Create date inputs
        minDate = new DateTime($('#min'), {
          format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
          format: 'MMMM Do YYYY'
        });

        var table = $('#basic-1').DataTable();

        $('#min, #max').on('change', function() {
          table.draw();
        });
      });
    </script>

  </body>

  </html>