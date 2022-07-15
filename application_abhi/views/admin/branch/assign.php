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
                      <div class="card">
                          <div class="card-header pb-0">

                              <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                              <?php foreach($results as $row) :  ?>



                                <input type="checkbox" value="<?php echo $row->branchId ?>" <?php if($row->status != null) { ?>  checked <?php } ?> name="branch[]">
                                <label for=""><?php echo $row->bname ?></label>
                                <br>
                              <?php endforeach;  ?>
                              <button type="submit" >submit</button>
                              </form>

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
