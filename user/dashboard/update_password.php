<?php
	include "./../../config/koneksi.php";
	session_start();
	$username = $_SESSION['username'];
	if ($_POST['epass']) {
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		$pass_lama				= md5($password_lama);
		$sql					= "SELECT password FROM users WHERE password='$pass_lama'";
		$cek 					= mysqli_query($koneksi, $sql);

		if ($cek->num_rows) {
			if ($password_baru	== $konfirmasi_password) {
				$pass_baru		= md5($password_baru);
				$sqlUpdate		= "UPDATE users SET password='$pass_baru' WHERE username='$username'";
				$update			= $koneksi->query($sqlUpdate);

				if($update){
					echo "<script>alert('Berhasil merubah password');</script>";
					$url = "./../../user.php?p=dashboard&username=".$_SESSION['username'];
		        	echo "<script>location.href='$url'</script>";
				}else{
					echo "<script>alert('Gagal merubah password');</script>";
					$url = "./../../user.php?p=dashboard&username=".$_SESSION['username'];
		        	echo "<script>location.href='$url'</script>";
		        }	
			}else{
				echo "<script>alert('Konfirmasi password tidak cocok');</script>";
				$url = "./../../user.php?p=dashboard&username=".$_SESSION['username'];
	        	echo "<script>location.href='$url'</script>";
			}
		}else{
			echo "<script>alert('Password lama tidak cocok');</script>";
			$url = "./../../user.php?p=dashboard&username=".$_SESSION['username'];
        	echo "<script>location.href='$url'</script>";
        }
	}
?>