<?php
require("../../conn.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$account=$_POST['account'];
$password=$_POST['password'];
$sql = "select * from cw_students_info where account='".$account."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($password==$row["password"])	{
		$jsonresult='success';
   		$phone=$row["phone"];
//		$my_name=$row["username"];
//		$uid=$row["id"];
//		$unit=$row["department"];
	}else{
		$jsonresult='error'; 
	}	
	$json = '{"result":"'.$jsonresult.'",
			  "phone":"'.$phone.'",
			  "account":"'.$account.'",
			  "mima":"'.$password.'"
			}';
	echo $json;
	$conn->close();
?>