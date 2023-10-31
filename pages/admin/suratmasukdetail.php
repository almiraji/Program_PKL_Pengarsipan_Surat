<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = " SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.id = ?";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
}
?>
<section class="content-header">
    <div class="container-fluid_masuk">
        <div class="row mb2">
            <div class="col-sm-6 text-white">
                <h1>Detail Data Surat Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=suratmasukread" class="text-wihte">Surat Masuk</a></li>
                    <li class="breadcrumb-item active text-white">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Surat Masuk</h3>
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <td width="20%">Pengirim</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['pengirim_surat'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">No Surat</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['nomor_surat'] ?></td>
                    </tr>
                    <td width="20%">Tanggal Masuk</td>
                    <td width="1%">:</td>
                    <td width="95%"><?php echo $row['tanggal_masuk'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Tindak Lanjut</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['tindak_lanjut'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Perihal</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['nama_perihal'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Isi Disposisi</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['isi_disposisi'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Bidang</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['nama_bidang'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Keterangan</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['keterangan'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">File</td>
                        <td width="1%">:</td>
                        <td width="95%"><a href="dist/surat_masuk/<?php echo $row['file'] ?>"><?php echo $row['file'] ?></a></td>
                    </tr>
                    <tr>
                        <td width="20%">Status</td>
                        <td width="1%">:</td>
                        <td width="95%">
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
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="card-header">
                <h3 class="card-title">Detail Disposisi</h3>
            </div>
            <table id="mytable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Isi Disposisi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database = new Database();
                    $db = $database->getConnection();
                    $id_masuk = $_GET['id'];

                    $selectSQL = "SELECT s.*, s.nomor_surat, s.tanggal_masuk, s.id_perihal, s.keterangan FROM tbl_suratmasuk s WHERE s.id=s.id AND s.id = '$id' ";

                    $stmt = $db->prepare($selectSQL);
                    $stmt->execute();

                    $no = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nomor_surat'] ?></td>
                            <td><?php echo $row['tanggal_masuk'] ?></td>
                            <td><?php echo $row['isi_disposisi'] ?></td>
                            <td><?php echo $row['keterangan'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>