<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

if (isset($_POST['login'])) {
	// menangkap data yang dikirim dari form login
	$username = $_POST['username'];
	$password = $_POST['password'];


	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($koneksi, "SELECT * FROM tbl_kepala_dinas where username='$username' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);

	// cek apakah username dan password di temukan pada database
	if ($cek > 0) {

		// $data = mysqli_fetch_assoc($login);
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Kadis";
		// alihkan ke halaman dashboard admin
		// header("location:index1.php");
		echo "<script>alert('Selamat Datang Anda Login Sebagai Kepala Dinas');</script>";
		echo "<meta http-equiv='refresh' content='0;url=index1.php'>";
	} else {
		header("location:login.php?pesan=gagal");
	}
}
