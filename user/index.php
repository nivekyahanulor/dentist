<?php include('header.php'); 
include('nav.php'); 
include('../controller/user-appointments.php');?>
   <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">



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
				<div class="col-xxl-12 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  
                        <div id="container-services"></div>


                </div>
              </div>
            </div>
			<div class="col-xl-6 col-12">
			<div class="card crypto-card-3 pull-up">
				<div class="card-content">
					<div class="card-body pb-0">
						<div class="row">
							<div class="col-12 pl-2">
								<h3>DENTAL HISTORY RECORD</h3>
							<div class="table-responsive">
								 <table class="table datatable"  id="table-2">
									<thead>
									  <tr>
										<th scope="col" class="text-center"> DATE CHECKUP</th>
										<th scope="col" class="text-start"> FINDINGS</th>
										<th scope="col" class="text-start"> REMARKS</th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tbl_history_patient->fetch_object()){ ?>
									  <tr>
										<td class="text-center"><?php echo $val->dcu;?></td>
										<td class="text-start"><?php echo $val->findings;?></td>
										<td class="text-start"><?php echo $val->remarks;?></td>
										
									  </tr>
									
									<?php } ?>
									</tbody>
									</table>
								<br>
							</div>
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


<?php include("footers.php");?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
 <?php

  $user = $_SESSION['id'];
  
  
  $n = 0;

  $tbl_appointments1 = $mysqli->query("SELECT a.* ,b.firstname , b.lastname , c.service FROM tbl_appointments a 
									LEFT JOIN tbl_signup b on b.id = a.user_id
									LEFT JOIN tbl_offer c on a.service_id = c.id
									where a.user_id = '$user'");
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
	} 
	echo  json_encode(($array),JSON_NUMERIC_CHECK );
  ?>
 <script>
	Highcharts.chart('container-services', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'My Service Statistics'
    },
    subtitle: {
        text: 'Source: DATABASE'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Counts'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Statistics'
    },
    series: [{
        name: 'Population',
        colors: [
            '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
            '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
            '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
            '#03c69b',  '#00f194'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: <?php  echo json_encode(($array),JSON_NUMERIC_CHECK );?>,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});


 </script>