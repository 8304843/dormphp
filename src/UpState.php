<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$username = isset($_POST["username"])?$_POST["username"] : '';
	$state = isset($_POST["state"])?$_POST["state"] : '';
	$sql = "UPDATE mj_user SET state='$state'  where account = '".$username."' ";
	$res = $conn->query($sql);
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>
