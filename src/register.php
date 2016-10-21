<?php
$title = '添加';

include_once 'common/header.php';
include_once 'common/mysql.php';
include_once 'common/tool.class.php';
$conn = connect ();
$getIp = getIP ();
if (isset ( $_POST ['submit'] )) {
	if (mb_strlen ( $_POST ['email'] ) == 0) {
		echo "<script>alert('邮箱必填！');window.location.href ='register.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['cellphone'] ) != 11) {
		echo "<script>alert('手机号格式错误！');window.location.href ='register.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['name'] ) < 5) {
		echo "<script>alert('用户名不能小于5位！');window.location.href ='register.php';</script>";
		return false;
	}
	if (mb_strlen ( $_POST ['password'] ) < 5) {
		echo "<script>alert('密码不能小于5位！');window.location.href ='register.php';</script>";
		return false;
	}
	
	$_POST = new_html_special_chars ( $_POST );
	// var_dump($_POST);exit();
	// 头像上传
	if (is_uploaded_file ( $_FILES ['touxiang'] ['tmp_name'] )) {
		$file = pathinfo ( $_FILES ['touxiang'] ['name'] );
		$file_save_path = '../uploads/touxiang/' . date ( 'YmdHis', time () ) . rand ( 1000, 9999 ) . '.' . $file ['extension'];
		move_uploaded_file ( $_FILES ['touxiang'] ['tmp_name'], $file_save_path );
	}
	
	$query = "select * from user where email = '{$_POST['email']}'";
	if (row_num ( $conn, $query ) == 1) {
		echo "<script>alert('用户名已经存在！');window.location.href ='register.php';</script>";
		return FALSE;
	}
	
	$query = "insert into user (name,password,reg_time ,loal_ip,touxiang,email,birthday,cellphone   ) 
		
		values('{$_POST['name']}', md5('{$_POST['password']}'),now(), '{$getIp}','{$file_save_path}','{$_POST['email']}', '{$_POST['brithday']}', '{$_POST['cellphone']}' )";
	$result = execute ( $conn, $query );
	if (mysqli_affected_rows ( $conn ) == 1) {
		echo "ok";
	} else {
		echo "注册失败！";
	}
}

?>
<div class="container" style="margin-top: -50px; padding-bottom: 10px">


	<div style="border: 0px solid #000; padding-top: 10px">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">注册</a></li>
		</ol>
	</div>



	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form id="regform" class="form-horizontal" method="post"
				enctype="multipart/form-data">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name='name' id='name'
							placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">邮件</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3"
							name='email' placeholder="电子邮件">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">密码</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3"
							name='password' placeholder="密码">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPassword"
							name='cellphone' placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">生日</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="inputPassword3"
							name='brithday' placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">头像</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="inputPassword3"
							name='touxiang'>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button name='submit' type="submit" class="btn btn-success  ">注 册</button>
					</div>
				</div>
			</form>
		</div>
	</div>























</div>
<?php
include_once 'common/bottom.php';

