<?php include_once "partials/cssdatatables.php" ?>

<div class="content-header">
    <div class="container-fluid">
    <?php
if (isset($_SESSION["hasil"])) {
    if ($_SESSION["hasil"]) {
?>
        
        <div class = "alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-check"></i>Berhasil</h5>
            <?php echo $_SESSION["pesan"] ?>
        </div>
<?php

    } else {
?>
        <div class = "alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-ban"></i>Gagal</h5>
            <?php echo $_SESSION["pesan"] ?>
        </div>
<?php
    }
    unset($_SESSION['hasil']);
    unset($_SESSION['pesan']);
           
}    
?>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-white">Mengelola Akun</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home"> Home</a>
                    </li>
                    <li class="breadcrumb-item text-light">Mengelola Akun</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
        <table id="mytable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $database = new Database();
            $db = $database->getConnection();
            
            $selectSQL = "SELECT * FROM pengguna";
            
            $stmt = $db->prepare($selectSQL);
            $stmt->execute();
            
            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td align="center">
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <a href="?page=passwordupdate&id=<?php echo $row['id'] ?>"  
                    class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Ubah
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
 
        </div>
    </div>
</div>
<?php include_once "partials/scripts.php" ?>
<?php include_once "partials/scriptsdatatables.php" ?>
<script>
 $(function() {
 $('#mytable').DataTable()
 });
</script>