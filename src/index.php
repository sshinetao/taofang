<?php
$title = '首页';
include_once 'common/header.php';

?>
<?php
if (isset ( $_POST ['submit'] )) {
	//var_dump ( $_POST );
	if (mb_strlen ( $_POST['keywords'] ) != 0) {
		echo "<script>window.location.href ='search.php?keywords={$_POST['keywords']}';</script>";
	}
}
?>
<div class="jumbotron">
	<div class="container">
		<h1 class="text-center" style="margin-top:-50px;background:url('<?php echo PUBLIC_RES ?>/img/logo.png') no-repeat ;background-position:center" class="text-center">&nbsp;</h1>
		<br /> <br />
		<br />
		<div class="row" style="margin-top: -1px">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<img src="" alt="" />
				<form method="post">
					<div class="input-group input-group-lg">
						<input name='keywords' type="text" class="form-control"
							placeholder="输入关键词"> <span class="input-group-btn">
							<button name='submit' type="submit" class="btn btn-success">搜房</button>
						</span>
					</div>
				</form>
				<!-- /input-group -->
			</div>
			<!-- /.col-lg-6 -->
			<div class="col-lg-1"></div>
		</div>
		<!-- /.row -->






	</div>
</div>



<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-3 text-center">
			<h4>
				<b>地图找房</b>
			</h4>
			<p>为您精准定位，位置周边配套设施</p>
			<p>一览无余</p>
		</div>
		<div class="col-md-3 text-center">
			<h4>
				<b>找学区房</b>
			</h4>
			<p>助力您的孩子，跨入希望的起跑线</p>
			<p>直通重点</p>
		</div>
		<div class="col-md-3 text-center">
			<h4>
				<b>房产问答</b>
			</h4>
			<p>买房版十万个为什么，专家来解惑</p>
			<p>有问必答</p>
		</div>
		<div class="col-md-3 text-center">
			<h4>
				<b>淘房理财</b>
			</h4>
			<p>年息7.8%，全程托管+资金安全</p>
			<p>火热抢购</p>
		</div>
	</div>

	<hr>
</div>
<!-- /container -->
<?php
include_once 'common/bottom.php';
?>
