<?php
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect ();
if (isset ( $_POST ['submit'] )) {
	// var_dump(mb_strlen($_POST['areaname']));
	if (mb_strlen ( $_POST ['h_type_name'] ) == 0) {
		echo "<script>alert('添加地区失败！！');window.location.href ='huxing_add.php;</script>";
		return false;
	}
	$query = "insert into h_type (h_type_name,porder)values('{$_POST['h_type_name']}',{$_POST['porder']})";
	$result = execute ( $conn, $query );
	if (mysqli_affected_rows ( $conn ) == 1) {
		// var_dump(mysqli_affected_rows($conn));
		echo "户型添加成功！";
		header ( "Location:huxing_list.php" );
	} else {
		echo "户型添加失败！";
		header ( "Location:huxing_add.php" );
	}
}

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<!--  <h1 class="page-header">Dashboard</h1> -->


	<h2 class="sub-header">添加户型</h2>



	<form class="form-horizontal" method="post">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">户型名称</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputEmail3"
					placeholder="" name="h_type_name">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">排序</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputEmail3"
					placeholder="" name="porder">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button name='submit' type="submit" class="btn btn-default">添加</button>
			</div>
		</div>
	</form>

</div>
</div>
</div>


