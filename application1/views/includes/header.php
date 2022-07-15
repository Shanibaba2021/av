<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php //echo //$pageTitle  
          ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <style>
    .error {
      color: red;
      font-weight: normal;
    }
  </style>
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    var baseURL = "<?php echo base_url(); ?>";
  </script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>AV</b>AS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>AAV</b>AS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-history"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image" />
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />


                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="">
            <a href="<?php echo base_url(); ?>dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
            </a>
          </li>
          
          <li>
            <a href="<?php echo base_url(); ?>user">
              <i class="fa fa-user"></i>
              <span>Users</span>
            </a>
          </li>

          <?php if ($this->session->userdata('role') == 2) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Admin</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">

                <li><a href="<?php echo base_url(); ?>addadmin"><i class="fa fa-circle-o"></i>Add Admin</a></li>
                <li><a href="<?php echo base_url(); ?>admin"><i class="fa fa-files-o"></i> List Admin</a></li>

              </ul>
            </li>
          <?php } ?>


          <li>
            <a href="<?php echo base_url(); ?>branches">
              <i class="fa fa-plane"></i>
              <span>Branches</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Inventory</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Product Item
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(); ?>addstock"><i class="fa fa-circle-o"></i>Add Stock</a></li>
                  <li><a href="<?php echo base_url(); ?>listproduct"><i class="fa fa-files-o"></i> List Stock</a></li>
                  <li><a href="<?php echo base_url(); ?>assignstock"><i class="fa fa-users"></i>Product Assign History</a></li>
                </ul>
              </li>
            </ul>
          </li>

          
          <li>
            <a href="<?php echo base_url(); ?>stock">
            <i class="fa fa-code-fork"></i>
              <span>Stock Request</span>
            </a>
          </li>


          <li>
            <a href="<?php echo base_url(); ?>beneficiary">
              <i class="fa fa-users"></i>
              <span>Beneficiary</span>
            </a>
          </li>


          <!-- <li class="nav-item ">
                <a href="list-Beneficiary.php" class="nav-link <?php if ($page == 'list-Beneficiary') {
                                                                  echo 'active';
                                                                } ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide mr-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect></svg>
                  <p>Beneficiary </p>
                </a>
              </li> -->

          <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar"></i> <span>Funcation</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>addfuncation"><i class="fa fa-circle-o"></i>Add Funcation</a></li>
              <li><a href="<?php echo base_url(); ?>admin/funcation"><i class="fa fa-files-o"></i> List Funcation</a></li>
            </ul>
          </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>admin/event/add"><i class="fa fa-circle-o"></i>Add Event</a></li>
            <li><a href="<?php echo base_url(); ?>admin/event"><i class="fa fa-files-o"></i> List Event</a></li>
          </ul>
        </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i> <span>Gallary</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
              <li><a href="<?php echo base_url(); ?>admin/gallery/addgallary"><i class="fa fa-circle-o"></i>Add Gallary</a></li>
              <li><a href="<?php echo base_url(); ?>admin/gallery"><i class="fa fa-files-o"></i> List Gallary</a></li>
          </li>
        </ul>
        </li>

       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Beneficiaries Schemes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url(); ?>admin/schemes/add"><i class="fa fa-circle-o"></i>Add Schemes</a></li>
            <li><a href="<?php echo base_url(); ?>admin/schemes"><i class="fa fa-files-o"></i> List Schemes</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Training</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url(); ?>admin/training/add"><i class="fa fa-circle-o"></i>Add Training</a></li>
            <li><a href="<?php echo base_url(); ?>admin/training"><i class="fa fa-files-o"></i> List Training</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-warning"></i> <span>Notice Board</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url(); ?>admin/notiBoard/add"><i class="fa fa-circle-o"></i>Add NotiBoard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/notiBoard"><i class="fa fa-files-o"></i> List NotiBoard</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url(); ?>admin/banner/add"><i class="fa fa-circle-o"></i>Add Banner</a></li>
            <li><a href="<?php echo base_url(); ?>admin/banner"><i class="fa fa-files-o"></i> List Banner</a></li>

          </ul>
        </li>
        </ul>
      </section>
    </aside>