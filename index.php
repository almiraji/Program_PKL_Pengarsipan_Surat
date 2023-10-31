<?php
session_start();
if($_SESSION['level']!="user"){
	header("location:login.php?pesan=belum_login");
}
?>

