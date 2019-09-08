<?php
require ("../conn.php");
header("Access-Control-Allow-Origin: *");
// 允许任意域名发起的跨域请求
$ret_data = '';
$time = date("Y-m-d h:i:sa");
//$flag = isset($_POST["flag"]) ? $_POST["flag"] : '';

$sql = "SELECT * FROM mj_students order by id DESC";
$res = $conn -> query($sql);
if ($res -> num_rows > 0) {
	$i = 0;
	while ($row = $res -> fetch_assoc()) {
		$ret_data["data"][$i]["id"] = $row["id"];
		$ret_data["data"][$i]["name"] = $row["name"];
		$ret_data["data"][$i]["xuehao"] = $row["xuehao"];
		$ret_data["data"][$i]["college"] = $row["college"];
		$ret_data["data"][$i]["classmate"] = $row["classmate"];
		$ret_data["data"][$i]["dorm"] = $row["dorm"];
		$ret_data["data"][$i]["lead_time"] = $row["lead_time"];
		$i++;
	}
	$ret_data["success"] = 'success';
}
$conn -> close();
$json = json_encode($ret_data);
echo $json;
?>