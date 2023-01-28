<?php
session_start();
require 'functions.php';



if( !isset($_SESSION["login"])) {
    header("Location: pendaftaran.php");
    exit;
} 
if(isset($_GET["tekan"])){
$nisn = $_GET["nisn"];
$nama = $_GET["nama"];
$jenis_kelamin = $_GET["jenis_kelamin"];
$asal_sekolah = $_GET["asal_sekolah"];
$tanggal_lahir = $_GET["tanggal_lahir"];
$alamat = $_GET["alamat"];
$no_hp = $_GET["no_hp"];
$nama_ayah = $_GET["nama_ayah"];
$no_hp_ayah = $_GET["no_hp_ayah"];
$nama_ibu = $_GET["nama_ibu"];
$no_hp_ibu = $_GET["no_hp_ibu"];
$nama_wali = $_GET["nama_wali"];
$no_hp_wali = $_GET["no_hp_wali"];
$akta = $_GET["akta"];
$kk = $_GET["kk"];
$ijazah = $_GET["ijazah"];
$bahasa = $_GET["bahasa"];
$mtk = $_GET["mtk"];
$ipa = $_GET["ipa"];
$akhir = $_GET["akhir"];
}
// "cek apakah tombol submit dah dipencet"

if(isset($_POST["submitt"])){
//cek data berhasil atau tidak
if(tambah_data($_POST) > 0 ) {
    echo "<script>alert('Data Berhasil Ditambahkan');document.location.href='../daftarcalonsiswa.php';  </script>";
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
        <h3 class="">Pendaftaran Zonasi</h3> 
        Berikut informasi mengenai pendaftaran PPDB SMP Zonasi di SMP NEGERI 2 KEBONAGUNG  
        <hr>
<!-- end container 2 -->
<br>

    

<!-- end content 2 -->
<form action="" method="POST"> 
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">NISN</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $nisn; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="nisn"  value= <?php echo $nisn; ?> >
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $nama; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="nama" value= <?php echo $nama; ?> >
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">jenis kelamin</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $jenis_kelamin; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="jenis_kelamin" value= <?php echo $jenis_kelamin; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Asal sekolah</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $asal_sekolah; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="asal_sekolah" value= <?php echo $asal_sekolah; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal lahir</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $tanggal_lahir; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="tanggal_lahir" value= <?php echo $tanggal_lahir; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $alamat; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="alamat" value= <?php echo $alamat; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No HP</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $no_hp; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="no_hp" value= <?php echo $no_hp; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama  Ayah</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $nama_ayah; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="nama_ayah" value= <?php echo $nama_ayah; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No HP ayah</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $no_hp_ayah; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="no_hp_ayah" value= <?php echo $no_hp_ayah; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Ibu</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $nama_ibu; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="nama_ibu" value= <?php echo $nama_ibu; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No HP Ibu</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $no_hp_ibu; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="no_hp_ibu" value= <?php echo $no_hp_ibu; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Wali</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $nama_wali; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="nama_wali" value= <?php echo $nama_wali; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No HP Wali</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $no_hp_wali; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="no_hp_wali" value= <?php echo $no_hp_wali; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Akta</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $akta; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="akta" value= <?php echo $akta; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">KK</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text" value= <?php echo $kk; ?> disabled>
    
    <input class="form-control form-control-lg" type="hidden" name="kk" value= <?php echo $kk; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Ijazah</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $ijazah; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="ijazah" value= <?php echo $ijazah; ?>>
    </div>
</div>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Bahasa Indonesia</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $bahasa; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="bahasa" value= <?php echo $bahasa; ?>>
    </div>
</div>


<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Matematika</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $mtk; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="mtk" value= <?php echo $mtk; ?>>
    </div>
</div>


<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">IPA</label>
    <div class="col-sm-10">
    <input class="form-control form-control-lg" type="text"  value= <?php echo $ipa; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="ipa" value= <?php echo $ipa; ?>>
    </div>
</div>


<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nilai AKhir</label>
    <div class="col-sm-10">
  
    <input class="form-control form-control-lg" type="text"  value= <?php echo $akhir; ?> disabled>
    <input class="form-control form-control-lg" type="hidden" name="akhir" value= <?php echo $akhir; ?>>
    </div>
</div>

<div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Apakah Data sudah benar?
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>




                 <button class="btn btn-primary" type="submit" name="submitt">Simpan</button> 
</form>
</div> </div></div>        
        </div>   </div>

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

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>