<div class="row">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-body">
            <form class="required-form sign-up-form" action="<?php echo base_url('home/sign_up_company'); ?>" enctype="multipart/form-data" method="post">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="university_name">Organization name<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="university_name" name="university_name" required="">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="first_name">First name<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="first_name" name="first_name" required="">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="last_name">Last name<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="last_name" name="last_name" required="">
                        </div>
                     </div>
                     <!-- <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="university_name">Organization type<span class="required">*</span></label>
                        <div class="col-md-9">
                           <div class="row text-center">
                              <div class="col-sm-4 col-xs-6">
                                 <input type="radio" id="organization" name="organization" value="1">
                                 <label for="organization">Company</label>
                              </div>
                              <div class="col-sm-8 col-xs-6">
                                 <input type="radio" id="organization" name="organization" value="2">
                                 <label for="university">University</label>
                              </div>
                           </div>
                        </div>
                     </div> -->
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="organization_address">Organization address<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="organization_address" name="organization_address" required="">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="linkedin_link">About</label>
                        <div class="col-md-9">
                           <textarea name="biography" id="summernote-basic" class="form-control" ></textarea>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="user_image">Organization logo</label>
                        <div class="col-md-9">
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="user_image" name="user_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                 <label class="custom-file-label" for="user_image">Choose Organization logo</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end col -->
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="email">Email<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="email" id="email" name="email" class="form-control" required="">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="password">Password<span class="required">*</span></label>
                        <div class="col-md-9">
                           <input type="password" id="password" name="password" class="form-control" required="">
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="facebook_link"> Facebook</label>
                        <div class="col-md-9">
                           <input type="text" id="facebook_link" name="facebook_link" class="form-control">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="twitter_link">Twitter</label>
                        <div class="col-md-9">
                           <input type="text" id="twitter_link" name="twitter_link" class="form-control">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="linkedin_link">Linkedin</label>
                        <div class="col-md-9">
                           <input type="text" id="linkedin_link" name="linkedin_link" class="form-control">
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
               <div class="row">
                  <div class="col-12">
                     <div class="text-center">
 
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </div>
               <!-- end row -->
            </form>
         </div>
         <!-- end card-body -->
      </div>
      <!-- end card-->
   </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#biography']);
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
