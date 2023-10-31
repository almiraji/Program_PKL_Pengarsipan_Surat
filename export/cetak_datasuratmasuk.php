<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    table {
        border-collapse: collapse;
        border-color: black;
    }
</style>

<body onLoad="">
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td width="110px">
                <img src="../dist/img/logodkp3.png" width="90%">
            </td>
            <td>
                <b>
                    <font size="6">PEMERINTAH KOTA BANJARMASIN</font>
                </b>
                <br> <b>
                    <font size="5">DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN</font>
                </b>

                <br><b>
                    <font size="4"> Komplek Screen House</font>
                </b>
                <br>
                <font size="3">Jl. Pangeran Hidayatullah / Lingkar Dalam Utara</font>
                <br>
                <font size="3">Kel. Banua Anyar Kec. Banjarmasin Timur 70239 Email : diskantan_bjm@yahoo.id</font>
        </tr>
        <tr>
            <td colspan="5">
                <hr size="3px" color="black">
            </td>
        </tr>
</body>

<table>
    <thead>
        <tr>
            <div class="table-responsive mt-3">
                <table border="1" width="90%" align="center" cellpadding="4">
                    <thead>
                        <br>
                        <h2 align="center">Laporan Data Surat Masuk</h2>
                        <th>No</th>
                        <th>Pengirim</th>
                        <th>No Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tindak Lanjut</th>
                        <th>Perihal</th>
                        <th>Isi Disposisi</th>
                        <th>Bidang</th>
                        <th>Keterangan</th>
        </tr>
    </thead>
    <?php
    include "../database/database.php";
    $database = new Database();
    $db = $database->getConnection();

    if (isset($_GET['id'])) {
        $selectSql = "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.id = '$_GET[id]'";
    } else {
        $selectSql = "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.status = 'disetujui'";
    }


    $stmt = $db->prepare($selectSql);
    $stmt->execute();

    $no = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pengirim = $row['pengirim_surat'];
        $nosurat = $row['nomor_surat'];
        $tglmasuk = $row['tanggal_masuk'];
        $tindak_lanjut = $row['tindak_lanjut'];
        $perhal = $row['nama_perihal'];
        $isi_disposisi = $row['isi_disposisi'];
        $bidang = $row['nama_bidang'];
        $keterangan = $row['keterangan'];
    ?>
        <tr>

            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $row['pengirim_surat'] ?></td>
            <td align="center"><?php echo $row['nomor_surat'] ?></td>
            <td align="center"><?php echo $row['tanggal_masuk'] ?></td>
            <td align="center"><?php echo $row['tindak_lanjut'] ?></td>
            <td align="center"><?php echo $row['nama_perihal'] ?></td>
            <td align="center"><?php echo $row['isi_disposisi'] ?></td>
            <td align="center"><?php echo $row['nama_bidang'] ?></td>
            <td align="center"><?php echo $row['keterangan'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>



<br><br>
<div id="print">
    <table width="300" align="right" class="ttd">
        <tr>
            <td width="100px" style="padding:20px 20px 20px 20px;" align="center">
            <strong>Mengetahui</strong><br>
                <strong>Kepala Dinas Ketahanan Pangan, Pertanian dan Perikanan</strong>
                <br><br><br><br><br>
                <strong><u>Ir. M. Makhmud, MS</u><br></strong><small>NIP. 19650328 198803 1 009</small>
            </td>
        </tr>
    </table>
</div>

<script>
    window.print();
</script>