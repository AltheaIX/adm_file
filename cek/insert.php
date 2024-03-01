<?php
	//require the database connection
	require_once 'conn.php';
 
	if(ISSET($_POST['save'])){
 		//setting up the variables
		$no_kartu = $_POST['no_kartu'];
		$nama = $_POST['nama'];
 
 
		try{
			//setting attribute on the database handle
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Inserstion Query
			$sql = "INSERT INTO `pengguna`(no_kartu, nama)  VALUES ('$no_kartu', '$nama')";
			//Execute Query
			$conn->exec($sql);
		}catch(PDOException $e){
			// Display error message
			echo $e->getMessage();
		}
 		//Closing the connection
		$conn = null;
 		//redirecting to the index page
		header("location: tbh.php");
 
	}
?>