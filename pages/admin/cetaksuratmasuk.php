<?php
session_start();
include '../../koneksi.php';

//jika waktupanen dari dan waktupanen ke ada maka
if (isset($_POST['dari']) && isset($_POST['ke'])) {
  // tampilkan data yang sesuai dengan range waktupanen yang dicari 
  $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.status = 'disetujui' AND s.tanggal_masuk BETWEEN '" . $_POST['dari'] . "' and '" . $_POST['ke'] . "'");
} else if (empty($_POST['dari']) && empty($_POST['ke'])) {
  //jika tidak ada waktupanen dari dan waktupanen ke maka tampilkan seluruh data
  $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.status = 'disetujui'");
} else {
  $data = mysqli_query($koneksi, "SELECT s.*, p.nama_perihal, b.nama_bidang FROM tbl_suratmasuk s, tbl_perihal p, tbl_bidang b WHERE s.id_perihal = p.id AND s.id_bidang = b.id AND s.status = 'disetujui'");
}
?>


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
        <img src="../../dist/img/logodkp3.png" width="85%">
      </td>
      <td>
        <b>
          <font size="5">PEMERINTAH KOTA BANJARMASIN</font>
        </b>
        <br> <b>
          <font size="4">DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN</font>
        </b>

        <br><b>
          <font size="3"> Komplek Screen House</font>
        </b>
        <br>
        <font size="2">Jl. Pangeran Hidayatullah / Lingkar Dalam Utara</font>
        <br>
        <font size="2">Kel. Banua Anyar Kec. Banjarmasin Timur 70239 Email : diskantan_bjm@yahoo.id</font>
    </tr>
    <tr>
      <td colspan="5">
        <hr size="3px" color="black">
      </td>
    </tr>
</body>



<table width="100%" border="1">
  <thead>
    <h2 align="center">Laporan Data Surat Masuk</h2>
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
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_array($data)) { ?>

      <tr>

        <td align="center">
          <?php echo $no; ?>
        </td>
        <td align="center">
          <?php echo $row["pengirim_surat"]; ?>
        </td>
        <td align="center">
          <?php echo $row["nomor_surat"] ?>
        </td>
        <td align="center">
          <?php echo $row["tanggal_masuk"] ?>
        </td>
        <td align="center">
          <?php echo $row["tindak_lanjut"] ?>
        </td>
        <td align="center">
          <?php echo $row["nama_perihal"] ?>
        </td>
        <td align="center">
          <?php echo $row["isi_disposisi"] ?>
        </td>
        <td align="center">
          <?php echo $row["nama_bidang"] ?>
        </td>
        <td align="center">
          <?php echo $row["keterangan"] ?>
        </td>
      </tr>
    <?php
      $no++;
    }
    ?>
  </tbody>

</table>



<br><br><br><br>
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