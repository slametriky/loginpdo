<?php  


	session_start(); //memulai session
	session_destroy(); //untuk menghapus session

	header('location: index.php'); //redirect ke halaman index

?>