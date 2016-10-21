<?php
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect();
  if (isset($_POST['submit'])){
  	//var_dump(mb_strlen($_POST['areaname']));
  		if (mb_strlen($_POST['areaname'])==0){
  			echo "<script>alert('添加地区失败！！');window.location.href ='duqu_add.php;</script>";
  			return false;
  		}
  		$query = "insert into area (area_name)values('{$_POST['areaname']}')";
  			$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		//var_dump(mysqli_affected_rows($conn));
  			echo "地区添加成功！";
		header ( "Location:diqu_list.php" );
  		}else{
  			  			echo "地区添加失败！";
		header ( "Location:diqu_add.php" );
  		}
  }
  
  ?>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!--  <h1 class="page-header">Dashboard</h1> -->


          <h2 class="sub-header">添加地区</h2>
				
				
				
				<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">地名</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="areaname">
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
  
  
