<div class="main-nav-wrap">
  <div class="mobile-overlay"></div>
<style type="text/css">
  @media only screen and (max-width: 767px) {
    .category.corner-triangle.top-left.pb-0.is-hidden{
      display: none !important;
    }
    .sub-category.is-hidden{
      display: none !important;
    }
  }
</style>

  <ul class="mobile-main-nav">
    <div class="mobile-menu-helper-top"></div>

    <li class="has-children text-nowrap fw-bold">
      <a href="">
        <i class="fas fa-th d-inline text-20px"></i>
        <span class="fw-500"><?php echo site_phrase('Courses'); ?></span>
        <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
      </a>

      <ul class="category corner-triangle top-left is-hidden pb-0" >
        <li class="go-back"><a href=""><i class="fas fa-angle-left"></i><?php echo site_phrase('menu'); ?></a></li>

      <?php
      $categories = $this->crud_model->get_categories()->result_array();
      foreach ($categories as $key => $category):?>
      <li class="has-children">
        <a href="javascript:;" class="py-2" onclick="redirect_to('<?php echo site_url('home/courses?category='.$category['slug']); ?>')">
          <span class="icon"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
          <span><?php echo $category['name']; ?></span>
          <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
        </a>
        <ul class="sub-category is-hidden">
          <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i><?php echo site_phrase('menu'); ?></a></li>
          <li class="go-back"><a href="">
            <i class="fas fa-angle-left"></i>
            <span class="icon"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
            <?php echo $category['name']; ?>
          </a></li>
          <?php
          $sub_categories = $this->crud_model->get_sub_categories($category['id']);
          foreach ($sub_categories as $sub_category): ?>
          <li><a href="<?php echo site_url('home/courses?category='.$sub_category['slug']); ?>"><?php echo $sub_category['name']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </li>
  <?php endforeach; ?>
  <li class="all-category-devided mb-0 p-0">
    <a href="<?php echo site_url('home/courses'); ?>" class="py-3">
      <span class="icon"><i class="fa fa-align-justify"></i></span>
      <span><?php echo site_phrase('all_courses'); ?></span>
    </a>
  </li>

  <?php if(addon_status('course_bundle')): ?>
    <li class="all-category-devided m-0 p-0">
      <a href="<?php echo site_url('course_bundles'); ?>" class="py-3" >
        <span class="icon"><i class="fas fa-cubes"></i></span>
        <span><?php echo site_phrase('course_bundles'); ?></span>
      </a>
  </li>
  <?php endif; ?>
</ul>
</li>
<div class=" mobile-ul">
            <li class="nav-item dropdown" style="">
               <a class="nav-link " href="<?php echo site_url('home/jobs'); ?>" style="font-weight: 500 !important;color: black !important;">
                  Jobs
               </a>

            </li>
			
			
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
            Enterprises
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo site_url('home/become_company'); ?>">Add Enterprise</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('home/companies'); ?>">List Enterprise</a></li>
          </ul>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
            Universities
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo site_url('home/become_company'); ?>">Add Universities</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('home/companies'); ?>">List Universities</a></li>
          </ul>
        </li>
     
			
			<!--<li class="nav-item dropdown" style="">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
					Enterprises
				</a>
				<ul class="dropdown-menu category corner-triangle top-left is-hidden pb-0" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="3" href="<?php echo site_url('home/become_company'); ?>">Add Enterprise</a>
					 </li>
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="2" href="<?php echo site_url('home/companies'); ?>">List Enterprise</a>
					 </li>
				</ul>
			</li>
			
			<li class="nav-item dropdown" style="">
				<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 500 !important;color: black !important;">
					Universities
				</a>
				<ul class="dropdown-menu category corner-triangle top-left is-hidden pb-0" aria-labelledby="navbarDropdownMenuLink" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);">
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="5" href="<?php echo site_url('home/become_university'); ?>">Add University</a>
					 </li>
					<li class="dropdown-submenu">
						<a class="dropdown-item  categories_name" data-id="6" href="<?php echo site_url('home/universities'); ?>">List University</a>
					 </li>
				</ul>
			</li>  -->

            <!---<li class="nav-item dropdown" style="">
               <a class="nav-link  " href="<?php echo site_url('home/companies'); ?>" style="font-weight: 500 !important;color: black !important;">
                  Enterprises
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
         </div>
<div class="mobile-menu-helper-bottom"></div>
</ul>
           
</div>
