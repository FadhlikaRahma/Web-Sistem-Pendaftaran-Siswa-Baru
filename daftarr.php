<?php
session_start();
require '../functions.php';

// if( !isset($_SESSION["login"])) {
//     header("Location: ../login_admin.php");
//     exit;
// } 
//cek apakah tombol submit dah dipencet

if(isset($_POST["submit"])){
//cek data berhasil atau tidak
if(tambah_data($_POST) > 0 ) {
    echo "<script>alert('Data Berhasil Ditambahkan');  </script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');  </script>";
} }
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
    <img src="img/banner.jpg" class="d-block w-100" alt="...">
  </div>
  <div class="carousel-item">
    <img src="img/banner.jpg" class="d-block w-100" alt="...">
  </div>
  <div class="carousel-item">
    <img src="img/banner.jpg" class="d-block w-100" alt="...">
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
    <a class="nav-link text-center " aria-current="page" href="beranda.php"><i class="bi bi-info-square text-center"><br>Beranda</i></a>
  </li>

  <li class="nav-item">
    <a class="nav-link text-center " aria-current="page" href="aturan.php"><i class="bi bi-book text-center"><br>Aturan</i></a>
  </li>

  <li class="nav-item">
    <a class="nav-link text-center " aria-current="page" href="jadwal.php"><i class="bi bi-calendar2 text-center"><br>jadwal</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center " aria-current="page" href="lokasi.php"><i class="bi bi-signpost-2 text-center"><br>Lokasi</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center  " aria-current="page" href="alur.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-center active bg-primary" aria-current="page" href="#"><i class="bi bi-pencil text-center"><br>Daftar</i></a>
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
        <h3 class="">Pendaftaran Zonasi</h3> 
        Berikut informasi mengenai pendaftaran PPDB SMP Zonasi di SMP NEGERI 2 KEBONAGUNG  
        <hr>
<!-- end container 2 -->
<br>

    <!-- start content 1 -->
            <div class="container-lg">
  <div class="row">
  <div class="col-6 row justify-content-center">
  <h4 class="row justify-content-center">Calon Peserta</h4> 
  
  <a href="" type="" class="nav-link text-center bg-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><i class="bi bi-pencil text-center"><br>Pendaftaran </i></a>
  </li><br>
 <p class="row justify-content-center">sebagai peserta &amp; mencetak <br>bukti pra-pendaftaran</p></div>
 <!-- end content 1 -->

 <!-- start content 2 -->
  <div class="col-6">
  <h4 class="">Calon Peserta</h4> 
 <a href="" type="" class="nav-link text-center bg-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><i class="bi bi-pencil text-center"><br>Memantau Hasil Seleksi </i></a>
  </li><br>
  <p>secara online</p></div>
  </div>

</div>
</div></div></div></div>
<!-- end content 2 -->
     <!-- Footer -->
             
<footer style="background-color: #023e8a; color: white;">
  <div class="container pb-1">
        <div class="row mt-2">
          <div class="col-md-9">
           <p class="mt-3" style="font-size: 100%;">Informasi dan Berita terbaru</p>
           <p style="font-size: 80%; line-height: 180%;">

		   	<!-- Button trigger modal -->
<!-- Button trigger modal -->
            <a class="bi bi-geo-alt" data-bs-toggle="modal" data-bs-target="#exampleModal"style="color:white;">Selamat Datang di Website PPDB Online SMPN 2 Kebonagung<br></i></a>
<a class="bi bi-geo-alt" data-bs-toggle="modal" data-bs-target="#caramodal"style="color:white;">Pemberitahuan penting<br></i></a>
                </p>
          </div>
        </div>
        <div class="text-center">
        <p class="mt-3 border-top" style="font-size: 70%; line-height: 100%;"><br>SMPN 2 Kebonagung</p>
        </div>
    </div>  
  </footer>












  <form action="" method="post">
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-xl">
  <div class="modal-content">
      <div class="modal-header text-center">
        <div class="col-xl-12">
        <h5 class="modal-title" id="exampleModalToggleLabel">Formulir Pendaftaran Calon Siswa Baru</h5>

        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-sm-4">
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nisn</label>
          <input type="text" class="form-control rounded-pill" name="nisn" required placeholder="Nisn">
        </div>
      <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Lengkap</label>
          <input type="text" class="form-control rounded-pill" name="nama" required placeholder="Nama Lengkap">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Jenis Kelamin</label><br>
          <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
  <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>

        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Asal SD/MI</label>
          <input type="text" class="form-control rounded-pill" name="asal_sekolah" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Tempat / Tanggal Lahir</label>
          <input type="date" class="form-control rounded-pill" name="tanggal_lahir" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Alamat Tempat Tinggal</label>
          <input type="text" class="form-control rounded-pill" name="alamat" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA</label>
          <input type="text" class="form-control rounded-pill" name="no_hp" required placeholder="Nama Menu">
        </div>
</div>
    <!-- Data Pribadi -->
    </div>
<div class="col-sm-4">
      <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">1. Data Ayah</label>
           </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Ayah</label>
          <input type="text" class="form-control rounded-pill" name="nama_ayah" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA </label>
          <input type="text" class="form-control rounded-pill" name="no_hp_ayah" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">2. Data Ibu</label>
           </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Ibu</label>
          <input type="text" class="form-control rounded-pill" name="nama_ibu" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA</label>
          <input type="text" class="form-control rounded-pill" name="no_hp_ibu" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">3. Data Wali (<i>tidak serumah dengan bapak ibu </i></label>
             </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Wali</label>
          <input type="text" class="form-control rounded-pill" name="nama_wali" required placeholder="Nama Menu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/Wali</label>
          <input type="text" class="form-control rounded-pill" name="no_hp_wali" required placeholder="Nama Menu">
        </div>
         <!-- Data Ortu -->
         </div>

    <div class="col-sm-4">
    <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Akta</label>
          <input type="file" class="form-control rounded-pill" name="akta" required placeholder="Akta">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">kartu Keluarga</label>
          <input type="file" class="form-control rounded-pill" name="kk" required placeholder="Kartu Keluarga">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Ijazah</label>
          <input type="file" class="form-control rounded-pill" name="ijazah" required placeholder="Ijazah">
        </div>

</div>
       

        

        
         

      









      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" type="submit" name="submit">Simpan</button> 
     
        <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">NEXT</button> -->
</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Data Orang Tua</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
</div>
     
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      
      </div>
    </div>
  </div>
</div>
</form>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>