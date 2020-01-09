<?php
require('../../conn.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Content-Type,Access-Token");
$flag=$_POST['flag'];
$class=$_POST['class'];
$i=0;
 if($flag=='latestudent'){
	$sql="SELECT distinct username FROM `cw_record_late` where class='$class' ";
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