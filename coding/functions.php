<?php 
	$con = mysqli_connect("localhost", "root", "", "db_phpdasar");

	function query($query){
		global $con;
		$result = mysqli_query($con, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $con;
		$nis = htmlspecialchars($data["nis"]);
		$nama = htmlspecialchars($data["nama"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		//upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}

		$sql = "INSERT INTO siswa VALUES
			('', '$nis','$nama','$email','$jurusan','$gambar')";
		mysqli_query($con, $sql);

		return mysqli_affected_rows($con);
	}

	function upload(){
		$namafile = $_FILES['gambar']['name'];
		$ukuranfile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$namatempat = $_FILES['gambar']['tmp_name'];

		//cek bila tidak ada gambar yang diupload
		if ($error === 4) {
			echo "<script>
				alert('Pilih gambar terlebih dahulu');
			</script>";
		}
	

	//cek apakah gambar yang diupload adalah gambar
		$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
		$ekstensigambar = explode('.', $namafile);
		$ekstensigambar = strtolower(end($ekstensigambar));
		if (in_array(!$ekstensigambar, $ekstensigambarvalid)) {
			echo "<script>
				alert('Yang anda upload bukan gambar');
			</script>";
			return false;
		}

		//cek jika ukurannya terlalu besar
		if ($ukuranfile > 2000000) {
			echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>";
			return false;
		}

		//lolos pengecekan, gambar siap diupload
		//generate nama gambar baru
		$namafilebaru = uniqid();
		$namafilebaru .= '.';
		$namafilebaru .= $ekstensigambar;

		move_uploaded_file($namatempat, 'img/' . $namafilebaru);

		return $namafilebaru; 
	}




	function hapus($id){
		global $con;
		mysqli_query($con, "DELETE FROM siswa WHERE id=$id");

		return mysqli_affected_rows($con);
	}

	function ubah($data){
		global $con;

		$id = $data["id"];
		$nis = htmlspecialchars($data["nis"]);
		$nama = htmlspecialchars($data["nama"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambarlama = $data["gambarlama"];

		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarlama;
		}else{
			$gambar = upload();
		}
		

		$sql = "UPDATE siswa SET nis='$nis', nama='$nama', email='$email', jurusan='$jurusan', gambar='$gambar'WHERE id=$id ";
		mysqli_query($con, $sql);

		return mysqli_affected_rows($con);
	}
	//menggunakan pencarian
	function cari($keyword){
		$sql = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' ";

		return query($sql);
	}

	function registrasi($data){
		global $con;

		$user = strtolower(stripcslashes($data["username"]));
		$pass = mysqli_real_escape_string($con,$data["password"]);
		$pass2 = mysqli_real_escape_string($con,$data["password2"]);

		//cek username
		$sql = "SELECT username FROM user WHERE username = '$user'";
		$result = mysqli_query($con, $sql);

		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('Gagal mendaftar Username sudah terdaftar');
				</script>
			";
			return false;
		}

		//konfirmasi password
		if ($pass != $pass2) {
			echo "
			<script>
				alert('Konfirmasi Password salah');
			</script>
			";
			return false;
		} 

		//encripsi password
		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user VALUES ('','$user','$pass')";
		mysqli_query($con, $sql);

		return mysqli_affected_rows($con);

	}
 ?>