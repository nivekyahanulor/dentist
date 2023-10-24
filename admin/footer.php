

    <!-- Buynow Button-->
   
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
	  <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2023 
	  </span>
	  <span class="float-md-right d-none d-lg-block">LCL DENTAL CLINIC <i class="ft-heart pink"></i>
	  <span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <!-- BEGIN: Vendor JS-->
    <script src="../assets/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
	
    <!-- BEGIN: Page Vendor JS-->
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../assets/js/app-menu.min.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/js/customizer.min.js"></script>
    <script src="../assets/js/footer.min.js"></script>
    <!-- END: Theme JS-->

    <script src="../assets/js/datatables.min.js"></script>
	<script src="../assets/sweetalert2/sweetalert2.all.min.js" ></script>
    <script src="../assets/js/dashboard-crypto.min.js"></script>
	
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
	$(".alt-pagination").DataTable({pagingType:"full_numbers"});
	$("#table-1").DataTable();
	$("#table-2").DataTable();
	$("#table-3").DataTable();
	</script>
	<Script>
	function password_show_hide() {
	  var x = document.getElementById("cpassword");
	  var show_eye = document.getElementById("show_eye");
	  var hide_eye = document.getElementById("hide_eye");
	  hide_eye.classList.remove("d-none");
	  if (x.type === "password") {
		x.type = "text";
		show_eye.style.display = "none";
		hide_eye.style.display = "block";
	  } else {
		x.type = "password";
		show_eye.style.display = "block";
		hide_eye.style.display = "none";
	  }
	}
	
	function password_show_hide1() {
	  var x = document.getElementById("npassword");
	  var show_eye = document.getElementById("show_eye");
	  var hide_eye = document.getElementById("hide_eye");
	  hide_eye.classList.remove("d-none");
	  if (x.type === "password") {
		x.type = "text";
		show_eye.style.display = "none";
		hide_eye.style.display = "block";
	  } else {
		x.type = "password";
		show_eye.style.display = "block";
		hide_eye.style.display = "none";
	  }
	}
  
	</script>
	<script type="text/javascript">
					function minmax(value, min, max) 
					{
						if(parseInt(value) < min || isNaN(parseInt(value))) 
							return min; 
						else if(parseInt(value) > max) 
							return max; 
						else return value;
					}
					</script>
					
	<?php 
  
		include('../controller/admin-calendar.php');
		$calendar = array();
		$appointments = array();
	
			
			while($res = $tbl_event->fetch_object()){ 
				 $start = $res->start;
				 $startDate  = date("Y-m-d", strtotime($start));
				 $end = $res->end;
				 $endDate  = date("Y-m-d", strtotime($end));
				 $calendar[] = array( 
									  "title" => $res->title,
									  "description" => $res->description,
									  "percentage" => $res->discount,
									  "services" => str_replace('"', '',str_replace( array('[',']') , ''  ,$res->services )),
									  "start" => $startDate."T00:00:00.000",
									  "end"   => $endDate."T23:59:00",
									  "backgroundColor" => "blue",
									  "status" => "event",
									  "count" => "0",
									);
			}
			
			
			
				
				while($res1 = $tbl_appointments->fetch_object()){ 
				
					 $start = $res1->request_date;
					 
					 $tbl_date = $mysqli->query("SELECT  request_date ,approved FROM `tbl_appointments` where request_date='$start'");
					 $dr       = $tbl_date->fetch_assoc();
					 
					 if($dr['dc'] >=11){
						$count = 1;
					 } else {
						$count = 0;
					 }
					
					 $colors = 'green';
					 $startDate  = date("Y-m-d", strtotime($start));
					 $stime = date("H:i", strtotime($res1->request_time));
					 $endDate  = date("Y-m-d", strtotime($end));
					 $appointments[] = array( "title" => $res1->firstname .' '. $res1->lastname. ' | Time : '.$res1->request_time ,
									      "start" => $startDate."T".$stime.":00.000",
										  "end"   => $endDate."T23:59:00",
										  "time" => date("g:i A", strtotime($res1->request_time)),
										  "backgroundColor" => $colors,
										  "status" => "schedule",
										  "count" => $count,
										  "dentist" => $res1->dentist,
										);
				}
				

	?>
  <script>
  var link = 'http://localhost/dentist';
	$('.customer-payment').on('change', function() {
		$(".payment-result").html(" ");
		var id = $(this).data('id');
		var service = $(".service-charge"+id).val();
		var paymemnt = this.value;
		if($('#promos'+id).val() !=""){
			var promo = $('#promos'+id).val();
			var promototal = parseInt(service) * (parseInt(promo)  / 100 );
		} else {
			var promototal = 0;
		}
		var total = (parseInt(service) - parseInt(promototal)) - parseInt(this.value);
		if(parseInt(paymemnt) < parseInt(service)){
				$(".payment-result").html(" Payment Balance : " +  total );
				$(".done-schedule").show();
				$(".balance").val(total);
		} else {
				$(".payment-result").html(" Discounted Price : " +  Math.abs((parseInt(service) - parseInt(promototal))) );
				$(".done-schedule").show();
				$(".balance").val(0);
		}
	});
	
	$('.customer-payment1').on('change', function() {
		$(".payment-result1").html(" ");
		var paymemnt = this.value;
		var service1 = $("#service-fee").val();
		var promo = $('#res_promos').val();
		if(promo !='' && $('#res_promos').val() !=null){
			var promototal = parseInt(service1) * (parseInt(promo)  / 100 );
			var total = (parseInt(service1) - parseInt(promototal)) - parseInt(this.value);
		} else {
			var total = (parseInt(service1) ) - parseInt(this.value);
		}
		
		
		if(parseInt(paymemnt) < parseInt(service1)){
				$(".payment-result1").html(" Payment Balance : " +  total );
				$(".process-pay").show();
				$(".balance1").val(total);
		} else {
				$(".payment-result1").html(" Payment Change : " +  Math.abs(total) );
				$(".process-pay").show();
				$(".balance1").val(0);
		}
	});
	
	$('.customer-payment2').on('change', function() {
		$(".payment-result").html(" ");
		var id = $(this).data('id');
		var service = $(".service-charge"+id).val();
		var paymemnt = this.value;
		
		var total = (parseInt(service)) - parseInt(this.value);
		if(parseInt(paymemnt) <= parseInt(service)){
				$(".payment-result").html(" Payment Balance : " +  total );
				$(".done-schedule").show();
				$(".balance").val(total);
		} 
	});
	
	$(document).ready(function() {
		$('#closecalendar').click(function() {
			$('#calendarmodal').modal('hide');
		});
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView: 'month',
			  views: {
				month: { columnHeaderFormat: 'ddd', displayEventEnd: true, eventLimit: 3 },
				week: { columnHeaderFormat: 'ddd DD', titleRangeSeparator: ' \u2013 ' },
				day: { columnHeaderFormat: 'dddd' },
			},
			selectable: true,
			events: <?php echo json_encode(array_merge($calendar,$appointments));?>,
			

			eventClick:  function(event, jsEvent, view) {
			   $('#calendarmodal').modal('show');
			    if(event.status=='event'){
					$('.modal').find('#name').html(''); 
					$('.modal').find('#appointments').html('');
					$('.modal').find('#time').html(''); 
					
					$('.modal').find('#title').html('Title : <br>' + event.title + '<br><br>');
					$('.modal').find('#description').html('Description : <br>' + event.description+ '<br><br>');
					$('.modal').find('#percentage').html('Discount : <br>' + event.percentage+ '% <br><br>');
					$('.modal').find('#services').html('Services : <br>' + event.services+ ' <br><br>');
					$('.modal').find('#starts1').html('Start : <br>' +$.fullCalendar.moment(event.start).format('YYYY/MM/DD')+ '<br><br>');
					$('.modal').find('#ends1').html('End : <br>' +$.fullCalendar.moment(event.end).format('YYYY/MM/DD')+ '<br><br>');
			   } else {
					 $('.modal').find('#name').html('Patient Name : <br>' + event.title + '<br><br>'); 
					 $('.modal').find('#appointments').html('Appointment Date : <br>' +$.fullCalendar.moment(event.start).format('YYYY/MM/DD')+ '<br><br>');
					 $('.modal').find('#time').html('Appointment Time : <br>' + event.time + '<br><br>'); 
					 $('.modal').find('#dentist1').html('Dentist  : <br>' + event.dentist + '<br><br>'); 
					 $('.modal').find('#title').html('');
					 $('.modal').find('#description').html('');
					 $('.modal').find('#starts1').html('');
					 $('.modal').find('#ends1').html('');
					 $('.modal').find('#services').html('');
					 $('.modal').find('#percentage').html('');
			   }
        }, eventRender: function(info,cell) {
			if(info.count ==1){
				$('.fc-day[data-date="'+$.fullCalendar.moment(info.start).format()+'"]').css('background', "red");
			}
		  }
		});
		
	});
	
	
	$(document).ready(function() {
		$('#closecalendar').click(function() {
			$('#calendarmodal').modal('hide');
		});
		$('#calendar1').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView: 'month',
			  views: {
				month: { columnHeaderFormat: 'ddd', displayEventEnd: true, eventLimit: 3 },
				week: { columnHeaderFormat: 'ddd DD', titleRangeSeparator: ' \u2013 ' },
				day: { columnHeaderFormat: 'dddd' },
			},
			selectable: true,
			events: <?php echo json_encode(array_merge($appointments));?>,
			

			eventClick:  function(event, jsEvent, view) {
			   $('#calendarmodal').modal('show');
			    if(event.status=='event'){
					$('.modal').find('#name').html(''); 
					$('.modal').find('#appointments').html('');
					$('.modal').find('#time').html(''); 
					
					$('.modal').find('#title').html('Title : <br>' + event.title + '<br><br>');
					$('.modal').find('#description').html('Description : <br>' + event.description+ '<br><br>');
					$('.modal').find('#percentage').html('Discount : <br>' + event.percentage+ '% <br><br>');
					$('.modal').find('#services').html('Services : <br>' + event.services+ ' <br><br>');
					$('.modal').find('#starts1').html('Start : <br>' +$.fullCalendar.moment(event.start).format('YYYY/MM/DD')+ '<br><br>');
					$('.modal').find('#ends1').html('End : <br>' +$.fullCalendar.moment(event.end).format('YYYY/MM/DD')+ '<br><br>');
			   } else {
					 $('.modal').find('#name').html('Patient Name : <br>' + event.title + '<br><br>'); 
					 $('.modal').find('#appointments').html('Appointment Date : <br>' +$.fullCalendar.moment(event.start).format('YYYY/MM/DD')+ '<br><br>');
					 $('.modal').find('#time').html('Appointment Time : <br>' + event.time + '<br><br>'); 
					 
					 $('.modal').find('#dentist1').html('Dentist  : <br>' + event.dentist + '<br><br>'); 
					 $('.modal').find('#title').html('');
					 $('.modal').find('#description').html('');
					 $('.modal').find('#starts1').html('');
					 $('.modal').find('#ends1').html('');
					 $('.modal').find('#services').html('');
					 $('.modal').find('#percentage').html('');
			   }
        }, eventRender: function(info,cell) {
			if(info.count ==1){
				$('.fc-day[data-date="'+$.fullCalendar.moment(info.start).format()+'"]').css('background', "red");
			}
		  }
		});
		
	});


  </script>
  <script>
	$('#service_id').on('change', function() {
	  var id = this.value;
		$.ajax({
			   type: "POST",
			   url:link+'/controller/get-installment.php',
			   data : {
					 'id'         : id, 
				},
			   success: function(data)
			   {
					if(data == '' || data == null){
						  $("#inss").hide(); 
					} else {
						  $("#inss").show(); 
						  $("select#res_installment").html(data); 
					}
			   }
		 });
		 
		 $.ajax({
			   type: "POST",
			   url:link+'/controller/get-promo.php',
			   data : {
					'id'         : id, 
				},
			   success: function(data)
			   {
					if(data == '' && data == null){
						  $("#pro").hide(); 
					} else {
						  $("#pro").show(); 
						  $("select#res_promos").html(data); 
					}
			   }
		 });
	});  
  </script>
  
 
  <?php
  	
		$approvedr	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total FROM tbl_appointments 
			WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and approved = 1 
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub
		");
		$approw    = $approvedr->fetch_assoc();

			foreach($approw as $val => $res){
					$month[]  =  $val;
					$value1[] =  $res;
			}
  
	    $approvedc	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total FROM tbl_appointments 
			WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and approved = 4 
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub
		");
		$canrow    = $approvedc->fetch_assoc();

			foreach($canrow as $val1 => $res1){
					$value2[] =  $res1;
			}
  
		$approvedd	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total FROM tbl_appointments 
			WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and approved = 3 
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub
		");
		$decrow    = $approvedd->fetch_assoc();

			foreach($decrow as $val2 => $res2){
					$value3[] =  $res2;
			}
  
       $approvedone	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total FROM tbl_appointments 
			WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and approved = 2 
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub
		");
		$donerow    = $approvedone->fetch_assoc();

			foreach($donerow as $val3 => $res3){
					$value4[] =  $res3;
			}
  
  
  ?>
 <script>
	Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Appointments Status Chart'
		},
		subtitle: {
			text: 'Source: ' + 'DATABASE'

		},
		xAxis: {
			categories: <?php echo json_encode($month);?>
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Data'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
			}
		},
		plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
		},
		series: [{
			name: 'Approved',
			 data: <?php echo json_encode($value1,JSON_NUMERIC_CHECK);?>

		},{
			name: 'Done',
			 data: <?php echo json_encode($value4,JSON_NUMERIC_CHECK);?>

		},{
			name: 'Cancelled',
			 data: <?php echo json_encode($value2,JSON_NUMERIC_CHECK);?>

		},{
			name: 'Declined',
			 data: <?php echo json_encode($value3,JSON_NUMERIC_CHECK);?>

		}]
	});

 </script>
 <?php
 	$tbl_male = $mysqli->query("SELECT count(*)male from tbl_signup where type='patient' and sex = 'Male'");
	$male     = $tbl_male->fetch_assoc();
	
	$tbl_female = $mysqli->query("SELECT count(*)female from tbl_signup where type='patient' and sex = 'Female'");
	$female     = $tbl_female->fetch_assoc();
 ?>
 <script>
	Highcharts.chart('container-pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Patients Pie Chart',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{point.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Male',
            y: <?php echo $male['male'];?>,
            sliced: true,
            selected: true,
			color:'blue'
        }, {
            name: 'Female',
            y: <?php echo $female['female'];?>,
			color:'yellow'

        }]
    }]
});

 
 </script>
  </body>
  <!-- END: Body-->
</html>