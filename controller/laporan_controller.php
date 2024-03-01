<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
        $des = $_POST['des'];
        $kode = $_POST['kode'];
        
        try {
          $sql = "INSERT INTO m_laporan SET  
            nama = :nama, 
            des = :des,
            kode = :kode"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':kode', $kode);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_laporan')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_laporan')</script>";
		}
	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_laporan WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_laporan/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_laporan/')</script>";
		}

	}
?>