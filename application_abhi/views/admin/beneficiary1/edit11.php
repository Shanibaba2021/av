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
        <!-- Page Header Ends-->
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
                                <h3>Beneficiary</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                                    <li class="breadcrumb-item">Beneficiary</li>
                                    <li class="breadcrumb-item">Edit Beneficiary</li>
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





                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- fname Start -->
                                            <div class="form-group">

                                                <label for="fname" class="col-sm-3 control-label"> Full Name </label>

                                                <div>

                                                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value("fname", html_entity_decode($beneficiary->fname)); ?>">

                                                </div>

                                                <div class="col-sm-5">

                                                    <?php echo form_error("fname", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>

                                        <!-- fname End -->
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label class="control-label col-md-3"> Gender </label>

                                                <div>

                                                    <select class="form-control select2" name="gender" id="gender">

                                                        <option value="">Select Gender</option>

                                                        <?php

                                                        if (isset($gender) && !empty($gender)) :

                                                            foreach ($gender as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->gender == $beneficiary->gender ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->gender; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>

                                                </div>
                                                <div class="col-sm-5">



                                                    <?php echo form_error("gender", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">



                                            <div class="form-group">

                                                <label class="control-label col-md-3"> Branch </label>

                                                <div>

                                                    <select class="form-control select2" onChange="get_function(this.value);" name="branch" id="branch">

                                                        <option value="">Select Branch</option>

                                                        <?php

                                                        if (isset($branchs) && !empty($branchs)) :

                                                            foreach ($branchs as $key => $value) : ?>

                                                                <option value="<?php echo $value->branchId; ?>" <?php echo $value->bname == $beneficiary->branch ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->bname; ?>

                                                                </option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                    </select>

                                                </div>
                                                <div class="col-sm-5">



                                                    <?php echo form_error("branch", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- Userid Start -->

                                        <!-- Userid Start -->

                                        <input type="hidden" value="<?php echo $this->session->userdata('userId'); ?>" id="userid" name="userid">
                                        <!-- Userid End -->

                                        <!-- Userid End -->
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="dob" class="col-sm-3 control-label"> Date of Birth </label>

                                                <div>

                                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo set_value("dob", html_entity_decode($beneficiary->dob)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("dob", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="mobile" class="col-sm-3 control-label"> Mobile </label>

                                                <div>

                                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo set_value("mobile", html_entity_decode($beneficiary->mobile)); ?>">
                                                    <input type="hidden" class="form-control" id="mmobile" name="mmobile" value="<?php echo set_value("mmobile", html_entity_decode($beneficiary->mobile)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("mobile", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="father_husband_name " class=" control-label"> Father/husband Name </label>

                                                <div>

                                                    <input type="text" class="form-control" id="father_husband_name" name="father_husband_name" value="<?php echo set_value("father_husband_name", html_entity_decode($beneficiary->father_husband_name)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("father_husband_name", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="pincode " class="col-sm-3 control-label"> Pincode </label>

                                                <div>

                                                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo set_value("pincode", html_entity_decode($beneficiary->pincode)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("pincode", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="caste " class="col-sm-3 control-label"> Caste </label>

                                                <div>

                                                    <input type="text" class="form-control" id="caste" name="caste" value="<?php echo set_value("caste", html_entity_decode($beneficiary->caste)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("caste", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="current_address " class=" control-label"> Current Address </label>

                                                <div>

                                                    <input type="text" class="form-control" id="current_address" name="current_address" value="<?php echo set_value("current_address", html_entity_decode($beneficiary->current_address)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("current_address", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="qualification " class=" control-label"> Qualification </label>

                                                <div>

                                                    <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo set_value("qualification", html_entity_decode($beneficiary->qualification)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("qualification", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="f_m_income_daily_income " class="control-label"> Family Monthly Income/daily Income </label>

                                                <div>

                                                    <input type="text" class="form-control" id="f_m_income_daily_income" name="f_m_income_daily_income" value="<?php echo set_value("f_m_income_daily_income", html_entity_decode($beneficiary->f_m_income_daily_income)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("f_m_income_daily_income", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="number_earning_family_member " class=" control-label"> Number Earning Family Member </label>

                                                <div>

                                                    <input type="text" class="form-control" id="number_earning_family_member" name="number_earning_family_member" value="<?php echo set_value("number_earning_family_member", html_entity_decode($beneficiary->number_earning_family_member)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("number_earning_family_member", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="numbers_children " class=" control-label"> Numbers Children </label>

                                                <div>

                                                    <input type="text" class="form-control" id="numbers_children" name="numbers_children" value="<?php echo set_value("numbers_children", html_entity_decode($beneficiary->numbers_children)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("numbers_children", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="son" class="control-label"> Son </label>

                                                <div>

                                                    <input type="text" class="form-control" id="son" name="son" value="<?php echo set_value("son", html_entity_decode($beneficiary->son)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("son", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="daughter" class="control-label"> Daughter </label>

                                                <div>

                                                    <input type="text" class="form-control" id="daughter" name="daughter" value="<?php echo set_value("daughter", html_entity_decode($beneficiary->daughter)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("daughter", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="monthly_income" class=" control-label">Monthly Income </label>

                                                <div>

                                                    <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="<?php echo set_value("monthly_income", html_entity_decode($beneficiary->monthly_income)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("monthly_income", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="control-label"> Own House</label>
                                                <div>
                                                    <div class="row text-center">
                                                        <div class="col-sm-4 col-xs-6">
                                                            <!-- checkbox -->
                                                            <div class="form-group ">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input show3" type="radio" id="1" value="1" <?php if ($beneficiary->house > '0') echo 'checked="checked"'; ?> name="own_house" style="margin-top: 6px;">
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-6">
                                                            <!-- radio -->
                                                            <div class="form-group ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input hide3" type="radio" value="0" <?php if ($beneficiary->house == '0') echo 'checked="checked"'; ?> name="own_house" style="margin-top: 6px;">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="House" <?php if ($beneficiary->house == '0') { ?> style="display:none;" <?php }  ?>>
                                                        <select class="form-control select2" name="own_houses" id="own_houses">
                                                            <option value="">Select House</option>

                                                            <?php

                                                            if (isset($house) && !empty($house)) :

                                                                foreach ($house as $key => $value) : ?>

                                                                    <option value="<?php echo $value->id; ?>" <?php echo $value->house_status == $beneficiary->own_house ? 'selected="selected"' : ""; ?>>

                                                                        <?php echo $value->house_status; ?>

                                                                    </option>

                                                                <?php endforeach; ?>

                                                            <?php endif; ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-5">


                                                    <?php echo form_error("own_house", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>




                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="type_work" class="control-label"> Type Work </label>

                                                <div>

                                                    <select class="form-control select2" name="type_work" id="type_work">

                                                        <option value="">Select Work</option>

                                                        <?php

                                                        if (isset($work) && !empty($work)) :

                                                            foreach ($work as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->work_name == $beneficiary->type_work ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->work_name; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>

                                                </div>

                                                <div class="col-sm-5">

                                                    <?php echo form_error("type_work", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="security_equipment" class="control-label"> Security Equipment </label>

                                                <div>

                                                    <select class="form-control select2" name="security_equipment" id="security_equipment">

                                                        <option value="">Select Security Equipment</option>

                                                        <?php

                                                        if (isset($check) && !empty($check)) :

                                                            foreach ($check as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->status == $beneficiary->security_equipment ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->status; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("security_equipment", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="aadhar_number" class="control-label"> Aadhar Number </label>

                                                <div>

                                                    <input type="text" class="form-control" id="aadhar_number" name="aadhar_number" value="<?php echo set_value("aadhar_number", html_entity_decode($beneficiary->aadhar_number)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("aadhar_number", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="pan_number" class=" control-label"> Pan Number </label>

                                                <div>

                                                    <input type="text" class="form-control" id="pan_number" name="pan_number" value="<?php echo set_value("pan_number", html_entity_decode($beneficiary->pan_number)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("pan_number", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="married_status" class="control-label"> Married Status </label>

                                                <div>

                                                    <select class="form-control select2" name="married_status" id="married_status">

                                                        <option value="">Select Married Status</option>

                                                        <?php

                                                        if (isset($marital) && !empty($marital)) :

                                                            foreach ($marital as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->id == $beneficiary->married_status ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->status; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("married_status", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>


                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="account_number" class=" control-label"> Account No. </label>

                                                <div>

                                                    <input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo set_value("account_number", html_entity_decode($beneficiary->account_number)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("account_number", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="other_insurance" class="control-label"> Other Insurance </label>

                                                <div>

                                                    <select class="form-control select2" name="other_insurance" id="other_insurance">

                                                        <option value="">Select Other Insurance</option>

                                                        <?php

                                                        if (isset($other_insurance) && !empty($other_insurance)) :

                                                            foreach ($other_insurance as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->id == $beneficiary->other_insurance ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->status; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("insurance", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="control-label"> Insurance</label>
                                                <div>
                                                    <div class="row text-center">
                                                        <div class="col-sm-4 col-xs-6">
                                                            <!-- checkbox -->
                                                            <div class="form-group ">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input show4" type="radio" id="1" value="1" <?php if ($beneficiary->insurance > '0') echo 'checked="checked"'; ?> name="insurance" style="margin-top: 6px;">
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-6">
                                                            <!-- radio -->
                                                            <div class="form-group ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input hide4" type="radio" value="0" <?php if ($beneficiary->insurance == '0') echo 'checked="checked"'; ?> name="insurance" style="margin-top: 6px;">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="insurance" <?php if ($beneficiary->insurance == '0') { ?> style="display:none;" <?php }  ?>>

                                                    </div>
                                                </div>

                                                <div class="col-sm-5">


                                                    <?php echo form_error("insurance", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>




                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="funcation" class="control-label"> Funcation </label>

                                                <div>

                                                    <select class="form-control select2" name="funcation" id="funcation">

                                                        <option value="">Select Function</option>
                                                        <?php

                                                        if (isset($function) && !empty($function)) :

                                                            foreach ($function as $keyes => $values) : ?>

                                                                <option value="<?php echo $values->id; ?>" <?php echo $values->id == $beneficiary->fun_id ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $values->funcation_name; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>


                                                    </select>
                                                </div>

                                                <div class="col-sm-5">

                                                    <?php echo form_error("politically_exposed", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                            <div class="col-sm-5">

                                                <?php echo form_error("politically_exposed", "<span class='label label-danger'>", "</span>") ?>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="row insurance" <?php if ($beneficiary->insurance == '0') { ?> style="display:none;" <?php }  ?>>
                                        <div class="col-md-6">


                                            <div class="form-group insurance" <?php if ($beneficiary->insurance == '0') { ?> style="display:none;" <?php }  ?>>

                                                <label for="insured_name" class="control-label"> Insured Name </label>

                                                <div>

                                                    <input type="text" class="form-control" id="insured_name" name="insured_name" value="<?php echo set_value("insured_name", html_entity_decode($beneficiary->insured_name)); ?>">

                                                </div>

                                                <div class="col-sm-5">

                                                    <?php echo form_error("insured_name", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="nominee_name " class="control-label"> Nominee Name </label>

                                                <div>

                                                    <input type="text" class="form-control" id="nominee_name" name="nominee_name" value="<?php echo set_value("nominee_name", html_entity_decode($beneficiary->nominee_name)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("nominee_name", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row insurance" <?php if ($beneficiary->insurance == '0') { ?> style="display:none;" <?php }  ?>>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="nominee_dob" class="control-label"> Nominee Date Of Birth</label>

                                                <div>

                                                    <input type="date" class="form-control" id="nominee_dob" name="nominee_dob" value="<?php echo set_value("nominee_dob", html_entity_decode($beneficiary->nominee_dob)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("nominee_dob", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="relation_with_insured " class="control-label"> Relation With Insured </label>

                                                <div>

                                                    <input type="text" class="form-control" id="relation_with_insured" name="relation_with_insured" value="<?php echo set_value("relation_with_insured", html_entity_decode($beneficiary->relation_with_insured)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("relation_with_insured", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row insurance" <?php if ($beneficiary->insurance == '0') { ?> style="display:none;" <?php }  ?>>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="date_from_policy" class="control-label"> Date From Policy</label>

                                                <div>

                                                    <input type="date" class="form-control" id="date_from_policy" name="date_from_policy" value="<?php echo set_value("date_from_policy", html_entity_decode($beneficiary->date_from_policy)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("date_from_policy", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="politically_exposed" class="control-label"> Politically Exposed </label>

                                                <div>

                                                    <select class="form-control select2" name="politically_exposed" id="politically_exposed">

                                                        <option value="">Select Politically Exposed</option>

                                                        <?php

                                                        if (isset($expose) && !empty($expose)) :

                                                            foreach ($expose as $key => $value) : ?>

                                                                <option value="<?php echo $value->id; ?>" <?php echo $value->id == $beneficiary->politically_exposed ? 'selected="selected"' : ""; ?>>

                                                                    <?php echo $value->status; ?>

                                                                </option>

                                                            <?php endforeach; ?>

                                                        <?php endif; ?>

                                                    </select>
                                                </div>

                                                <div class="col-sm-5">

                                                    <?php echo form_error("politically_exposed", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="lat" class=" control-label"> Lat </label>

                                                <div>

                                                    <input type="text" class="form-control" id="lat" name="lat" value="<?php echo set_value("lat", html_entity_decode($beneficiary->lat)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("lat", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="longg" class=" control-label"> Long </label>

                                                <div>

                                                    <input type="text" class="form-control" id="longg" name="longg" value="<?php echo set_value("longg", html_entity_decode($beneficiary->longg)); ?>">

                                                </div>

                                                <div class="col-sm-5">



                                                    <?php echo form_error("longg", "<span class='label label-danger'>", "</span>") ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="image" class="control-label"> Image </label>

                                                <div>

                                                    <input type="file" name="image" />

                                                    <input type="hidden" name="old_image" value="<?php if (isset($image) && $image != "") {
                                                                                                        echo $image;
                                                                                                    } ?>" />

                                                    <?php if (isset($image_err) && !empty($image_err)) {
                                                        foreach ($image_err as $key => $error) {
                                                            echo "<div class=\"error-msg\"></div>";
                                                        }
                                                    } ?>

                                                    <?php if (isset($beneficiary->image) && $beneficiary->image != "") { ?>

                                                        <br>

                                                        <img src="<?php echo $this->config->item("photo_url"); ?><?php echo $beneficiary->image; ?>" alt="pic" width="50" height="50" />

                                                    <?php } ?>

                                                </div>

                                                <div class="col-sm-3">

                                                </div>

                                            </div>


                                        </div>
                                        <!-- Image Start -->
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="image" class="col-sm-3 control-label"> Signature </label>

                                                <div class="col-sm-6">

                                                    <input type="file" name="signature" />

                                                    <input type="hidden" name="old_image" value="<?php if (isset($signature) && $signature != "") {
                                                                                                        echo $signature;
                                                                                                    } ?>" />

                                                    <?php if (isset($image_err) && !empty($image_err)) {
                                                        foreach ($image_err as $key => $error) {
                                                            echo "<div class=\"error-msg\"></div>";
                                                        }
                                                    } ?>

                                                    <?php if (isset($beneficiary->signature) && $beneficiary->signature != "") { ?>

                                                        <br>

                                                        <img src="<?php echo $this->config->item("photo_url"); ?><?php echo $beneficiary->signature; ?>" alt="pic" width="50" height="50" />

                                                    <?php } ?>

                                                </div>

                                                <div class="col-sm-3">

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Image End -->


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label for="safety_kit" class="control-label"> Safety Kit </label>

                                                <div>

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

                                                <div class="col-sm-5">



                                                    <?php echo form_error("safety_kit", "<span class='label label-danger'>", "</span>") ?>

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
            </div>
            <!-- Container-fluid Ends-->
            <!-- footer start-->
            <?php $this->load->view('inc/footer'); ?>
            <!-- footer end-->
        </div>

    </div>
    <!-- footer script start-->
    <?php $this->load->view('inc/footerscript'); ?>
    <!-- footer script end-->

    <script>
        $(document).ready(function() {
            $(".hide3").click(function() {
                $(".House").hide();
            });
            $(" .show3").click(function() {
                $(".House").show();
            });
        });

        $(document).ready(function() {
            $(".hide4").click(function() {
                $(".insurance").hide();
            });
            $(" .show4").click(function() {
                $(".insurance").show();
            });
        });

        function get_function(val) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('admin/beneficiary/get_function'); ?>",
                data: 'branchId=' + val,
                datatype: "json",
                success: function(rep) {
                    var data = JSON.parse(rep);
                    console.log(data.msg);
                    $('#funcation').find('option').not(':first').remove();
                    var html = "";
                    $.each(data.data, function(i, value) {
                        html += ('<option value="' + value.id + '">' + value.funcation_name + '</option>');
                    });
                    $("#funcation").html(html);
                }
            });
        }
    </script>



</body>

</html>