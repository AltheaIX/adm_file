<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$name = $_POST['name'];
		$des = $_POST['des'];
		$file = $_POST['file'];
        
        try {
          $sql = "INSERT INTO m_ilmu SET
          name = :name,
          des = :des,
          file = :file"
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':file', $file);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_ilmu')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_ilmu')</script>";
		}	
	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_ilmu WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_ilmu/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_ilmu/')</script>";
		}

	}
?>