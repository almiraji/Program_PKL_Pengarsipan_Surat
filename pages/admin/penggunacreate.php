<?php
if (isset($_POST['button_create1'])) {
    $database = new Database();
    $db = $database->getConnection();
    $tbl = $_POST['pengguna'];

    $validateSQL = " SELECT * FROM $tbl WHERE id = ?";
    $stmt = $db->prepare($validateSQL);
    $stmt->bindParam(1, $_POST['id']);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-ban"></i>Gagal</h5>
            sudah ada
        </div>
<?php
    } else {
        if ($tbl == 'tbl_pegawai') {
            $insertSql = " INSERT INTO tbl_pegawai SET nama = ?, id_bidang = ?, username = ?, password = ?";
            $stmt = $db->prepare($insertSql);
            $stmt->bindParam(1, $_POST['nama']);
            $stmt->bindParam(2, $_POST['id_bidang']);
            $stmt->bindParam(3, $_POST['username']);
            $stmt->bindParam(4, $_POST['password']);

            if ($stmt->execute()) {
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil simpan data";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal simpan data";
            }
            echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>"; //ubah nama sesuai php
        } else {
            $insertSql = " INSERT INTO $tbl SET nama = ?, username = ?, password = ?";
            $stmt = $db->prepare($insertSql);
            $stmt->bindParam(1, $_POST['nama']);
            $stmt->bindParam(2, $_POST['username']);
            $stmt->bindParam(3, $_POST['password']);

            if ($stmt->execute()) {
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil simpan data";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal simpan data";
            }
            echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>"; //ubah nama sesuai php
        }
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1 class="text-white">Tambah Data Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=penggunaread" class="text-white">Mengelola Akun</a></li> <!-- //ubah sesuai nama php -->
                    <li class="breadcrumb-item active text-white">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>

</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Pengguna</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label for="id_bidang">Bidang</label>
                    <select class="form-control" name="id_bidang" id="id_bidang">
                        <option value="">-- Pilih Bidang --</option>
                        <?php
                        include 'koneksi.php';
                        $result_bidang = mysqli_query($koneksi, "SELECT * FROM tbl_bidang");
                        while ($row_bidang = mysqli_fetch_array($result_bidang)) { ?>
                            <option value="<?php echo $row_bidang['id'] ?>"><?php echo $row_bidang['nama_bidang'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label for="pengguna">Pengguna</label>
                    <select class="form-control" name="pengguna">
                        <option>--Pilih Pengguna--</option>
                        <option value="tbl_admin">Admin</option>
                        <option value="tbl_pegawai">Pegawai</option>
                        <option value="tbl_kepala_dinas">Kepala Dinas</option>
                    </select>
                </div>

                <a href="?page=penggunaread" class="btn btn-danger btn-sm float-right m-2">
                    <i class="fa fa-times"></i> Batal
                </a>
                <button type="submit" name="button_create1" class="btn btn-success btn-sm float-right m-2">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</section>
<?php include_once "partials/scripts.php" ?>

<!-- /*onkeypress='return (event.charCode > 47 && event.charcode < 58) || event.charCode == 46'*/ tanyakan dosen-->