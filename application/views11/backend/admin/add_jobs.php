<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('job_adding_form'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title my-1"><?php echo get_phrase('job_adding_form'); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('admin/get_jobs'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_job_list'); ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="<?php echo site_url('admin/jobs_action/add'); ?>" method="POST" class="c-form">
                            <!-- General Information -->
                            <div class="">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Job Title</label>
                                            <input type="text" name="job_title" class="form-control" required placeholder="Job Title">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Job Category</label>
                                            <select class="form-control " name="job_category" id="job_category">
                                                <?php foreach ($job_category as $row) : ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->job_category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <?php if ($this->session->userdata('user_id') == 1) : ?>
                                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                                <label>Company</label>
                                                <select class="form-control select2" name="company_id" id="company_id">
                                                    <?php foreach ($company as $row) : ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->university_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        <?php endif ?>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Short descripation</label>
                                            <input type="text" name="job_company" class="form-control" placeholder="Short descripation" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Descripation</label>
                                            <textarea id="editor1" name="desc" cols="30" rows="10"> </textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Contact Details</label>
                                            <input type="text" name="mobile" class="form-control" placeholder="Contact Details" required>
                                        </div>


                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Salary Range</label>
                                            <select class="form-control " name="salary_range" id="salary_range">
                                                <?php foreach ($salary_range as $row) : ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->salary_range ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>No. Of Vacancy</label>
                                            <input type="text" name="no_vacancy" class="form-control" placeholder="No. Of Vacancy" required>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Experience</label>
                                            <select class="form-control " name="exp" id="exp">
                                                <?php foreach ($job_experience as $row) : ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->job_experience ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Job Type</label>

                                            <select class="form-control " name="job_type" id="job_type">
                                                <?php foreach ($job_type as $row) : ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->job_type ?></option>
                                                <?php endforeach; ?>
                                            </select>


                                            <!-- <select class="form-control" name="job_type" required>
                                                <option value="1">Part Time</option>
                                                <option value="2">Full Time</option>
                                                <option value="3">Contract</option>
                                                <option value="4">Freelancer</option>

                                            </select> -->

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Qualification Required</label>
                                            <input type="text" name="education" class="form-control" placeholder="Qualification" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Skills(Seperate with Comma)</label>
                                            <input type="text" name="skills" class="form-control" placeholder="Skills" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-m btn btn-info full-width mt-3">Add job</button>
                            </div>
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#description']);
    });
</script>

<script type="text/javascript">
    var blank_outcome = jQuery('#blank_outcome_field').html();
    var blank_requirement = jQuery('#blank_requirement_field').html();
    jQuery(document).ready(function() {
        jQuery('#blank_outcome_field').hide();
        jQuery('#blank_requirement_field').hide();
    });

    function appendOutcome() {
        jQuery('#outcomes_area').append(blank_outcome);
    }

    function removeOutcome(outcomeElem) {
        jQuery(outcomeElem).parent().parent().remove();
    }

    function appendRequirement() {
        jQuery('#requirement_area').append(blank_requirement);
    }

    function removeRequirement(requirementElem) {
        jQuery(requirementElem).parent().parent().remove();
    }

    function priceChecked(elem) {
        if (jQuery('#discountCheckbox').is(':checked')) {

            jQuery('#discountCheckbox').prop("checked", false);
        } else {

            jQuery('#discountCheckbox').prop("checked", true);
        }
    }

    function topCourseChecked(elem) {
        if (jQuery('#isTopCourseCheckbox').is(':checked')) {

            jQuery('#isTopCourseCheckbox').prop("checked", false);
        } else {

            jQuery('#isTopCourseCheckbox').prop("checked", true);
        }
    }

    function isFreeCourseChecked(elem) {

        if (jQuery('#' + elem.id).is(':checked')) {
            $('#price').prop('required', false);
        } else {
            $('#price').prop('required', true);
        }
    }

    function calculateDiscountPercentage(discounted_price) {
        if (discounted_price > 0) {
            var actualPrice = jQuery('#price').val();
            if (actualPrice > 0) {
                var reducedPrice = actualPrice - discounted_price;
                var discountedPercentage = (reducedPrice / actualPrice) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + '%');

                } else {
                    jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
                }
            }
        }
    }
</script>

<style media="screen">
    body {
        overflow-x: hidden;
    }
</style>