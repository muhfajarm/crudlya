<?php
	include "./config/koneksi.php";
	if (isset($_GET['filter'])) {
	    $sql = "SELECT * FROM  produk WHERE kategori_id = '".$_GET['filter']."'";
	    $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	}else if (isset($_GET['s'])) {
	    $key = "%".$_GET['s']."%";
	    $sql = "SELECT * FROM  produk WHERE nama_produk like '$key'";
	    $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	}else{
	    $sql = "SELECT * FROM  produk ORDER BY id_produk DESC";
	    $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
	}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>MD Audio</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="asset/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="asset/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="asset/css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<link href="asset/css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->
</head>

<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<!-- <p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p> -->
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<?php session_start(); ?>
			        <?php if (isset($_SESSION["users"])): ?>
			        	<ul class="nav-item dropdown float-right">
			            	<a class="btn btn-sm btn-info dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                	<?= $_SESSION['username']; ?>
			            	</a>
			            	<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 4px; left: auto;">
			            		<a class="dropdown-item" href="./user.php?p=dashboard&username=<?=$_SESSION['username'];?>">Dashboard</a>
			                	<a class="dropdown-item" href="./user.php?p=riwayat&username=<?=$_SESSION['username'];?>">Riwayat</a>
			                	<a class="dropdown-item" href="./auth/logout.php">Keluar</a>
			            	</div>
			            </ul>
			        <?php else: ?>
						<ul class="text-right">
							<li class="text-center border-right text-white">
								<a href="#" data-toggle="modal" data-target="#modalMasuk" class="text-white">
									<i class="fas fa-sign-in-alt mr-2"></i> Masuk </a>
							</li>
							<li class="text-center text-white">
								<a href="#" data-toggle="modal" data-target="#modalDaftar" class="text-white">
									<i class="fas fa-sign-out-alt mr-2"></i>Daftar </a>
							</li>
						</ul>
		            <?php endif ?>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="modalMasuk" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Masuk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="inputUsername" class="col-form-label">Username</label>
						<input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required="">
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-form-label">Password</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
					</div>
					<div class="right-w3l">
						<!-- <input type="submit" class="form-control" value="Masuk"> -->
						<input type="button" class="form-control" name="btn" id="btnLogin" onclick="ceklogin();" value="Masuk"/>
					</div>
					<!-- <div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
							<label class="custom-control-label" for="customControlAutosizing">Ingat saya?</label>
						</div>
					</div> -->
					<p class="text-center dont-do mt-3">Tidak punyak akun?
						<a href="#" data-toggle="modal" data-target="#modalDaftar">
							Daftar Sekarang</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Daftar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-form-label">Nama Lengkap</label>
						<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" required="required">
					</div>
					<div class="form-group">
						<label class="col-form-label">Username</label>
						<input type="text" class="form-control" placeholder="Username" name="username" id="username" required="required">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
					</div>
					<div class="form-group">
						<label class="col-form-label">Confirm Password</label>
						<input type="password" class="form-control" placeholder="Harap isi password yang sama dengan sebelumnya" name="konfirmasi_password" id="konfirmasi_password" required="required">
					</div>
					<div class="right-w3l">
						<!-- <input type="submit" class="form-control" value="Daftar"> -->
						<input type="button" class="form-control" name="btn" id="btnDaftar" onclick="cekregister();" value="Daftar"/>
					</div>
					<!-- <div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
							<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="./" class="font-weight-bold font-italic">
						MD AUDIO
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="">
								<input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" name="s" required>
								<button class="btn my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1" id="shoppingcart">
								<form action="./cart.php" class="last" id="angkacart">
									<button class="btn w3view-cart" type="input" style="background: #0879c9;" id="tcart">
										<i class="fas fa-cart-arrow-down"></i>
										<?php if (!empty($_SESSION['keranjang'])): ?>
											<?php $count = count($_SESSION['keranjang']); ?>
											<span class="cart"><?=$count?></span>
										<?php else: ?>
											<span class="cart">0</span>
										<?php endif ?>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<select id="agileinfo-nav_search" name="agileinfo_search" class="border" onchange="location = this.value;" required="">
						<option>Pilih Kategori</option>
					<?php
				        $sql = "SELECT * FROM  kategori ORDER BY nama_kategori ASC";
				        $QKategori = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
				        while($kategori = mysqli_fetch_array($QKategori)){
				    ?>
						<option value="?filter=<?=$kategori['id_kategori'];?>"><?=$kategori['nama_kategori'];?></option>
					<?php } ?>
					</select>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-auto">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="./">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->