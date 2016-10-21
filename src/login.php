<?php
$title = '登录';
include_once 'common/header.php';
include_once 'common/mysql.php';
$conn = connect();

if (isset($_POST['submit'])){
	//$_POST = new_html_special_chars($_POST);
	$password = md5($_POST['password']);
	$query = "select * from user where email = '{$_POST['email']}' and password = '{$password}'";
	//var_dump($query);
	$num = row_num($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		$query = "select * from user where email = '{$_POST['email']}' and password = '{$password}'";
		$result = execute($conn, $query);
		$data = mysqli_fetch_assoc($result);
		setcookie('user[id]', $data['id']);
        setcookie('user[name]', $data['name']);
        setcookie('user[password]', $data['password']);
		echo "<script>alert('登录成功！');window.location.href ='index.php';</script>";
	}else{
		echo "<script>alert('登录失败！');window.location.href ='login.php';</script>";
	}
}
?>
<div class="container" style="margin-top: -50px; padding-bottom: 10px">


	<div style="border: 0px solid #000; padding-top: 10px">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">登录</a></li>
		</ol>
	</div>


	
		<div class="row">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name = 'email'>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = 'password'>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name = 'submit' type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
</div></div>























</div>
<?php
include_once 'common/bottom.php';
?>
