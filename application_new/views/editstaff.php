<div class="content-wrapper" style="min-height: 392px;">
    <section class="content-header">
        <div class="row">

            <div class=" ">


                <!-- ............................................................. -->

                <!-- BO : content  -->

                <div class="col-sm-12 white-bg ">

                    <div class="box box-info">

                        <div class="box-header with-border">

                            <h3 class="box-title"> Edit </h3>

                        </div>

                        <!-- /.box-header -->

                        <!-- form start -->

                        <form role="form" action="<?php echo base_url() ?>editUser"  id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="box-body">

                                <?php if ($this->session->flashdata('message')) : ?>

                                    <div class="alert alert-success">

                                        <button type="button" class="close" data-close="alert"></button>

                                        <?php echo $this->session->flashdata('message'); ?>

                                    </div>

                                <?php endif; ?>


                                <!-- Userid Start -->

                                <!-- Userid Start -->

                                <input type="hidden" value="<?php echo set_value("userId", html_entity_decode($userRecords->userId)); ?>" id="userid" name="userid">

                                <!-- Userid End -->

                                <!-- Userid End -->





                                <div class="form-group">

                                    <label for="fname" class="col-sm-3 control-label"> First Name </label>

                                    <div class="col-sm-4">

                                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value("fname", html_entity_decode($userRecords->fname)); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("fname", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="lname" class="col-sm-3 control-label"> Last Name </label>

                                    <div class="col-sm-4">

                                        <input type="text" class="form-control " id="lname" name="lname" value="<?php echo set_value("lname", $userRecords->lname); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("lname", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label for="mobile" class="col-sm-3 control-label"> Mobile </label>

                                    <div class="col-sm-4">

                                        <input type="text" class="form-control span2  " id="mobile" name="mobile" value="<?php echo set_value("mobile", $userRecords->mobile); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("mobile", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="email" class="col-sm-3 control-label"> Email </label>

                                    <div class="col-sm-4">

                                        <input type="email" class="form-control span2 required email " id="email" name="email" value="<?php echo set_value("email", $userRecords->email); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="password" class="col-sm-3 control-label"> Password</label>

                                    <div class="col-sm-4">

                                        <input type="password" class="form-control required" id="password" name="password" value="<?php echo set_value("password", ''); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("password", "<span class='label label-danger'>", "</span>") ?>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label for="password" class="col-sm-3 control-label"> Confirm password </label>

                                    <div class="col-sm-4">

                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" value="<?php echo set_value("password", ''); ?>">

                                    </div>

                                    <div class="col-sm-5">



                                        <?php echo form_error("cpassword", "<span class='label label-danger'>", "</span>") ?>

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

                    <!-- /.box -->

                    <br><br><br><br>

                </div>

                <!-- EO : content  -->

                <!-- ...................................................................... -->

            </div>
        </div>



    </section>
</div>
