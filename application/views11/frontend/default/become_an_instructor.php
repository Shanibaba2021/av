<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form class="required-form sign-up-form" action="<?php echo base_url('home/instructors'); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-12">
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
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="linkedin_link">About</label>
                                <div class="col-md-9">
                                    <textarea name="biography" id="summernote-basic" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="user_image" name="user_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                            <label class="custom-file-label" for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
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
                                <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                <h3 class="mt-0">Thank you !</h3>
                                <p class="w-75 mb-2 mx-auto">You are just one click away</p>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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


<style media="screen">
    body {
        overflow-x: hidden;
    }
</style>