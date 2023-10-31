<?php
if (isset($_GET['id']) && isset($_GET['user'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $user = $_GET['user'];
    if ($user == 'admin') {
        $tbl = 'tbl_admin';
        $findSql = " SELECT * FROM $tbl WHERE id = ?";
        $stmt = $db->prepare($findSql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();
        $row = $stmt->fetch();
    } else if ($user == 'pegawai') {
        $tbl = 'tbl_pegawai';
        $findSql = " SELECT * FROM tbl_pegawai WHERE id = ?";
        $stmt = $db->prepare($findSql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();
        $row = $stmt->fetch();
    } else {
        $tbl = 'tbl_kepala_dinas';
        $findSql = " SELECT * FROM $tbl WHERE id = ?";
        $stmt = $db->prepare($findSql);
        $stmt->bindParam(1, $_GET['id']);
        $stmt->execute();
        $row = $stmt->fetch();
    }
    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();
            $tbl = $_POST['pengguna'];

            $validateSQL = " SELECT * FROM $tbl WHERE id = ? AND id != ?";
            $stmt = $db->prepare($validateSQL);
            $stmt->bindParam(1, $_POST['id']);
            $stmt->bindParam(2, $_POST['id']);
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
                    $updateSQL = "UPDATE tbl_pegawai SET nama = ?, id_bidang = ?, username = ?, password = ? WHERE id = ?";
                    $stmt = $db->prepare($updateSQL);
                    $stmt->bindParam(1, $_POST['nama']);
                    $stmt->bindParam(2, $_POST['id_bidang']);
                    $stmt->bindParam(3, $_POST['username']);
                    $stmt->bindParam(4, $_POST['password']);
                    $stmt->bindParam(5, $_POST['id']);
                    if ($stmt->execute()) {
                        $_SESSION['hasil'] = true;
                        $_SESSION['pesan'] = "Berhasil Ubah data";
                    } else {
                        $_SESSION['hasil'] = false;
                        $_SESSION['pesan'] = "Gagal Ubah data";
                    }
                    echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>";
                } else {
                    $updateSQL = "UPDATE $tbl SET nama = ?, username = ?, password = ? WHERE id = ?";
                    $stmt = $db->prepare($updateSQL);
                    $stmt->bindParam(1, $_POST['nama']);
                    $stmt->bindParam(2, $_POST['username']);
                    $stmt->bindParam(3, $_POST['password']);
                    $stmt->bindParam(4, $_POST['id']);
                    if ($stmt->execute()) {
                        $_SESSION['hasil'] = true;
                        $_SESSION['pesan'] = "Berhasil Ubah data";
                    } else {
                        $_SESSION['hasil'] = false;
                        $_SESSION['pesan'] = "Gagal Ubah data";
                    }
                    echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>";
                }
            }
        }

        ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb2">
                    <div class="col-sm-6">
                        <h1 class="text-white">Ubah Data Pengguna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="?page=penggunaread" class="text-white">Mengelola Akun</a></li>
                            <li class="breadcrumb-item active text-white">Ubah Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Pengguna</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_bidang">Bidang</label>
                            <select class="form-control" name="id_bidang" id="id_bidang">
                                <!-- <option value="">-- Pilih Kategori --</option> -->
                                <?php
                                include_once 'koneksi.php';
                                $result_bidang = mysqli_query($koneksi, "SELECT * FROM tbl_bidang");
                                while ($row_bidang = mysqli_fetch_array($result_bidang)) { ?>
                                    <option value="<?php echo $row_bidang['id'] ?>" <?php if ($row["id_bidang"] == $row_bidang['id']) {
                                                                                        echo "SELECTED";
                                                                                    } ?>><?php echo $row_bidang['nama_bidang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pengguna">Pengguna</label>
                            <select class="form-control" name="pengguna">
                                <option value="">Pilih Pengguna</option>
                                <option value="tbl_admin" <?php echo ($_GET['user'] == 'admin') ? " selected" : "" ?>>Admin</option>
                                <option value="tbl_kepala_dinas" <?php echo ($_GET['user'] == 'kepala dinas') ? " selected" : "" ?>>Kepala Dinas</option>
                                <option value="tbl_pegawai" <?php echo ($_GET['user'] == 'pegawai') ? " selected" : "" ?>>Pegawai</option>
                            </select>
                        </div>

                        <a href="?page=penggunaread" class="btn btn-danger btn-sm float-right m-2">
                            <i class="fa fa-times"></i> Batal
                        </a>
                        <button type="submit" name="button_update" class="btn btn-success btn-sm float-right m-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>

<?php
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>";
}

?>