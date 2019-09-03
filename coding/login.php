<?php 
	session_start();
	require 'functions.php';

	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		//ambil username berdasarkan id
		$sql = "SELECT username FROM user WHERE id = '$id'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

		//cek cookie dan username
		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
		}
	}

	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}



	if (isset($_POST["login"])) {
		$user = $_POST["username"];
		$pass = $_POST["password"];

		$sql = "SELECT * FROM user WHERE username = '$user'";
		$result = mysqli_query($con, $sql);

		//cek username
		if (mysqli_num_rows($result) === 1 ) {
			//cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($pass, $row["password"]) ) {
				//set session
				$_SESSION["login"] = true;

				//cek remember me
				if (isset($_POST['remember'])) {
					//buat cokkie
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['username']), time() + 60);
				}

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<style type="text/css">
		body{
			margin-top: 5%;
			margin-left: 20%;
			margin-right: 20%;
		}
	</style>
</head>
<body>

	<h1 align="center">Login</h1>

	<?php if (isset($error)) :?>
			<p style="color: red; font-style: italic;">Username / Password Salah</p>
	<?php endif; ?>

	<form action="" method="post">
  		<div class="form-group">
   			 <label for="username">Username</label>
   			 <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
 		 </div>
 		 <div class="form-group">
  			 <label for="password">Password</label>
   			 <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
  		</div>
  		<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="remember" id="remember">
  			<label class="form-check-label" for="remember">Remember Me</label><br><br>
		</div>
 	 <button type="submit" class="btn btn-primary" name="login" >Submit</button>
 	 <button type="submit" class="btn btn-primary" name="registrasi"><a style="color: white;" href="registrasi.php">Registrasi</a></button>
	</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>