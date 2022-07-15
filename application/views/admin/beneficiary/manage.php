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
                  <h3>Beneficiary</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                    <li class="breadcrumb-item">Beneficiary</li>
                    <li class="breadcrumb-item">List Beneficiary</li>
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
                    <h6 class="mb-0 f-w-700">All Beneficiary</h6>
                  </div>
                  <ul class="nav nav-tabs" id="top-tab" role="tablist">
                    <li class="nav-item">Minimum date : <input type="text" id="min" name="min"></li>
                    <li class="nav-item">Maximum date: <input type="text" id="max" name="max"></li>
                  </ul>
                </div>




                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="bene_list">

                      <thead>



                        <tr>
                          <th> Sr No.</th>

                          <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>



                          <th> Full Name </th>


                          <th> Mobile</th>


                          <th> Field Worker Name </th>

                          <th> Current Status </th>

                          <th> CreatedOn</th>

                          <th> Action</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php if (isset($results) and !empty($results)) {



                          $count = 1;



                        ?>

                          <?php

                          foreach ($results as $key => $value) {



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
                              <th><?php if (!empty($value->fieldworker)) {
                                    echo $value->fieldworker;
                                  } ?></th>
                              <th><?php if (!empty($value->status)) {
                                    if($value->status == 1)
                                    {
                                      echo "Pending";
                                    }
                                    elseif($value->status == 2)
                                    {
                                      echo "Approve";
                                    }
                                    else
                                    {
                                      echo "Reject";
                                    }
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

                                <a href="<?php echo base_url() ?>admin/beneficiary/delete/<?php echo $value->bId; ?>/tbl_beneficiary">

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

        // var table = $('#').DataTable();

        var table = $('#bene_list').DataTable({
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

  </body>




  </html>