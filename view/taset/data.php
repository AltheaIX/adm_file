<?php
	include("koneksi.php");     
	switch ($_GET['jenis']) {
		//ambil data kota / kabupaten
		case 'aset_item':
		$id_aset_tetap = $_POST['id_aset_tetap'];
		if($id_aset_tetap == ''){
		     exit;
		}else{
		     $data_aset_item = mysqli_query($con,"SELECT  * FROM aset_item WHERE kat_id ='$id_aset_tetap' ORDER BY nama ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($data_aset_item)){
		          echo '<option value="'.$data['sub_id'].'">'.$data['nama'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>