   <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
             <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="modern admin logo" src="../assets/images/logo.png" style="width:200px;">
              </a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Welcome , Administrator</a>
            
           
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="../assets/images/default.jpg" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="#">
				<i class="ft-user"></i>  <?php echo $_SESSION['name'];?></a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
	<?php
		error_reporting(0);
		$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		 $page =  $uri_segments[3];
		
		if ( $page == 'index'  ) {
            $dashboard = 'active';
        }else if ($page == 'appointments') {
			$appointments = 'active';
         }else if ($page == 'patients' ) {
            $patients = 'active';
        }else if ($page == 'dentist') {
            $dentist = 'active';
        }else if ($page == 'services' ) {
            $services = 'active';
        }else if ($page == 'users' ) {
            $users = 'active';
        }else if ($page == 'settings' ) {
            $settings = 'active';
        }else if ($page == 'admins' ) {
            $admins = 'active';
        }
		else if ($page == 'reports' ) {
            $reports = 'active';
        }else if ($page == 'about' ) {
            $about = 'active';
        }
		
	?>
    <div class="main-menu menu-fixed  menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
		<?php if($_SESSION['type'] == 'admin'){?>
          <li class=" nav-item <?php echo $dashboard;?>"><a href="index"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a> </li>
		
		  <li class="nav-item has-sub open  <?php echo $appointments;?>"><a href="#"><i class="la la-calendar"></i><span class="menu-title" data-i18n="Invoice">Appointments</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a class="menu-item" href="appointments?data=pending"><i></i><span data-i18n="Invoice Summary">Pending</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=approved"><i></i><span data-i18n="Invoice Summary">Approved</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=declined"><i></i><span data-i18n="Invoice Summary">Declined</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=done"><i></i><span data-i18n="Invoice Summary">Completed</span></a></li>
            </ul>
          </li>
          <li class=" nav-item <?php echo $patients;?>"><a href="patients"><i class="la la-users"></i><span class="menu-title" data-i18n="Templates">Patients</span></a></li>
          <li class=" nav-item <?php echo $dentist;?>"><a href="dentist"><i class="la la-list"></i><span class="menu-title" data-i18n="Templates">Dentist</span></a></li>
          <li class=" nav-item <?php echo $services;?>"><a href="services"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="eCommerce"> Services</span></a></li>
          <li class=" nav-item <?php echo $reports;?>"><a href="reports"><i class="la la-bar-chart"></i><span class="menu-title" data-i18n="eCommerce"> Reports</span></a></li>
          <li class=" nav-item <?php echo $about;?>"><a href="about"><i class="la la-gear"></i><span class="menu-title" data-i18n="eCommerce"> Settings</span></a></li>
          <li class=" nav-item <?php echo $users;?>"><a href="users"><i class="la la-user"></i><span class="menu-title" data-i18n="eCommerce">  Administrators</span></a></li>
		<?php } else { ?>
		 <li class=" nav-item <?php echo $dashboard;?>"><a href="index"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a> </li>
		  <li class="nav-item has-sub open  <?php echo $appointments;?>"><a href="#"><i class="la la-calendar"></i><span class="menu-title" data-i18n="Invoice">Appointments</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a class="menu-item" href="appointments?data=pending"><i></i><span data-i18n="Invoice Summary">Pending</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=approved"><i></i><span data-i18n="Invoice Summary">Approved</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=declined"><i></i><span data-i18n="Invoice Summary">Declined</span></a></li>
              <li class="is-shown"><a class="menu-item" href="appointments?data=done"><i></i><span data-i18n="Invoice Summary">Completed</span></a></li>
            </ul>
          </li>
          <li class=" nav-item <?php echo $patients;?>"><a href="patients"><i class="la la-users"></i><span class="menu-title" data-i18n="Templates">Patients</span></a></li>
		<?php } ?>
          <li class=" nav-item"><a href="logout"><i class="la la-unlock"></i><span class="menu-title" data-i18n="eCommerce"> Sign-Out</span></a></li>
        </ul>
      </div>
    </div>