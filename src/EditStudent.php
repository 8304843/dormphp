<?php
	require ("../conn.php");
	header("Access-Control-Allow-Origin: *");
	// 允许任意域名发起的跨域请求
	$ret_data = '';
	$ret_data["success"] = 'success';
	$name = isset($_POST["name"])?$_POST["name"] : '';
	$xuehao = isset($_POST["xuehao"])?$_POST["xuehao"] : '';
	$college = isset($_POST["college"])?$_POST["college"] : '';
	$dorm = isset($_POST["dorm"])?$_POST["dorm"] : '';
	$id = isset($_POST["id"])?$_POST["id"] : '';
	$classmate = isset($_POST["classmate"])?$_POST["classmate"] : '';	
//	$sql = "SELECT 考生号 FROM 学生信息 where 考生号='".$num."'and id!='".$id."' order by id ASC";
//	$res = $conn -> query($sql);
//	if ($res -> num_rows ==1) {
////		echo '人员已存在';
//		$ret_data["states"] = '已存在';//即考生号不唯一
//	}else{
//		$sqli = "UPDATE 学生信息 SET 姓名='$name',省份='$province',考生号='$num',性别='$sex',身份证号='$message',二级学院='$xueyuan',宿舍号='$dorm',录取专业='$zy',邮寄地址='$address',邮政编码='$code',联系电话='$phone' ,收件人='$receive' ,投档成绩='$result',缴费情况='$payment',registe='$registe',classmate='$classmate'  where id = '".$id."' ";
//		$result = $conn -> query($sqli);
//	}
$sqli = "UPDATE mj_students SET name='$name',college='$college',dorm='$dorm',xuehao='$xuehao',classmate='$classmate'  where id = '".$id."' ";
		$result = $conn -> query($sqli);
	
	$conn -> close();
	$json = json_encode($ret_data);
	echo $json;
?>