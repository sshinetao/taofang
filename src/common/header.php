<?php
//include_once ('common/common.php');
define('PUBLIC_RES', 'http://'.$_SERVER['HTTP_HOST'].'/taofang/resource');
define('SITE_NAME', '淘房网 ');
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
<link href="<?php echo PUBLIC_RES ?>/css/jumbotron.css" rel="stylesheet">

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

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php echo SITE_NAME?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <li><a href="fenlei.php">房源信息 <span class="sr-only">(current)</span></a></li>
       <!--  <li><a href="#">Link</a></li> -->
        
          </ul>
          
          <?php if(isset($_COOKIE['user']['id'])){
          		?>
              <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">你好！<?php echo $_COOKIE['user']['name'];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="user_center.php">个人中心</a></li>
              <li><a href="user_info.php">我的发布</a></li>
            <li><a href="publish.php">发布信息</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">注销登录</a></li>
          </ul>
        </li>
      </ul>
         <?php 
          }else{ 
          ?>
          <form class="navbar-form navbar-right" method="post" action='login.php'>
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name='email'>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name='password'>
            </div>
            <button name='submit' type="submit" class="btn btn-success">登录</button>
          </form>
          	
          	<?php          	
          }?>

          
          
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>