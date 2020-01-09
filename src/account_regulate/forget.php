<?php
	require("../../conn.php");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers:Content-Type,Access-Token");
	$phone = $_POST["phone"];
	$sql1 = "select * from mj_user  where phone='".$phone."'";
	$result = $conn->query($sql1);
	if($result->num_rows >0){
		$row = $result->fetch_assoc();
		$account = $row['account'];
		$password = $row['password'];
		$jsonresult = "success";
	}else{
		$jsonresult = "error";
		$account = '';
		$password = '';
	}
	$json = '{"result":"'.$jsonresult.'",
			  "account":"'.$account.'",
			  "password":"'.$password.'"
			}';
	echo $json;
	$conn->close();
?>