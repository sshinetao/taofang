<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php
include_once '../common/mysql.php';
$conn = connect();

if (isset($_GET['id'])){
	$query = "delete from area where id={$_GET['id']}";
	$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		echo "<script>alert('删除户型成功！')</script>";
		header("Location:diqu_list.php");
	}
	else{
		echo "删除户型失败！";
		header("Location:diqu_list.php");
	}
}