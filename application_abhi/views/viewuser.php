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
  								<h3>User Details</h3>
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
  					<div class="edit-profile">
  						<div class="row">
  							<div class="col-xl-4">
  								<div class="card">
  									<div class="card-header pb-0">
  										<h4 class="card-title mb-0">Details</h4>
  										<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
  									</div>
  									<div class="card-body">
  										<div class="row mb-2">
  											<div class="profile-title">
  												<div class="media"><img class="img-70 rounded-circle" src="<?php echo $this->config->item("photo_url"); ?><?php echo $userInfo->image; ?>" />
  													<div class="media-body">
  														<h3 class="mb-1 f-20 txt-primary"><?php echo set_value("fullname", html_entity_decode($userInfo->fullname)); ?></h3>
  														<p class="f-12">Field Worker</p>
  													</div>
  												</div>
  											</div>
  										</div>
  										<div class="mb-3">
  											<h6 class="form-label">Email : <b><?php echo set_value("email", html_entity_decode($userInfo->email)); ?></b></h6>
  										</div>

  										<div class="mb-3">
  											<label class="form-label">Mobile : <b><?php echo set_value("mobile", html_entity_decode($userInfo->mobile)); ?></b></label>
  										</div>


  									</div>
  								</div>
  							</div>
  							<div class="col-xl-8">
  								<div class="card">
  									<div class="card-header pb-0">
  										<h4 class="card-title mb-0">Performance Record</h4>
  										<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
  									</div>
  									<div class="card-body">
  										<div class="row">
  											<div class="mb-3">
  												<label class="form-label">Total Beneficiary : <b> <?php foreach ($beneficiary as $row) : ?>
  															<?php echo $row->bId; ?>
  														<?php endforeach ?></b></label>
  											</div>
  											<div class="mb-3">
  												<label class="form-label">Total Insurance : <b><?php foreach ($insurance as $row) : ?>
  															<?php echo $row->insurance; ?>
  														<?php endforeach ?></b></label>
  											</div>
  											<div class="mb-3">
  												<label class="form-label">Total Safety Kit : <b><b> <?php foreach ($beneficiary as $row) : ?>
  															<?php echo $row->bId; ?>
  														<?php endforeach ?></b></b></label>
  											</div>
  											<div class="mb-3">
  												<label class="form-label">Total Claim : <b><?php foreach ($claim as $row) : ?>
  															<?php echo $row->claim_id; ?>
  														<?php endforeach ?></b></label>
  											</div>


  											<div class="mb-3">
  												<label class="form-label">Type Of Work : <b>Field Worker</b></label>
  											</div>
  											<div class="mb-3">
  												<label class="form-label">Status : <b><?php if ($userInfo->isDeleted == 0) { ?>
  															<a class="btn btn-sm btn-warning deleteUser" style="padding:7px 15px;" href="#" data-userid="<?php echo $userInfo->userId; ?>" title="Block User">Block</a>
  														<?php } else { ?>
  															<a class="btn btn-sm btn-success approveUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $userInfo->userId; ?>" title="Approve User">Approve</a>
  														<?php } ?></b></label>
  											</div>
  										</div>
  									</div>
  								</div>

  							</div>
  						</div>

  						<div class="card">
  							<div class="card-header pb-0">
  								<h5 class="card-title mb-0">Insurance List</h5>
  								<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
  							</div>
  							<div class="card-body">
  								<table class="display" id="basic-1">

  									<thead>

  										<tr>

  											<th>Sr No.</th>

  											<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

  											<th> Insured Name </th>

  											<th> Policy Number</th>

  											<th> Date</th>

  										</tr>

  									</thead>

  									<tbody>

  										<?php if (isset($insurances) and !empty($insurances)) {



												$count = 1;



											?>

  											<?php

												foreach ($insurances as $key => $value) {



												?>

  												<tr id="hide<?php echo $value->bId; ?>">



  													<th><?php if (!empty($value->bId)) {
																echo $count;
																$count++;
															} ?></th>

  													<th>
  														<a href="<?php echo base_url() ?>beneficiary/view/<?php echo $value->bId ?>">
  															<?php if (!empty($value->insured_name)) {
																	echo $value->insured_name;
																} ?>
  														</a>
  													</th>
  													<th><?php if (!empty($value->nominee_name)) {
																echo $value->nominee_name;
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
  						</div>


  						<div class="card">
  							<div class="card-header pb-0">
  								<h5 class="card-title mb-0">Beneficiary</h5>
  								<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
  							</div>
  							<div class="card-body">
  								<div class="card">
  									<table class="display" id="basic-2">

  										<thead>

  											<tr>

  												<th>Sr No.</th>

  												<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

  												<th> Full Name </th>

  												<th> Mobile</th>

  												<th> Date</th>
  											</tr>

  										</thead>

  										<tbody>

  											<?php if (isset($beneficiarys) and !empty($beneficiarys)) {



													$count = 1;



												?>

  												<?php

													foreach ($beneficiarys as $key => $value) {



													?>

  													<tr id="hide<?php echo $value->bId; ?>">



  														<th><?php if (!empty($value->bId)) {
																	echo $count;
																	$count++;
																} ?></th>
  														<th><a href="<?php echo base_url() ?>beneficiary/view/<?php echo $value->bId ?>">
  																<?php if (!empty($value->fname)) {
																		echo $value->fname;
																	} ?></a> </th>
  														<th><?php if (!empty($value->mobile)) {
																	echo $value->mobile;
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
  		jQuery(document).ready(function() {

  			jQuery(document).on("click", ".deleteUser", function() {
  				var userId = $(this).data("userid"),
  					hitURL = '<?php echo base_url() ?>deleteUser/',
  					currentRow = $(this);

  				var confirmation = confirm("Are you sure to block this user ?");

  				if (confirmation) {
  					jQuery.ajax({
  						type: "POST",
  						dataType: "json",
  						url: hitURL,
  						data: {
  							userId: userId
  						}
  					}).done(function(data) {
  						console.log(data);
  						currentRow.parents('tr').remove();
  						if (data.status = true) {
  							alert("User successfully deleted");
  						} else if (data.status = false) {
  							alert("User deletion failed");
  						} else {
  							alert("Access denied..!");
  						}
  						location.reload();
  					});
  				}
  			});

  			jQuery(document).on("click", ".approveUser", function() {
  				var userId = $(this).data("userid"),
  					hitURL = '<?php echo base_url() ?>approveUser/',
  					currentRow = $(this);

  				var confirmation = confirm("Are you sure to approve this user ?");

  				if (confirmation) {
  					jQuery.ajax({
  						type: "POST",
  						dataType: "json",
  						url: hitURL,
  						data: {
  							userId: userId
  						}
  					}).done(function(data) {
  						console.log(data);
  						currentRow.parents('tr').remove();
  						if (data.status = true) {
  							alert("User successfully approved");
  						} else if (data.status = false) {
  							alert("User approved failed");
  						} else {
  							alert("Access denied..!");
  						}
  						location.reload();

  					});
  				}
  			});


  			jQuery(document).on("click", ".searchList", function() {

  			});

  		});
  	</script>


  </body>

  </html>