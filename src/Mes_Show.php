<?php
require ("../conn.php");
header("Access-Control-Allow-Origin: *");
// 允许任意域名发起的跨域请求
$ret_data = '';
$time = date("Y-m-d h:i:sa");
$flag = isset($_POST["flag"]) ? $_POST["flag"] : '';
$cardId = isset($_POST["cardId"]) ? $_POST["cardId"] : '';
$account = isset($_POST["account"]) ? $_POST["account"] : '';
switch($flag) {
	//获取学生信息
	case 'get_students_info' :
		$sql = "SELECT * FROM cw_students_info order by create_time DESC";
		$res = $conn -> query($sql);
		if ($res -> num_rows > 0) {
			$i = 0;
			while ($row = $res -> fetch_assoc()) {
				$ret_data["data"][$i]["cardId"] = $row["cardId"];
				$ret_data["data"][$i]["username"] = $row["username"];
				$ret_data["data"][$i]["number"] = $row["number"];
				$ret_data["data"][$i]["college"] = $row["college"];
				$ret_data["data"][$i]["class"] = $row["class"];
				$ret_data["data"][$i]["dorm_floor"] = $row["dorm_floor"];
				$ret_data["data"][$i]["dorm_num"] = $row["dorm_num"];
				$ret_data["data"][$i]["rge_time"] = $row["rge_time"];	
				$ret_data["data"][$i]["account"] = $row["account"];
				$ret_data["data"][$i]["password"] = $row["password"];
				$ret_data["data"][$i]["sex"] = $row["sex"];
				$ret_data["data"][$i]["cardId"] = $row["cardId"];
				$ret_data["data"][$i]["major"] = $row["major"];
				$ret_data["data"][$i]["email"] = $row["email"];
				$ret_data["data"][$i]["phone"] = $row["phone"];
				$ret_data["data"][$i]["FACE_URL"] = $row["FACE_URL"];
				$ret_data["data"][$i]["natives"] = $row["natives"];
				$i++;
			}
			$ret_data["success"] = 'success';
		}
		$conn -> close();
		$json = json_encode($ret_data);
		echo $json;
		break;
	//删除学生信息
	case 'delete_info':
		$sql = "SELECT level FROM cw_students_info where account='".$account."' ";
		$result_Sel = $conn->query($sql)->fetch_assoc();
		$ret= $result_Sel['level'];//获取权限等级
		if($ret){
//			从cw_ge_students删除
			$sql = "DELETE  FROM cw_ge_students where cardId='".$cardId."' ";
			$res = $conn -> query($sql);
			//从cw_fa_face删除
			$sqli = "DELETE  FROM cw_fa_face  where CARD_ID='".$cardId."' ";
			$resi = $conn -> query($sqli);
			$ret_data["success"] = 'success';
		}else{
			$ret_data["success"] = 'error';
		}
		$conn -> close();
		$json = json_encode($ret_data);
		echo $json;
		break;
	//编辑学生信息
	case 'edit_info':
		$sql = "SELECT level FROM cw_students_info where account='".$account."' ";
		$result_Sel = $conn->query($sql)->fetch_assoc();
		$ret= $result_Sel['level'];//获取权限等级
		if($ret){
			$ret_data["success"] = 'success';
		}else{
			$ret_data["success"] = 'error';
		}
		$conn -> close();
		$json = json_encode($ret_data);
		echo $json;
		break;
}
?>