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
						<button class="btn btn-danger btn-sm" type="button">搜索一下</button>
					</span>
				</div>
			</div>
		</div>
	</form>

	<div style="border: 0px solid #000; padding-top: 10px">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">二手房</a></li>
		</ol>
	</div>

<?php 
$query = "SELECT
a.id AS id,
a.`name` AS fangyuan,
a.image AS tupian,
a.info AS xiangqing,
a.publish_time AS shijian,
a.price AS jiage,
b.`name` AS fabuzhe,
b.cellphone AS shouji,
c.h_type_name AS huxing,
area.area_name AS diqu,
b.touxiang AS touxiang
FROM
resource AS a
INNER JOIN `user` AS b ON a.user_id = b.id
INNER JOIN h_type AS c ON a.h_type_id = c.id
INNER JOIN area ON a.area_id = area.id
WHERE
a.id = {$_GET['id']}";
$result = execute($conn, $query);
$data = mysqli_fetch_assoc($result);


?>
	<div class="row">
		<div class="col-lg-4">


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img style="height: 200px" src="<?php echo $data['tupian']?>" alt="...">
      <div class="carousel-caption">
      		
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	
						
						
						
						
						
						
						
						
						
		</div>
		<div class="col-lg-4 "
			style="padding-left: -40px; border: 1px solid #000；">
			<!-- <dl class="dl-horizontal">
				<dt>lists</dt>
				<dd>A description list is perfect for defining terms.</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>lists</dt>
				<dd>A description list is perfect for defining terms.</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>lists</dt>
				<dd>A description list is perfect for defining terms.</dd>
			</dl> -->
			<ul>
			<br>
				<li class="list-unstyled"><strong>发布时间：</strong> <?php echo $data['shijian']?></li>
				<br>
				<li class="list-unstyled"><strong>区域：</strong> <?php echo $data['diqu']?></li>
				<br>
				<li class="list-unstyled"><strong>户型：</strong> <?php echo $data['huxing']?></li>
				<br>
				<li class="list-unstyled"><strong>价格：</strong> <?php echo $data['jiage']?> 元 </li>
				<br>
				
				
			
				

			</ul>

		</div>

		<div class="col-lg-4 text-center">
				
			<img
				src="<?php echo $data['touxiang']?> "
				alt="..." class="img-circle">
				
				
			<ul>
				<li class="list-unstyled"><strong>  姓名：</strong> <?php echo $data['fabuzhe']?></li>
			</ul>

				
		</div>
		<!-- /.col-lg-6 -->
	</div> <!-- /.row -->
	
	<br />


<div class="panel panel-success">
  <div class="panel-heading">
    详情：
  </div>
  <div class="panel-body">
    <?php echo $data['xiangqing']?>
  </div>
</div>

<?php 
$query = "select count(*) from resource_reply where resource_id={$_GET['id']}";

$count = row_num($conn, $query);
//var_dump($count);
$page_size =5;
$page = page($count, $page_size);
$query = "SELECT
a.reply_time AS time,
a.content AS content,
b.`name` AS `name`
FROM
resource_reply AS a
INNER JOIN `user` AS b ON a.uesr_di = b.id
INNER JOIN resource AS c ON c.user_id = b.id AND a.resource_id = c.id WHERE
a.resource_id = {$_GET['id']} order by a.reply_time desc  {$page['limit']}";
$result = execute($conn, $query);
while ($data = mysqli_fetch_assoc($result)){
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $data['name']?> ： <small><?php echo $data['time'] ?></small></h3>
  </div>
  <div class="panel-body">
    <?php echo $data['content']?>
  </div>
</div>
<?php 
}
?>

<!-- fenye -->

<nav class="text-center">
  <ul class="pagination">
    <?php echo $page['html']?>
  </ul>
</nav>





<?php
if (isset($_POST['submit'])){
	if (mb_strlen($_POST['content'])==0){
		return false;
	}	
	$query = "insert into resource_reply 
		(uesr_di,resource_id,reply_time,content)
		values
		({$_COOKIE['user']['id']},{$_GET['id']},now(),'{$_POST['content']}')";
	$result = execute($conn, $query);
	if (mysqli_affected_rows($conn)==1){
		echo "<script>alert('回复成功！！');window.location.href ='info.php?id={$_GET['id']}';</script>";
	}
} ?>

<!--fenye  -->
<form method="post">
<div class="form-group">
    <label for="exampleInputEmail1">评论</label>
   <textarea name="content"  class="form-control" rows="3"></textarea>
  </div>


  <button name="submit" type="submit" class="btn btn-default">说点什么</button>
</form>

</div>
<?php include_once 'common/bottom.php';?>