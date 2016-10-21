<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<?php
include_once '../common/mysql.php';
$conn = connect();

if (isset($_GET['id'])){
	$query = "delete from user where id={$_GET['id']}";
	$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		echo "<script>alert('删除用户成功！')</script>";
		header("Location:user_list.php");
	}
	else{
		echo "删除用户失败！";
		header("Location:user_list.php");
	}
}
?>
</body>
</html>
