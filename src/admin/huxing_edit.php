<?php
include_once 'top.php';
include_once '../common/mysql.php';
$conn = connect();
  if (isset($_POST['submit'])){
  	//var_dump(mb_strlen($_POST['areaname']));
  		if (mb_strlen($_POST['h_type_name'])==0){
  			header ( "Location:huxing_list.php" );
  			return false;
  		}
  		$query = "update  h_type set h_type_name=\"{$_POST['h_type_name']}\" , porder = '{$_POST['porder']}' where id = {$_GET['id']}";
  			$result = execute($conn, $query);//echo($query);exit();
	if (mysqli_affected_rows($conn)==1){
		
  			echo "地区编辑成功！";
		header ( "Location:huxing_list.php" );
  		}else{
  			  			echo "地区编辑失败！";
		header ( "Location:huxing_list.php" );
  		}
  }
  
  ?>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!--  <h1 class="page-header">Dashboard</h1> -->


          <h2 class="sub-header">编辑户型</h2>
				
				
				<?php 
				$query  = "select * from h_type where id={$_GET['id']}";
				$result = execute($conn, $query);
				$data = mysqli_fetch_assoc($result);
				
				?>
				<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">户型</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="h_type_name" value="<?php echo $data['h_type_name'] ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">户型</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="porder" value="<?php echo $data['porder'] ?>">
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
  
  
