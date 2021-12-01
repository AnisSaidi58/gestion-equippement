<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
	
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="SahilKumar">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	
<?php 

$title=basename($_SERVER['PHP_SELF'], '.php');
$title=explode('-',$title);
$title=ucfirst($title[1]);


?>
<title><?= $title; ?> | Admin Panel</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#open-nav").click(function(){
			$(".admin-nav").toggleClass('animate');
		});
	});


</script>

	
<style type="text/css">
	.admin-nav{
		width: 300px;
		min-height: 100vh;
		overflow: hidden;
		transition: 0.3s all ease-in-out;
		background-color: #343a40;
		
	}
	
	.admin-link{

		background-color: #343a40;
	}
	
	.admin-link:hover, .nav-active{
		background-color: #212529;
		text-decoration: none;}
	</style>


</head>


<body>

<div class="container-fluid">
	<div class="row">
	<div class="admin-nav p-0">
		<h4 class="text-light text-center p-2">Admin Panel </h4>
		<div class="list-group list-group-flush">
			
			<a href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAANAASAqEXdUM1o2Nk83Q1laMEJPNjRWRkhYVVlVT01EVy4u" class="list-group-item  admin-link "> &nbsp;&nbsp; Add Article</a>
			<a href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAANAASAqEXdUN0JDQU1DWVRTRVRTUTZCMzA4OUZTNTZQQS4u" class="list-group-item  admin-link"> &nbsp;&nbsp; Delete Article</a>
			<a href="admin-users.php" class="list-group-item  admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-users.php')?"nav-active":"";   ?>">&nbsp;&nbsp; Users</a>
			<a href="admin-deleteduser.php" class="list-group-item  admin-link">&nbsp;&nbsp; Deleted Users</a>
			<a href= "assets/php/logout.php" class="list-group-item  admin-link"><i class="fas fa-sign-out-alt"></i></i>&nbsp;&nbsp; Logout</a>
	
</div>
</div>

