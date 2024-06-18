  <?php 
	  include("header.php");
	  include('../controller/admin-appointments.php');
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
						
							<h4 class="card-title">Appointments Data  (<?php echo ucfirst($_GET['data']);?>)</h4>
							
							<br>
							
						</div>
						
						<div class="card-content">
						
							<div class="table-responsive">
								<table class="table " id="table-1">
								<thead>
								  <tr>
									<th scope="col" class="text-center"> PATIENT ID  </th>
									<th scope="col" class="text-start"> NAME OF PATIENTS </th>
									<th scope="col" class="text-start"> SERVICE</th>
									
									<th scope="col" class="text-center"> DATE OF APPOINTMENT</th>
									<th scope="col" class="text-center"> TIME OF APPOINTMENT</th>
									<?php if($_GET['data']=='cancelled' || $_GET['data']=='declined'){?>
										<th scope="col" class="text-start"> REASON </th>
									<?php } ?>
										<?php if($_GET['data'] != 'done' && $_GET['data'] !='declined'&& $_GET['data'] !='cancelled'){?>
										<th scope="col" class="text-center"> ACTION </th>
									<?php } ?>
								  </tr>
								</thead>
								<tbody>
								<?php 
								$count = 1;
								while($val = $tbl_appointments->fetch_object()){ 
								$date = new DateTime($val->request_date);
								$now = new DateTime();			
								$srrv = $val->service_id;
								if($date < $now) {
								
								if($_GET['data'] == 'pending'){
								?>
								
								<tr bgcolor="">
								  
								<?php }} else { ?>
								 <tr>
								<?php } ?>
									<td class="text-center"><?php echo $val->patient_id;?></td>
									<td class="text-start"><?php echo $val->firstname .' '. $val->lastname;?></td>
									<td class="text-start">
									<?php $services =  str_replace( array('[',']') , ''  ,$val->s_id );
									$res_ser = $mysqli->query("SELECT * FROM tbl_offer where id IN ($services)");
									while($val1 = $res_ser->fetch_object()){ 
										echo "-".$val1->service."<br>";
									}
									?>
									</td>
								
									<td class="text-center"><?php echo $val->request_date;?></td>
									<td class="text-center"><?php echo date("g:i A", strtotime($val->request_time));?></td>
									<?php if($_GET['data']=='cancelled' || $_GET['data']=='declined'){?>
										<td class="text-text">
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#reasons<?php echo $val->id;?>" data-id="<?php echo $val->id;?>"><i class="la la-times-circle"></i> View </button>
									
										</td>
									<?php } ?>
									<?php if($_GET['data'] != 'done' && $_GET['data'] !='declined' && $_GET['data'] !='cancelled'){?>
									<td class="text-center">
									<?php if($_GET['data'] == 'pending'){?>
										<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#approve<?php echo $val->id;?>"><i class="la la-check"></i>  </button>
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#reject<?php echo $val->id;?>"><i class="la la-ban"></i>  </button> 
									<?php } else if($_GET['data'] == 'approved'){?>
										<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#done<?php echo $val->id;?>" data-id="<?php echo $val->id;?>"><i class="la la-check-circle"></i></button>
									<?php } else if($_GET['data'] == 'cancelled'){?>
										<!--<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#restore<?php echo $val->id;?>" data-id="<?php echo $val->id;?>"><i class="bi bi-check"></i>Restore</button>-->
									<?php } else { ?>
									<?php } ?>
									</td>
									<?php } ?>
								
								  </tr>
								  <div class="modal fade" id="restore<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">RESTORE APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										  <form class="row g-3" method="POST">
											<div class="col-md-12">
												ARE YOU SURE TO RESTORE THIS APPOINTMENT? 
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo $val->email;?>" name="email">
											  <input type="hidden" value="<?php echo $val->firstname .' '. $val->lastname;?>" name="name">
											  <input type="hidden" value="<?php echo date('Y-m-d');?>" name="date">
											</div>
										</div>
										<div class="modal-footer">
										  <button type="submit" class="btn btn-warning" name="restore-schedule">Restore </button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
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
												<br>
											  
											 REASON : 
											 
											   <textarea class="form-control"  name="reason"></textarea> 
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo $val->email;?>" name="email">
											  <input type="hidden" value="<?php echo $val->firstname .' '. $val->lastname;?>" name="name">
											  <input type="hidden" value="<?php echo date('Y-m-d');?>" name="date">
											</div>
										</div>
										<div class="modal-footer">
										  <button type="submit" class="btn btn-warning" name="cancel-schedule">Cancel </button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
									<div class="modal fade" id="reject<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">DECLINE APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										  <form class="row g-3" method="POST">
											<div class="col-md-12">
												<br>
												<b>PATIENTS NAME : <?php echo $val->firstname .' '. $val->lastname;?></b>
												<br>
												<br>
											  
												REASON : 
											 
											   <textarea class="form-control"  name="reason"></textarea> 
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo $val->email;?>" name="email">
											  <input type="hidden" value="<?php echo $val->firstname .' '. $val->lastname;?>" name="name">
											  <input type="hidden" value="<?php echo date('Y-m-d');?>" name="date">
											</div>
										</div>
										<div class="modal-footer">
										  <button type="submit" class="btn btn-warning" name="reject-schedule">Decline</button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
									<div class="modal fade" id="approve<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">APPROVE APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										  <form class="row g-3" method="POST">
											ARE YOU SURE TO APPROVE THIS APPOINTMENT ?
											<div class="col-md-12">
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo $val->email;?>" name="email">
											  <input type="hidden" value="<?php echo $val->firstname .' '. $val->lastname;?>" name="name">
											</div>
										</div>
										<div class="modal-footer">
										  <button type="submit" class="btn btn-success" name="approve-schedule">Approve</button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
									<div class="modal fade" id="done<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">COMPLETE APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										  <form class="row g-3" method="POST">
											ARE YOU SURE TO COMPLETE THIS APPOINTMENT ?
											<div class="col-md-12">
											  <input type="hidden" value="<?php echo $val->id;?>" name="id">
											  <input type="hidden" value="<?php echo $val->email;?>" name="email">
											  <input type="hidden" value="<?php echo $val->firstname .' '. $val->lastname;?>" name="name">
											</div>
										</div>
										<div class="modal-footer">
										  <button type="submit" class="btn btn-success" name="complete-schedule">Completed</button>
										  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
										</form>
									  </div>
									</div>
									</div>
									<div class="modal fade" id="reasons<?php echo $val->id ;?>" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
									  <div class="modal-content">
										<div class="modal-header">
										  <h5 class="modal-title">DECLINED APPOINTMENT </h5>
										  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<?php echo $val->cancel_reason;?>
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
	

<?php include("footer.php");?>
