<?php
	include("koneksi.php");     
	switch ($_GET['jenis']) {
		//ambil data kota / kabupaten
		case 'kat_sub':
		$id_kat_akun = $_POST['id_kat_akun'];
		if($id_kat_akun == ''){
		     exit;
		}else{
		     $data_kat_sub = mysqli_query($con,"SELECT  * FROM kat_sub WHERE kat_id ='$id_kat_akun' ORDER BY name ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($data_kat_sub)){
		          echo '<option value="'.$data['sub_id'].'">'.$data['name'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>