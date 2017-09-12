<?php  
	include 'db.php';

	if(isset($_SESSION['username']) == 0){
		header('location:index.php');
	}

?>

<h1><p>Selamat datang <?php echo ucfirst($_SESSION['username']); ?></p></h1>

<br>
<a href="logout.php">Logout</a>