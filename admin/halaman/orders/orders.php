<?php 
    include "../config/koneksi.php";
    $sql = "SELECT * FROM  orders ORDER BY id_order DESC";
    $query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kustomer</th>
            <th scope="col">Alamat</th>
            <th scope="col">Status Order</th>
            <th scope="col">Tgl Order</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?= $no ?></td>
            <td>
                <?= $data["nama_kustomer"];?><br>
                <span class="badge-info"><?= $data["telpon"];?></span><br>
                <span class="badge-info"><?= $data["email"];?></span>
            </td>
            <td><?= $data["alamat"];?></td>
            <td><?= $data["status_order"];?></td>
            <td><?= $data["tgl_order"];?></td>
            <td>Rp <?= number_format($data["total"]);?></td>
            <td>
                <center>
                    <a href="./index.php?page=detail&id=<?= $data['id_order']; ?>" class="btn btn-info btn-sm">Detail</a> 
                    <!-- <?php if ($data["status_order"]=="Menunggu Konfirmasi" OR $data["status_order"]!=="Pending"): ?>
                        <a href="./index.php?page=konfirmasi&id=<?= $data['id_order']; ?>" class="btn btn-success btn-sm">Konfirmasi</a>
                    <?php endif ?> -->
                </center>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php
        }else{
                echo "Tidak ada data...";
        } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/orders/formorder.php" role="button">+ Tambah Orderr</a>
</div>