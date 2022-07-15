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
                    <li class="breadcrumb-item">Stock Assign</li>
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

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="box-body">

                                <?php if ($this->session->flashdata('message')) : ?>

                                    <div class="alert alert-success">

                                        <button type="button" class="close" data-close="alert"></button>

                                        <?php echo $this->session->flashdata('message'); ?>

                                    </div>

                                <?php endif; ?>

                                <div class="form-group">

                                    <label for="item_name" class="col-sm-3 control-label">Product Name </label>

                                    <div class="col-sm-4">
                                        
                                        <?php echo set_value("pname", html_entity_decode($plants->pname)); ?>
                                        <input type="hidden" class="form-control" id="pid" name="pid" value="<?php echo set_value("id", html_entity_decode($plants->id)); ?>">

                                    </div>

                                    <div class="col-sm-5">

                                        <?php echo form_error("item_name", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="current_quantity" class="col-sm-3 control-label"> Current Quantity </label>

                                    <div class="col-sm-4">

                                        <?php echo set_value("current_quantity", html_entity_decode($plants->current_quantity)); ?>

                                        <input type="hidden" class="form-control" id="current_quantity" name="current_quantity" value="<?php echo set_value("current_quantity", html_entity_decode($plants->current_quantity)); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("current_quantity", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>
								
								<div class="row">
									<div class="col-md-6"> 


                                <div class="form-group">

                                    <label for="current_quantity" class="col-sm-3 control-label"> Assign Quantity </label>

                                    <div >

                                        <input type="text" class="form-control" id="assign_quantity" name="assign_quantity">

                                    </div>

                                    <div class="col-sm-5">
                                        <?php echo form_error("assign_quantity", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div> 
								</div>
								
								<div class="col-md-6"> 


                                <div class="form-group">

                                    <label class="control-label col-md-3"> Branch </label>

                                    <div >

                                        <select class="form-control select2" name="brname" id="brname">

                                            <option value="">Select Branch</option>

                                            <?php

                                            if (isset($branches) && !empty($branches)) :

                                                foreach ($branches as $key => $value) : ?>

                                                    <option value="<?php echo $value->branchId; ?>">

                                                        <?php echo $value->bname; ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            <?php endif; ?>

                                        </select>

                                    </div>
                                    <div class="col-sm-5">


                                        <?php echo form_error("brname", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>

							 </div>
							  </div>



                                <div class="form-group">

                                    <div class="col-sm-3">

                                    </div>

                                    <div class="col-sm-6">

                                        <button type="reset" class="btn btn-default ">Reset</button>

                                        <button type="submit" class="btn btn-info ">Submit</button>

                                    </div>

                                    <div class="col-sm-3">

                                    </div>

                                </div>

                            </div>

                            <!-- /.box-body -->

                            <div class="box-footer">

                            </div>

                            <!-- /.box-footer -->

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
  
  </body>
</html>