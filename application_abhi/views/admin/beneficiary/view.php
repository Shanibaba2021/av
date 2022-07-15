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
								<h3>Beneficiary Details</h3>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
									<li class="breadcrumb-item">Beneficiary</li>
									<li class="breadcrumb-item">Beneficiary Details</li>
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
												<?php
												if ($beneficiary->image != null && $beneficiary->image != "") {
													$img = $this->config->item("photo_url") . $beneficiary->image;
												} else {
													$img = "https://cdn4.vectorstock.com/i/1000x1000/50/68/avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg";
												}

												?>
												<div class="media"> <img class="img-70 rounded-circle" src=" <?php echo $img; ?>" alt="" />
													<div class="media-body">
														<h3 class="mb-1 f-20 txt-primary"><?php echo set_value("fname", html_entity_decode($beneficiary->fname)); ?></h3>
														<p class="f-12"><?php echo set_value("type_work",  html_entity_decode($beneficiary->type_work)); ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="mb-3">
											<h6 class="form-label">Gender : <b><?php echo set_value("gender", html_entity_decode($beneficiary->gender)); ?></b></h6>
										</div>

										<div class="mb-3">
											<label class="form-label">Mobile : <b> <?php echo set_value("mobile", html_entity_decode($beneficiary->mobile)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Permanent Address : <b><?php echo set_value("permanent_address", html_entity_decode($beneficiary->permanent_address)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Current Address : <b><?php echo set_value("current_address", html_entity_decode($beneficiary->current_address)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Date of Birth : <b><?php echo set_value("dob", html_entity_decode($beneficiary->dob)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Branch : <b><?php echo set_value("branch", html_entity_decode($beneficiary->branch)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Father/Husband Name : <b><?php echo set_value("father_husband_name", html_entity_decode($beneficiary->father_husband_name)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Aadhar No. : <b> <?php echo set_value("aadhar_number",  html_entity_decode($beneficiary->aadhar_number)); ?></b></label>
										</div>

										<div class="mb-3">
											<?php if ($beneficiary->bank == 0) { ?>
												<label class="form-label">Bank Account : <b> No Bank Account</b></label>
											<?php } else { ?>
												<label class="form-label">Account No. : <b> <?php echo set_value("account_number",  html_entity_decode($beneficiary->account_number)); ?></b></label>
											<?php } ?>
										</div>

										<div class="mb-3">
											<label class="form-label">Pan No. : <b><?php echo set_value("pan_number",  html_entity_decode($beneficiary->pan_number)); ?></b></label>
										</div>

										<div class="mb-3">
											<label class="form-label">Signature :
												<?php
												if ($beneficiary->signature != null && $beneficiary->signature != "") {
													$img = $this->config->item("photo_url") . $beneficiary->signature;
												} else {
													$img = "https://cdn4.vectorstock.com/i/1000x1000/50/68/avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg";
												}

												?>
												<b> <img class="img-70 rounded sign" style="margin-top:10px" src=" <?php echo $img; ?>" alt="" /> </b>
											</label>
										</div>


									</div>
								</div>
							</div>
							<div class="col-xl-8">
								<div class="card">
									<div class="card-header pb-0">
										<h4 class="card-title mb-0">Other Details</h4>
										<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
									</div>
									<div class="card-body">
										<div class="row">

											<div class="mb-3">
												<?php if ($beneficiary->qualification == 0) { ?>
													<label class="form-label">Education Qualification :<b>Illiterate</b></label>
												<?php } elseif ($beneficiary->qualification == 1) { ?>
													<label class="form-label">Education Qualification :<b>5th</b></label>
												<?php } elseif ($beneficiary->qualification == 2) { ?>
													<label class="form-label">Education Qualification :<b>8th</b></label>
												<?php } elseif ($beneficiary->qualification == 3) { ?>
													<label class="form-label">Education Qualification :<b>10th</b></label>
												<?php } elseif ($beneficiary->qualification == 4) { ?>
													<label class="form-label">Education Qualification :<b>12th</b></label>
												<?php } elseif ($beneficiary->qualification == 5) { ?>
													<label class="form-label">Education Qualification :<b>Graduation</b></label>
												<?php } ?>
											</div>
											<div class="mb-3">
												<label class="form-label">Monthly Income : <b> <?php echo set_value("f_m_income_daily_income", html_entity_decode($beneficiary->f_m_income_daily_income)); ?></b></label>
											</div>
											<div class="mb-3">
												<label class="form-label">Number Of Earning Family Member : <b><?php echo set_value("number_earning_family_member",  html_entity_decode($beneficiary->number_earning_family_member)); ?></b></label>
											</div>
											<div class="mb-3">
												<label class="form-label">Married Status : <b><?php echo set_value("married_status", html_entity_decode($beneficiary->married)); ?></b></label>
											</div>
											<div class="mb-3">
												<label class="form-label">Numbers Children : <b><?php echo set_value("numbers_children",  html_entity_decode($beneficiary->numbers_children)); ?></b></label>
											</div>
											<div class="mb-3">
												<label class="form-label">daughter : <b><?php echo set_value("daughter",  html_entity_decode($beneficiary->daughter)); ?></b></label>
											</div>
											<div class="mb-3">
												<?php if ($beneficiary->own_house != 0 || $beneficiary->own_house != '') { ?>
													<label class="form-label">Own House : <b><?php echo set_value("own_house",  html_entity_decode($beneficiary->own_house)); ?></b></label>
												<?php } else { ?>
													<label class="form-label">Own House : <b>No</b></label>
												<?php } ?>
											</div>
											<div class="mb-3">
												<label class="form-label">Training Session : <b><?php echo set_value("training",  html_entity_decode($beneficiary->training)); ?></b></label>
											</div>
											<div class="mb-3">
												<label class="form-label">Type Of Work : <b><?php echo set_value("type_work",  html_entity_decode($beneficiary->type_work)); ?></b></label>
											</div>

										</div>
									</div>
								</div>



								<div class="card">
									<div class="card-header pb-0">
										<h4 class="card-title mb-0">Kit Details</h4>
										<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
									</div>
									<div class="card-body">
										<div class="row">

											<?php


											$safety_kit_obj = $safety_kit[0]->safety_kit;

											if ($safety_kit_obj != null && $safety_kit_obj != '') {
												$array = json_decode($safety_kit_obj);
												foreach ($array as  $value) {
											?>
													<div class="mb-3">
														<label class="form-label">

															<?php
															$this->load->model('Beneficiary_model');
															$result = $this->Beneficiary_model->get_kit_name($value);
															echo $result[0]->pname;
															?>

															: <b>Yes</b>
														</label>
													</div>
												<?php
												}
											} else {
												?>
												NO SAFTY KIT ASSIGN
											<?php } ?>
										</div>

									</div>
								</div>



								<div class="card">
									<div class="card-header pb-0">
										<h4 class="card-title mb-0">Approve/Reject</h4>
										<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="mb-3">

												<div class="mb-3">
													<label class="form-label">Note</label>
													<input type="text" class="form-control" id="note" name="note" value="<?php echo $beneficiary->note; ?>">
													<input type="hidden" class="form-control" id="safetykit" name="safetykit" value="<?php echo $beneficiary->safety_kit; ?>">
													<input type="hidden" class="form-control" id="branch" name="branch" value="<?php echo $beneficiary->branchId; ?>">
													<input type="hidden" class="form-control" id="fid" name="fid" value="<?php echo $beneficiary->fid; ?>">
												</div>
												<?php if ($beneficiary->status == 1) { ?>
													<a class="btn btn-sm btn-warning approveUser" style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Approve user">Approve</a>
													<a class="btn btn-sm btn-success rejectUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Reject user">Reject</a>
												<?php } elseif ($beneficiary->status == 2) { ?>
													<a class="btn btn-sm btn-success rejectUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Reject user">Reject</a>
													<a class="btn btn-sm btn-info updateUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Update Note">Update Note</a>
												<?php } elseif ($beneficiary->status == 3) { ?>
													<a class="btn btn-sm btn-warning approveUser" style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Approve user">Approve</a>
													<a class="btn btn-sm btn-info updateUser " style="padding:7px 15px;" href="#" data-userid="<?php echo $beneficiary->bId; ?>" title="Update Note">Update Note</a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header pb-0">
							<h4 class="card-title mb-0">Insurance Details</h4>
							<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
						</div>
						<?php if ($beneficiary->insurance == "Yes") { ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<!-- <label class="form-label">Insurance : <b><?php echo set_value("insurance", html_entity_decode($beneficiary->insurance)); ?></b></label> -->
											<label class="form-label">Insurance : <b>Aavas Nirman Shramik Shuraksha Yojana</b></label>
										</div>
									</div>
									<div class="col-md-6">
										<?php if ($beneficiary->relation_with_insured == 0) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured  : <b>Father</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 1) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b>Mother</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 2) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b>Wife</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 3) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b>Son</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 4) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b>Daughter</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 5) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b>Brother</b></label>
											</div>
										<?php } elseif ($beneficiary->relation_with_insured == 6) { ?>
											<div class="mb-3">
												<label class="form-label">Relation With Insured : <b><?php echo set_value("relation_with_insured_name", html_entity_decode($beneficiary->relation_with_insured_name)); ?></b></label>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Insured Name : <b><?php echo set_value("insured_name", html_entity_decode($beneficiary->insured_name)); ?></b></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Nominess Name : <b><?php echo set_value("nominee_name", html_entity_decode($beneficiary->nominee_name)); ?></b></label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">

										<div class="mb-3">
											<label class="form-label">Nominess Date Of Birth: <b><?php echo set_value("nominee_dob", html_entity_decode($beneficiary->nominee_dob)); ?></b></label>
										</div>
									</div>


								</div>
							</div>
						<?php } else { ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label"><b>No Data Found</b></label>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<div class="card">
						<div class="card-header pb-0">
							<h4 class="card-title mb-0">Other Insurance Details</h4>
							<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
						</div>
						<?php if ($beneficiary->other_insurance != 0) { ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Other Insurance : <b><?php echo set_value("other_insurance", html_entity_decode($beneficiary->otherinsurance)); ?></b></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Insurance Amount : <b><?php echo set_value("insurance_amount", html_entity_decode($beneficiary->insurance_amount)); ?> </b></label>
										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label">Insurance Company : <b><?php echo set_value("insurance_company", html_entity_decode($beneficiary->insurance_company)); ?></b></label>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>

							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label class="form-label"><b>No Data Found</b></label>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
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
			jQuery(document).on("click", ".approveUser", function(event) {
				event.preventDefault();
				var note = $('#note').val();
				// var safetykit = $('#safetykit').val();
				// var branch = $('#branch').val();
				// var fid = $('#fid').val();
				var userId = $(this).data("userid"),
					hitURL = '<?php echo base_url() ?>admin/beneficiary/approvebeneficiary/',
					currentRow = $(this);

				var confirmation = confirm("Are you sure to approve this user ?");

				if (confirmation) {
					jQuery.ajax({
						type: "POST",
						dataType: "json",
						url: hitURL,
						data: {
							userId: userId,
							note: note
							// safetykit: safetykit,
							// branch: branch,
							// fid: fid
						}
					}).done(function(data) {
						console.log(data);
						currentRow.parents('tr').remove();
						if (data.status = true) {
							alert("Beneficiary successfully approved");
						} else if (data.status = false) {
							alert("Beneficiary approve failed");
						} else {
							alert("Access denied..!");
						}
						location.reload();
					});
				}
			});


			jQuery(document).on("click", ".rejectUser", function() {
				var note = $('#note').val();
				var userId = $(this).data("userid"),
					hitURL = '<?php echo base_url() ?>admin/beneficiary/deletebeneficiary/',
					currentRow = $(this);

				var confirmation = confirm("Are you sure to reject this user ?");

				if (confirmation) {
					jQuery.ajax({
						type: "POST",
						dataType: "json",
						url: hitURL,
						data: {
							userId: userId,
							note: note
						}
					}).done(function(data) {
						console.log(data);
						currentRow.parents('tr').remove();
						if (data.status = true) {
							alert("Beneficiary successfully reject");
						} else if (data.status = false) {
							alert("Beneficiary reject failed");
						} else {
							alert("Access denied..!");
						}
						location.reload();

					});
				}
			});

			jQuery(document).on("click", ".updateUser", function() {
				var note = $('#note').val();
				var userId = $(this).data("userid"),
					hitURL = '<?php echo base_url() ?>admin/beneficiary/updatebeneficiary/',
					currentRow = $(this);

				var confirmation = confirm("Are you sure to update this user ?");

				if (confirmation) {
					jQuery.ajax({
						type: "POST",
						dataType: "json",
						url: hitURL,
						data: {
							userId: userId,
							note: note
						}
					}).done(function(data) {
						console.log(data);
						currentRow.parents('tr').remove();
						if (data.status = true) {
							alert("Beneficiary successfully update");
						} else if (data.status = false) {
							alert("Beneficiary update failed");
						} else {
							alert("Access denied..!");
						}
						location.reload();

					});
				}
			});


		});
	</script>

</body>

</html>