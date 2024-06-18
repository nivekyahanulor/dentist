  <?php 
	  include('../controller/database.php');
	  include("header.php");
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
						
						  <h5 class="card-title"> Reports Data</h5>
							
							<br>
							<br>
							<form class="row" method="post">
							<div class="col-3">
							  <label for="inputNanme4" class="form-label">Date From: </label>
							   <input type="date" class="form-control" name="datefrom"  value="<?php echo $_POST['datefrom'];?>" required>
							</div>
							<div class="col-3">
							  <label for="inputNanme4" class="form-label">Date To: </label>
							 <input type="date" class="form-control" name="dateend" value="<?php echo $_POST['dateend'];?>" required>
							</div>
							<div class="col-3">
							<div style="height:30px;"></div>
							  <button type="submit" class="btn btn-primary" name="update-customer"><i class="bi bi-filter-circle"></i> Filter </button>
							 </div>
							</form>
						</div>
						
						<div class="card-content">
							
							<div class="table-responsive">
							  <table class="table datatable" id="table-1">
									<thead>
									  <tr>
										<th scope="col" class="text-start"> SERVICE</th>
										<th scope="col" class="text-end"> TOTAL APPOINTMENTS</th>
									  </tr>
									</thead>
									<tbody>
									<?php 
									if(isset($_POST['datefrom'])){
									$datefrom = $_POST['datefrom'];
									$dateend  = $_POST['dateend'];
									
									$tbl_appointments1 = $mysqli->query("SELECT a.* ,b.firstname , b.lastname , c.service FROM tbl_appointments a 
									LEFT JOIN tbl_signup b on b.id = a.user_id
									LEFT JOIN tbl_offer c on a.service_id = c.id
									WHERE  (DATE(a.date_added) between '$datefrom' and '$dateend')");
									
									} else {
									$tbl_appointments1 = $mysqli->query("SELECT a.* ,b.firstname , b.lastname , c.service FROM tbl_appointments a 
									LEFT JOIN tbl_signup b on b.id = a.user_id
									LEFT JOIN tbl_offer c on a.service_id = c.id
									");
										
									}
									while($val = $tbl_appointments1->fetch_object()){ 
													  $services1 =  str_replace( array('[',']') , ''  ,$val->service_id );
													  $services2 =  str_replace( '"' , ' '  ,$services1 );
																	$res_ser = $mysqli->query("SELECT *, count(id)cnt  FROM tbl_offer where id IN ($services1) group by id");
																	while($val1 = $res_ser->fetch_object()){ 
																	
																		// if($services2  == $val1->id){
																				// $n = count($services2);
																		// } else {
																			// $n =1 + $val1->cnt;
																		// }
																		// echo $n;
																		 $months[] = $val1->service; 
																		 
																	}
								  
								  }
									$myArray = array(1, 2, 3, 2, 1, 4, 5, 4); 
								 
									$countedValues = array_count_values($months); 
									 
									foreach ($countedValues as $key => $value) { 
										
											$array[] = array($key ,$value); 
									
																		?>
									  <tr>
										<td class="text-start"><?php echo $key;?></td>
										<td class="text-start"><?php echo $value;?></td>
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

<?php include("footer.php");?>
