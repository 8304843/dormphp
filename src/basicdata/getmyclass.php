<?php
require('../../conn.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$flag=$_POST['flag'];
$i=0;
if($flag=='classNum'){
	$sql="SELECT COUNT(DISTINCT class) AS count FROM `cw_record_late`";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$data['count']=$row['count'];
		}
	}
	$json = json_encode($data);
	echo $json;
}else if($flag=='classMes'){
	$sql="SELECT distinct class FROM `cw_record_late`";
	$result=$conn->query($sql);
	$data='';
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$data=$data.'{"class":"'.$row['class'].'"}'.',';
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