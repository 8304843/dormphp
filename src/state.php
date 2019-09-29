<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$username = isset($_POST["username"])?$_POST["username"] : '';
	
	$sql = "SELECT state FROM mj_user where account='".$username."'";
	$res = $conn->query($sql);
	if ($res -> num_rows > 0) {
		while($row = $res -> fetch_assoc()){
			$ret_data["data"]["state"] = $row["state"];
		}
		$ret_data["success"] = 'success';
	}
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>
