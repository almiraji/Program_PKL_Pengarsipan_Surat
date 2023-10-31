<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tbl = $_GET['user'];
    if ($tbl == 'pegawai') {
        $tbl = 'tbl_pegawai';
    } else if ($tbl == 'admin') {
        $tbl = 'tbl_admin';
    } else if ($tbl == 'kadis') {
        $tbl = 'tbl_kepala_dinas';
    }

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = " DELETE FROM $tbl WHERE id = ?";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(1, $_GET['id']);

    if ($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Berhasil Hapus data";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Gagal Hapus data";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=penggunaread'>"; //ubah sesuai nama php
