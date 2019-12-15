<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$time=date("Y-m-d h:i:sa");
	$ret_data["success"] = 'success';
	$username = isset($_POST["username"])?$_POST["username"] : '';
	$number = isset($_POST["number"])?$_POST["number"] : '';
	$class = isset($_POST["class"])?$_POST["class"] : '';
	$college = isset($_POST["college"])?$_POST["college"] : '';
	$dorm = isset($_POST["dorm"])?$_POST["dorm"] : '';
	$state = isset($_POST["state"])?$_POST["state"] : '';
	
	$sql = "SELECT * FROM Person_Info where account = '".$username."'";
	$res = $conn -> query($sql);
	if ($res -> num_rows > 0) {
//		$sql = "UPDATE mj_user SET state='$state'  where account = '".$username."' ";
//		$res = $conn->query($sql);
		$sqli = "INSERT INTO Person_Info(username,lead_time) VALUES('$username','$time')";
		$result = $conn->query($sqli);
	}

	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>
