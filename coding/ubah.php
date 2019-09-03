<?php 

    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
	require 'functions.php';

//ambil data di url
    $id = $_GET["id"];

    $sis = query("SELECT * FROM siswa WHERE id=$id")[0];

	if (isset($_POST["submit"])) {
		if (ubah($_POST) > 0) {
			echo "<script>
				alert('Data Berhasil Diubah!');
				document.location.href = 'index.php';
			</script>";
		}else{
			echo "
			<script type='text/javascript'>
				alert('Data Gagal  Diubah!');
                document.location.href = 'index.php';
			</script>
			";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah data siswa</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <style type="text/css">
        body{
            margin-top: 5%;
            margin-left: 20%;
            margin-right: 20%;
        }
        .bot{
            float: right;
        }
    </style>
</head>
<body>
    <h1 align="center">Ubah data siswa</h1>
    <!-- <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sis['id']; ?>">
        <input type="hidden" name="gambarlama" value="<?= $sis['gambar']; ?>">
    	<ul>
    		<li>
    			<label for="nis">NIS : </label>
    			<input type="text" name="nis" id="nis" required value="<?= $sis["nis"]; ?>">
    		</li>
    		<li>
    			<label for="nama">Nama : </label>
    			<input type="text" name="nama" id="nama" required value="<?= $sis["nama"]; ?>">
    		</li>
    		<li>
    			<label for="email">Email : </label>
    			<input type="text" name="email" id="email" required value="<?= $sis["email"]; ?>">
    		</li>
    		<li>
    			<label for="jurusan">Jurusan : </label>
    			<input type="text" name="jurusan" id="jurusan" required value="<?= $sis["jurusan"]; ?>">
    		</li>
    		<li>
    			<label for="gambar">Gambar : </label><br>
                <img src="img/<?= $sis['gambar']?>" width="80"><br>
    			<input type="file" name="gambar" id="gambar">
    		</li>
    		<li>

    			<button type="submit" name="submit">Ubah data!</button>
    		</li>
    	</ul>
    </form> -->

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sis['id']; ?>">
        <input type="hidden" name="gambarlama" value="<?= $sis['gambar']; ?>">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" name="nis" class="form-control" id="nis" required value="<?= $sis["nis"]; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required value="<?= $sis["nama"]; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" required value="<?= $sis["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan" required value="<?= $sis["jurusan"]; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label><br>
                <img src="img/<?= $sis['gambar']?>" width="80"><br>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>
            <div class="bot">
                <button type="submit" class="btn btn-primary" name="submit" >Ubah data</button>
            </div>
</form>
    </form>


</body>
</html>