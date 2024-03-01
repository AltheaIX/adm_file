<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['Id'])){
	    $query = "UPDATE m_user SET password = '".$_POST['password']."' WHERE Id = ".$_POST['Id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>