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
	$query = "delete from h_type where id={$_GET['id']}";
	$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		echo "删除户型成功！";
		header("Location:huxing_list.php");
	}
	else{
		echo "删除户型失败！";
		header("Location:huxing_list.php");
	}
}