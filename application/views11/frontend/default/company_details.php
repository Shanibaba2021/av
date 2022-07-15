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
                        <h4 class="company-name"><?php echo $company_details[0]->university_name ?></h4>
                        <?php echo $company_details[0]->email ?>

                        <p><?php echo $company_details[0]->address ?></p>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-3 border-bottom pb-3">
                    </ol>
                </nav>
                <p><?php echo $company_details[0]->biography ?></p>
                <!-- Content here -->
                <h4 class="h5 mt-4 font-weight-bold">Jobs</h4>
                <div class="row row-cols-1 row-cols-sm-2 g-4 row-cols-md-2">
                    <!-- Col-start -->
                    <?php if ($get_jobs_for_company == null || $get_jobs_for_company == '') {
                        echo '<tr>
                            <td colspan="100">
                                <h3 align="center" class="text-danger">No Job found!</center< /td>
                        </tr>';
                    } else { ?>
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
                    <?php } ?>
                </div>
            </div>
            <!-- Left Content End -->
            <div class="col-md-4">
                <div class="card border-end-0 border-top-0 border-bottom-0 bg-transparent">
                    <div class="card-body">

                        <button class="btn btn-primary">Enquire Now</button>
                        <a href="tel:" class="btn btn-outline-primary">Call</a>
                        <hr>
                        <h4>Contact / Location</h4>
                        <div class="card bg-transparent mb-3">
                            <div class="card-body">
                                <p>Email: <?php echo $company_details[0]->email ?></p>
                                <p><?php echo $company_details[0]->address ?>
                                </p>
                            </div>
                        </div>



                        <?php $social_links = json_decode($company_details[0]->social_links);
                        ?>
                        <?php if (count($social_links) > 0) { ?>
                            <p> <strong>Share</strong> </p>
                        <?php } ?>
                        <ul class="list-inline social-media">
                            <?php if ($social_links->facebook != "" &&  $social_links->facebook != null) { ?>
                                <li class="list-inline-item"><a href="<?php echo $social_links->facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <?php } ?>
                            <?php if ($social_links->twitter != "" &&  $social_links->twitter != null) { ?>
                                <li class="list-inline-item"><a href="<?php echo $social_links->twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ($social_links->linkedin != "" &&  $social_links->linkedin != null) { ?>
                                <li class="list-inline-item"><a href="<?php echo $social_links->linkedin ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>