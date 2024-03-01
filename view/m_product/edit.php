<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_produk SET nama = '".$_POST['nama']."',  des='".$_POST['des']."', versi='".$_POST['versi']."',lokasi='".$_POST['lokasi']."' WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>