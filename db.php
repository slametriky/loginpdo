<?php  

	session_start();

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "users";

	try {
		$koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		echo $e->getMessage();
	}


?>