<?php
define('PUBLIC_RES', 'http://'.$_SERVER['HTTP_HOST'].'/taofang/resource');
define('SITE_NAME', '淘房网 ');
$title = '登录';
//include_once '../common/header.php';
include_once '../common/mysql.php';
$conn = connect();

if (isset($_POST['submit'])){
	//$_POST = new_html_special_chars($_POST);
	$password = md5($_POST['password']);
	$query = "select * from admin where name = '{$_POST['name']}' and password = '{$password}'";
	//var_dump($query);
	$num = row_num($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		$query = "select * from admin where name = '{$_POST['name']}' and password = '{$password}'";
		$result = execute($conn, $query);
		$data = mysqli_fetch_assoc($result);
		setcookie('admin[id]', $data['id']);
        setcookie('admin[name]', $data['name']);
        setcookie('admin[password]', $data['password']);
		echo "<script>alert('登录成功！');window.location.href ='index.php';</script>";
	}else{
		echo "<script>alert('登录失败！');window.location.href ='login.php';</script>";
	}
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

<title><?php echo SITE_NAME.' - '.$title?></title>

<!-- Bootstrap core CSS -->
<link href="<?php echo PUBLIC_RES ?>/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo PUBLIC_RES ?>/css/admin/signin.css" rel="stylesheet">

   
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
  
  <div class="container" style='margin-top:150px'>

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">请登陆</h2>
        <label for="inputEmail" class="sr-only">用户名</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="用户名" required autofocus name='name'>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密码" required name='password'>
        <button name='submit' class="btn  btn-success btn-block" type="submit">登录</button>
      </form>

    </div> <!-- /container -->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <?php 
//include_once '../common/bottom.php';
?>