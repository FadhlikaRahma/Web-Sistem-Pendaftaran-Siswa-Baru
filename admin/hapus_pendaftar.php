<?php
session_start();
require '../../functions.php';

if( !isset($_SESSION["login"])) {
    header("Location: ../login_admin.php");
    exit;
} 
$kode_pinjam = $_GET["kode_pinjam"];
if(hapus_peminjaman($kode_pinjam) > 0){
	echo "<script>alert('Data Berhasil Dihapus'); document.location.href='../peminjam.php'; </script>";
}else {
	echo "<script>alert('Data Gagal Dihapus'); document.location.href='../peminjam.php'; </script>";
}
?>