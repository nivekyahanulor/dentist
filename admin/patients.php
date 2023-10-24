  <?php 
	  include("header.php");
	  include('../controller/admin-patients.php');
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
						
						 <h5 class="card-title"> Patients Data </h5>
							
							<div class="heading-elements">
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#addpatient" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Patient</button>
							</div>
							<br>
						
						</div>
						
						<div class="card-content">
						
							<div class="table-responsive">
								  <table class="table " id="table-1">
								<thead>
								  <tr>
									<th scope="col"> NAME OF PATIENTS </th>
									<th scope="col"> SEX</th>
									<th scope="col"> EMAIL</th>
									<th scope="col"> ADDRESS </th>
									<th scope="col"> ACTION </th>
								  </tr>
								</thead>
								<tbody>
								<?php while($val = $tbl_signup->fetch_object()){ ?>
								  <tr>
									<td><?php echo $val->firstname .' '. $val->lastname;?></td>
									<td><?php echo $val->sex;?></td>
									<td><?php echo $val->email;?></td>
									<td><?php echo $val->address;?></td>
									<td>
									<a href="patients-records.php?data=<?php echo $val->id;?>&name=<?php echo $val->firstname .' '. $val->lastname;?>"><button class="btn btn-primary btn-sm"> <i class="bi bi-exclamation-circle"></i> View  Records</button></a>
									</td>
								  </tr>
								  <div class="modal " id="addappointment<?php echo $val->id;?>" tabindex="-1">
								  <div class="modal-dialog modal-dialog-centered">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title">TRANSACTION DETAILS</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									  <form class="row g-3" method="POST">
										<div class="col-md-12">
										  <label for="inputName5" class="form-label">Services : </label>
										  <select class="form-control" name="services" required>
										  <option value=""> - Select Service -</option>
										  <?php 
										  $tbl_offer = $mysqli->query("SELECT * FROM tbl_offer");
										  while($serv = $tbl_offer->fetch_object()){ ?>
											<option value="<?php echo $serv->id;?>"> <?php echo $serv->service;?></option>
										  <?php } ?>
										  </select>
										</div>
										<div class="col-md-12">
										  <label for="inputName5" class="form-label">Date : </label>
										  <input type="date" class="form-control" name="date" id="date_appointment" min='<?php echo date('Y-m-d', strtotime( date('Y-m-d')));?>' required>
										</div>
										<div class="col-md-12">
										  <label for="inputName5" class="form-label">Time : </label>
										  <select type="time" class="form-control" name="time" id="time-appointments" required>
												<option value=""> - Select Time -</option>
												<option> 8:00 AM</option>
												<option> 9:00 AM</option>
												<option> 10:00 AM</option>
												<option> 11:00 AM</option> 
												<option> 1:00 PM</option>
												<option> 2:00 PM</option>
												<option> 3:00 PM</option>
												<option> 4:00 PM</option>
												<option> 5:00 PM</option>
												<option> 6:00 PM</option>
												<option> 7:00 PM</option>
										  </select>
										</div>
										  <input type="hidden" value="<?php echo $val->id;?>" name="userid">
									
									</div>
										
									<div class="modal-footer">
									  <button type="submit" class="btn btn-primary" id="process" name="submit-schedule" >Process</button>
									  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
	<div class="modal fade" id="addpatient" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">PATIENT DETAILS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST"  enctype="multipart/form-data">
					  
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">First Name : </label>
						    <input type="text" class="form-control" name="fname" required>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Last Name : </label>
						    <input type="text" class="form-control" name="lname" required>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Sex :</label>
						  <select class="form-control" name="gender" required>
							<option value=""> - Select Sex - </option>
							<option>Male</option>
							<option>Female</option>
						  </select>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Birthday  : </label>
						    <input type="date" class="form-control" name="bday" required>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Email: </label>
						  <input type="email" class="form-control" name="email" required>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Address: </label>
						  <textarea type="text" class="form-control" name="address" required></textarea>
						</div><br>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Password: </label>
						  <input type="password" class="form-control" name="password" required>
						</div><br>
					
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-patients" >Add</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
			  

<?php include("footer.php");?>
