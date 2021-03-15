<?php
  include "./config/koneksi.php";
  if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
    echo "<script>alert('Harap masuk atau mendaftar terlebih dahulu');</script>";
    echo "<script>location='./../';</script>";
  }

  $username = $_GET['username'];

  $sql = "SELECT * FROM  users WHERE username='$username'";
  $QUser = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
  $user = $QUser->fetch_assoc();
?>
<div class="container">
  <h1 class="text-center">Dashboard User</h1>
  <div class="row">
    <div class="col-2">
    </div>
    <div class="col-5">
      <div class="card">
        <div class="card-body">
          <form method="post" action="./user/dashboard/update.php">
            <center><label>DATA DIRI</label></center>
            <center><label>Foto</label></center>
            <div class="form-group">
              <label class="card-title">Username : <?=$user['username'];?></label>
            </div>
            <div class="form-group">
              <label class="card-title">Nama Lengkap : </label>
              <input type="text" name="nama" class="form-control" value="<?=$user['nama'];?>">
            </div>
            <div class="form-group">
              <label class="card-title">No HP : </label>
              <input type="text" name="no_hp" class="form-control" value="<?=$user['no_hp'];?>">
            </div>
            <div class="form-group">
              <label class="card-title">Alamat Lengkap : </label>
              <input type="text" name="alamat" class="form-control" value="<?=$user['alamat'];?>">
            </div>
            <center><input type="submit" name="edatadiri" value="Ubah Data Diri"></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
        <div class="card-body">
          <form method="post" action="./user/dashboard/update_password.php">
            <center><label>UBAH PASSWORD</label></center>
            <div class="form-group">
              <label class="card-title">Password Lama : </label>
              <input type="password" name="password_lama" class="form-control" placeholder="*****">
            </div>
            <div class="form-group">
              <label class="card-title">Password Baru : </label>
              <input type="password" name="password_baru" class="form-control" placeholder="*****">
            </div>
            <div class="form-group">
              <label class="card-title">Konfirmasi Password : </label>
              <input type="password" name="konfirmasi_password" class="form-control" placeholder="*****">
            </div>
            <center><input type="submit" name="epass" value="Ubah Password"></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>