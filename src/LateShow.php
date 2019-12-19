<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$time = date("Y-m-d h:i:sa");
	$startTime = isset($_POST["startTime"])?$_POST["startTime"] : '';
	$lastTime = isset($_POST["lastTime"])?$_POST["lastTime"] : '';
	$sql = "SELECT
		a.username, left(from_unixtime(left(CREATE_TIME,10)),19) a_time, 	a.dorm_floor,dorm_num,class
	    FROM `cw_record_late` a
	    WHERE
		DATE_FORMAT(FROM_UNIXTIME(LEFT(a.CREATE_TIME,10)), '%H:%i:%S') BETWEEN '$startTime' AND '24:00:00'
		or
		DATE_FORMAT(FROM_UNIXTIME(LEFT(a.CREATE_TIME,10)), '%H:%i:%S') BETWEEN '00:00:00' AND '$lastTime'";
	$res = $conn -> query($sql);
	if ($res -> num_rows > 0) {
		$i = 0;
		while ($row = $res -> fetch_assoc()) {
			$ret_data["data"][$i]["name"] = $row["username"];
			$ret_data["data"][$i]["dormfloor"] = $row["dorm_floor"];
			$ret_data["data"][$i]["backtime"] = $row["a_time"];
			$ret_data["data"][$i]["dorm"] = $row["dorm_num"];
			$ret_data["data"][$i]["class"] = $row["class"];
			$i++;
		}
		$ret_data["success"] = 'success';
	}else{
		$ret_data["success"] = 'error';
	}
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>