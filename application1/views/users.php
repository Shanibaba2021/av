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
      <!-- Page Header Ends -->
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
                    <li class="breadcrumb-item">User Details</li>
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
                    <button class="dt-button" tabindex="0" aria-controls="basic-branch" type="button"><a href="<?php echo base_url() ?>addNew"> Add New User</a></button>

                  </div>
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav-item">Minimum date : <input type="text" id="min" name="min"></li>
                    <li class="nav-item">Maximum date: <input type="text" id="max" name="max"></li>
                  </ul>
                </div>




                <div class="card-body">
                  <div class="table-responsive">


                    <table class="display" id="userList">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Created On</th>
                          <th>Image</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (!empty($userRecords)) {
                          foreach ($userRecords as $record) {
                        ?>
                            <tr>
                              <td><?php echo $record->fname ?></td>
                              <td><?php echo $record->lname ?></td>
                              <td><?php echo $record->email ?></td>
                              <td><?php echo $record->mobile ?></td>
                              <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                              <th><?php if (!empty($record->image)) { ?>

                                  <img src="<?php echo $this->config->item('photo_url'); ?><?php echo $record->image; ?>" alt="pic" width="50" height="50" />
                                <?php } ?>
                              </th>
                              <td class="text-center">
                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/' . $record->userId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'view/' . $record->userId; ?>" title="Edit"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'report/' . $record->userId; ?>" title="Report">Report Generate</a>
                              </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
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
            var date = new Date(data[4].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))



            console.log(data[4]);
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


        var table = $('#userList').DataTable({
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