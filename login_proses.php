<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'functions.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM akun_calonsiswa WHERE nisn='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 // cek jika user login sebagai admin
 if($data['level']=="panitiappdb"){

  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "cpanitiappdb";
  // alihkan ke halaman dashboard admin
  header("location:admin/akun.php");

 // cek jika user login sebagai pegawai
 }else if($data['level']=="calonsiswa"){
  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "calonsiswa";
  // alihkan ke halaman dashboard pegawai
  header("location:calonsiswa/berandacalonsiswa.php");

 }else{

  // alihkan ke halaman login kembali
  header("location:index.php?pesan=gagal");
 } 
}else{
 header("location:index.php?pesan=gagal");
}

?>