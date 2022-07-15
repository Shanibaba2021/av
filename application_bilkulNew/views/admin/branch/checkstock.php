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
            <table border="0" cellspacing="5" cellpadding="5">
              <tbody>
                <tr>
                  <td>Minimum date:</td>
                  <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                  <td>Maximum date:</td>
                  <td><input type="text" id="max" name="max"></td>
                </tr>
              </tbody>
            </table>

            <table class="display" id="basic-1">

              <thead>

                <tr>


                  <th> Sr No.</th>

                  <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

                  <th> Product Name </th>

                  <th> Allocated Quantity</th>

                  <th> Allocated Date</th>

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

                      <th><?php if (!empty($value->pname)) {
                            echo $value->pname;
                          } ?></th>

                      <th><?php if (!empty($value->assign_quantity)) {
                            echo $value->assign_quantity;
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

            var date = new Date(data[3].replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"))
            console.log(data[3]);
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