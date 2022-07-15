        <header class="main-nav">
          <nav>
            <div class="main-navbar">
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="<?php echo base_url(); ?>dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Field Worker</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>addNew">Add field worker</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>user">List field worker</a>
                      </li>
                    </ul>
                  </li>

                  <?php if ($this->session->userdata('role') == 2) { ?>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Admin</span></a>
                      <ul class="nav-submenu menu-content">
                        <li>
                          <a class="submenu-title" href="<?php echo base_url(); ?>addadmin">Add Admin</a>
                        </li>
                        <li>
                          <a class="submenu-title" href="<?php echo base_url(); ?>admin">List Admin</a>
                        </li>
                      </ul>
                    </li>
                  <?php } ?>







                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="command"></i><span>Branches</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>addNewBranch">Add Branch</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>branches">List Branch</a>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="package"></i><span>Inventory</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>addstock">New Stock</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>listproduct">List Stock</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>branchstock">Branch Stock</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>assignstock">History</a>
                      </li>
                    </ul>
                  </li>
                  <!---<li class="dropdown"><a class="nav-link menu-title" href="<?php echo base_url(); ?>stock"><i data-feather="users"></i><span>Stock Request</span></a></li>--->

                  <li class="dropdown"><a class="nav-link menu-title" href="<?php echo base_url(); ?>beneficiary"><i data-feather="users"></i><span>Beneficiary</span></a></li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="grid"></i><span>Gallery</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/gallery/addgallary">New Gallery</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/gallery">List Gallery</a>
                      </li>
                    </ul>
                  </li>
                  <!----
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="feather"></i><span>Funcation</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>addfuncation">New Event</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/funcation">List Event</a>
                      </li>
                    </ul>
                  </li>
---->
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="feather"></i><span>Event</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/event/add">New Event</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/event">List Event</a>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>Beneficiaries Schemes</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/schemes/add">New Schemes</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/schemes">List Schemes</a>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="film"></i><span>Training Video</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/training/add">New Video</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/training">List Video</a>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit"></i><span>Notice Board</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/notiboard/add">New Notice</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/notiboard">List Notice</a>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit"></i><span>Banner</span></a>
                    <ul class="nav-submenu menu-content">
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/banner/add">New Banner</a>
                      </li>
                      <li>
                        <a class="submenu-title" href="<?php echo base_url(); ?>admin/banner">List Banner</a>
                      </li>
                    </ul>
                  </li>


                </ul>
              </div>
            </div>
          </nav>
        </header>