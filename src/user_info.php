<?php
$title = '分类';
include_once 'common/header.php';
include_once 'common/mysql.php';
include_once 'common/page.php';
$conn = connect();
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
			<li><a href="index.php">首页</a></li>
			<li><a href="#">个人中心</a></li>
		</ol>

	</div>

	<div class="panel panel-default">
		<div class="panel-body">Basic panel example</div>
	</div>




	<div class="row">
	<?php
	$query = "SELECT count(*)

FROM
resource  where user_id = {$_COOKIE['user']['id']}
		";
	$count = row_num($conn, $query);
	//var_dump($count.'1');
	$page_size =5;
	$page = page($count, $page_size);
	
	
	
	$query = "SELECT

a.`name` AS fangyuan,
b.h_type_name AS huxing,
c.area_name AS diqu,
a.image AS tupian,
a.price AS jiage,
a.id as id
FROM
resource AS a
INNER JOIN h_type AS b ON a.h_type_id = b.id
INNER JOIN area AS c ON a.area_id = c.id where user_id = {$_COOKIE['user']['id']} {$page['limit']}";//$query.;
	
	//var_dump($query);
	$result = execute($conn, $query);
	while ($data = mysqli_fetch_assoc($result)){
	?>
	
	
	
			<div class="col-sm-6 col-md-4">
			<div class="thumbnail" style="width:350; height:180" >
				<a href="info.php?id=<?php echo $data['id'] ?>"><img src="<?php echo $data['tupian']?>"
					alt="<?php echo $data['fangyuan']?>"></a>
				<div class="caption">
					<h3><a href="info.php?id=<?php echo $data['id'] ?>"><?php echo $data['fangyuan']?></a></h3>
					<p>
						<a><strong>地区：</strong> <?php echo $data['diqu']?> </a> <a><strong>价格：</strong> <?php echo $data['jiage']?> 元 </a>
						<a><strong>户型：</strong> <?php echo $data['huxing']?></a>
					</p>
						<p><a style="color:red" href="resource_edit.php?id=<?php echo $data['id']?>">编辑</a></p>
				</div>
			</div>
		</div>
	<?php
	}
	?>	
		
		
		

	</div>
<nav>
  <ul class="pagination">
	<?php 
	echo $page['html'];
	//var_dump( $page);
	?>
  </ul>
</nav>














</div>
<?php 
include_once 'common/bottom.php';
?>
