<?php 
	include "../config/koneksi.php";
	$sql = "SELECT * FROM  users ORDER BY id DESC";
	$query = mysqli_query($koneksi, $sql) or die("select data menu error :".mysql_error());
?>
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Level</th>
            <th scope="col">Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td scope="row"><?php echo $no ?></td>
            <td><?php echo $data["nama"];?></td>
            <td><?php echo $data["username"];?></td>
            <td><?php echo $data["password"];?></td>
            <td><?php echo $data["level"];?></td>
            <td>
                <a href="halaman/users/delete.php?id=<?php echo $data['id'];?>">Delete</a> |
                <a href="halaman/users/edit.php?id=<?php echo $data['id']; ?>">Edit</a>
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</div>
<div>
    <a class="btn btn-primary pull-right" href="halaman/users/form.php" role="button">+ Tambah user</a>
</div>