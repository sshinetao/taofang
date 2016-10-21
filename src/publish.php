<?php
$title = '添加';
include_once 'common/header.php';
include_once 'common/mysql.php';
$conn = connect ();
if (isset ( $_POST ['submit'] )) {
	$file_save_path = '';
	//var_dump ( $_POST );
	if (mb_strlen ( $_POST ['name'] ) == 0) {
		echo "<script>alert('房源名称必填！');window.location.href ='publish.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['price'] ) == 0) {
		echo "<script>alert('价钱必填！');window.location.href ='publish.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['huxing'] ) == 0) {
		echo "<script>alert('户型必填！');window.location.href ='publish.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['diqu'] ) == 0) {
		echo "<script>alert('地区必填！');window.location.href ='publish.php';</script>";
		return false;
	}
	
	if (mb_strlen ( $_POST ['container'] ) == 0) {
		echo "<script>alert('内容必填！');window.location.href ='publish.php';</script>";
		return false;
	}
	
	if (is_uploaded_file ( $_FILES ['zhaopian'] ['tmp_name'] )) {
		$file = pathinfo ( $_FILES ['zhaopian'] ['name'] );
		$file_save_path = '../uploads/xiangqing/' . date ( 'YmdHis', time () ) . rand ( 1000, 9999 ) . '.' . $file ['extension'];
		move_uploaded_file ( $_FILES ['zhaopian'] ['tmp_name'], $file_save_path );
		$file_save_path = $file_save_path;
	}
	
	
	
	$query = "insert into resource
			(
				name,type_id,user_id,area_id,h_type_id,image,info,publish_time,price,is_canuse
			)
			values
			(
			'{$_POST['name']}',	
			1,	
			'{$_COOKIE['user']['id']}',	
			'{$_POST['diqu']}',	
			'{$_POST['huxing']}',	
			'{$file_save_path}',	
			'{$_POST['container']}',	
			now(),	
			'{$_POST['price']}',		
			'1' )";
	//var_dump($query);
	$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		echo "<script>alert('发布成功！');window.location.href ='index.php';</script>";
	}else{
		echo "<script>alert('发布失败！');window.location.href ='publish.php';</script>";
	}
	
	
}

?>

<div class="container" style="margin-top: -50px; padding-bottom: 10px">
	<form class=" ">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group input-group-lg">
					<input type="text" class="form-control" placeholder="输入关键词"> <span
						class="input-group-btn">
						<button class="btn btn-danger" type="button">搜索一下</button>
					</span>
				</div>
			</div>
		</div>
	</form>

	<div style="border: 0px solid #000; padding-top: 10px">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">发布房屋信息</a></li>
		</ol>
	</div>




	<form class="form-horizontal" method="post"
		enctype="multipart/form-data">
		<div id="legend" class="">
			<legend>发布房屋信息</legend>
		</div>
				<div class="form-group ">
			<label class="col-sm-2 control-label" for="formGroupInputLarge">价格</label>
			<div class="col-sm-6">
				<input class="form-control" type="text" name='name'>
			</div>
		</div>
		<div class="form-group ">
			<label class="col-sm-2 control-label" for="formGroupInputLarge">地区</label>
			<div class="col-sm-6">
				<select class="form-control" name='diqu'>
				<?php
				$query = "select * from area";
				$result = execute ( $conn, $query );
				while ( $data = mysqli_fetch_assoc ( $result ) ) {
					?>		
					<option value=<?php echo $data['id'] ?>><?php echo $data['area_name']?></option>
				<?php
				}
				?>						
				</select>
			</div>
		</div>
		<div class="form-group ">
			<label class="col-sm-2 control-label" for="formGroupInputLarge">户型</label>
			<div class="col-sm-6">
				<select class="form-control" name='huxing'>
								<?php
								$query = "select * from h_type";
								$result = execute ( $conn, $query );
								while ( $data = mysqli_fetch_assoc ( $result ) ) {
									?>	
					<option value=<?php echo $data['id'] ?>><?php echo $data['h_type_name']?></option>

 <?php
								}
								?>		
				</select>
			</div>
		</div>



		<div class="form-group ">
			<label class="col-sm-2 control-label" for="formGroupInputLarge">价格</label>
			<div class="col-sm-6 form-inline">
				<input class="form-control" type="number" name='price'> 元
			</div>
		</div>

		<div class="form-group ">
			<label class="col-sm-2 control-label" for="formG1roupInputLarge">照片</label>
			<div class="col-sm-6">
				<input type="file"  class="form-control" name='zhaopian' />
			</div>
		</div>

		<div class="form-group ">
			<label class="col-sm-2 control-label" for="formGroupInputLarge">详情</label>
			<div class="col-sm-6">
				<textarea  name="container"  class="form-control" rows="15"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button name='submit' type="submit" class="btn btn-default">发布</button>
			</div>
		</div>

	</form>

</div>





















<?php
include_once 'common/bottom.php';
?>
