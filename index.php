<?php  

	include_once 'db.php';

	if(!isset($_SESSION['username']) == 0){
		header('location:home.php');
	}

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		//echo $username.$password;
		try {
			$sql = "SELECT * FROM pengguna WHERE username=:username AND password=:password";

			$stmt = $koneksi->prepare($sql);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);
			$stmt->execute();

			$count = $stmt->rowCount();
			if($count){
				$_SESSION['username'] = $username;
				header('location:home.php');				
			} else {
				echo "Anda tidak dapat login";
			}

		} catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>

<!-- Form Login -->
<form action="" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Login"></td>
		</tr>
	</table>
</form>

<br><a href="register.php">Register</a>