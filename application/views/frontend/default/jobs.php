<section class="py-5 bg-light job-listing-page">
    <div class="container">
        <p class="mb-0">Malaysia</p>
        <h4>Browsing Jobs In Malaysia</h4>

        <!-- Content here -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 buttons-panel mb-4">
            <div class="col-md-9 d-flex flex-wrap justify-content-center justify-content-lg-start">
                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Jobs
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Location
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        $Salary
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Qualification
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Job type
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Job Level
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-3 text-lg-end text-center">
                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Recommended <i class="fas fa-exchange-alt fa-rotate-90"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>

       

        <div class="row row-cols-1 row-cols-sm-2 g-4 row-cols-md-4">
            <!-- Col-start -->
            <?php foreach ($data as $key => $user) { ?>
            <div class="col">
                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="<?php echo site_url('home/jobs_details/'. $user->job_id); ?>" class="job-title"><?php echo $user->job_title ?></a> <a href="<?php echo site_url('home/jobs_details/'. $user->job_id); ?>"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="<?php echo site_url('home/jobs_details/'. $user->job_id); ?>" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="<?php echo site_url('home/jobs_details/'. $user->job_id); ?>" class="job-location">
                                <span >
                                    <?php echo $user->company_name; ?>
                                </span>
                            </a>
                        </span>
                        <a href="" class="job-category"><?php echo $user->job_title ?></a>
                        <a href="" class="job-description"><?php echo $user->short_description; ?></a>
                        <a href="tel:" class="job-tel">Qualification : <?php echo $user->education; ?></a>
                        <span class="d-flex justify-content-between">
                            <a href="<?php echo site_url('home/jobs_details/'. $user->job_id); ?>" class="btn btn-warning btn-sm">Featured</a>
                            Negotiable
                        </span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Col-END -->
           








            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="job-details.html" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->
            <!-- Col-start -->
            <!-- <div class="col">

                <div class="card h-100 job-listing-box shadow-sm border-light">
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <a href="job-details.html" class="job-title">Job Title</a> <a href="job-details.html"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="job-details.html" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="job-details.html" class="job-location">
                                <span>
                                    AppAsia Berhad
                                </span>
                                <span class="location">
                                    Kuala Lumpur, Kuala Lumpur
                                </span>

                            </a>
                        </span>
                        <a href="" class="job-category">IT Software</a>
                        <a href="" class="job-description">Excellent programming and debugging skills in PHP with minimum 4 years of related experience....</a>
                        <a href="tel:" class="job-tel">Tel: +603 6070 6060</a>
                        <span class="d-flex justify-content-between">

                            <a href="job-details.html" class="btn btn-warning btn-sm">Featured</a> <a href="#" class="job-salary">Negotiable</a>
                        </span>
                    </div>
                </div>
            </div> -->
            <!-- Col-END -->







        </div>

        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> -->
    </div>

</section>