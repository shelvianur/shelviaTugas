<?php 

	session_start();

	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require'functions.php';

	//pagination
	//konfigurasi
	$jumlahdataperhal = 3;
	$jumlahdata = count(query("SELECT * FROM siswa"));
	$jumlahal = ceil($jumlahdata / $jumlahdataperhal);
	//ternary
	$halamanaktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
	$awaldata = ($jumlahdataperhal * $halamanaktif) - $jumlahdataperhal;

	$siswa = query("SELECT * FROM siswa LIMIT $awaldata, $jumlahdataperhal");

	//jika tombol cari diklik
	if(isset($_POST["cari"])) {
		$siswa = cari($_POST["keyword"]);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<style type="text/css">
		body{
			margin: 10%;
			margin-top: 3%;
		}
		.pag{
			float: right;
		}
	</style>

</head>
<body>
	<button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#exampleModal"><a style="float: right; color: white;" href="logout.php">Logout</a></button>

	<h1>Data Siswa</h1>
		<button type="button" class="btn btn-primary"><a href="tambah.php" style="color: white;">+ Tambah data siswa</a></button>
		<br><br>

		<!-- menggunakan pencarian -->
		<nav class="navbar navbar-light">
  			<form class="form-inline" action="" method="post">
   				<input class="form-control mr-sm-2" type="text" name="keyword" autofocus placeholder="Pencarian" aria-label="Search">
    			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="cari">Cari</button>
  			</form>
		</nav>
		<br>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i=1; ?>
		<?php foreach( $siswa as $row ) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<button type="button" class="btn btn-success"><a style="color: white;" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a></button> |
					<button type="button" class="btn btn-danger"><a style="color: white;" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a></button>
				</td>
				<td>
					<img src="img/<?= $row["gambar"]; ?>" width="80px"></td>
				<td><?= $row["nis"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["jurusan"]; ?></td>
			</tr>
			<?php $i++; ?>
	 	<?php endforeach; ?>
	</table>

<nav aria-label="Page navigation example" class="pag">
  <ul class="pagination">
    <li class="page-item">
    	<?php if($halamanaktif > 1) : ?>
      <a class="page-link" href="?halaman=<?= $halamanaktif - 1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
      	<?php endif; ?>
    </li>

    <?php for ($i=1; $i <= $jumlahal ; $i++) : ?>
      <?php if($i == $halamanaktif) : ?>
    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><span class="sr-only"></span><?= $i; ?></a></li>
      <?php else : ?>
    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
     <?php endif; ?>
    <?php endfor; ?>

    <li class="page-item">
    	<?php if($halamanaktif < $jumlahal) : ?>
      <a class="page-link" href="?halaman=<?= $halamanaktif + 1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      	<?php endif; ?>
    </li>
  </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>