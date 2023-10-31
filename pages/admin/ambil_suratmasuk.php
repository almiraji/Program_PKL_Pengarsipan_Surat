<?php
session_start();
include '../../koneksi.php';

//jika waktupanen dari dan waktupanen ke ada maka
if (isset($_GET['dari']) && isset($_GET['ke'])) {
    // tampilkan data yang sesuai dengan range waktupanen yang dicari 
    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.tanggal_masuk BETWEEN '" . $_GET['dari'] . "' and '" . $_GET['ke'] . "'");
} else if (empty($_GET['dari']) && empty($_GET['ke'])) {
    //jika tidak ada waktupanen dari dan waktupanen ke maka tampilkan seluruh data
    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id");
} else {
    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id");
}
?>
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Surat Masuk</h3>
        </div>
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <br>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengirim</th>
                        <th>No Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tindak Lanjut</th>
                        <th>Perihal</th>
                        <th>Isi Disposisi</th>
                        <th>Bidang</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_array($data)) { ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $row["pengirim_surat"]; ?>
                            </td>
                            <td>
                                <?php echo $row["nomor_surat"]; ?>
                            </td>
                            <td>
                                <?php echo $row["tanggal_masuk"] ?>
                            </td>
                            <td>
                                <?php echo $row["tindak_lanjut"]; ?>
                            </td>
                            <td>
                                <?php echo $row["nama_perihal"] ?>
                            </td>
                            <td>
                                <?php echo $row["isi_disposisi"] ?>
                            </td>
                            <td>
                                <?php echo $row["nama_bidang"] ?>
                            </td>
                            <td>
                                <?php echo $row["keterangan"] ?>
                            </td>
                            <td>
                                <?php echo $row["status"] ?>
                            </td>
                            <td>
                                <a href="export/cetak_datasuratmasuk.php?id=<?= $row["id"] ?>" target="_blank" class="btn btn-success btn-sm"> <i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
        </div>
    </div>
</div>
</table>
<script>
    $(function() {
        $('#mytable').DataTable()
    });
</script>