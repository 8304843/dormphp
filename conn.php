<?php	
    header("Access-Control-Allow-Origin:*");
//连接数据库
	$servername = "192.168.0.167:3306";
	$username = "root";
	$password = "asdf1@34";
	$dbname = "dfr";	
	$conn = new mysqli($servername, $username, $password, $dbname);	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
//		echo "Connected successfully"; 
	}	
?> 