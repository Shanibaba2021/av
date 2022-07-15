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
  									<li class="breadcrumb-item"><a href="../ltr/index.html">Home</a></li>
  									<li class="breadcrumb-item">Admin</li>
  									<li class="breadcrumb-item">View Admin</li>
  								</ol>
  							</div>

  						</div>
  					</div>
  				</div>
  				<!-- Container-fluid starts-->
  				<div class="container-fluid">

  					<form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

  						<div class="box-body">

  							<?php if ($this->session->flashdata('message')) : ?>

  								<div class="alert alert-success">

  									<button type="button" class="close" data-close="alert"></button>

  									<?php echo $this->session->flashdata('message'); ?>

  								</div>

  							<?php endif; ?>



  							<table class='table table-bordered' style='width:70%;' align='center'>

  								<tr>

  									<td>

  										<label for="fname" class="control-label">First Name </label>

  									</td>

  									<td>

  										<?php echo set_value("fname",  html_entity_decode($users->fname)); ?>

  									</td>

  								</tr>

  								<tr>

  									<td>

  										<label for="lname" class="control-label">Last Name </label>

  									</td>

  									<td>

  										<?php echo set_value("lname",  html_entity_decode($users->lname)); ?>

  									</td>

  								</tr>

  								<tr>

  									<td>

  										<label for="email" class="control-label">Email </label>

  									</td>

  									<td>

  										<?php echo set_value("email",  html_entity_decode($users->email)); ?>

  									</td>

  								</tr>

  								<tr>

  									<td>

  										<label for="mobile" class="control-label">Mobile </label>

  									</td>

  									<td>

  										<?php echo set_value("mobile",  html_entity_decode($users->mobile)); ?>

  									</td>

  								</tr>


  								<tr>

  									<td>

  										<label for="createdDtm" class="control-label">Created Date</label>

  									</td>

  									<td>

  										<?php echo set_value("createdDtm",  html_entity_decode($users->createdDtm)); ?>

  									</td>

  								</tr>






  								<tr>
  									<td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td>
  								</tr>
  							</table>

  							<div class="form-group">

  								<div class="col-sm-3">

  								</div>

  								<div class="col-sm-6">

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

  </body>

  </html>