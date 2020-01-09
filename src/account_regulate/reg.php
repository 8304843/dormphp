<?php
require("../../conn.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$account=$_POST['account'];
$password=$_POST['password'];
$m_name=$_POST['m_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$idStr='';
$sql = "select * from mj_user where account='".$account."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$jsonresult='该账号已被注册了,请更换!';
} else {
	$sql = "select * from mj_user where phone='".$phone."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$jsonresult='该手机已被注册，请更换!';
	} else{
		$sql = "select * from mj_user where email='".$email."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='该邮箱已被注册,请更换!';
		} else{
			$sql = "select * from mj_user where username='".$m_name."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$jsonresult='抱歉!您的姓名已被注册';
			}else{
				$str="//";
				$sqli = "insert into mj_user (account,password,email,phone,username) values ('".$account."', '".$password."', '".$email."', '".$phone."', '".$m_name."')";
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}
	}
}
}
$json = '{"result":"'.$jsonresult.'"		
				}';
	echo $json;
	$conn->close();
?>