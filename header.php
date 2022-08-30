<?php
// include 'db.php';
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:login.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <link href="css/sb-admin.css" rel="stylesheet">
      
<title>Digital Advertisement</title>
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
         <a class="navbar-brand mr-1" href="index.php">Digital Advertisement</a>
         <div class="d-none d-md-inline-block ml-auto"></div>
         <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <a class="dropdown-item" href="logout.php"><i class="fas fa-user-circle fa-fw" style="
    font-size: 29px;
    color: white;
"></i></a>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="logout.php">Logout</a>
               </div>
            </li>
         </ul>
      </nav>
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <?php if($_SESSION['ADMIN']==1){?>
			<li class="nav-item">
               <a class="nav-link" href="index.php">  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
               <i class="fa fa-fw fa-user"></i>
               <span>Dashboard</span>
               </a>
            </li>
           
			<?php } ?>
         <li class="nav-item">
               <a class="nav-link" href="abstract.php">
               <i class="fa fa-fw fa-user"></i>
               <span>Abstract</span></a>
            </li>
         <li class="nav-item">
               <a class="nav-link" href="post.php">
               <i class="fa fa-fw fa-user"></i>
               <span>Post</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="playlist.php">
               <i class="fa fa-fw fa-user"></i>
               <span>Playlist </span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="ads.php">
               <i class="fa fa-fw fa-user"></i>
               <span>Ads</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="payment.php">
               <i class="fa fa-fw fa-user"></i>
               <span>Payment</span></a>
            </li>
          
          
         </ul>
         <div id="content-wrapper">