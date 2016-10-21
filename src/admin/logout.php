<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>注销</title>
</head>
<body>
	
</body>
</html>
<?php
if(!isset($_COOKIE['admin']['id'])){
	echo "<script>window.location.href ='login.php';</script>";
}
setcookie ( 'admin[name]', '', time () - 3600 );
setcookie ( 'admin[id]', '' ,time()-3600);
setcookie ( 'admin[password]', '' ,time()-3600);
echo "<script>alert('注销成功！');window.location.href ='login.php';</script>";
?>