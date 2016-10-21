<?php
include_once '../common/common.php';
if(!isset($_COOKIE['admin']['id'])||($_COOKIE['admin']['name'])||($_COOKIE['admin']['password'])){
	echo "<script>window.location.href ='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>后台</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo PUBLIC_RES ?>/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo PUBLIC_RES ?>/css/admin/dashboard.css" rel="stylesheet">

   
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo PUBLIC_RES ?>/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo PUBLIC_RES ?>/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>

  <body>
  
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">淘房网</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><?php echo $_COOKIE['admin']['name']?></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">首页 <span class="sr-only">(current)</span></a></li>  
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="huxing_list.php">户型列表</a></li>
            <li><a href="huxing_add.php">添加户型</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="diqu_list.php">地区列表</a></li>
            <li><a href="diqu_add.php">添加地区</a></li>
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="user_list.php">用户列表</a></li>
          </ul>
        </div>