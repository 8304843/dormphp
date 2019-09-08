<?php
	require("../conn.php");
	header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
	$ret_data = '';
	$time=date("Y-m-d h:i:sa");
	$ret_data["success"] = 'success';
	$name = isset($_POST["name"])?$_POST["name"] : '';
	$xuehao = isset($_POST["xuehao"])?$_POST["xuehao"] : '';
	$dorm = isset($_POST["dorm"])?$_POST["dorm"] : '';
	$classmate = isset($_POST["classmate"])?$_POST["classmate"] : '';
	$college = isset($_POST["college"])?$_POST["college"] : '';
	
	 $time=date("Y-m-d h:i:sa");
//	$sql = "SELECT 考生号 FROM 学生信息 where 考生号='".$num."' order by id ASC";
//	$res = $conn -> query($sql);
//	if ($res -> num_rows > 0) {
////		echo '人员已存在';
//		$ret_data["states"] = '已存在';
//	}else{
//		$sqli = "INSERT INTO 学生信息 (姓名,省份,考生号,性别,身份证号,二级学院,宿舍号,录取专业,邮寄地址,邮政编码,联系电话,收件人,投档成绩,缴费情况,录入时间,photo,state,Photo_Base64,registe,classmate) VALUES ('$name','$province','$num','$sex','$message','$xueyuan','$dorm','$zy','$address','$code','$phone','$receive','$result','$payment','$time','$filenames','$state','$Base64','$registe','$classmate')";
//		$result = $conn->query($sqli);
//	}
			$sqli = "INSERT INTO 		mj_students(name,xuehao,college,classmate,dorm,lead_time) VALUES('$name','$xuehao','$college','$classmate','$dorm','$time')";
		$result = $conn->query($sqli);
		
    $conn->close();
	$json=json_encode($ret_data); 
	echo $json
?>