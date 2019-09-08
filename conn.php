<?php	
    header("Access-Control-Allow-Origin:*");
//连接数据库
	$servername = "192.168.0.133:3306";
	$username = "admin";
	$password = "123456";
	$dbname = "mj_dorm";	
	$conn = new mysqli($servername, $username, $password, $dbname);	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
//		echo "Connected successfully"; 
	}	
?> 