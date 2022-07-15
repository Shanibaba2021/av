<?php

$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>


<section class="header-bar" style="margin:0px 40px">
   <div class="container-fulid-xl">
      <nav class="navbar navbar-expand-lg navbar-light">
         <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
            <img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="35">
         </a>

         <?php include 'menu.php'; ?>

         <ul class="navbar-nav" id="navbar-nav">
            <!-- <li class="nav-item dropdown" style="">
                              <a class="nav-link dropdown-toggle" href="/business-listing/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
                              Courses
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="52" href="course-list.html"> Consulting &amp; Soft Skills Training</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>

                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="47" href="course-list.html">Business Administrations</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="16" href="course-list.html">Business Management</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="18" href="course-list.html">Business Marketing</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="51" href="course-list.html">Computer Masters</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="33" href="course-list.html">Corporate Training</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="37" href="course-list.html">Designing</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="4" href="course-list.html">Foreign Languages</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="42" href="course-list.html">Higher Academics</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="2" href="course-list.html">IT &amp; Software Development</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;">
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="49" href="course-list.html">Marketing</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="11" href="course-list.html">Medical</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="39" href="course-list.html">Office Tools</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="17" href="course-list.html">Personality Development</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="38" href="course-list.html">Reading &amp; Speaking</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="1" href="course-list.html">Spoken English</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="32" href="course-list.html">Teachers Training</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="24" href="course-list.html">Technical Education</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="48" href="course-list.html">Training Program</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                              </ul>
                           </li> -->
            <li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/jobs'); ?>" style="font-weight: 500 !important;color: black !important;">
                  Jobs
               </a>

            </li>

			<li class="nav-item dropdown" style="">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
					Enterprises
				</a>
				<ul class="dropdown-menu category corner-triangle top-left is-hidden pb-0" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="2" href="<?php echo site_url('home/become_company'); ?>">Sign Up</a>
					 </li>
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="2" href="<?php echo site_url('home/companies'); ?>">View List</a>
					 </li>
				</ul>
			</li>

			<li class="nav-item dropdown" style="">
				<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
					Educatores
				</a>
				<ul class="dropdown-menu category corner-triangle top-left is-hidden pb-0" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="2" href="<?php echo site_url('home/become_university'); ?>">Sign Up</a>
					 </li>
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="2" href="<?php echo site_url('home/universities'); ?>">View List</a>
					 </li>
				</ul>
			</li>




           <!-- <li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/companies'); ?>" style="font-weight: 500 !important;color: black !important;">
               Enterprise
               </a>
            </li>

            <li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/universities'); ?>" style="font-weight: 500 !important;color: black !important;">
                  Universities
               </a>
            </li>

            <li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/become_university'); ?>" style="font-weight: 500 !important;color: black !important;">
                  List University
               </a>
            </li>


            <li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/become_company'); ?>" style="font-weight: 500 !important;color: black !important;">
                  List Enterprise
               </a>
            </li>   -->




            <li class="nav-item" style="">
               <a class="nav-link" href="#" style="font-weight: 500 !important;color: black !important;">
                  Affliate
               </a>
            </li>
            <li class="nav-item" style="">
               <a class="nav-link" href="/elearning/home/about_us" style="font-weight: 500 !important;color: black !important;">
                  Who we are
               </a>
            </li>
            <li class="nav-item" style="">
               <a class="nav-link" href="#" style="font-weight: 500 !important;color: black !important;">
                  Contact
               </a>
            </li>
            <!-- <li class="nav-item" style="position: absolute;right: 0;padding-right: 1rem;">
                              <a class="nav-link btn-primary" href="get-started.html">Get Started</a>
                           </li> -->
         </ul>
		 <ul class="mobile-header-buttons login-bar">
            <li><a class="mobile-nav-trigger" href="#">Menu<span></span></a></li>
            <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
         </ul>






         <!-- <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get" style="width: 100%;">
                <div class="input-group search-box mobile-search">
                    <input type="text" name='query' class="form-control" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
                    <div class="input-group-append">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form> -->

         <?php if ($this->session->userdata('is_instructor') == 1) : ?>
            <div class="instructor-box menu-icon-box ms-auto">
               <div class="icon">
                  <a href="<?php echo site_url('user'); ?>" style="border: 1px solid transparent; margin: 0px;     padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;"><?php echo site_phrase('my_account'); ?></a>
               </div>
            </div>
         <?php endif; ?>

         <!-- <div class="instructor-box menu-icon-box">
            <div class="icon">
               <a href="<?php echo site_url('home/my_courses'); ?>" style="border: 1px solid transparent; margin: 0px;     padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;"><?php echo site_phrase('my_courses'); ?></a>
            </div>
         </div> -->

         <div class="wishlist-box menu-icon-box" id="wishlist_items">
            <?php include 'wishlist_items.php'; ?>
         </div>

         <div class="cart-box menu-icon-box" id="cart_items">
            <?php include 'cart_items.php'; ?>
         </div>

         <?php //include 'notifications.php';
         ?>


         <div class="user-box menu-icon-box">
            <div class="icon">
               <a href="javascript::">
                  <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
               </a>
            </div>
            <div class="dropdown user-dropdown corner-triangle top-right">
               <ul class="user-dropdown-menu">
              <?php if ($this->session->userdata('is_instructor') == 1) { ?>

  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('user'); ?>">My Account</a></li>
              <?php }  else { ?>
                  <li class="dropdown-user-info">
                     <a href="">
                        <div class="clearfix">
                           <div class="user-image float-start">
                              <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="">
                           </div>
                           <div class="user-details">
                              <div class="user-name">
                                 <span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                 <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>
                              </div>
                              <div class="user-email">
                                 <span class="email"><?php echo $user_details['email']; ?></span>
                                 <span class="welcome"><?php echo site_phrase("welcome_back"); ?></span>
                              </div>
                           </div>
                        </div>
                     </a>
                  </li>
                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>"><i class="far fa-gem"></i><?php echo site_phrase('my_courses'); ?></a></li>
                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="far fa-heart"></i><?php echo site_phrase('my_wishlist'); ?></a></li>
                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>"><i class="far fa-envelope"></i><?php echo site_phrase('my_messages'); ?></a></li>
                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i><?php echo site_phrase('purchase_history'); ?></a></li>
                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i><?php echo site_phrase('user_profile'); ?></a></li>
                <?php } ?>
                  <li class="dropdown-user-logout user-dropdown-menu-item"><a href="<?php echo site_url('login/logout'); ?>"><?php echo site_phrase('log_out'); ?></a></li>
               </ul>
            </div>
         </div>



         <span class="signin-box-move-desktop-helper"></span>


         <div class="sign-in-box btn-group d-none">



         </div> <!--  sign-in-box end -->




      </nav>
   </div>
</section>
