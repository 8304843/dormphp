<?php
require ("../conn.php");
header("Access-Control-Allow-Origin: *");
// 允许任意域名发起的跨域请求
$ret_data = '';
$time = date("Y-m-d h:i:sa");
$flag = isset($_POST["flag"]) ? $_POST["flag"] : '';
$sql = "SELECT * FROM cw_students_info where number='".$flag."' order by create_time DESC";
$res = $conn -> query($sql);
if ($res -> num_rows > 0) {
	$i = 0;
	while ($row = $res -> fetch_assoc()) {
		$ret_data["data"][$i]["username"] = $row["username"];
		$ret_data["data"][$i]["number"] = $row["number"];
		$ret_data["data"][$i]["college"] = $row["college"];
		$ret_data["data"][$i]["class"] = $row["class"];
		$ret_data["data"][$i]["dorm_num"] = $row["dorm_num"];
		$ret_data["data"][$i]["dorm_floor"] = $row["dorm_floor"];
		$ret_data["data"][$i]["phone"] = $row["phone"];
		$ret_data["data"][$i]["major"] = $row["major"];
		$ret_data["data"][$i]["sex"] = $row["sex"];
		$ret_data["data"][$i]["cardId"] = $row["cardId"];
		$ret_data["data"][$i]["rge_time"] = $row["rge_time"];
		$ret_data["data"][$i]["natives"] = $row["natives"];
		$ret_data["data"][$i]["email"] = $row["email"];
		$ret_data["data"][$i]["FACE_URL"] = $row["FACE_URL"];
		$i++;
	}
	$ret_data["success"] = 'success';
}
$conn -> close();
$json = json_encode($ret_data);
echo $json;

?>