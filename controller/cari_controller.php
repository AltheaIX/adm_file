<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if ($op == "cari"){
	    $kat_id = $_GET['kat_id'];
	    
	    $sql = "";
		if ($kat_id != "")
		    $sql = $conn->prepare("SELECT * FROM log_saya WHERE kat_id = $kat_id");
		else
		    $sql = $conn->prepare("SELECT * FROM log_saya");
	    
		$sql->execute();
		$res = [];
		
		while($data=$sql->fetch()) {
		
		    $temp = [];
		    $temp['id'] = $data['Id'];
		    $temp['kat_id'] = $data['kat_id'];
		    $temp['description'] = $data['description'];
		    $temp['name'] = $data['name'];
		    $temp['tag'] = $data['tag'];
		    $temp['image'] = $data['image'];
		    
		    $temp['status'] = $data['status'];
		    $temp['file'] = $data['file'];
		    $temp['pass'] = $data['pass'];
		    $temp['menit'] = $data['menit'];
		    
		    $temp['masuk'] = $data['masuk'];
		    $temp['keluar'] = $data['keluar'];
		    $temp['sedekah'] = $data['sedekah'];
		    $temp['hemat'] = $data['hemat'];
		    
		    $temp['no_urut'] = $data['no_urut'];
		    $temp['create_at'] = $data['create_at'];
		    $temp['update_at'] = $data['update_at'];
		    $res[] = $temp;
		}
		
		echo json_encode($res);
	}
?>