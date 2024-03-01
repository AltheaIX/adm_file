<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
        $description = $_POST['description'];
        
        try {
          $sql = "INSERT INTO kategori SET  
            name = :nama, 
            description = :description" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':description', $description);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_kategori')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_kategori')</script>";
		}
	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM kategori WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_kategori/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_kategori/')</script>";
		}

	}
?>