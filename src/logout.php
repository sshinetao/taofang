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
if(!isset($_COOKIE['user']['id'])){
	echo "<script>window.location.href ='index.php';</script>";
}
setcookie ( 'user[name]', '', time () - 3600 );
setcookie ( 'user[id]', '' ,time()-3600);
setcookie ( 'user[password]', '' ,time()-3600);
echo "<script>alert('注销成功！');window.location.href ='index.php';</script>";
?>