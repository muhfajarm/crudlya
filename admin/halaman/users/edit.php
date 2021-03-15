<?php
   include "../../../config/koneksi.php";
   $id = $_GET['id'];
   $sql = "SELECT * FROM users WHERE id='$id'";
   $result = mysqli_query($koneksi, $sql);
   $dt = mysqli_fetch_array($result);
?>
<html>
  <head>
    <title>Dashboard | Edit</title>
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../asset/css/form.css">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h1 class="lead"> Edit Data </h1>
      </div>
      <div class="row">
        <div class="col-md-12 order-md-1">
          <form action="editaksi.php" method="post" class="needs-validation">
            <input type="hidden" value="<?php echo $dt['id'];?>" name="id">
            <div class="row">
              <div class="col-md-8 mb-3">
                <label>Nama  : </label>
                <input type="text" class="form-control" name="nama" value="<?php echo $dt['nama'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Username: </label>
                <input type="text" class="form-control" name="username" value="<?php echo $dt['username'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Password: </label>
                <input type="text" class="form-control" name="password" value="<?php echo $dt['password'];?>">
              </div>
              <div class="col-md-4 mb-3">
                <label>Level: </label>
                <input type="text" class="form-control" name="level" value="<?php echo $dt['level'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=users">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="./asset/js/jquery-3.4.1.min.js"></script>
    <script src="./asset/js/bootstrap.bundle.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
  </body>
</html>