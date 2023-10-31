<?php
if (isset($_POST['button_create1'])) {
    $database = new Database();
    $db = $database->getConnection();

    $validateSQL = " SELECT * FROM tbl_suratkeluar WHERE id_surat = ?";
    $stmt = $db->prepare($validateSQL);
    $stmt->bindParam(1, $_POST['id_surat']);
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
        $ekstensi = array('jpg', 'png', 'jpeg', 'doc', 'docx', 'pdf');
        $file = $_FILES['file']['name'];
        $x = explode('.', $file);
        $eks = strtolower(end($x));
        $ukuran = $_FILES['file']['size'];
        $target_dir = "dist/surat-keluar/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if ($file != "") {

            $rand = rand(1, 10000);
            $nfile = $rand . "-" . $file;

            //validasi file
            if (in_array($eks, $ekstensi) == true) {
                if ($ukuran < 2500000) {

                    move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $nfile);

                    $insertSql = " INSERT INTO tbl_suratkeluar SET tujuan_surat = ?, id_bidang = ?, nomor_surat = ?, tanggal_keluar = ?, tindak_lanjut = ?, id_perihal = ?, keterangan = ?, file = ?";
                    $stmt = $db->prepare($insertSql);
                    $stmt->bindParam(1, $_POST['tujuansurat']);
                    $stmt->bindParam(2, $_POST['id_bidang']);
                    $stmt->bindParam(3, $_POST['nosurat']);
                    $stmt->bindParam(4, $_POST['tglkeluar']);
                    $stmt->bindParam(5, $_POST['tindak_lanjut']);
                    $stmt->bindParam(6, $_POST['id_perihal']);
                    $stmt->bindParam(7, $_POST['keterangan']);
                    $stmt->bindParam(8, $nfile);

                    if ($stmt->execute()) {
                        $_SESSION['hasil'] = true;
                        $_SESSION['pesan'] = "Berhasil simpan data";
                    } else {
                        $_SESSION['hasil'] = false;
                        $_SESSION['pesan'] = "Gagal simpan data";
                    }
                    echo "<meta http-equiv='refresh' content='0;url=?page=suratkeluarread'>"; //ubah nama sesuai php
                } else {
                    $_SESSION['errSize'] = 'Ukuran file yang diupload terlalu besar!';
                    echo '<script language="javascript">window.history.back();</script>';
                }
            } else {
                $_SESSION['errFormat'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
                echo '<script language="javascript">window.history.back();</script>';
            }
        } else {

            $insertSql = " INSERT INTO suratkeluar SET tujuan_surat = ?, id_bidang = ?, nomor_surat = ?, tanggal_keluar = ?, tindak_lanjut = ?, id_perihal = ?, keterangan = ?, file = ?";
            $stmt = $db->prepare($insertSql);
            $stmt->bindParam(1, $_POST['tujuansurat']);
            $stmt->bindParam(2, $_POST['id_bidang']);
            $stmt->bindParam(3, $_POST['nosurat']);
            $stmt->bindParam(4, $_POST['tglkeluar']);
            $stmt->bindParam(5, $_POST['tindak_lanjut']);
            $stmt->bindParam(6, $_POST['id_perihal']);
            $stmt->bindParam(7, $_POST['keterangan']);
            $stmt->bindParam(8, '');

            if ($stmt->execute()) {
                $_SESSION['hasil'] = true;
                $_SESSION['pesan'] = "Berhasil simpan data";
            } else {
                $_SESSION['hasil'] = false;
                $_SESSION['pesan'] = "Gagal simpan data";
            }
            echo "<meta http-equiv='refresh' content='0;url=?page=suratkeluarread'>"; //ubah nama sesuai php
        }
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6 text-white">
                <h1>Tambah Data Surat Keluar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=suratkeluarread" class="text-white">Surat Keluar</a></li> <!-- //ubah sesuai nama php -->
                    <li class="breadcrumb-item active text-white">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>

</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Surat Keluar</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tujuansurat">Tujuan Surat</label>
                    <input type="text" class="form-control" name="tujuansurat">
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
                    <label for="nosurat">Nomor Surat</label>
                    <input type="text" class="form-control" name="nosurat">
                </div>

                <div class="form-group">
                    <label for="tglkeluar">Tanggal Keluar</label>
                    <input type="datetime-local" class="form-control" name="tglkeluar">
                </div>

                <div class="form-group">
                    <label for="tindak_lanjut">Tindak Lanjut</label>
                    <select class="form-control" name="tindak_lanjut" id="tindak_lanjut">
                        <option value="">--Pilih Tindak Lanjut--</option>
                        <option value="Perlu Balasan">Perlu Balasan</option>
                        <option value="Tidak Perlu">Tidak Perlu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_perihal">Perihal</label>
                    <select class="form-control" name="id_perihal" id="id_perihal">
                        <option value="">-- Pilih Perihal --</option>
                        <?php
                        include 'koneksi.php';
                        $result_perihal = mysqli_query($koneksi, "SELECT * FROM tbl_perihal");
                        while ($row_perihal = mysqli_fetch_array($result_perihal)) { ?>
                            <option value="<?php echo $row_perihal['id'] ?>"><?php echo $row_perihal['nama_perihal'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan">
                </div>

                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <small class="text-danger">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</small>

                <a href="?page=suratkeluarread" class="btn btn-danger btn-sm float-right m-2">
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