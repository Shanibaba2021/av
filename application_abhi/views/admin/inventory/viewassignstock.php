<?php $this->load->view('includes/header'); ?>
<div class="content-wrapper" style="min-height: 392px;">
	<section class="content-header">
		<div class="row">

			<div class="">

				<div class="ibox ">

					<div class="ibox-title">

						<h5> <small></small></h5>

						<div class="ibox-tools">

						</div>

					</div>

					<!-- ............................................................. -->

					<!-- BO : content  -->

					<div class="col-sm-12 white-bg ">

						<div class="box box-info">

							<div class="box-header with-border">

								<h3 class="box-title">View </h3>

							</div>

							<!-- /.box-header -->

							<!-- form start -->

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

												<label for="item_name" class=" control-label">Item Name </label>

											</td>

											<td>

												<?php echo set_value("item_name", html_entity_decode($beneficiary->item_name)); ?>

											</td>

										</tr>



										<tr>

											<td>

												<label for="lname" class="control-label">Assign Quantity</label>

											</td>

											<td>

												<?php echo set_value("quantity", html_entity_decode($beneficiary->quantity)); ?>

											</td>

										</tr>





										<!-- gender Start -->

										<tr>

											<td>

												<label for="branch" class="control-label"> Branch </label>

											</td>

											<td>

												<?php echo set_value("branch", html_entity_decode($beneficiary->branch)); ?>

											</td>

										</tr>

										<!-- gender End -->


                                        <tr>

											<td>

												<label for="createdDtm" class="control-label">Created Date </label>

											</td>

											<td>

												<?php echo set_value("createdDtm", html_entity_decode($beneficiary->createdDtm)); ?>

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

						<!-- /.box -->

						<br><br><br><br>

					</div>

					<!-- EO : content  -->

					<!-- ...................................................................... -->

				</div>

			</div>

		</div>
	</section>
</div>
<?php $this->load->view('includes/footer'); ?>