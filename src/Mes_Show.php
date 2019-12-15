<?php
require ("../conn.php");
header("Access-Control-Allow-Origin: *");
// 允许任意域名发起的跨域请求
$ret_data = '';
$time = date("Y-m-d h:i:sa");
//$flag = isset($_POST["flag"]) ? $_POST["flag"] : '';

$sql = "SELECT * FROM cw_ge_students order by id DESC";
$res = $conn -> query($sql);
if ($res -> num_rows > 0) {
	$i = 0;
	while ($row = $res -> fetch_assoc()) {
		$ret_data["data"][$i]["id"] = $row["id"];
		$ret_data["data"][$i]["username"] = $row["username"];
		$ret_data["data"][$i]["number"] = $row["number"];
		$ret_data["data"][$i]["college"] = $row["college"];
		$ret_data["data"][$i]["class"] = $row["class"];
		$ret_data["data"][$i]["dorm_num"] = $row["dorm_num"];
		$ret_data["data"][$i]["rge_time"] = $row["rge_time"];
		$i++;
	}
	$ret_data["success"] = 'success';
}
$conn -> close();
$json = json_encode($ret_data);
echo $json;
?>