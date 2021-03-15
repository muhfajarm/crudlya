<?php
    include "./config/koneksi.php";
    if(!isset($_SESSION['users']) OR empty($_SESSION['users'])){
        echo "<script>alert('Harap masuk atau mendaftar terlebih dahulu');</script>";
        echo "<script>location='./../';</script>";
    }
?>

<div class="container">
    <div class="mt-1 row card">
        <div class="row">
            <div class="col-md-12">
                <h2>Detail Pembelian</h2>
                <?php
            		$sql_detail = "SELECT * FROM orders WHERE id_order='$_GET[id]'";
            		$Qdetail = mysqli_query($koneksi, $sql_detail) or die("select data menu error :".mysql_error());
            		$detail = $Qdetail->fetch_assoc();
        		?>
                <form method="post" action="./user/riwayat/print.php" target="_blank">
                    <input type="hidden" name="id_orders" value="<?=$detail['id_order'];?>">
                    <button type="submit" name="print" class="btn btn-sm btn-info float-right">Cetak</button>
                </form>
                <?php

                $id_user = $detail['user_id'];

                $id_session = $_SESSION['users']['id'];

                if ($id_user!==$id_session) {
                     echo "<script>alert('Tidak diperbolehkan melihat nota orang lain!');</script>";
                     echo "<script>location='riwayat.php'</script>";
                     exit();
                }
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <strong>No. Pembelian: <?= $detail['id_order']; ?></strong><br>
                        Tanggal: <?= $detail['tgl_order']; ?>
                    </div>
                    <div class="col-md-4">
                        <h3>Pelanggan</h3>
                        <strong><?= $detail['nama_kustomer']; ?></strong><br>
                        <p>
                            <?= $detail['telpon']; ?><br>
                            <?= $detail['email']; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>Pengiriman</h3>
                        <strong></strong>
                        Alamat: <?= $detail['alamat']; ?>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Berat</th>
                            <th>Qty</th>
                            <th>Subberat</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalbelanja = 0; ?>
                        <?php $sql = "SELECT * FROM order_detail JOIN produk ON order_detail.produk_id=produk.id_produk WHERE order_detail.orders_id='$_GET[id]'"; ?>
                        <?php $ambil = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error()); ?>
                        <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?=$pecah['nama_produk'];?> <span class="badge badge-success"><?= $pecah['status'] ?></span></td>
                                <td>Rp <?=number_format($pecah['harga_produk'],0,",",".");?></td>
                                <td><?=$pecah['berat_produk'];?>Kg</td>
                                <td><?=$pecah['jumlah'];?></td>
                                <td><?=$pecah['subberat'];?>Kg</td>
                                <td class="text-right">Rp <?=number_format($pecah['subtotal'],0,",",".");?></td>
                            </tr>
                            <?php $totalbelanja+=($pecah["harga_produk"]*$pecah['jumlah']); ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Subtotal</th>
                            <th class="text-right">Rp <?= number_format($totalbelanja,0,",",".") ?></th>
                        </tr>
                        <tr>
                            <th colspan="5">Ongkos Kirim</th>
                            <th class="text-right">Rp <?= number_format($detail['ongkir'],0,",",".") ?></th>
                        </tr>
                        <tr>
                            <th colspan="5">Total Belanja</th>
                            <th class="text-right">Rp <?= number_format($detail['total'],0,",",".")  ?></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="alert alert-info">
                    <h5>Total Yang Harus Dibayar : Rp <?= number_format($totalbelanja)  ?>. Silahkan melakukan pembayaran ke <strong>BANK BRI 123456798 A.N MUDA PUTRA</strong> </h5>
                    <h5>Jika sudah melakukan pembayaran harap konfirmasi pembayaran pada riwayat akun anda. </h5>
                </div>
            </div>
        </div>
    </div>
</div>