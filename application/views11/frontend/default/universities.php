<section class="py-5 bg-light job-listing-page">
    <div class="container">
        <p class="mb-0">Malaysia</p>
        <h4>Browsing Universities In Malaysia</h4>

        <!-- Content here -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 buttons-panel mb-4">
            <div class="col-md-9 d-flex flex-wrap justify-content-center justify-content-lg-start">
                <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    University
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
                <!-- <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        $Salary
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div> -->
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

                <!-- <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Job type
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div> -->

                <!-- <div class="dropdown">
                    <button class="btn btn-light mx-1 shadow-sm bg-light dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Job Level
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div> -->

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
                            <a href="<?php echo site_url('home/instructor_page/'. $user->id); ?>" class="job-title"><?php echo $user->university_name ?></a> <a href="<?php echo site_url('home/instructor_page/'. $user->id); ?>"><i class="far fa-heart"></i></a>
                        </span>
                        <span class="d-flex">

                            <a href="<?php echo site_url('home/instructor_page/'. $user->id); ?>" class="job-image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" class="w-100"></a>
                            <a href="<?php echo site_url('home/instructor_page/'. $user->id); ?>" class="job-location">
                                <span>
                                    
                                </span>
                            </a>
                        </span>
                        <a href="" class="job-category"><?php echo $user->email ?></a>
                        <a href="" class="job-description"><?php echo $user->address; ?></a>
                        <span class="d-flex justify-content-between">
                            <a href="<?php echo site_url('home/instructor_page/'. $user->id); ?>" class="btn btn-warning btn-sm">Featured</a>
                        </span>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>

      
    </div>

</section>