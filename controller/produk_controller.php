<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
        $des = $_POST['des'];
        $versi = $_POST['versi'];
        $lokasi = $_POST['lokasi'];
        
        try {
          $sql = "INSERT INTO m_produk SET  
            nama = :nama, 
            des = :des, 
            versi = :versi, 
            lokasi = :lokasi" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':lokasi', $lokasi);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':versi', $versi);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_product')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_product')</script>";
		}
	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_produk WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_product/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_product/')</script>";
		}

	}
?>