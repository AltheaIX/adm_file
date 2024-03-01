<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nama = $_POST['nama'];
        $code = $_POST['code']; 
        $des = $_POST['des'];
        $untuk = $_POST['untuk'];
        $fitur_terbaik = $_POST['fitur_terbaik'];
        $framework = $_POST['framework'];
        $php_v = $_POST['php_v'];
        $lokasi = $_POST['lokasi'];
        $web_admin = $_POST['web_admin'];
        $tgl_update = $_POST['tgl_update'];
        $tgl_tawar = $_POST['tgl_tawar'];
        $nilai_rupiah = $_POST['nilai_rupiah'];
        $nilai_emas = $_POST['nilai_emas'];
        
        try {
          $sql = "INSERT INTO m_sistem SET  
            nama = :nama, 
            code = :code, 
            des = :des, 
            untuk = :untuk, 
            fitur_terbaik = :fitur_terbaik, 
            framework = :framework, 
            php_v = :php_v, 
            lokasi = :lokasi, 
            web_admin = :web_admin, 
            tgl_update = :tgl_update, 
            tgl_tawar = :tgl_tawar, 
            nilai_rupiah = :nilai_rupiah, 
            nilai_emas = :nilai_emas" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':code', $code);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':untuk', $untuk);
          $stmt->bindParam(':fitur_terbaik', $fitur_terbaik);
          $stmt->bindParam(':framework', $framework);
          $stmt->bindParam(':php_v', $php_v);
          $stmt->bindParam(':lokasi', $lokasi);
          $stmt->bindParam(':web_admin', $web_admin);
          $stmt->bindParam(':tgl_update', $tgl_update);
          $stmt->bindParam(':tgl_tawar', $tgl_tawar);
          $stmt->bindParam(':nilai_rupiah', $nilai_rupiah);
          $stmt->bindParam(':nilai_emas', $nilai_emas);
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_sistem')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_sistem')</script>";
		}
	
	} if($op == "daftar"){
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$stat = mysqli_real_escape_string($link, $_POST['stat']);
		$gender = mysqli_real_escape_string($link, $_POST['gender']);
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$des = mysqli_real_escape_string($link, $_POST['des']);
		$codx = mysqli_real_escape_string($link, $_POST['codx']);
		$dt = date("d/m/Y");
		$mt = date("m");
		$yr = date("Y");
		$dir = "../up/";
		$proses_upload = move_uploaded_file($_FILES['file']["tmp_name"], $dir.$_FILES['file']["name"]);
	  	$url = $_FILES['file']["name"];
		
		if ($url == null){
			$url = "#";
		} else {
			$url = $_FILES['file']["name"];
		}
		
		$coba = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM pengguna ORDER BY id DESC"));
		$id_user = $coba['id'] + 1;

			$INSERT = mysqli_query($link,"INSERT INTO pengguna (id,id_user,name,stat,gender,nmr_hp,username,password,des,dt,mt,yr,pic,codx) VALUES ('$id_user','$id_user','$name','1','$gender','$nmr_hp','$username','$password','$des','$dt','$mt','$yr','$url','$codx') ");
			if($INSERT){		
				echo "<script>alert('Berhasil Tambah'); document.location.href=('../index.php')</script>";
			}else{
				echo "<script>alert('Gagal Tambah'); document.location.href=('../index.php')</script>";
			}
	}else if($op == "edit"){
		
		$id = $_POST['id'];
		$nama = $_POST['nama'];
        $code = $_POST['code']; 
        $des = $_POST['des'];
        $untuk = $_POST['untuk'];
        $masalah = $_POST['masalah'];
        $fitur_terbaik = $_POST['fitur_terbaik'];
        $framework = $_POST['framework'];
        $php_v = $_POST['php_v'];
        $lokasi = $_POST['lokasi'];
        $web_admin = $_POST['web_admin'];
        $tgl_update = $_POST['tgl_update'];
        $tgl_tawar = $_POST['tgl_tawar'];
        $nilai_rupiah = $_POST['nilai_rupiah'];
        $nilai_emas = $_POST['nilai_emas'];
        
        		  	
        try {
          $sql = "UPDATE m_sistem SET 
            nama = :nama, 
            code = :code, 
            des = :des, 
            untuk = :untuk, 
            masalah = :masalah, 
            fitur_terbaik = :fitur_terbaik, 
            framework = :framework, 
            php_v = :php_v, 
            lokasi = :lokasi, 
            web_admin = :web_admin, 
            tgl_update = :tgl_update, 
            tgl_tawar = :tgl_tawar, 
            nilai_rupiah = :nilai_rupiah, 
            nilai_emas = :nilai_emas WHERE id = $id" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':code', $code);
          $stmt->bindParam(':des', $des);
          $stmt->bindParam(':untuk', $untuk);
          $stmt->bindParam(':masalah', $masalah);
          $stmt->bindParam(':fitur_terbaik', $fitur_terbaik);
          $stmt->bindParam(':framework', $framework);
          $stmt->bindParam(':php_v', $php_v);
          $stmt->bindParam(':lokasi', $lokasi);
          $stmt->bindParam(':web_admin', $web_admin);
          $stmt->bindParam(':tgl_update', $tgl_update);
          $stmt->bindParam(':tgl_tawar', $tgl_tawar);
          $stmt->bindParam(':nilai_rupiah', $nilai_rupiah);
          $stmt->bindParam(':nilai_emas', $nilai_emas);
          
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_sistem')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_sistem')</script>";
		}

	}else if($op == "aktif"){
		
			$UPDATE = mysqli_query($link,"UPDATE pengguna SET status_aktif='1' WHERE codx = '".$_GET['codx']."' ");
			if($UPDATE){
			echo "<script>alert('Berhasil Aktif'); document.location.href=('../in/user.php')</script>";
			}else{
				echo "<script>alert('Gagal Aktif'); document.location.href=('../in/user.php')</script>";
			}

	}else if($op == "tidakaktif"){
		
			$UPDATE = mysqli_query($link,"UPDATE pengguna SET status_aktif='0' WHERE codx = '".$_GET['codx']."' ");
			if($UPDATE){
			echo "<script>alert('Berhasil Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}else{
				echo "<script>alert('Gagal Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}

	}else if($op == "hapus"){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM m_sistem WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_sistem/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_sistem/')</script>";
		}

	}else if($op=="cek_extensi"){
		$fileName =  $_GET['nama_file'];
		 
		$valid_ext = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');
		$ext = explode('.', $fileName);
		$extensi = $ext[count($ext) - 1];
		$cek_extensi = in_array($extensi, $valid_ext);

		if($cek_extensi > 0){
			echo "ok";
		}else{
			echo "no";
		}
	} else if($op=="hapus_gambar"){
	    
	    unlink('../../images/PENULIS.png');
	    
		echo "<script>alert('Berhasil Menghapus Gambar'); document.location.href=('../view/barang/')</script>";
	}
?>