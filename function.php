<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "iot_watersprayer_db");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;
	$timestamp = time();
	$waktu = date("Y-m-d H:i:s", $timestamp);
	$uid = htmlspecialchars($data["uid"]);
	$no_lambung = htmlspecialchars($data["no_lambung"]);

	$query = "INSERT INTO rfid_data
			VALUES 
			('','$waktu','$uid','$no_lambung')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

// function upload() {
// 	$namaFile = $_FILES['gambar']['name'];
// 	$ukuranFile = $_FILES['gambar']['size'];
// 	$error = $_FILES['gambar']['error'];
// 	$tmpName = $_FILES['gambar']['tmp_name'];

// 	// cek apakah gambar sudah di upload
// 	if ($error === 4) {
// 		echo "<script>
// 			alert('pilih gambar terlebih dahulu!')
// 		</script>";
// 	 	return false;
// 	}

// 	// cek apakah yang di upload adalah gambar
// 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
// 	$ekstensiGambar = explode('.', $namaFile);
// 	$ekstensiGambar = strtolower(end($ekstensiGambar));
// 	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
// 		echo "<script>
// 			alert('yang anda upload bukan gambar!')
// 		</script>";
// 	 	return false;
// 	}

// 	// cek jika ukuran gambar terlalu besar
// 	if ($ukuranFile > 1000000) {
// 		echo "<script>
// 			alert('ukuran gambar terlalu besar!')
// 		</script>";
// 	 	return false;
// 	}

// 	// lolos pengecekan, gambar siap di upload
// 	// generate nama gambar baru
// 	$namaFileBaru = uniqid();
// 	$namaFileBaru .= ',';
// 	$namaFileBaru .= $ekstensiGambar;

// 	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
// 	return $namaFileBaru;
// }

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM rfid_data WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	$timestamp = time();
	$waktu = date("Y-m-d H:i:s", $timestamp);

	$id = $data["id"];
	$flow_rate = htmlspecialchars($data["flow_rate"]);
	$total_ml = htmlspecialchars($data["total_ml"]);
	$uid = htmlspecialchars($data["uid"]);
	$no_lambung = htmlspecialchars($data["no_lambung"]);
	// $waktu = htmlspecialchars($data["waktu"]);

	$query = "UPDATE rfid_data SET 
				waktu = '$waktu',
				uid = '$uid',
				no_lambung = '$no_lambung'
			WHERE id = $id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// function cari($keyword) {
// 	$query = "SELECT * FROM mahasiswa WHERE 
// 				nama LIKE '%$keyword%' OR 
// 				nim LIKE '%$keyword%' OR 
// 				email LIKE '%$keyword%' OR 
// 				jurusan LIKE '%$keyword%'
// 				";

// 	return query($query);
// }

// function registrasi($data) {
// 	global $conn;

// 	$username = strtolower(stripcslashes($data["username"]));
// 	$password = mysqli_real_escape_string($conn, $data["password"]);
// 	$konfirmpass = mysqli_real_escape_string($conn, $data["konfirmpass"]);

// 	// cek username apakah sudah ada atau belum
// 	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

// 	if (mysqli_fetch_assoc($result)) {
// 		echo "<script>
// 				alert('username sudah terdaftar!')
// 			  </script>";

// 		return false;
// 	}

// 	// cek konfirmasi password
// 	if ($password !== $konfirmpass) {
// 		echo "<script>
// 				alert('konfirmasi password tidak sesuai!');
// 			  </script>";

// 		return false;
// 	}

// 	// enkripsi password
// 	$password = password_hash($password, PASSWORD_DEFAULT);

// 	// tambahkan userbaru ke database
// 	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

// 	return mysqli_affected_rows($conn);
// }
// ?>