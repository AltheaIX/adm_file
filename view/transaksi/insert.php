<?php
	include('koneksi.php');
	if(isset($_POST['simpan_pemasukan_harian'])){
		$query = "INSERT INTO transaksi_detail(kat_id,sub_id,des,total)
		VALUES(".$_POST['kat_akun'].",".$_POST['kat_sub'].",'".$_POST['deskripsi']."',".$_POST['total'].")";
		
		if ($con->query($query))
			echo "<script>alert('Berhasil Tambah'); document.location.href=('index.php')</script>";
		else
			echo "<script>alert('Gagal Tambah'); document.location.href=('index.php')</script>";
	}
?>