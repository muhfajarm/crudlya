<?php
  include "./layouts/checkout/header.php";
  if (isset($_POST['bayar'])) {
    $user_id = $_SESSION['users']['id'];
    $nama_kustomer = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $email = $_POST['email'];
    $namakota = $_POST['namakota'];
    $subtotal = $_POST['subtotal'];
    $ongkir = $_POST['cost'];
    $kurir = $_POST['kodekurir'];
    $total = $_POST['amount'];
    $tgl=date("Y-m-d");

    echo "<pre>";
    print_r($_SESSION['users']);
    echo "</pre>";

    $sql = "INSERT INTO  orders VALUES (NULL, '$user_id', '$nama_kustomer', '$alamat', '$telpon', '$email', 'Pending', '$namakota', '$subtotal', '$ongkir', '$kurir', '$total', NULL, '$tgl')";
    $insert = mysqli_query($koneksi, $sql) or die("select data menu error :".mysqli_error());
    if ($insert) {
      $sql_order_id = "SELECT id_order FROM orders ORDER BY id_order DESC";

      $order_id = mysqli_query($koneksi, $sql_order_id) or die("select data menu error :".mysql_error());
      $dt = mysqli_fetch_array($order_id);

      $orders_id = $dt['id_order'];

      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $sql_produk = "SELECT * FROM produk WHERE id_produk='$id_produk'";
        $Qproduk = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysql_error());
        $produk = $Qproduk->fetch_assoc();

        $harga = $produk['harga'];
        $berat = $produk['berat'];
        $subharga = $produk['harga']*$jumlah;
        $subberat = $produk['berat']*$jumlah;

        $sql_order_detail = "INSERT INTO  order_detail VALUES (NULL, '$orders_id', '$id_produk', '$harga', '$berat', '$jumlah', '$subberat', '$subharga')";
        $Qorder = mysqli_query($koneksi, $sql_order_detail) or die("select data menu error :".mysql_error());

        $sql_produk = "UPDATE produk SET stok = stok -$jumlah WHERE id_produk='$id_produk'";
        $Qproduk = mysqli_query($koneksi, $sql_produk) or die("select data menu error :".mysql_error());
      }

      unset($_SESSION['keranjang']);

      echo "<script>location='./user.php?p=nota&id=$orders_id'</script>";
    }
  }
?>

<?php require "layouts/checkout/footer.php"; ?>