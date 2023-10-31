<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from desa");

$html .= '<table border="0" align="center" width="100%">
        <tr align="center">
            <td width="110px">
                <img src="../dist/img/logodkp3.png" width="90%"></td>';
<td>
    <b><font size="6">PEMERINTAH KOTA BANJARMASIN</font> </b>
        <br> <b>
        <font size="5">DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN</font>
</b>

<br><b>
<font size="4"> Komplek Screen House</font></b>
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
</body>';

$html = '<center><h3>Daftar desa</h3></center><hr/><br/>';


$html .= '<table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Kode Pos</th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['nama_desa']."</td>
        <td>".$row['nama_kecamatan']."</td>
        <td>".$row['kode_pos']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_desa.pdf');
?>