<?php
	include '../config/koneksi.php';

	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$konfirmasi_password = md5($_POST['konfirmasi_password']);

	if (empty($_POST['nama'])) {
		echo "nama";
	} else if (empty($_POST['username'])) {
		echo "username";
	} else if (empty($_POST['password'])) {
		echo "password";
	} else if ($password != $konfirmasi_password) {
		echo "konfirmasi_password";
	} else {
		$sql= "INSERT INTO  users (nama, username, password) VALUES ('$nama', '$username', '$password')";
		$result = mysqli_query($koneksi, $sql);
	}

	$sql_select = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$select = mysqli_query($koneksi, $sql_select);

	$cek = mysqli_num_rows($select);

	if($cek > 0){
		$data = mysqli_fetch_assoc($select);
		if ($data['level']=="user"){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "user";
			$_SESSION['users'] = $data;
			if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
				echo "keranjang";
			}else{
				echo "user";
			}
			// header ("location:../auth/login.php");
		} else {
			// echo "Terjadi kesalahan";
		}
	}else{
		// echo "Terjadi kesalahan";
		// header("location:./login.php?pesan=gagal");
	}
?>