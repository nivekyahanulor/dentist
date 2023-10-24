<?php
		session_start();
		if(!isset($_SESSION['id'])){
			header("Location: ../index.php");
		}
?>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>LCL DENTAL CLINIC</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/apexcharts.css">
    <!-- END: Page CSS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  

  </head>