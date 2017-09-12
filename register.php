<?php  


	include_once "db.php";

	if(!isset($_SESSION['username']) == 0){
		header('location:home.php');
	}

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$confirmPassword = md5($_POST['confirmPassword']);

	if(isset($username, $email, $password, $confirmPassword)){
		if(strstr($email, "@")){
			if($password == $confirmPassword){
				try{
					$sql = "SELECT * FROM pengguna WHERE username = :username OR email = :email";
					$stmt = $koneksi->prepare($sql);
					$stmt->bindParam(':username', $username);
					$stmt->bindParam('email', $email);
					$stmt->execute();
				} catch(PDOException $e){
					echo $e->getMessage();
				}

				$count = $stmt->rowCount();
				if($count == 0){
					try{
						$sql = "INSERT INTO pengguna SET username=:username, email=:email, password=:password";
						$stmt = $koneksi->prepare($sql);
						$stmt->bindParam(':username',$username);
						$stmt->bindParam(':email',$email);
						$stmt->bindParam(':password',$password);			
						$stmt->execute();
					} catch(PDOException $e){
						echo $e->getMessage();
					}
					if($stmt){
						echo "Selamat Anda berhasil Register, Anda dapat <a href='index.php'>login</a>";
					}
				} else {
					echo "Username dan Email sudah pernah digunakan";
				}
			} else {
				echo "Password tidak sama";
			}
		} else {
			echo "Email Tidak Valid";
		}
	}

?>

<!-- Form untuk registrasi -->
<form action="" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="confirmPassword"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="Daftar"></td>
		</tr>
	</table>
</form>