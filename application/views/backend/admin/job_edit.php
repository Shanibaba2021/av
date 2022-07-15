<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('job_edit_form'); ?></h4>
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
                        <h4 class="header-title my-1"><?php echo get_phrase('job_edit_form'); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('admin/get_jobs'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i class=" mdi mdi-keyboard-backspace"></i> <?php echo get_phrase('back_to_job_list'); ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="<?php echo site_url('admin/jobs_action/edit/' . $get_single_jobs[0]->job_id); ?>" method="POST" class="c-form">
                            <!-- General Information -->
                            <div class="">

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Job Title</label>
                                            <input type="text" name="job_title" class="form-control" value="<?php echo $get_single_jobs[0]->job_title ?>" required placeholder="Job Title">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Category</label>

                                            <select class="form-control" name="job_category" id="job_category">
                                                <?php foreach ($job_category as  $value) : ?>


                                                    <option value="<?php echo $value->id; ?>" <?php if ($value->id == $get_single_jobs[0]->job_category) echo "selected"; ?>>

                                                        <?php echo $value->job_category; ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>


                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Short descripation</label>
                                            <input type="text" name="job_company" class="form-control" value="<?php echo $get_single_jobs[0]->short_description ?>" placeholder="Short descripation" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Descripation</label>
                                            <textarea id="editor1" name="desc" cols="30" rows="10"><?php echo $get_single_jobs[0]->description ?> </textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Contact Details</label>
                                            <input type="text" name="mobile" class="form-control" value="<?php echo $get_single_jobs[0]->mobile ?>" placeholder="Contact Details" required>
                                        </div>


                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Salary Range</label>

                                            <select class="form-control" name="salary_range" id="salary_range">
                                                <?php foreach ($salary_range as  $value) : ?>


                                                    <option value="<?php echo $value->id; ?>" <?php if ($value->id == $get_single_jobs[0]->salary_range) echo "selected"; ?>>

                                                        <?php echo $value->salary_range; ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>No. Of Vacancy</label>
                                            <input type="text" name="no_vacancy" class="form-control" value="<?php echo $get_single_jobs[0]->no_of_vacancy ?>" placeholder="No. Of Vacancy" required>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Experience</label>
                                         

                                            <select class="form-control" name="exp" id="exp">
                                                <?php foreach ($job_experience as  $value) : ?>

                                                    <option value="<?php echo $value->id; ?>" <?php if ($value->id == $get_single_jobs[0]->experience) echo "selected"; ?>>

                                                        <?php echo $value->job_experience; ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                                            <label>Job Type</label>
                                           

                                            <select class="form-control" name="job_type" id="job_type">
                                                <?php foreach ($job_type as  $value) : ?>

                                                    <option value="<?php echo $value->id; ?>" <?php if ($value->id == $get_single_jobs[0]->job_type) echo "selected"; ?>>

                                                        <?php echo $value->job_type; ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <label>Qualification Required</label>
                                            <input type="text" name="education" value="<?php echo $get_single_jobs[0]->education ?>" class="form-control" placeholder="Qualification" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Skills</label>
                                            <input type="text" name="skills" class="form-control" value="<?php echo $get_single_jobs[0]->skills ?>" placeholder="skills" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-m btn btn-info full-width mt-3">Edit Job</button>
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