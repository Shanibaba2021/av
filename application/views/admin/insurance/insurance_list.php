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
                                  <h3>Insurance list</h3>
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                                      <li class="breadcrumb-item">Insurance </li>
                                      <li class="breadcrumb-item">Insurance List</li>
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
                                  </div>
                              </div>

                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="display" id="basic-1">

                                          <thead>

                                              <tr>
                                                  <th>Sr No </th>
                                                  <th>Insured Name </th>

                                                  <th> Nominess Name </th>

                                                  <th> Relation With Insured</th>

                                                  <th> Nominess DOB</th>

                                              </tr>

                                          </thead>

                                          <tbody>

                                              <?php if (isset($insurance) and !empty($insurance)) {



                                                    $count = 1;



                                                ?>

                                                  <?php

                                                    foreach ($insurance as $key => $value) {



                                                    ?>

                                                      <tr id="hide<?php echo $value->bId; ?>">


                                                          <th><?php if (!empty($value->bId)) {
                                                                    echo $count;
                                                                    $count++;
                                                                } ?></th>
                                                          <th><?php if (!empty($value->insured_name)) {
                                                                    echo $value->insured_name;
                                                                } ?></th>

                                                          <th><?php if (!empty($value->nominee_name)) {
                                                                    echo $value->nominee_name;
                                                                } ?></th>
                                                          <th><?php if (!empty($value->relation_with_insured)) {
                                                                    if ($value->relation_with_insured == 0) {
                                                                        echo "Father";
                                                                    } elseif ($value->relation_with_insured == 1) {
                                                                        echo "Mother";
                                                                    } elseif ($value->relation_with_insured == 2) {
                                                                        echo "Wife";
                                                                    } elseif ($value->relation_with_insured == 3) {
                                                                        echo "Son";
                                                                    } elseif ($value->relation_with_insured == 4) {
                                                                        echo "Daughter";
                                                                    } elseif ($value->relation_with_insured == 5) {
                                                                        echo "Brother";
                                                                    } elseif ($value->relation_with_insured == 6)  {
                                                                        echo $value->relation_with_insured_name;
                                                                    }
                                                                } ?></th>
                                                          <th><?php if (!empty($value->nominee_dob)) {
                                                                    echo $value->nominee_dob;
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
                  <div class="modal fade" id="commonDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <form action="<?php echo base_url(); ?>welcome/delete_notification" method="post">
                          <input type="hidden" name="ci_csrf_token" value="">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                      <h4 class="modal-title" id="frm_title">Delete</h4>
                                  </div>
                                  <div class="modal-body" id="frm_body">
                                      Do you really want to delete?
                                      <input type="hidden" id="set_commondel_id">
                                      <input type="hidden" id="table_name">
                                  </div>
                                  <div class="modal-footer">
                                      <button style="margin-left:10px;" type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit" onclick="delete_return();">Yes</button>
                                      <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
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
          function set_common_delete(id, table_name) {
              $("#set_commondel_id").val(id);
              $("#table_name").val(table_name);
          }

          function delete_return() {
              del_id = $("#set_commondel_id").val();
              table_name = $("#table_name").val();
              $.ajax({
                  url: "<?php echo base_url('admin/'); ?>" + table_name + "/delete/" + del_id,
                  data: "id=" + del_id + "&table_name=" + table_name + "&ci_csrf_token=" + '',
                  type: "post",
                  success: function(result) {
                      if (result.trim() == "success") {
                          $('#commonDelete').modal('toggle');
                          $("#hide" + del_id).hide();
                      }
                  },
                  error: function(output) {}
              });
          }
      </script>

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

              var table = $('#gallery').DataTable({
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