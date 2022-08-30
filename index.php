<?php 
include('header.php');
if(isset($_SESSION['ADMIN']) && $_SESSION['ADMIN']!='1'){
	header('location:abstract.php');
	die();
}
?>
  

<div class="container-fluid">

</div>