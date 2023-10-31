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
                $ekstensi = array('jpg', 'png', 'jpeg', 'doc', 'docx', 'pdf');
                $file = $_FILES['file']['name'];
                $x = explode('.', $file);
                $eks = strtolower(end($x));
                $ukuran = $_FILES['file']['size'];
                $target_dir = "dist/surat_masuk/";

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

                            $updateSQL = "UPDATE tbl_suratmasuk SET pengirim_surat = ?, nomor_surat = ?, tanggal_masuk = ?, tindak_lanjut = ?, id_perihal = ?, isi_disposisi = ?, id_bidang = ?, keterangan = ?, file = ? WHERE id = ?";
                            $stmt = $db->prepare($updateSQL);
                            $stmt->bindParam(1, $_POST['pengirim']);
                            $stmt->bindParam(2, $_POST['nosurat']);
                            $stmt->bindParam(3, $_POST['tglmasuk']);
                            $stmt->bindParam(4, $_POST['tindak_lanjut']);
                            $stmt->bindParam(5, $_POST['id_perihal']);
                            $stmt->bindParam(6, $_POST['isi_disposisi']);
                            $stmt->bindParam(7, $_POST['id_bidang']);
                            $stmt->bindParam(8, $_POST['keterangan']);
                            $stmt->bindParam(9, $nfile);
                            $stmt->bindParam(10, $_POST['id']);
                            if ($stmt->execute()) {
                                $_SESSION['hasil'] = true;
                                $_SESSION['pesan'] = "Berhasil Ubah data";
                            } else {
                                $_SESSION['hasil'] = false;
                                $_SESSION['pesan'] = "Gagal Ubah data";
                            }
                            echo "<meta http-equiv='refresh' content='0;url=?page=suratmasukread'>";
                        } else {
                            $_SESSION['errSize'] = 'Ukuran file yang diupload terlalu besar!';
                            echo '<script language="javascript">window.history.back();</script>';
                        }
                    } else {
                        $_SESSION['errFormat'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
                        echo '<script language="javascript">window.history.back();</script>';
                    }
                } else {
                    $updateSQL = "UPDATE tbl_suratmasuk SET pengirim_surat = ?, nomor_surat = ?, tanggal_masuk = ?, tindak_lanjut = ?, id_perihal = ?, isi_disposisi = ?, id_bidang = ?, keterangan = ? WHERE id = ?";
                    $stmt = $db->prepare($updateSQL);
                    $stmt->bindParam(1, $_POST['pengirim']);
                    $stmt->bindParam(2, $_POST['nosurat']);
                    $stmt->bindParam(3, $_POST['tglmasuk']);
                    $stmt->bindParam(4, $_POST['tindak_lanjut']);
                    $stmt->bindParam(5, $_POST['id_perihal']);
                    $stmt->bindParam(6, $_POST['isi_disposisi']);
                    $stmt->bindParam(7, $_POST['id_bidang']);
                    $stmt->bindParam(8, $_POST['keterangan']);
                    $stmt->bindParam(9, $_POST['id']);
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
        }

        ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb2">
                    <div class="col-sm-6 text-white">
                        <h1>Ubah Data Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                            <li class="breadcrumb-item"><a href="?page=suratmasukread" class="text-wihte">Surat Masuk</a></li>
                            <li class="breadcrumb-item active text-white">Ubah Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Surat Masuk</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="hidden" class="form-control" name="pengirim" value="<?php echo $row['id'] ?>">
                            <input type="text" class="form-control" name="pengirim" value="<?php echo $row['pengirim_surat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nosurat">Nomor Surat</label>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                            <input type="text" class="form-control" name="nosurat" value="<?php echo $row['nomor_surat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tglmasuk">Tanggal Masuk</label>
                            <input type="hidden" class="form-control" name="tglmasuk" value="<?php echo $row['id'] ?>">
                            <input type="datetime-local" class="form-control" name="tglmasuk" value="<?php echo $row['tanggal_masuk'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tindak_lanjut">Tindak Lanjut</label>
                            <input type="hidden" class="form-control" name="tindak_lanjut" value="<?php echo $row['id'] ?>">
                            <select class="form-control" name="tindak_lanjut" id="tindak_lanjut">
                                <option value="">--Pilih Tindak Lanjut--</option>
                                <option value="Perlu Balasan" <?php echo ($row['tindak_lanjut'] == 'Perlu Balasan') ? " selected" : "" ?>>Perlu Balasan</option>
                                <option value="Tidak Perlu" <?php echo ($row['tindak_lanjut'] == 'Tidak Perlu') ? " selected" : "" ?>>Tidak Perlu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_perihal">Perihal</label>
                            <input type="hidden" class="form-control" name="id_perihal" value="<?php echo $row['id'] ?>">
                            <select class="form-control" name="id_perihal" id="id_perihal">
                                <!-- <option value="">-- Pilih Kategori --</option> -->
                                <?php
                                include_once 'koneksi.php';
                                $result_perihal = mysqli_query($koneksi, "SELECT * FROM tbl_perihal");
                                while ($row_perihal = mysqli_fetch_array($result_perihal)) { ?>
                                    <option value="<?php echo $row_perihal['id'] ?>" <?php if ($row["id"] == $row_perihal['id']) {
                                                                                            echo "SELECTED";
                                                                                        } ?>><?php echo $row_perihal['nama_perihal'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="isi_disposisi">Isi Disposisi</label>
                            <input type="hidden" class="form-control" name="isi_disposisi" value="<?php echo $row['id'] ?>">
                            <input type="text" class="form-control" name="isi_disposisi" value="<?php echo $row['isi_disposisi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_bidang">Bidang</label>
                            <input type="hidden" class="form-control" name="id_bidang" value="<?php echo $row['id'] ?>">
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
                            <label for="keterangan">Keterangan</label>
                            <input type="hidden" class="form-control" name="keterangan" value="<?php echo $row['id'] ?>">
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="hidden" class="form-control" name="file" value="<?php echo $row['id'] ?>">
                            <input type="file" class="form-control" name="file" value="<?php echo $row['file'] ?>">
                            <p>File yang diunggah: <?php echo $row['file'] ?></p>
                        </div>
                        <small class="text-danger">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</small>

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