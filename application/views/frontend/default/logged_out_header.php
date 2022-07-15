<section class="menu-area bg-white">
   <div class="container-fulid-xl">
      <nav class="navbar navbar-expand-lg bg-white ">
         <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>

         <?php include 'menu.php'; ?>
         <ul class="navbar-nav" id="navbar-nav">
            <!-- <li class="nav-item dropdown" style="">
                              <a class="nav-link dropdown-toggle" href="/business-listing/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
                              Courses
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="52" href="course-list.html"> Consulting &amp; Soft Skills Training</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>

                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="47" href="course-list.html">Business Administrations</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="16" href="course-list.html">Business Management</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="18" href="course-list.html">Business Marketing</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="51" href="course-list.html">Computer Masters</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="33" href="course-list.html">Corporate Training</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="37" href="course-list.html">Designing</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="4" href="course-list.html">Foreign Languages</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="42" href="course-list.html">Higher Academics</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle categories_name" data-id="2" href="course-list.html">IT &amp; Software Development</a>
                                    <ul class="dropdown-menu sub_categoies_tag" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);display:none;"></ul>
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
            </li> -->
            <li class="nav-item dropdown" style="">
               <a class="nav-link " href="<?php echo site_url('home/jobs'); ?>" style="font-weight: 500 !important;color: black !important;">
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


            <!---<li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/companies'); ?>" style="font-weight: 500 !important;color: black !important;">
                  Enterprises
               </a>
            </li> --->

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
            </li> -->


            </li>

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
         </ul>
         <ul class="mobile-header-buttons">
            <li><a class="mobile-nav-trigger" href="#">Menu<span></span></a></li>
            <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
         </ul>



         <!-- <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get">
        <div class="input-group search-box mobile-search">
          <input type="text" name = 'query' class="form-control" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
          <div class="input-group-append">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form> -->

         <?php if ($this->session->userdata('admin_login')) : ?>
            <div class="instructor-box menu-icon-box ms-auto">
               <div class="icon">
                  <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('administrator'); ?></a>
               </div>
            </div>
         <?php endif; ?>

         <div class="cart-box menu-icon-box ms-auto" id="cart_items">
            <?php include 'cart_items.php'; ?>
         </div>

         <span class="signin-box-move-desktop-helper"></span>
         <div class="sign-in-box btn-group">

               <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php echo site_phrase('log_in'); ?></a>
			   <ul class="navbar-nav" id="navbar-nav">
			   <li class="nav-item dropdown ms-3" style="">
					<a href="<?php echo site_url('home/sign_up'); ?>" class="btn btn-sign-up ml-2" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="  border-radius: 10px; padding:8.5px 16px; "><?php echo site_phrase('sign_up'); ?></a>
					<ul class="dropdown-menu sub-menu category top-right" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
						<li class="dropdown-submenu menu-item">
							<a class="dropdown-item   categories_name" data-id="2" href="#">Educator</a>
						 </li>
						<li class="dropdown-submenu menu-item">
							<a class="dropdown-item  categories_name" data-id="2" href="#">Enterprise</a>
						 </li>
						 <li class="dropdown-submenu menu-item">
							<a class="dropdown-item  categories_name" data-id="2" href="#">Student</a>
						 </li>
					</ul>
				</li>
				</ul>

               

         </div> <!--  sign-in-box end -->
      </nav>
   </div>
</section>
