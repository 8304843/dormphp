<?php
	header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
	require("../../../conn.php");
	$flag = isset($_POST["flag"])?$_POST["flag"]:'';
	$account = isset($_POST["account"])?$_POST["account"]:'';
	$password = isset($_POST["password"])?$_POST["password"]:'';
	if(1){
		$sql = "SELECT * FROM tb_user WHERE account = '$account' ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($password==$row["password"])	{
			$data['status']='success';
			$data['department'] = $row['department'];
		}else{
			$data='error';
		}
		
	}
	$json = json_encode($data);
	echo $json;
	$conn->close();	
?>