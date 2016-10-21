<?php
/*
 * author : TAOXIN
 * datetime : 2016年5月3日 下午4:09:43
 */
 class table_count {
	function count_x($table) {
		$conn = connect ();
		$query = "select count(*) from $table";
		$count = row_num ( $conn, $query );
		echo $count;
	}
}