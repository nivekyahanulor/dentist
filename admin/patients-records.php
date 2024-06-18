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
				 <h1>Patient : <?php echo $_GET['name'];?> </h1>
				 <hr>
					<div class="card">
					<div class="card-content">
						  <div class="card-body">
							</p>
							<ul class="nav nav-tabs">
							  <li class="nav-item">
								<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">APPOINTMENTS</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">DENTAL HISTORY</a>
							  </li>
							<!-- <li class="nav-item">
								<a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">PRESCRIPTION </a>
							  </li>-->
							 
							
							</ul>
							<div class="tab-content px-1 pt-1">
							  <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
							  <h4> APPOINTMENT RECORDS </h4>
								  <table class="table datatable" id="table-1">
									<thead>
									  <tr>
										<th scope="col" class="text-center"> TRANSACTION NO. </th>
										<th scope="col" class="text-start"> SERVICE</th>
										<th scope="col" class="text-center"> DATE OF APPOINTMENT</th>
										<th scope="col" class="text-center"> TIME OF APPOINTMENT</th>
										<th scope="col" class="text-start"> STATUS </th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tbl_appointments->fetch_object()){ ?>
									  <tr>
										<td class="text-end"><?php echo $val->id;?></td>
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
										<td class="text-start" >
											<?php   if($val->approved == 0){
														echo "<a href='appointments.php?data=pending'> PENDING </a>";
													} else if($val->approved == 1){
														echo "APPROVED";
													} else if($val->approved == 2){
														echo "DONE";
													} else if($val->approved == 3){
														echo "REJECTED";
													} else if($val->approved == 4){
														echo "CANCELLED";
													}
											?>
										</td>
									  </tr>
									<?php } ?>
									</tbody>
								  </table>
							  </div>
							  <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
							  <h4> DENTAL HISTORY RECORDS 
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#addservice" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Data</button>
							</h4>
							<br>
								 <table class="table datatable"  id="table-2">
									<thead>
									  <tr>
										<th scope="col" class="text-center"> DATE CHECKUP</th>
										<th scope="col" class="text-center"> PRESCRIPTION</th>
										<th scope="col" class="text-start"> FINDINGS</th>
										<th scope="col" class="text-start"> REMARKS</th>
										<th scope="col" class="text-start"> </th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tbl_history_patient->fetch_object()){ ?>
									  <tr>
										<td class="text-center"><?php echo $val->dcu;?></td>
										<td class="text-center"><?php echo $val->prescription;?></td>
										<td class="text-start"><?php echo $val->findings;?></td>
										<td class="text-start"><?php echo $val->remarks;?></td>
										<td class="text-center"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#print<?php echo $val->id;?>"> Print </button></td>
									  </tr>
									<div class="modal fade done" id="print<?php echo $val->id ;?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title">Print Dental History </h5>
											  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											  <form class="row g-3" method="POST">
												<br>
												<div class="col-md-12">
													<div id="myDiv">
													<center><img class="brand-logo" alt="modern admin logo" src="../assets/images/logo.png" style="width:200px;"></center>
													<br><br>
													Patient Name : <?php echo $_GET['name'];?><br><br>
													Prescription <br><p><?php echo $val->prescription;?></p><br>
													Findings <br><p><?php echo $val->findings;?></p><br>
													Remarks <br><p><?php echo $val->remarks;?></p><br>
													</div>
												</div>
											
											</div>
											
											<div class="modal-footer">
											  <button type="button" class="btn btn-success done-schedule" onclick="PrintDiv('myDiv')">Print</button>
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
							  <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
							   <h4> PRESCRIPTION RECORDS 
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#addprescription" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Prescriptions</button>
							</h4>
							<br>
								 <table class="table datatable"  id="table-3">
									<thead>
									  <tr>
										<th scope="col" class="text-center"> PRESCRIPTION</th>
										<th scope="col" class="text-center"> DATE ADDED</th>
										<th scope="col" class="text-center"> ACTION</th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tb_prescription->fetch_object()){ ?>
									  <tr>
										<td class="text-center"><?php echo $val->prescription;?></td>
										<td class="text-center"><?php echo $val->date_added;?></td>
										<td class="text-center"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#print<?php echo $val->id;?>"> Print </button></td>
										
									  </tr>
										
									<?php } ?>
									</tbody>
									</table>
							  </div>
							</div>
						  </div>
						</div>
				</div>
				</div>
			</div>

        </div>
      </div>
    </div>
	<div class="modal fade" id="addservice" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">HISTORY DETAILS</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST"  enctype="multipart/form-data">
					  <div class="col-md-12">
						  <label for="inputName5" class="form-label">Date Check Up: </label>
						  <input type="date" name="dcu"  class="form-control">
						  <input type="hidden" name="user_id" value="<?php echo $_GET['data'];?>">
						  <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
						</div>
						<div class="col-md-12">
						<br>
						  <label for="inputName5" class="form-label">Findings: </label>
						  <textarea type="text" class="" name="findings"  id="summernote" required></textarea>
						</div><br>
						
						<div class="col-md-12">
						<br>
						  <label for="inputName5" class="form-label">Prescriptions: </label>
						  <textarea type="text" class="form-control" id="summernote1"  name="prescriptions" required></textarea>
						</div><br>
						
						<div class="col-md-12">
						<br>
						  <label for="inputName5" class="form-label">Remarks: </label>
						  <textarea type="text" class="form-control" id="summernote2" name="remarks" required></textarea>
						</div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="process" name="add-record" >Add</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
			  <div class="modal fade" id="addprescription" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">PRESCRIPTION DETAILS</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST"  enctype="multipart/form-data">
					
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Prescriptions: </label>
						  <textarea type="text" class="form-control" name="prescriptions" required></textarea>
						  <input type="hidden" name="user_id" value="<?php echo $_GET['data'];?>">
						  <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
						</div>
					
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="process" name="add-prescriptions" >Add</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
			  
<?php include("footer.php");?>
 <script type="text/javascript">
        function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=600');
            myWindow.document.write('<html><head><title>my div</title>');
            /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }
    </script>
	
	<script>
	  $('#summernote').summernote();
	  $('#summernote1').summernote();
	  $('#summernote2').summernote();
		
	</script>