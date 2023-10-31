<?php
if (isset($_POST['button_create1'])) {
    $database = new Database();
    $db = $database->getConnection();

    $validateSQL = " SELECT * FROM tbl_perihal WHERE id = ?";
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
        $insertSql = " INSERT INTO tbl_perihal SET nama_perihal = ?";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(1, $_POST['nama_perihal']);

        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=perihalread'>"; //ubah nama sesuai php
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6 text-white">
                <h1>Tambah Data Perihal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=perihalread text-white">Perihal</a></li> <!-- //ubah sesuai nama php -->
                    <li class="breadcrumb-item active text-white">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>

</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Perihal</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="nama_perihal">Nama Perihal</label>
                    <input type="text" class="form-control" name="nama_perihal">
                </div>
                <a href="?page=perihalread" class="btn btn-danger btn-sm float-right m-2">
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