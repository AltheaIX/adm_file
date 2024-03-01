<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	$kode = $_GET['kode'];
	if($op == "tambah"){
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
        $des = $_POST['des'];
        $link = $_POST['link'];
        
        try {
          $sql = "INSERT INTO m_laporan_detail SET  
            kode = :kode,
            nama = :nama, 
            des = :des,
            link = :link"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':kode', $kode);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':link', $link);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_laporan/lap.php?kode=$kode')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_laporan/lap.php?kode=$kode')</script>";
		}
	}else if($op == "hapus"){
		$id = $_GET['id'];
		$kode = $_GET['kode'];
		
		$sql = "DELETE FROM m_laporan_detail WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_laporan/lap.php?kode=$kode')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_laporan/lap.php?kode=$kode')</script>";
		}

	}
?>