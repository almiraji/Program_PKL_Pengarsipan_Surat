<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = " SELECT * FROM tbl_perihal WHERE id = ?";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSQL = " SELECT * FROM tbl_perihal WHERE id = ? AND id != ?";
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
                $updateSQL = "UPDATE tbl_perihal SET nama_perihal = ? WHERE id = ?";
                $stmt = $db->prepare($updateSQL);
                $stmt->bindParam(1, $_POST['nama_perihal']);
                $stmt->bindParam(2, $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil Ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal Ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=perihalread'>";
            }
        }
    }

    ?>
    <section class="content-header">
        <div class="container-fluid_masuk">
            <div class="row mb2">
                <div class="col-sm-6 text-white">
                    <h1>Ubah Data Perihal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                        <li class="breadcrumb-item"><a href="?page=perihalread" class="text-wihte">Perihal</a></li>
                        <li class="breadcrumb-item active text-white">Ubah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Perihal</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="nama_perihal">Nama Perihal</label>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                        <input type="text" class="form-control" name="nama_perihal" value="<?php echo $row['nama_perihal'] ?>">
                    </div>
                    <a href="?page=perihalread" class="btn btn-danger btn-sm float-right m-2">
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
    echo "<meta http-equiv='refresh' content='0;url=?page=perihalread'>";
}

?>