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

  								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

  								<div class="box-body">

  									<?php if ($this->session->flashdata('message')) : ?>

  										<div class="alert alert-success">

  											<button type="button" class="close" data-close="alert"></button>

  											<?php echo $this->session->flashdata('message'); ?>

  										</div>

  									<?php endif; ?>

  									<!-- Userid Start -->

  									<input type="hidden" value="<?php echo $this->session->userdata('userId'); ?>" id="userid" name="userid">

  									<!-- Userid End -->


  									<!-- bname Start -->
								<div class="row">
								<div class="col-md-6">                                    
  									<div class="form-group">

  										<label for="bname" class="col-sm-3 control-label"> Branch Name </label>

  										<div  >

  											<input type="text" class="form-control" id="bname" name="bname" value="<?php echo set_value("bname"); ?>">

  										</div>

  										<div class="col-sm-5">



  											<?php echo form_error("bname", "<span class='label label-danger'>", "</span>") ?>

  										</div>

  									</div>
                                </div>
  									<!-- bname End -->

  									<!-- address Start -->
                                <div class="col-md-6">
  									<div class="form-group">

  										<label for="address" class="col-sm-3 control-label"> Address </label>

  										<div  >

  											<input type="text" class="form-control span2 " id="address" name="address" value="<?php echo set_value("address"); ?>">

  										</div>

  										<div class="col-sm-5">



  											<?php echo form_error("address", "<span class='label label-danger'>", "</span>") ?>

  										</div>

  									</div>
  								</div>	
								</div>
									<!-- address End -->

  									<!-- state Start -->
								<div class="row">
								<div class="col-md-6">
  									<div class="form-group">

  										<label for="state" class="col-sm-3 control-label"> State </label>

  										<div class=" ">

  											<select class="form-control select2" onChange="getdistrict(this.value);" name="state" id="state">

  												<option value="">Select State</option>

  												<?php

													if (isset($plants) && !empty($plants)) :

														foreach ($plants as $key => $value) : ?>

  														<option value="<?php echo $value->StCode; ?>">

  															<?php echo $value->StateName; ?>

  														</option>

  													<?php endforeach; ?>

  												<?php endif; ?>

  											</select>

  										</div>

  										<div class="col-sm-5">



  											<?php echo form_error("state", "<span class='label label-danger'>", "</span>") ?>

  										</div>

  									</div>
                                </div>
  									<!-- state End -->


  									<!-- district Start -->
                                <div class="col-md-6">
  									<div class="form-group">

  										<label for="district" class="col-sm-3 control-label"> District </label>

  										<div class=" ">

  											<select name="district" id="district" class="form-control">
  												<option value="">-- Select district --</option>
  											</select>
  										</div>

  										<div class="col-sm-5">

  											<?php echo form_error("district", "<span class='label label-danger'>", "</span>") ?>

  										</div>

  									</div>
                                </div>
                                </div>
								
  									<!-- district End -->



  									<!-- zipcode Start -->

  									<div class="form-group">

  										<label for="zipcode" class="col-sm-3 control-label"> Zipcode </label>

  										<div class="col-sm-6">

  											<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo set_value("zipcode"); ?>">

  										</div>

  										<div class="col-sm-5">



  											<?php echo form_error("zipcode", "<span class='label label-danger'>", "</span>") ?>

  										</div>

  									</div>

  									<!-- zipcode End -->

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