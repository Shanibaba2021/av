<?php $this->load->view('includes/header'); ?>
<div class="content-wrapper" style="min-height: 392px;">
    <section class="content-header">
        <div class="row">

            <div class="ibox ">

                <!-- ............................................................. -->

                <!-- BO : content  -->

                <div class="col-sm-12 white-bg ">

                    <div class="box box-info">

                        <div class="box-header with-border">

                            <h3 class="box-title"> </h3>

                        </div>

                        <!-- /.box-header -->

                        <!-- form start -->

                        <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="box-body">

                                <?php if ($this->session->flashdata('message')) : ?>

                                    <div class="alert alert-success">

                                        <button type="button" class="close" data-close="alert"></button>

                                        <?php echo $this->session->flashdata('message'); ?>

                                    </div>

                                <?php endif; ?>







                                <!-- item_name  Start -->

                                <div class="form-group">

                                    <label for="item_name" class="col-sm-3 control-label"> Item Name  </label>

                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo set_value("item_name"); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("item_name", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>

                                <!-- item_name  End -->

                                <!-- Userid Start -->

                                <input type="hidden" value="<?php echo $this->session->userdata('userId'); ?>" id="userid" name="userid">

                                <!-- Userid End -->


                                <!-- current_quantity Start -->

                                <div class="form-group">

                                    <label for="current_quantity" class="col-sm-3 control-label">Current Quantity  </label>

                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="current_quantity" name="current_quantity" value="<?php echo set_value("current_quantity"); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("current_quantity", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>

                                <!-- current_quantity End -->

                            

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

                    <!-- /.box -->

                    <br><br><br><br>

                </div>

                <!-- EO : content  -->

                <!-- ...................................................................... -->

            </div>

        </div>
    </section>
</div>
<?php $this->load->view('includes/footer'); ?>