<?php 
require 'functions.php';

	if (isset($_POST["register"])) {
		
		if (registrasi($_POST) > 0) {
			echo "<script>
				alert('Data Berhasil Ditambahkan!');
			</script>";
			header("Location: login.php");
		}else{
			echo mysqli_error($con);
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<style type="text/css">
		body{
			margin-top: 5%;
			margin-left: 20%;
			margin-right: 20%;
		}
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h1 align="center">Registrasi</h1><br>

	<form action="" method="post">
  		<div class="form-group">
   			<label for="username">Username</label>
    		<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
  		</div>
  		<div class="form-group">
    		<label for="password">Password</label>
    		<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
  		</div>
  		<div class="form-group">
    		<label for="password2">Password</label>
    		<input type="password" class="form-control" name="password2" id="password2" placeholder="Enter your confirm Password">
  		</div>
  	<button type="submit" class="btn btn-primary" name="register">Registrasi</button>
	</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>