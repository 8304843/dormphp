<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$time = date("Y-m-d h:i:sa");
	$flag = isset($_POST["flag"])?$_POST["flag"] : '';
	$startTime = isset($_POST["startTime"])?$_POST["startTime"] : '';
	$lastTime = isset($_POST["lastTime"])?$_POST["lastTime"] : '';
	if($flag=='show')
	{
		//显示页面
		$sql = "SELECT cardId,number,college,rge_time,account,sex,email,phone,natives,major,natives,FACE_URL,username, left(from_unixtime(left(CREATE_TIME,10)),19) a_time, 	dorm_floor,dorm_num,class
		    FROM `cw_record_late` 
		    WHERE
			DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '$startTime' AND '24:00:00'
			or
			DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '00:00:00' AND '$lastTime'";
	}else{
		//查看详情
		$name = isset($_POST["name"])?$_POST["name"] : '';
		$sql = "SELECT cardId,number,college,rge_time,account,sex,email,phone,natives,major,natives,FACE_URL,username, left(from_unixtime(left(CREATE_TIME,10)),19) a_time,dorm_floor,dorm_num,class
		    FROM `cw_record_late` a
		    WHERE username='$name' 
		    and
			(DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '$startTime' AND '24:00:00'
			or
			DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '00:00:00' AND '$lastTime') ";
	}
	$res = $conn -> query($sql);
		if ($res -> num_rows > 0) {
			$i = 0;
			while ($row = $res -> fetch_assoc()) {
				$ret_data["data"][$i]["username"] = $row["username"];
				$ret_data["data"][$i]["dorm_floor"] = $row["dorm_floor"];
				$ret_data["data"][$i]["backtime"] = $row["a_time"];
				$ret_data["data"][$i]["dorm_num"] = $row["dorm_num"];
				$ret_data["data"][$i]["class"] = $row["class"];
				$ret_data["data"][$i]["cardId"] = $row["cardId"];
				$ret_data["data"][$i]["number"] = $row["number"];
				$ret_data["data"][$i]["college"] = $row["college"];
				$ret_data["data"][$i]["rge_time"] = $row["rge_time"];
				$ret_data["data"][$i]["account"] = $row["account"];
				$ret_data["data"][$i]["sex"] = $row["sex"];
				$ret_data["data"][$i]["email"] = $row["email"];
				$ret_data["data"][$i]["phone"] = $row["phone"];
				$ret_data["data"][$i]["major"] = $row["major"];
				$ret_data["data"][$i]["natives"] = $row["natives"];
				$ret_data["data"][$i]["FACE_URL"] = $row["FACE_URL"];
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