<?php
function new_html_special_chars($string) {
	if (! is_array ( $string ))
		return htmlspecialchars ( $string );
	foreach ( $string as $key => $val )
		$string [$key] = new_html_special_chars ( $val );
	return $string;
}
// 定义一个函数getIP()
function getIP() {
	global $ip;
	if (getenv ( "HTTP_CLIENT_IP" ))
		$ip = getenv ( "HTTP_CLIENT_IP" );
	else if (getenv ( "HTTP_X_FORWARDED_FOR" ))
		$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
	else if (getenv ( "REMOTE_ADDR" ))
		$ip = getenv ( "REMOTE_ADDR" );
	else
		$ip = "Unknow";
	return $ip;
}