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
                                      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a></li>
                                      <li class="breadcrumb-item">Admin</li>
                                      <li class="breadcrumb-item">Admim List</li>
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
						<a href="<?php echo base_url() ?>addadmin"> <span class="btn btn-info">Add</span></a> 
						
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

                                  <th>First Name </th>


                                  
                                  <th> Last Name </th>


                                   <th> Email </th>


                                 <th> mobile </th>

                                 <th>  Date </th>


                                  <th> Actions </th>

                              </tr>

                          </thead>

                          <tbody>

                              <?php if (isset($results) and !empty($results)) {



                                    $count = 1;



                                ?>

                                  <?php

                                    foreach ($results as $key => $value) {



                                    ?>

                                      <tr id="hide<?php echo $value->userId; ?>">



                                          <th><?php if (!empty($value->userId)) {
                                                    echo $count;
                                                    $count++;
                                                } ?></th>
                                          <th><?php if (!empty($value->fname)) {
                                                    echo $value->fname;
                                                } ?></th>
                                          <th><?php if (!empty($value->lname)) {
                                                    echo $value->lname;
                                                } ?></th>
                                          <th><?php if (!empty($value->email)) {
                                                    echo $value->email;
                                                } ?></th>
                                          <th><?php if (!empty($value->mobile)) {
                                                    echo $value->mobile;
                                                } ?></th>

                                          <th><?php if (!empty($value->createdDtm)) {
                                                    echo date("d-m-Y", strtotime($value->createdDtm));
                                                } ?></th>


                                          <th class="action-width">
                                              <a href="<?php echo base_url() ?>viewadmin/<?php echo $value->userId; ?>" title="View">

                                                  <span class="btn btn-info "><i class="fa fa-eye"></i></span>

                                              </a>

                                              <a href="<?php echo base_url() ?>editadmin/<?php echo $value->userId; ?>" title="Edit">

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