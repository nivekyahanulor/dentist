  <?php 
	  include("header.php");
	  include('../controller/user-appointments.php');
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
						
							<h4 class="card-title">My Appointments</h4>
							
							<div class="heading-elements">
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#addappointment" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Appointment</button>
							</div>
							<br>
							
						</div>
						
						<div class="card-content">
						
							<div class="table-responsive">
							<table class="table datatable" id="table-1" >
								<thead>
								  <tr>
									<th scope="col"> SERVICE</th>
									<th scope="col"  class="text-center"> DATE OF APPOINTMENT</th>
									<th scope="col"  class="text-center"> TIME OF APPOINTMENT</th>
									<th scope="col"> STATUS </th>
									<th scope="col"> REASON </th>
								  </tr>
								</thead>
								<tbody>
								<?php while($val = $tbl_appointments->fetch_object()){ ?>
								  <tr>
									<td>
									<?php 
									$services =  str_replace( array('[',']') , ''  ,$val->service_id );
									$res_ser = $mysqli->query("SELECT * FROM tbl_offer where id IN ($services)");
									while($val1 = $res_ser->fetch_object()){ 
										echo "-".$val1->service."<br>";
									}
									?>
									</td>
									<td class="text-center"><?php echo $val->request_date;?></td>
									<td  class="text-center"><?php echo date("g:i A", strtotime($val->request_time));?></td>
									<td>
										<?php   
										
										$from=date_create(date('Y-m-d'));
										$to=date_create($val->request_date);
										$diff=date_diff($to,$from);
										$date1 = new DateTime($val->request_date);
										$diff1  = $date1->diff($from);				
										
										$dd = $diff->days;
																	
										
										
										if($val->approved == 0){ ?>
										<?php if( $dd <= 2) { ?>
												<a href="" data-toggle="modal" data-target="#cancel-no<?php echo $val->id;?>"> PENDING </a> 
										<?php } else { ?>
												<a href="" data-toggle="modal" data-target="#cancel<?php echo $val->id;?>"> PENDING </a> 
										<?php } ?>

												<?php } else if($val->approved == 1){
													echo "<font color='green'>APPROVED</a>";
												} else if($val->approved == 2){
													echo "<font color='green'>DONE</a>";
												} else if($val->approved == 3){
													echo "<font color='red'>DECLINED</font>";
												} else if($val->approved == 4){
													echo "<font color='orange'>CANCELLED</a>";
												}
										?>
									</td>
									 <td>
									 <?php 
									 if($val->approved == 4 || $val->approved == 3){
										 echo $val->cancel_reason; 
									  } ?>
									 </td>
								  </tr>
									<div class="modal fade" id="cancel<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">CANCEL APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										  <form class="row g-3" method="POST">
											<div class="col-md-12">
											  <label for="inputName5" class="form-label">Reason : </label>
											  <textarea class="form-control" name="reason" required></textarea>
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo date('Y-m-d');?>" name="date">
											</div>
										</div>
									
										<div class="modal-footer">
										  <button type="submit" class="btn btn-warning" name="cancel-schedule">Confirm</button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
									
									<div class="modal fade" id="cancel-no<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">CANCEL APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											You are not allowed to cancel appointments.
										</div>
									
										<div class="modal-footer">
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
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
	
			<div class="modal " id="addappointment" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">APPOINTMENT DETAILS</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST">
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Services : </label><br>
						  <select name="services[]" class="form-control">
						  <option value=""> - Select Service - </option>
						  <?php 
						  $tbl_offer = $mysqli->query("SELECT * FROM tbl_offer");
						  while($serv = $tbl_offer->fetch_object()){ ?>
						    <option value="<?php echo $serv->id;?>"><?php echo $serv->service;?></option>
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
						<input type="hidden" value="<?php echo $_SESSION['id'];?>" name="userid">
						
						<div class="col-12">
						<br>
						   <input type="checkbox" required> I Agree to the <a href="terms.php" target="_blank"> Terms and Condition </a>
						   <div class="invalid-feedback">Agree to the Terms and Condition</div>

						</div>
					</div>
						
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="process" name="submit-schedule" >Process</button>
					  <div id="not-available" clas="text-center" style="display:none;"> Sorry , This Date / Time is not available! </div>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
              </div>
			  <!-- line modal -->
			<div class="modal " id="squarespaceModal"  data-backdrop="static" style="z-index:1055">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">TERMS AND CONDITION</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <?php 
						$tbl_about = $mysqli->query("SELECT * from tbl_about where page='Terms and Condition'");
						$info1     = $tbl_about->fetch_assoc();
						echo $info1['content'];
						?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>

<?php include("footer.php");?>
