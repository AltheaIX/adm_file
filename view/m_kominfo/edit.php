<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['Id'])){
	    $query = "UPDATE log_saya SET
	    name = '".$_POST['name']."',  
	    description='".$_POST['description']."',
	    status='".$_POST['status']."',
	    file='".$_POST['file']."',
	    create_at='".$_POST['create_at']."'
	    WHERE Id = ".$_POST['Id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>