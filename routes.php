<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '':
        case 'home':
            file_exists('pages/home.php') ? include 'pages/home.php' : include "pages/404.php";
            break;


        case 'suratmasukread':
            file_exists('pages/admin/suratmasukread.php') ? include 'pages/admin/suratmasukread.php' : include "pages/404.php";
            break;
        case 'suratmasukcreate':
            file_exists('pages/admin/suratmasukcreate.php') ? include 'pages/admin/suratmasukcreate.php' : include "pages/404.php";
            break;
        case 'suratmasukupdate':
            file_exists('pages/admin/suratmasukupdate.php') ? include 'pages/admin/suratmasukupdate.php' : include "pages/404.php";
            break;
        case 'suratmasukdelete':
            file_exists('pages/admin/suratmasukdelete.php') ? include 'pages/admin/suratmasukdelete.php' : include "pages/404.php";
            break;
        case 'suratmasukdetail':
            file_exists('pages/admin/suratmasukdetail.php') ? include 'pages/admin/suratmasukdetail.php' : include "pages/404.php";
            break;
        case 'suratmasukacc':
            file_exists('pages/admin/suratmasukacc.php') ? include 'pages/admin/suratmasukacc.php' : include "pages/404.php";
            break;
        case 'suratkeluarread':
            file_exists('pages/admin/suratkeluarread.php') ? include 'pages/admin/suratkeluarread.php' : include "pages/404.php";
            break;
        case 'suratkeluarcreate':
            file_exists('pages/admin/suratkeluarcreate.php') ? include 'pages/admin/suratkeluarcreate.php' : include "pages/404.php";
            break;
        case 'suratkeluarupdate':
            file_exists('pages/admin/suratkeluarupdate.php') ? include 'pages/admin/suratkeluarupdate.php' : include "pages/404.php";
            break;
        case 'suratkeluardelete':
            file_exists('pages/admin/suratkeluardelete.php') ? include 'pages/admin/suratkeluardelete.php' : include "pages/404.php";
            break;
        case 'suratkeluardetail':
            file_exists('pages/admin/suratkeluardetail.php') ? include 'pages/admin/suratkeluardetail.php' : include "pages/404.php";
            break;
        case 'suratkeluaracc':
            file_exists('pages/admin/suratkeluaracc.php') ? include 'pages/admin/suratkeluaracc.php' : include "pages/404.php";
            break;
        case 'disposisiread':
            file_exists('pages/admin/disposisiread.php') ? include 'pages/admin/disposisiread.php' : include "pages/404.php";
            break;
        case 'disposisicreate':
            file_exists('pages/admin/disposisicreate.php') ? include 'pages/admin/disposisicreate.php' : include "pages/404.php";
            break;
        case 'disposisiupdate':
            file_exists('pages/admin/disposisiupdate.php') ? include 'pages/admin/disposisiupdate.php' : include "pages/404.php";
            break;
        case 'disposisidetail':
            file_exists('pages/admin/disposisidetail.php') ? include 'pages/admin/disposisidetail.php' : include "pages/404.php";
            break;
        case 'disposisidelete':
            file_exists('pages/admin/disposisidelete.php') ? include 'pages/admin/disposisidelete.php' : include "pages/404.php";
            break;
        case 'disposisiread2':
            file_exists('pages/admin/disposisiread2.php') ? include 'pages/admin/disposisiread2.php' : include "pages/404.php";
            break;
        case 'disposisicreate2':
            file_exists('pages/admin/disposisicreate2.php') ? include 'pages/admin/disposisicreate2.php' : include "pages/404.php";
            break;
        case 'disposisiupdate2':
            file_exists('pages/admin/disposisiupdate2.php') ? include 'pages/admin/disposisiupdate2.php' : include "pages/404.php";
            break;
        case 'disposisidetail2':
            file_exists('pages/admin/disposisidetail2.php') ? include 'pages/admin/disposisidetail2.php' : include "pages/404.php";
            break;
        case 'disposisidelete2':
            file_exists('pages/admin/disposisidelete2.php') ? include 'pages/admin/disposisidelete2.php' : include "pages/404.php";
            break;
        case 'penggunaread':
            file_exists('pages/admin/penggunaread.php') ? include 'pages/admin/penggunaread.php' : include "pages/404.php";
            break;
        case 'penggunacreate':
            file_exists('pages/admin/penggunacreate.php') ? include 'pages/admin/penggunacreate.php' : include "pages/404.php";
            break;
        case 'penggunaupdate':
            file_exists('pages/admin/penggunaupdate.php') ? include 'pages/admin/penggunaupdate.php' : include "pages/404.php";
            break;
        case 'penggunadelete':
            file_exists('pages/admin/penggunadelete.php') ? include 'pages/admin/penggunadelete.php' : include "pages/404.php";
            break;
        case 'passwordread':
            file_exists('pages/admin/passwordread.php') ? include 'pages/admin/passwordread.php' : include "pages/404.php";
            break;
        case 'passwordupdate':
            file_exists('pages/admin/passwordupdate.php') ? include 'pages/admin/passwordupdate.php' : include "pages/404.php";
            break;
        case 'bidangread':
            file_exists('pages/admin/bidangread.php') ? include 'pages/admin/bidangread.php' : include "pages/404.php";
            break;
        case 'bidangcreate':
            file_exists('pages/admin/bidangcreate.php') ? include 'pages/admin/bidangcreate.php' : include "pages/404.php";
            break;
        case 'bidangupdate':
            file_exists('pages/admin/bidangupdate.php') ? include 'pages/admin/bidangupdate.php' : include "pages/404.php";
            break;
        case 'bidangdelete':
            file_exists('pages/admin/bidangdelete.php') ? include 'pages/admin/bidangdelete.php' : include "pages/404.php";
            break;
        case 'perihalread':
            file_exists('pages/admin/perihalread.php') ? include 'pages/admin/perihalread.php' : include "pages/404.php";
            break;
        case 'perihalcreate':
            file_exists('pages/admin/perihalcreate.php') ? include 'pages/admin/perihalcreate.php' : include "pages/404.php";
            break;
        case 'perihalupdate':
            file_exists('pages/admin/perihalupdate.php') ? include 'pages/admin/perihalupdate.php' : include "pages/404.php";
            break;
        case 'perihaldelete':
            file_exists('pages/admin/perihaldelete.php') ? include 'pages/admin/perihaldelete.php' : include "pages/404.php";
            break;



        case 'laporansuratmasuk':
            include "pages/admin/laporansuratmasuk.php";
            break;
        case 'laporansuratkeluar':
            include "pages/admin/laporansuratkeluar.php";
            break;
        case 'laporandisposisi':
            include "pages/admin/laporandisposisi.php";
            break;

        case 'register':
            include "register.php";
            break;

        case 'prosesregister':
            include "proses_register.php";
            break;


        case 'halamanupload':
            include "pages/admin/halamanupload.php";
            break;

        case 'upload':
            include "upload.php";
            break;

        case 'cobapdf':
            include "pages/admin/cobapdf.php";
            break;

        case 'tampilhasil':
            include "pages/admin/tampilhasil.php";
            break;

        case 'view':
            include "pages/admin/view.php";
            break;

        case 'edit':
            include "pages/admin/edit.php";
            break;

        case 'cetak':
            include "pages/admin/cetak.php";
            break;

        case 'uploadpdf':
            include "pages/admin/uploadpdf.php";
            break;

        default:
            include "pages/404.php";
    }
} else {
    include "pages/home.php";
}
