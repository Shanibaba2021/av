<section class="py-5 bg-light job-listing-page">
    <div class="container">
        <div class="row">
            <!-- Left Content Start -->
            <div class="col-md-8 job-listing-box">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <h4 class="company-name"><?php echo $jobs_details[0]->company_name ?></h4>
                        <?php echo $jobs_details[0]->email ?>
                        
                        <p><?php echo $jobs_details[0]->address ?></p>
                        
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-3 border-bottom pb-3">
                        <?php if ($jobs_details[0]->job_type == 1) { ?>
                            <li class="breadcrumb-item text-dark" aria-current="page">Information Technology</li>
                        <?php  } ?>
                        <?php if ($jobs_details[0]->job_type == 2) { ?>
                            <li class="breadcrumb-item text-dark" aria-current="page">Mechanical</li>
                        <?php  } ?>
                        <?php if ($jobs_details[0]->job_type == 3) { ?>
                            <li class="breadcrumb-item text-dark" aria-current="page">Hardware</li>
                        <?php  } ?>
                    </ol>
                </nav>
                <p><?php echo $jobs_details[0]->description ?></p>
                <!-- Content here -->
                <h4 class="h5 mt-4 font-weight-bold">Jobs</h4>
                <div class="row row-cols-1 row-cols-sm-2 g-4 row-cols-md-2">
                    <!-- Col-start -->
                    <?php foreach ($get_jobs_for_company as $key => $user) { ?>
                        <div class="col-md-5">
                            <div class="col">
                                <div class="card h-100 job-listing-box shadow-sm border-light">
                                    <div class="card-body">
                                        <span class="d-flex justify-content-between">
                                            <a href="<?php echo site_url('home/jobs_details/' . $user->job_id); ?>" class="job-title"><?php echo $user->job_title ?></a> <a href="<?php echo site_url('home/jobs_details/' . $user->job_id); ?>"><i class="far fa-heart"></i></a>
                                        </span>
                                        <span class="d-flex">

                                            <a href="<?php echo site_url('home/jobs_details/' . $user->job_id); ?>" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                                            <a href="<?php echo site_url('home/jobs_details/' . $user->job_id); ?>" class="job-location">
                                                <span>
                                                    <?php echo $user->company_name; ?>
                                                </span>
                                            </a>
                                        </span>
                                        <a href="" class="job-category"><?php echo $user->job_title ?></a>
                                        <a href="" class="job-description"><?php echo $user->short_description; ?></a>
                                        <a href="tel:" class="job-tel">Qualification : <?php echo $user->education; ?></a>
                                        <span class="d-flex justify-content-between">
                                            <a href="<?php echo site_url('home/jobs_details/' . $user->job_id); ?>" class="btn btn-warning btn-sm">Featured</a>
                                            Negotiable
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php } ?>
                    
                    
                </div>
            </div>
            <!-- Left Content End -->
            <div class="col-md-4">
                <div class="card border-end-0 border-top-0 border-bottom-0 bg-transparent">
                    <div class="card-body">
                        <p class="mb-0">Salary</p>
                        <?php if ($jobs_details[0]->salary_range == 1) { ?>
                            <p class="salary-text">10k - 20k</p>
                        <?php  } ?>
                        <?php if ($jobs_details[0]->salary_range == 2) { ?>
                            <p class="salary-text">30k - 50k</p>
                        <?php  } ?>
                        <?php if ($jobs_details[0]->salary_range == 3) { ?>
                            <p class="salary-text">50k - 100k</p>
                        <?php  } ?>
                        <button class="btn btn-primary">Enquire Now</button>
                        <a href="tel:" class="btn btn-outline-primary">Call</a>
                        <hr>
                        <h4>Contact / Location</h4>
                        <div class="card bg-transparent mb-3">
                            <div class="card-body">
                                <p>Email:  <?php echo $jobs_details[0]->email ?></p>
                                <p><?php echo $jobs_details[0]->address ?></p>
                            </div>
                        </div>
                        
                        
                        
                        <?php $social_links = json_decode($jobs_details[0]->social_links);
                        ?>
                        <?php if(count($social_links) > 0) {?>
                        <p> <strong>Share</strong> </p>
                        <?php } ?>
                        <ul class="list-inline social-media">
                            <?php if($social_links->facebook != "" &&  $social_links->facebook != null) {?>
                            <li class="list-inline-item"><a href="<?php echo $social_links->facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <?php } ?>
                            <?php if($social_links->twitter != "" &&  $social_links->twitter != null) {?>
                            <li class="list-inline-item"><a href="<?php echo $social_links->twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if($social_links->linkedin != "" &&  $social_links->linkedin != null) {?>
                            <li class="list-inline-item"><a href="<?php echo $social_links->linkedin ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <?php } ?>
                        </ul>

                        <!-- <ul class="list-inline">
                            <li class="list-inline-item"><a href=""><i class="fa fa-eye"></i> 1459 Views</a></li>
                            <li class="list-inline-item"><a href=""><i class="fas fa-exclamation-circle"></i> Report</a></li>
                        </ul> -->

                        <!-- <h4>Reviews</h4>
                        <div class="card bg-transparent mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span class="d-flex">
                                        <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                                        <a href="job-details.html" class="job-location">
                                            <span>
                                                Lou Journey
                                            </span>
                                            <span class="location">
                                                7 Month Ago
                                            </span>
                                        </a>
                                    </span>


                                    <span class="small d-flex align-items-center">

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i> 5/5


                                    </span>
                                </div>
                                <p class="text-muted small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span class="d-flex">
                                        <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                                        <a href="job-details.html" class="job-location">
                                            <span>
                                                Lou Journey
                                            </span>
                                            <span class="location">
                                                7 Month Ago
                                            </span>
                                        </a>
                                    </span>


                                    <span class="small d-flex align-items-center">

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i> 5/5


                                    </span>
                                </div>
                                <p class="text-muted small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span class="d-flex">
                                        <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                                        <a href="job-details.html" class="job-location">
                                            <span>
                                                Lou Journey
                                            </span>
                                            <span class="location">
                                                7 Month Ago
                                            </span>
                                        </a>
                                    </span>


                                    <span class="small d-flex align-items-center">

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i> 5/5


                                    </span>
                                </div>
                                <p class="text-muted small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
                                <hr>
                                <textarea placeholder="your review" class="form-control" rows="4"></textarea>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="small">
                                        <a href=""><i class="far fa-star text-muted small"></i></a>
                                        <a href=""><i class="far fa-star text-muted small"></i></a>
                                        <a href=""><i class="far fa-star text-muted small"></i></a>
                                        <a href=""><i class="far fa-star text-muted small"></i></a>
                                        <a href=""><i class="far fa-star text-muted small"></i></a>
                                    </div>
                                    <div>
                                        <input type="file" id="file">
                                        <label for="file" class="btn-2"><i class="far fa-image text-muted small"></i></label>
                                        <button class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>