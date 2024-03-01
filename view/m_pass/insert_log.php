<?php
	include('../../koneksi.php');
	if(isset($_POST['simpan_pemasukan_harian'])){
		$query = "INSERT INTO log_saya(
		kat_id,
		name,
		description
		)
		VALUES
		(
		".$_POST['kat_id'].",
		'".$_POST['nama']."',
		'".$_POST['description']."'
		)";
		if ($con->query($query)){
			echo "<script>alert('Berhasil Tambah'); document.location.href=('index.php')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('index.php')</script>";
		}	
	}
?>