<?php
session_start();
require '../functions.php';



if( !isset($_SESSION["login"])) {
    header("Location: ../calonsiswa/daftar.php");
    exit;
    $nisn = $_POST["nisn"];
} 
// "cek apakah tombol submit dah dipencet"

// if(isset($_POST["submit"])){
//cek data berhasil atau tidak
// if(tambah_data($_POST) > 0 ) {
//     echo "<script>alert('Data Berhasil Ditambahkan');  </script>";
// }else{
//     echo "<script>alert('Data Gagal Ditambahkan');  </script>";
// } }
// if(isset($_GET["tekan"])){
// $nisn = $_GET["nisn"];

// }
?>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="2.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB | SMPN2 Kebonagung!</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
  </head>
  
  
<!-- BODY -->
  <body class="background_cahganteng">

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="../img/banner.jpg" class="d-block w-100" alt="...">
      </div>
    <div class="carousel-item">
      <img src="../img/banner.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/banner.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
<!-- start breadcrumb -->
  <div class="kontainer_breadcrumd">
    <nav style=" --bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="fw-normal breadcrumb-item"><a href="#">Zonasi</a></li>
        <li class="fw-light text-light breadcrumb-item active" aria-current="page">Lokasi</li>
      </ol>  
    </nav>

<!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse justify-content-center navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav"style=" margin-top:-7.5px; margin-bottom:-7.5px;">
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="../calonsiswa/berandacalonsiswa.php"><i class="bi bi-info-square text-center"><br>Beranda</i></a>
        </li>
        <li class="nav-item">
           <a class="nav-link text-center " aria-current="page" href="../calonsiswa/aturancalonsiswa.php"><i class="bi bi-book text-center"><br>Aturan</i></a>
         </li>
        <li class="nav-item">
    <a class="nav-link text-center " aria-current="page" href="../calonsiswa/jadwalcalonsiswa.php"><i class="bi bi-calendar2 text-center"><br>jadwal</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center " aria-current="page" href="../calonsiswa/lokasicalonsiswa.php"><i class="bi bi-signpost-2 text-center"><br>Lokasi</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center  " aria-current="page" href="../calonsiswa/alurcalonsiswa.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center active bg-primary" aria-current="page" href="#"><i class="bi bi-pencil text-center"><br>Daftar</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center  " aria-current="page" href="../calonsiswa/profil_calonsiswa.php"><i class="bi bi-person-fill text-center"><br>Profil</i></a>
  </li>
</ul>
    </div>
  </div>
</nav>
<!-- end navbar -->  
  <!-- start container 2 -->
  <div class="container-lg">
        <div class="row col-xl-12 justify-content-xl-center"> 
        <div class="col-xl-center">
        <div class="container border border-2 bg-light"> 
        <h3 class="">Hasil Seleksi</h3> 
        Berikut informasi mengenai pendaftaran PPDB SMP Zonasi di SMP NEGERI 2 KEBONAGUNG  
        <hr>
<!-- end container 2 -->

<h2>Menampilkan Data Dari Database PHP</h2>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>                
            </tr>
        </thead>
        <?php

        $no = 1;
        $query = mysqli_query($conn, 'SELECT * FROM hasil_pendaftaran');
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nisn'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>