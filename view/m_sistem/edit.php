<?php
	include("../../koneksi.php");   
	$response = [];
	if (isset($_POST['id'])){
	    $query = "UPDATE m_sistem SET nama = '".$_POST['nama']."', code='".$_POST['code']."', des='".$_POST['des']."',
	    untuk='".$_POST['untuk']."',
	    fitur_terbaik='".$_POST['fitur_terbaik']."',
	    framework='".$_POST['framework']."',
	    php_v='".$_POST['php_v']."',
	    lokasi='".$_POST['lokasi']."',
	    des_terbaru='".$_POST['des_terbaru']."',
	    web_admin='".$_POST['web_admin']."',
	    tgl_update='".$_POST['tgl_update']."',
	    tgl_tawar='".$_POST['tgl_tawar']."',
	    nilai_rupiah='".$_POST['nilai_rupiah']."',
	    nilai_emas='".$_POST['nilai_emas']."' WHERE id = ".$_POST['id'];
		
		if ($con->query($query)){
		    $response['code'] = 200;
		}else{
		    $response['code'] = 505;
		}
	}
	echo json_encode($response);
?>