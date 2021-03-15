<?php
   include "../../../config/koneksi.php";
   $id_order = $_GET['id'];
   $sql = "SELECT * FROM orders WHERE id_order='$id_order'";
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
            <input type="hidden" value="<?php echo $dt['id_order'];?>" name="id_order">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label>nama_kustomer  : </label>
                <input type="text" class="form-control" name="nama_kustomer" value="<?php echo $dt['nama_kustomer'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>alamat: </label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $dt['alamat'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>telpon: </label>
                <input type="text" class="form-control" name="telpon" value="<?php echo $dt['telpon'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>email: </label>
                <input type="text" class="form-control" name="email" value="<?php echo $dt['email'];?>">
              </div>
              <div class="col-md-12 mb-3">
                <label>tgl_order : </label>
                <input type="date" class="form-control" name="tgl_order" value="<?php echo $dt['tgl_order'];?>">
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit</button>
            <br>
            <a href="../../index.php?page=orders">< Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <script src="../../../asset/js/jquery-3.4.1.min.js"></script>
    <script src="../../../asset/js/bootstrap.bundle.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
  </body>
</html>