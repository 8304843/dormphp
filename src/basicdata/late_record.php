<?php
require('../../conn.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$flag=$_POST['flag'];
$username=$_POST['username'];
$startTime = isset($_POST["startTime"])?$_POST["startTime"] : '';
$lastTime = isset($_POST["lastTime"])?$_POST["lastTime"] : '';
$i=0;
 if($flag=='laterecord'){
	$sql="SELECT  sex,dorm_floor,dorm_num,left(from_unixtime(left(CREATE_TIME,10)),19) CREATE_TIME FROM `cw_record_late` where username='$username' and
	(DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '$startTime' AND '24:00:00'
	or
		DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '00:00:00' AND '06:30:00')";
	$result=$conn->query($sql);
	$data='';
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$data=$data.'{"sex":"'.$row['sex'].'",
						  "dorm_floor":"'.$row['dorm_floor'].'",
						  "dorm_num":"'.$row['dorm_num'].'",
					  "CREATE_TIME":"'.$row['CREATE_TIME'].'"}'.',';
		}
		$jsonResult='success';
	}else{
		$jsonResult='error';
	}
	$jsonResult='{"result":"'.$jsonResult.'"}';
	$json=$data.$jsonResult;
	$data='[
		'.$json.'
	]';
	echo $data;
}
?>