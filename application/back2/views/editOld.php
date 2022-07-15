	<?php
    $userId = $userInfo->userId;
    $name = $userInfo->name;
    $fname = $userInfo->fname;
    $lname = $userInfo->lname;
    $image = $userInfo->image;
    $email = $userInfo->email;
    $mobile = $userInfo->mobile;
    $brname = $userInfo->brname
    ?>

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
	                                <h3>User</h3>
	                                <ol class="breadcrumb">
	                                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
	                                    <li class="breadcrumb-item">User</li>
	                                    <li class="breadcrumb-item">Edit User</li>
	                                </ol>
	                            </div>

	                        </div>
	                    </div>
	                </div>
	                <!-- Container-fluid starts-->
	                <div class="container-fluid">
	                    <div class="card">
	                        <div class="card-header">
	                            <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" enctype="multipart/form-data" role="form">
	                                <div class="box-body">
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="fname">First Name</label>
	                                                <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $fname; ?>" maxlength="128">
													<?php echo form_error("fname", "<span class='label label-danger'>", "</span>") ?>
	                                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />
	                                            </div>

	                                        </div>

	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="fname">Last Name</label>
	                                                <input type="text" class="form-control" id="lname" placeholder="Full Name" name="lname" value="<?php echo $lname; ?>" maxlength="128">
													<?php echo form_error("lname", "<span class='label label-danger'>", "</span>") ?>
	                                            </div>

	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="email">Email address</label>
	                                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>" maxlength="128">
													<?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>
	                                            </div>
	                                        </div>
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="password">Password</label>
	                                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="20">
													<?php echo form_error("password", "<span class='label label-danger'>", "</span>") ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="cpassword">Confirm Password</label>
	                                                <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword" maxlength="20">
													<?php echo form_error("cpassword", "<span class='label label-danger'>", "</span>") ?>
	                                            </div>
	                                        </div>
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="mobile">Mobile Number</label>
	                                                <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile" value="<?php echo $mobile; ?>" maxlength="10">
													<input type="hidden" class="form-control" id="mobile" placeholder="Mobile Number" name="hmobile" value="<?php echo $mobile; ?>" maxlength="10">
													<?php echo form_error("mobile", "<span class='label label-danger'>", "</span>") ?>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
	                                            <label for="image" class="col-sm-3 control-label"> Image </label>
	                                            <input type="file" name="image" class="form-control" />
	                                        </div>
	                                        <div class="col-sm-6">
	                                            <input type="hidden" name="old_image" value="<?php if (isset($image) && $image != "") {
                                                                                                    echo $image;
                                                                                                } ?>" />

	                                            <?php if (isset($image_err) && !empty($image_err)) {
                                                    foreach ($image_err as $key => $error) {
                                                        echo "<div class=\"error-msg\"></div>";
                                                    }
                                                } ?>

	                                            <?php if (isset($image) && $image != "") { ?>

	                                                <br>

	                                                <img src="<?php echo $this->config->item("photo_url"); ?><?php echo $image; ?>" alt="pic" width="50" height="50" />

	                                            <?php } ?>

	                                        </div>




	                                    </div>
	                                </div><!-- /.box-body -->

	                                <div class="box-footer">
	                                    <input type="submit" class="btn btn-primary" value="Submit" />
	                                    <input type="reset" class="btn btn-default" value="Reset" />
	                                </div>
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
	    <script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
	</body>

	</html>