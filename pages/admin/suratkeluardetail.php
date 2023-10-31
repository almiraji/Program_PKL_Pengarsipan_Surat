<?php
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = " SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratkeluar s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.id_surat = ?";
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
                <h1>Detail Data Surat Keluar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=suratmasukread" class="text-wihte">Surat Keluar</a></li>
                    <li class="breadcrumb-item active text-white">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Surat Keluar</h3>
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <td width="20%">Tujuan Surat</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['tujuan_surat'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Bidang</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['nama_bidang'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">No Surat</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['nomor_surat'] ?></td>
                    </tr>
                    <td width="20%">Tanggal Keluar</td>
                    <td width="1%">:</td>
                    <td width="95%"><?php echo $row['tanggal_keluar'] ?></td>
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
                        <td width="20%">Keterangan</td>
                        <td width="1%">:</td>
                        <td width="95%"><?php echo $row['keterangan'] ?></td>
                    </tr>
                    <tr>
                        <td width="20%">File</td>
                        <td width="1%">:</td>
                        <td width="95%"><a href="dist/surat-keluar/<?php echo $row['file'] ?>"><?php echo $row['file'] ?></td>
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
        </div>
    </div>
</section>