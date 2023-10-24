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
		<div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
				<a href="tes">
                    <div class="row">
                        <div class="col-2">
						<i class="la la-user  warning font-large-2"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4>TOTAL PATIENTS</h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $signups;?></h2>
                        </div>
                    </div>
				</a>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="btc-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="la la-users blue-grey lighten-1 font-large-2" title="ETH"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4>TOTAL DENTIST</h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $dentistcnt;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="eth-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="la la-clipboard info font-large-2" title="XRP"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4>TOTAL SERVICES </h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $servicescnt;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>  
	
	<div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="la la-calendar info font-large-2" title="XRP"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4> APPOINTMENTS </h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $appointments;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="la la-check info font-large-2" title="XRP"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4>TODAY SCHEDULE </h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $tappointments;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <div class="card-content">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-2">
                            <i class="la la-check-circle info font-large-2" title="XRP"></i>
                        </div>
                        <div class="col-5 pl-2">
                            <h4> APPROVED SCHEDULE </h4>
                        </div>
                        <div class="col-5 text-right">
                            <h2> <?php echo $approveds;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                </div>
            </div>
        </div>
    </div>
	
	 	<div class="col-xxl-12 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  
                        <div id="container"></div>


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
