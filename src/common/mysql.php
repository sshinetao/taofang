<?php

// 数据库连接
function connect($host = 'localhost', $user = 'root', $password = '', $database = 'taofang', $port = '3306') {
	$conn = @mysqli_connect ( $host, $user, $password, $database, $port );
	if (mysqli_connect_errno ( $conn )) {
		exit ( mysqli_connect_error ( $conn ) );
	}
	mysqli_set_charset ( $conn, 'UTF8' );
	return $conn;
}


// 执行一条sql语句，返回结果集对象或者布尔值
function execute($conn, $query) {
	$result = mysqli_query ( $conn, $query );
	if (mysqli_errno ( $conn )) {
		exit ( mysqli_error ( $conn ) );
	}
	return $result;
}


// 获取记录数
function row_num($conn, $sql_count) {
	$result = execute ( $conn, $sql_count );
	$count = mysqli_fetch_row ( $result );
	return $count [0];
}


// 关闭数据库连接
function close($conn) {
	mysqli_close ( $conn );
}



