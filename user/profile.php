  <?php 
	  include("header.php");
	  include('../controller/user-profile.php');
  ?>
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

   <?php include("nav.php");?>


    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
      <div class="row">
       
		<div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">MY PROFILE</h5>
			  <?php 
						 if(isset($_GET['updated'])){
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <i class="bi bi-check-circle me-1"></i> PROFILE DATA UPDATED ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
						} 
					?>
				<form class="row g-3" method="POST">
				<br>
					<?php
						
					?>
					<div class="col-12">
                      <label class="form-label">First Name</label>
                      <input type="text" name="fname" class="form-control" value="<?php echo $val['firstname'];?>" required>
                    </div>
					<div class="col-12">
                      <label for="yourName" class="form-label">Last Name</label>
                      <input type="text" name="lname" class="form-control" value="<?php echo $val['lastname'];?>" required>
                    </div>
					<div class="col-12">
                      <label for="yourName" class="form-label">Sex</label>
                      <input type="text" name="sex" class="form-control" value="<?php echo $val['sex'];?>" required>
                    </div>
					<div class="col-12">
                      <label for="yourName" class="form-label">Birthday</label>
                      <input type="date" name="birthday" class="form-control" value="<?php echo $val['birthday'];?>" required>
                    </div>
					<div class="col-12">
                      <label for="yourName" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" value="<?php echo $val['address'];?>" required>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $val['email'];?>" required>
					<br>
					<button type="submit" class="btn btn-primary btn-md" name="update-profile">UPDATE</button>

                    </div>

                
				</form>
            </div>
          </div>


        </div>		
		<div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CHANGE PASSWORD</h5>
			  <?php 
						 if(isset($_GET['password-updated'])){
							echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <i class="bi bi-check-circle me-1"></i> PASSWORD UPDATED ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
						} 
					?>
				<form class="row g-3" method="POST">
				<br>
					
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Current Password</label>
					 <div class="input-group mb-3 " >
                      <input type="password" id="cpassword" name="password" class="form-control" value="" required>
                      <input type="hidden" id="ppassword" class="form-control" value="<?php echo $val['password'];?>" required>
					  <span class="input-group-text" onclick="password_show_hide();">
							  <i class="la la-eye" id="show_eye"></i>
							  <i class="la la-eye-slash d-none" id="hide_eye"></i>
							</span>
                    </div>
                    </div>
					
					<div class="col-12"  id="newpass">
					<label for="yourPassword" class="form-label">New Password</label>
					 <div class="input-group mb-3 " >
                      <input type="password" name="password" id="npassword" class="form-control" required>
					   <span class="input-group-text" onclick="password_show_hide1();">
							  <i class="la la-eye" id="show_eye"></i>
							  <i class="la la-eye-slash d-none" id="hide_eye"></i>
							</span>
                    </div>
                    </div>
					<div class="col-12">
						<div id="passres"></div>
                    </div>
					<button type="submit" class="btn btn-primary" name="update-password"  id="update-profile">UPDATE</button>
				</form>
            </div>
          </div>


        </div>
      </div>

        </div>
      </div>
    </div>
	

<?php include("footer.php");?>
