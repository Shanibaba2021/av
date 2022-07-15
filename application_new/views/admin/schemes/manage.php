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
                  <h3>Schemes </h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                    <li class="breadcrumb-item">Schemes </li>
                    <li class="breadcrumb-item">List Schemes </li>
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
                    <ul class="nav nav-tabs" id="top-tab" role="tablist">
                      <li class="nav-item"><button class="dt-button" tabindex="0" aria-controls="basic-branch" type="button"><a href="<?php echo base_url() ?>admin/schemes/add"> <span>Add New Schemes</span></a></button> </li>
                    </ul>
                  </div>
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav-item">Minimum date : <input type="text" id="min" name="min"></li>
                    <li class="nav-item">Maximum date: <input type="text" id="max" name="max"></li>
                  </ul>
                </div>




                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="schemes">

                      <thead>

                        <tr>

                          <th>Sr No.</th>

                          <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>




                          <th>Event Link </th>


                          <th> Date </th>



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

                            <tr id="hide<?php echo $value->id; ?>">




                              <th><?php if (!empty($value->id)) {
                                    echo $count;
                                    $count++;
                                  } ?></th>
                              <th><?php if (!empty($value->links)) {
                                    echo $value->links;
                                  } ?></th>
                              <th><?php if (!empty($value->createdDtm)) {
                                    echo date("d-m-Y", strtotime($value->createdDtm));
                                  } ?></th>

                              <th class="action-width">
                                <a href="<?php echo base_url() ?>admin/schemes/view/<?php echo $value->id; ?>" title="View">

                                  <span class="btn btn-info "><i class="fa fa-eye"></i></span>

                                </a>

                                <a href="<?php echo base_url() ?>admin/schemes/edit/<?php echo $value->id; ?>" title="Edit">

                                  <span class="btn btn-info "><i class="fa fa-edit"></i></span>

                                </a>

                                <a title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','schemes');">

                                  <span class="btn btn-info "><i class="fa fa-trash  "></i></span>

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
            var date = new Date(data[2].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))



            console.log(data[2]);
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


        var table = $('#schemes').DataTable({
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });

        $('#min, #max').on('change', function() {
          table.draw();
        });
      });
    </script>

  </body>

  </html>