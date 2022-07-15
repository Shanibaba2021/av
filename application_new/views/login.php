  <!----- HEADER ----------------->
  <?php $this->load->view('inc/header'); ?>
  <!----- HEADER ----------------->
  </head>

  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?php echo base_url() ?>assets2/images/login/2.jpg" alt="looginpage"></div>
          <div class="col-xl-5 p-0">
            <div class="login-card">

              <form class="theme-form login-form" action="<?php echo base_url(); ?>loginMe" method="post">
                <h4>Login</h4>
                <h6>Welcome back! Log in to your account.</h6>
                <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder="Email" name="email" required />
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="password" required />
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
                  </div><!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer script start-->
    <?php $this->load->view('inc/footerscript'); ?>
    <!-- footer script end-->


  </body>

  </html>