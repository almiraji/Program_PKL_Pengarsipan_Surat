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
        <div class="card-header">
            <!-- <h3 class="card-title">Data Surat Masuk</h3> -->
            <form method="post">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="user" id="user">
                            <option>--Pilih Pengguna--</option>
                            <option value="tbl_admin">Admin</option>
                            <option value="tbl_pegawai">Pegawai</option>
                            <option value="tbl_kepala_dinas">Kepala Dinas</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" name="pilih" class="btn btn-info btn-md">Pilih</button>
                    </div>
                </div>
            </form>
            <a href="?page=penggunacreate" class="btn btn-success btn-sm float-left mt-3"> <!-- ubah sesuai nama php -->
                <i class="fa fa-plus-circle"></i> Tambah Pengguna
            </a>
        </div>
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-hover">
                <thead>


                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Bidang</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database = new Database();
                    $db = $database->getConnection();
                    if (isset($_POST['pilih'])) {
                        $tbl = $_POST['user'];
                        if ($tbl == 'tbl_pegawai') {
                            $selectSQL = "SELECT p.*, b.nama_bidang FROM tbl_pegawai p, tbl_bidang b WHERE p.id_bidang = b.id";
                        } else {
                            $selectSQL = "SELECT * FROM $tbl";
                        }
                    } else {
                        $selectSQL = "SELECT p.*, b.nama_bidang FROM tbl_pegawai p, tbl_bidang b WHERE p.id_bidang = b.id";
                    }
                    $stmt = $db->prepare($selectSQL);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <?php if (isset($_POST['pilih'])) { ?>
                            <?php if ($tbl == 'tbl_admin') { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <td align="center">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <a href="?page=penggunaupdate&id=<?php echo $row['id'] ?>&user=admin" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
                                            <!-- ubah sesuai nama php -->
                                            <a href="?page=penggunadelete&id=<?php echo $row['id'] ?>&user=admin" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                    </td>
                                </tr>
                            <?php } else if ($tbl == 'tbl_kepala_dinas') { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <td align="center">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <a href="?page=penggunaupdate&id=<?php echo $row['id'] ?>&user=kadis" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
                                            <!-- ubah sesuai nama php -->
                                            <a href="?page=penggunadelete&id=<?php echo $row['id'] ?>&user=kadis" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                    </td>
                                </tr>
                            <?php } else if ($tbl == 'tbl_pegawai') { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['nama_bidang'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <td align="center">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <a href="?page=penggunaupdate&id=<?php echo $row['id'] ?>&user=pegawai" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
                                            <!-- ubah sesuai nama php -->
                                            <a href="?page=penggunadelete&id=<?php echo $row['id'] ?>&user=pegawai" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['nama_bidang'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td align="center">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <a href="?page=penggunaupdate&id=<?php echo $row['id'] ?>&user=pegawai" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <!-- ubah sesuai nama php -->
                                        <a href="?page=penggunadelete&id=<?php echo $row['id'] ?>&user=pegawai" class="btn btn-danger btn-sm" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                </td>
                            </tr>
                        <?php } ?>
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