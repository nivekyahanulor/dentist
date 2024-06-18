
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
  
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icheck.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css//colors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="assets/css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login-register.min.css">
    <!-- END: Page CSS-->
	<?php
		include('controller/database.php');
		
		$email = $_GET['email'];

		$mysqli->query("UPDATE tbl_signup set is_confirm = 1 where email='$email'");
		
	?>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column   blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
			  <div class="col-12 d-flex align-items-center justify-content-center">
				<div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
				  <div class="card border-grey border-lighten-3 m-0">
					<div class="card-header border-0">
					 
					  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Email Verified</span>
					  </h6>
					</div>
					<div class="card-content">
						
						   <div class="card-body">
						   <center>
							Your Account is confirmed!
							<br>
							<br>
							Login using your account details!
							<br>
							<br>
							
							Thank You!
							
							<br>
							<br>
							<a href="index" class="btn btn-md btn-info"> LOGIN </a>
							<br>
							</center>
						  </div>
						 
					  </div>
					</div>
				
				  </div>
				</div>
			  </div>
			</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/js/icheck.min.js"></script>
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.min.js"></script>
    <script src="assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/form-login-register.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>