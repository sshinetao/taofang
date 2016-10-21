<?php
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect();
  if (isset($_POST['submit'])){
  	//var_dump(mb_strlen($_POST['areaname']));
  		if (mb_strlen($_POST['areaname'])==0){
  			echo "<script>alert('编辑地区失败！！');window.location.href ='duqu_edit.php;</script>";
  			return false;
  		}
  		$query = "update  area set area_name='{$_POST['areaname']}' where id = {$_GET['id']}";
  			$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		//var_dump(mysqli_affected_rows($conn));
  			echo "地区编辑成功！";
		header ( "Location:diqu_list.php" );
  		}else{
  			  			echo "地区编辑失败！";
		header ( "Location:diqu_edit.php" );
  		}
  }
  
  ?>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!--  <h1 class="page-header">Dashboard</h1> -->


          <h2 class="sub-header">编辑地区</h2>
				
				
				<?php 
				$query  = "select * from area where id={$_GET['id']}";
				$result = execute($conn, $query);
				$data = mysqli_fetch_assoc($result);
				
				?>
				<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">地名</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="areaname" value="<?php echo $data['area_name'] ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name='submit' type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
			
        </div>
      </div>
    </div>
  
  
