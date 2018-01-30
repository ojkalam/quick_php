<?php
ob_start();
	include_once "libs/Session.php";
	//Session::init();
	include_once "helpers/Format.php";
	spl_autoload_register(function($class){
	    include_once "classes/".$class.".php";
	  });

	$sm = new SampleClass();
	$su = new SampleUser();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Quick PHP</title>
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	 <!-- jQuery -->
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>