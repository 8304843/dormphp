<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$time=date("Y-m-d h:i:sa");
	$ret_data["success"] = 'success';
	$number = isset($_POST["number"])?$_POST["number"] : '';
	$password = isset($_POST["password"])?$_POST["password"] : '';
	
	$sql = "SELECT account FROM cw_ge_students where number ='".$number."'";
	$res = $conn -> query($sql);
	if ($res -> num_rows >0) {
		$sql = "UPDATE cw_ge_students SET account='$number',password='$password'  where number = '".$number."' ";
		$res = $conn->query($sql);
		echo "账号密码已存入";
	}
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>
