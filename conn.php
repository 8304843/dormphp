<?php	
    header("Access-Control-Allow-Origin:*");
	//连接数据库
//	$servername = "192.168.0.167:3306";
//	$username = "root";
//	$password = "asdf1@34";
//	$dbname = "dfr";	

	$servername = "localhost:3306";
	$username = "admin";
	$password = "123456";
	$dbname = "txzlgl";
	$conn = new mysqli($servername, $username, $password, $dbname);	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		// echo "Connected successfully";
	}	
//	$api="http://192.168.0.167:8280";//服务器ip:port
//	print_result();
//	function print_result(){
//		global $api;
//	}
?> 