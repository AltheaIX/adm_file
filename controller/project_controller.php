<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
        $des = $_POST['des'];
        $app = $_POST['app'];
        $status = $_POST['status'];
        $link = $_POST['link'];
        
        try {
          $sql = "INSERT INTO m_project SET  
            nama = :nama, 
            des = :des, 
            app = :app, 
            status = :status,
            link = :link" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':app', $app);
          $stmt->bindParam(':link', $link);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_project')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_project')</script>";
		}
	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_project WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_project/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_project/')</script>";
		}

	}
?>