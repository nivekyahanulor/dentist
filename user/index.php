<?php include('header.php'); include('nav.php'); include('../controller/admin-dashboard.php');?>
   <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

   <?php include("include/nav.php");?>


    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
		<div id="crypto-stats-3" class="row">
		<div class="col-xl-12 col-12">
			<div class="card crypto-card-3 pull-up">
				<div class="card-content">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-5 pl-2">
								<h3>WELCOME TO LCL DENTAL CLINIC</h3>
								<h5 class="font-weight-bold"><span id="digital-clock"></span></h5>
								<br>
							</div>
						</div>
					</div>
				
				</div>
			</div>
			</div>
			<div class="col-xl-6 col-12">
			<div class="card crypto-card-3 pull-up">
				<div class="card-content">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-12 pl-2">
								<h3>CALENDAR</h3>
								<div id="calendar"></div>
								<br>
							</div>
						</div>
					</div>
				
				</div>
			</div>
			</div>
			<div class="col-xl-6 col-12">
			<div class="card crypto-card-3 pull-up">
				<div class="card-content">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-12 pl-2">
								<h3>YOUR APPOINTMENT</h3>
															<div class="table-responsive">
							<table class="table datatable" id="table-1" >
								<thead>
								  <tr>
									<th scope="col"> SERVICE</th>
									<th scope="col"  class="text-center"> DATE </th>
									<th scope="col"  class="text-center"> TIME</th>
									<th scope="col"> STATUS </th>
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
<!-- Candlestick Multi Level Control Chart -->



<!-- Active Orders -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


<?php include("footer.php");?>
