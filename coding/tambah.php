<?php 
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
	require 'functions.php';

	if (isset($_POST["submit"])) {


		if (tambah($_POST) > 0) {
			echo "<script>
				alert('Data Berhasil Ditambahkan!');
				document.location.href = 'index.php';
			</script>";
		}else{
			echo "
			<script type='text/javascript'>
				alert('Data Gagal  Ditambahakan!');
			</script>
			";
		}
	
	
	}
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah data siswa</title>
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
    <h1 align="center">Tambah data siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nis">Nis</label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan Nis" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="nama" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukkan Jurusan">
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" name="gambar" id="gambar">
        </div>
         <button type="submit" class="btn btn-primary" name="submit">Tambah data!</button>
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>