<?php include_once "partials/cssdatatables.php" ?>

<div class="content-header">
    <div class="container-fluid">
        <?php
        if (isset($_SESSION["hasil"])) {
            if ($_SESSION["hasil"]) {
        ?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h5><i class="icon fas fa-check"></i>Berhasil</h5>
                    <?php echo $_SESSION["pesan"] ?>
                </div>
            <?php

            } else {
            ?>
                <div class="alert alert-danger alert-dismissible">
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
                <h1 class="m-0 text-white">Bidang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home"> Home</a>
                    </li>
                    <li class="breadcrumb-item text-light">Bidang</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="card">
        <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Pegawai') : ?>
            <div class="card-header">
                <!-- <h3 class="card-title">Data Surat Masuk</h3> -->
                <a href="?page=bidangcreate" class="btn btn-success btn-sm float-left"> <!-- ubah sesuai nama php -->
                    <i class="fa fa-plus-circle"></i> Tambah Bidang</a>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bidang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database = new Database();
                    $db = $database->getConnection();

                    $selectSQL = "SELECT * FROM tbl_bidang";

                    $stmt = $db->prepare($selectSQL);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_bidang'] ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <a href="?page=bidangupdate&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm m-1">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="?page=bidangdelete&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm m-1" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </form>
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