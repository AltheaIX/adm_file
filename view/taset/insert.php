<?php
	include('koneksi.php');
	if(isset($_POST['simpan_pemasukan_harian'])){
		$query = "INSERT INTO transaksi_aset(kat_id,sub_id,nama,harga)
		VALUES(".$_POST['aset_tetap'].",".$_POST['aset_item'].",'".$_POST['nama']."',".$_POST['harga'].")";
		
		if ($con->query($query))
			echo "<script>alert('Berhasil Tambah'); document.location.href=('index.php')</script>";
		else
			echo "<script>alert('Gagal Tambah'); document.location.href=('index.php')</script>";
	}
?>