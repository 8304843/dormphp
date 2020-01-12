<?php
require('../../conn.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$flag=$_POST['flag'];
$class=$_POST['class'];
$i=0;
 if($flag=='latestudent'){
	$sql="SELECT distinct username FROM `cw_record_late` where class='$class' 
and
	(DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '06:30:00' AND '24:00:00'
	or
		DATE_FORMAT(FROM_UNIXTIME(LEFT(CREATE_TIME,10)), '%H:%i:%S') BETWEEN '00:00:00' AND '06:30:00')";
	$result=$conn->query($sql);
	$data='';
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$data=$data.'{"username":"'.$row['username'].'"}'.',';
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