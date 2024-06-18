  <?php 
	  include("header.php");
	  include('../controller/admin-users.php');
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
				<div class="col-12">
					<div class="card">
					
						<div class="card-header">
						
						 <h5 class="card-title"> Administrator Data </h5>
							
							<div class="heading-elements">
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#adduser" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Administrator</button>
							</div>
							<br>
						
						</div>
						
						<div class="card-content">
						
							<div class="table-responsive">
								 <table class="table datatable" id="table-1">
									<thead>
									  <tr>
										<th scope="col" class="text-center"> NAME  </th>
										<th scope="col" class="text-center"> EMAIL</th>
										<th scope="col" class="text-center"> ADDRESS</th>
										<th scope="col" class="text-center"> ACTION </th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tbl_signup->fetch_object()){ ?>
									  <tr>
										<td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
										<td class="text-center"><?php echo $val->email;?></td>
										<td class="text-center"><?php echo $val->address;?></td>
										<td class="text-center">
											<a href="edit-user.php?data=<?php echo $val->id;?>"><button class="btn btn-info btn-sm edit-user"><i class="la la-pencil"></i>  </button></a>
											<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#delete<?php echo $val->id;?>"><i class="la la-trash"></i>  </button> 
										</td>
									  </tr>
										<div class="modal fade" id="edit<?php echo $val->id ;?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title">UPDATE USER </h5>
											  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											  <form class="row g-3" method="POST">
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">First Name : </label>
											  <input type="text" class="form-control" name="fname"  value="<?php echo $val->firstname;?>" required>
											  <input type="hidden" class="form-control" name="id"  value="<?php echo $val->id;?>" required>
											</div><br>
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">Last Name : </label>
											  <input type="text" class="form-control" name="lname" value="<?php echo $val->lastname;?>" required>
											</div><br>
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">Email : </label>
											  <input type="text" class="form-control" name="email" value="<?php echo $val->email;?>" required>
											</div><br>
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">Address : </label>
											  <input type="text" class="form-control" name="address" value="<?php echo $val->address;?>" required>
											</div><br>
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">User Type : </label>
											  <select type="text" class="form-control" name="email" value="<?php echo $val->email;?>" required>
												<option value=1> Administrator </option>
												<option value=2> Staff </option>
											  </select>
											</div><br>
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">Current Password : </label>
											 <div class="input-group mb-3 " >
											  <input type="password" class="form-control" name="cpassword" id="cpassword<?php echo $val->id ;?>" required>
											  <input type="password" class="form-control" name="ppassword" id="ppassword<?php echo $val->id ;?>" value="<?php echo $val->password;?>" style="display:none;" required>
											 <span class="input-group-text" onclick="password_show_hide();">
												  <i class="bi bi-eye" id="show_eye<?php echo $val->id ;?>"></i>
												  <i class="bi bi-eye-slash d-none" id="hide_eye<?php echo $val->id ;?>"></i>
												</span>
											</div>
											</div>
											<br>
											<div class="col-md-12" style="display:none;">
											  <label for="inputName5" class="form-label">Password : </label>
											  <input type="password" class="form-control" name="password" value="<?php echo $val->password;?>" required>
											</div>

											<div class="col-12">
												<div id="passres<?php echo $val->id;?>"></div>
											</div>
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success" name="update-user" id="update-user<?php echo $val->id;?>" style="display:none;">Update</button>
											  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
											</form>
										  </div>
										</div>
										</div>
										</div>
										<div class="modal fade done" id="delete<?php echo $val->id ;?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title">Remove User</h5>
											  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											  <form class="row g-3" method="POST">
												<br>
												<div class="col-md-12">
												ARE YOU SURE TO REMOVE USER ?
												<input type="hidden" class="form-control" name="id"  value="<?php echo $val->id;?>" required>
												
												</div>
											
											</div>
											
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success done-schedule" name="remove-user" >Remove</button>
											  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
											</form>
										  </div>
										</div>
										</div>
										
									<?php } ?>
									</tbody>
								  </table>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- Active Orders -->

        </div>
      </div>
    </div>
		<div class="modal fade" id="adduser" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">USER DETAILS</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST">
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">First Name : </label>
						  <input type="text" class="form-control" name="fname" required>
						</div><br>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Last Name : </label>
						  <input type="text" class="form-control" name="lname" required>
						</div><br>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Email : </label>
						  <input type="text" class="form-control" name="email" required>
						</div><br>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Address : </label>
						  <input type="text" class="form-control" name="address" required>
						</div>
					<div class="col-md-12">
											  <label for="inputName5" class="form-label">User Type : </label>
											  <select class="form-control" name="usertype"  required>
												<option value=""> -Select- </option>
												<option value="admin"> Administrator </option>
												<option value="staff"> Staff </option>
											  </select>
											</div><br>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Password : </label>
						  <input type="password" class="form-control" name="password" required>
						</div><br>
						
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="process" name="add-user" >Add</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
<?php include("footer.php");?>
