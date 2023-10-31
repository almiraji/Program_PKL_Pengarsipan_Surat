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
                <h1 class="m-0 text-light">Surat Keluar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="?page=home"> Home</a>
                    </li>
                    <li class="breadcrumb-item text-light">Surat Keluar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="card">
        <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Pegawai') : ?>
            <div class="card-header">
                <!-- <h3 class="card-title">Data Surat Keluar</h3> -->
                <a href="?page=suratkeluarcreate" class="btn btn-success btn-sm float-left"> <!-- ubah sesuai nama php -->
                    <i class="fa fa-plus-circle"></i> Tambah Surat</a>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Surat</th>
                        <th>Nama Bidang</th>
                        <th>No Surat</th>
                        <th>Tanggal Keluar</th>
                        <th>Tindak Lanjut</th>
                        <th>Perihal</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database = new Database();
                    $db = $database->getConnection();

                    $selectSQL = "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratkeluar s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id";

                    $stmt = $db->prepare($selectSQL);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['tujuan_surat'] ?></td>
                            <td><?php echo $row['nama_bidang'] ?></td>
                            <td><?php echo $row['nomor_surat'] ?></td>
                            <td><?php echo $row['tanggal_keluar'] ?></td>
                            <td><?php echo $row['tindak_lanjut'] ?></td>
                            <td><?php echo $row['nama_perihal'] ?></td>
                            <td><?php echo $row['keterangan'] ?></td>
                            <?php if (!empty($row['file'])) { ?>
                                <td align="center"><a href="dist/surat-keluar/<?php echo $row['file'] ?>" target="_blank"><i class="fa fa-file" style="font-size: 20px;"></i></a></td>
                            <?php } else if (empty($row['file'])) { ?>
                                <td align="center"><a href="dist/surat-keluar/<?php echo $row['file'] ?>" target="_blank"></a></td>
                            <?php } ?>
                            <td>
                                <?php
                                if ($row['status'] == 'disetujui') {
                                    echo "<div class='badge badge-success'>Disetujui</div>";
                                } else if ($row['status'] == 'belum disetujui') {
                                    echo "<div class='badge badge-warning'>Belum Disetujui</div>";
                                } else {
                                    echo "<div class='badge badge-danger'>Tidak Disetujui</div>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Pegawai') : ?>
                                    <form action method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_surat'] ?>">
                                        <center>
                                        <a href="?page=suratkeluarupdate&id=<?php echo $row['id_surat'] ?>" class="btn btn-primary btn-sm m-1">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        </center>
                                        <center>
                                        <a href="?page=suratkeluardetail&id=<?php echo $row['id_surat'] ?>" class="btn btn-warning btn-sm m-1">
                                            <i class="fa fa-info"></i> Detail
                                        </a>
                                        </center>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['level'] == 'Kadis') : ?>
                                        <center>
                                        <a href="?page=suratkeluaracc&id=<?php echo $row['id_surat'] ?>" class="btn btn-success btn-sm m-1"><i class="fa fa-check"></i> Validasi
                                        </a>
                                        </center>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Pegawai') : ?>
                                        <!-- ubah sesuai nama php -->
                                        <center>
                                        <a href="?page=suratkeluardelete&id=<?php echo $row['id_surat'] ?>" class="btn btn-danger btn-sm m-1" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                        </center>
                                    <?php endif; ?>
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