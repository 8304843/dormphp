<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$account = isset($_POST["account"])?$_POST["account"] : '';
	
	$sql = "SELECT * FROM cw_ge_students where number='".$account."'";
	$res = $conn->query($sql);
	if ($res -> num_rows > 0) {
		while($row = $res -> fetch_assoc()){
			$ret_data["data"]["state"] = $row["state"];
			$ret_data["data"]["cardId"] = $row["cardId"];
			$ret_data["data"]["account"] = $row["account"];
		}
		$ret_data["success"] = 'success';
	}
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>
