<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = " SELECT * FROM tbl_suratmasuk WHERE id = ?";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSQL = " SELECT * FROM tbl_suratmasuk WHERE id = ? AND id != ?";
            $stmt = $db->prepare($validateSQL);
            $stmt->bindParam(1, $_POST['id_masuk']);
            $stmt->bindParam(2, $_POST['id_masuk']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hid_masukden="true">x</button>
                    <h5><i class="icon fas fa-ban"></i>Gagal</h5>
                    sudah ada
                </div>
        <?php
            } else {
                $updateSQL = "UPDATE tbl_suratmasuk SET status = ? WHERE id = ?";
                $stmt = $db->prepare($updateSQL);
                $stmt->bindParam(1, $_POST['status']);
                $stmt->bindParam(2, $_POST['id_masuk']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil Ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal Ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=suratmasukread'>";
            }
        }

        ?>
        <section class="content-header">
            <div class="container-fluid_masuk">
                <div class="row mb2">
                    <div class="col-sm-6 text-white">
                        <h1>Ubah Validasi Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="?page=suratmasukread" class="text-wihte">Surat Masuk</a></li>
                            <li class="breadcrumb-item active text-white">Ubah Validasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Validasi Surat Masuk</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" class="form-control" name="id_masuk" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="">--Pilih Validasi--</option>
                                <option value="disetujui" <?php echo ($row['status'] == 'disetujui') ? " selected" : "" ?>>Disetujui</option>
                                <option value="tidak disetujui" <?php echo ($row['status'] == 'tidak disetujui') ? " selected" : "" ?>>Tidak Disetujui</option>
                                <option value="belum disetujui" <?php echo ($row['status'] == 'belum disetujui') ? " selected" : "" ?>>Belum Disetujui</option>
                            </select>
                        </div>

                        <a href="?page=suratmasukread" class="btn btn-danger btn-sm float-right m-2">
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
        echo "<meta http-equiv='refresh' content='0;url=?page=suratmasukread'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=suratmasukread'>";
}

?>