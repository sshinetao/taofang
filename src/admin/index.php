<?php
include_once 'top.php';
include_once '../common/mysql.php';
include_once 'table_count.class.php';
$conn = connect ();
$table_count = new table_count ();
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">总览</h1>

	<div class="row placeholders">
		<div class="col-xs-6 col-sm-3 placeholder">

			<h4>房源</h4>
			<span class="text-muted"><?php
			$tablt = 'resource';
			$table_count->count_x ( $tablt );
			
			?></span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">

			<h4>用户</h4>
			<span class="text-muted"><?php
			$tablt = 'user';
			$table_count->count_x ( $tablt );
			
			?></span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">

			<h4>地区</h4>
			<span class="text-muted"><?php
			$tablt = 'area';
			$table_count->count_x ( $tablt );
			
			?></span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">

			<h4>户型</h4>
			<span class="text-muted"><?php
			$tablt = 'h_type';
			$table_count->count_x ( $tablt );
			
			?></span>
		</div>
	</div>


</div>
</div>
</div>


