<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_project SET nama = '".$_POST['nama']."',  des='".$_POST['des']."', link='".$_POST['link']."', app='".$_POST['app']."',status='".$_POST['status']."' WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>