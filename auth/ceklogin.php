<?php
session_start();

// menghubungkan php dengan koneksi database
include '../config/koneksi.php';

//mengambil data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if($data['level']=="admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['users'] = $data;
		echo "admin";
	}else if($data['level']=="user"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		$_SESSION['users'] = $data;
		if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
			echo "keranjang";
		}else{
			echo "user";
		}
	}else{
		echo "Kesalahan dalam mencoba masuk";
	}	
}else{
	echo "Username atau Password tidak ditemukan";
}

?>