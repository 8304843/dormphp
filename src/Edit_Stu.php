<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$ret_data["success"] = 'success';
	$username = isset($_POST["username"])?$_POST["username"] : '';
	$number =isset($_POST["number"])?$_POST["number"] : '';
	$class = isset($_POST["class"])?$_POST["class"] : '';
	$major = isset($_POST["major"])?$_POST["major"] : '';
	$college = isset($_POST["college"])?$_POST["college"] : '';
	$cardId =isset($_POST["cardId"])?$_POST["cardId"] : '';
	$dorm_floor = isset($_POST["dorm_floor"])?$_POST["dorm_floor"] : '';
	$dorm_num = isset($_POST["dorm_num"])?$_POST["dorm_num"] : '';
	$phone = isset($_POST["phone"])?$_POST["phone"] : '';
	$email = isset($_POST["email"])?$_POST["email"] : '';
	$natives = isset($_POST["natives"])?$_POST["natives"] : '';
	$sex = isset($_POST["sex"])?$_POST["sex"] : '';
	$rge_time = isset($_POST["rge_time"])?$_POST["rge_time"] : '';	
	
	$sql = "SELECT * FROM cw_ge_students where number='".$number."' and cardId!='".$cardId."'";
	$res = $conn -> query($sql);
//	echo $res -> num_rows;
	if ($res -> num_rows ==0) {
		//更新数据
		$sqli = "UPDATE cw_ge_students SET username='$username',natives='$natives',sex='$sex',college='$college',dorm_num='$dorm_num',dorm_floor='$dorm_floor',major='$major',phone='$phone',email='$email',class='$class', number = '$number' where cardId ='".$cardId."' ";
		$result = $conn -> query($sqli);
		$sql = "SELECT * FROM cw_students_info where cardId ='".$cardId."' ";
		$result_Sel = $conn->query($sql)->fetch_assoc();
		$GROUP_ID= $result_Sel['GROUP_ID'];
		$FACE_ID= $result_Sel['FACE_ID'];//获取人脸id
		$ret_data["groupId"]=$GROUP_ID;
		$ret_data["faceId"]=$FACE_ID;
	}else{
		//学号已存在
		$ret_data["states"] = '已存在';//即考生号不唯一
	}
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>