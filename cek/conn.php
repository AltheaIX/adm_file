<?php
	$conn = new PDO( 'mysql:host=localhost;dbname=tugasi_ldb', 'tugasi_uldb', 'RuEFggSHTgEI');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}
?>