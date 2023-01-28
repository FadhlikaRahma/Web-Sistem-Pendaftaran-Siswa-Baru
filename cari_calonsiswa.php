<?php
require 'functions.php';

$no_urut = 0;
if(isset($_POST['submit'])){
 $cari = $_POST['search'];
$query = "SELECT * FROM calonsiswa WHERE nisn LIKE '%$cari%'";
$result = mysqli_query($conn, $query);
$gagalcari=true;
}
while($data = mysqli_fetch_array($result)) {

 $no_urut++;
//  SELECT calon_siswa.nisn, calon_siswa.nama, calon_siswa.jenis_kelamin, calon_siswa.asal_sekolah, calon_siswa.tanggal_lahir, calon_siswa.alamat, calon_siswa.no_hp, data_ortu.nama_ayah, data_ortu.no_hp_ayah, data_ortu.nama_ibu, data_ortu.no_hp_ibu, data_ortu.nama_wali, data_ortu.no_hp_wali, berkas_calon_siswa.akta, berkas_calon_siswa.akta, berkas_calon_siswa.ijazah, nilai.bahasa_indonesia, nilai.Matematika, nilai.ipa, nilai.nilai_akhir FROM calon_siswa, data_ortu, berkas_calon_siswa, nilai WHERE calon_siswa.nisn=data_ortu.nisn,calon_siswa.nisn=berkas_calon_siswa.nisn, calon_siswa.nisn=nilai.nisn

?>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="5.css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB | SMPN2 Kebonagung!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      </head>
  <!-- BODY -->
  <body class="background_cahganteng">

  <!-- Start carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  
      <img src="img/banner.png" class="d-block w-100" alt="...">
    </div>
  </div> 
<!-- end Carousel -->

<!-- end Carousel -->


  

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #023e8a;margin-top -0.5px;margin-bottom:2px;">
    <div class="container ">
      <img src="img/logosmp.png" style="width: 3rem;">
        <p class="navbar-brand mt-3 ms-2" style="font-size: 100%;">PPDB<br>SMPN 2 Kebonagung</p>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    <div class="collapse justify-content-center navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav  ">
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="true" href="index.php"><i class="bi bi-info-square text-center"><br>Beranda</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="aturanhome.php"><i class="bi bi-book text-center"><br>Aturan</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="jadwalhome.php"><i class="bi bi-calendar2 text-center"><br>jadwal</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="lokasihome.php"><i class="bi bi-signpost-2 text-center"><br>Lokasi</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center" aria-current="page" href="alurhome.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center active" aria-current="page" href="#"><i class="bi bi-file-person-fill"><br>Hasil</i></a>
        </li>
      </ul>
    </div>
      <form method="post" action="cari_calonsiswa.php"class="d-flex m-1">
        <input type="text"class="form-control me-2" name="search" placeholder="cari Berdasarkan NISN" required>
     
        <input class="btn btn-outline-light" type="submit" name="submit" value="CARI">
      </form>
    </div>
 
  </nav>
</div>
  <!-- end Nabvar -->        

 


<div class="container mt-4">

        <div class="row "> 
            <div class="col-xl-12 bg-light">
         
        <h3 class="">Data Siswa Pendaftar</h3> 
        Setelah Status Diterima mohon langsung melakukan print/cetak data untuk daftar ulang  
            </div>
        </div>
</div>
 
<div class="container mt-4">

        <div class="row "> 
            <div class="col-xl-12 bg-light">
            <table class="table table-bordered">
  
    <tr bgcolor="#f0f0f0">
      <th scope=""colspan="2" class=" text-end"><a target="_blank" href="data3.php?id=<?=$data["nisn"];?>" class="btn text-whit bg-success" ><i class="bi bi-printer-fill text-white"><br>Cetak PDF</i></a></th>
    </tr>

    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Biodata Calon Siswa</th>
   
    </tr>
    <tr>
      <td scope="row">NISN</td>
      <td><?php echo $data['nisn']; ?></td>

     
    </tr>
    <tr>
      <td scope="row">Nama</td>
      <td><?php echo $data['nama']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Jenis Kelamin</td>
      <td><?php echo $data['jenis_kelamin']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Asal Sekolah</td>
      <td><?php echo $data['asal_sekolah']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Tanggal Lahir</td>
      <td><?php $tgl = $data['tanggal_lahir']; echo substr($tgl, 0, -5) . '**-**'; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Alamat</td>
      <td><?php echo $data['alamat']; ?></td>
    
    </tr>
    <tr>
      <td scope="row" >No HP</td>
      <td type="password"><?php $noTlp = $data['no_hp']; echo substr($noTlp, 0, -5) . '*****'; ?></td>
      
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Orang Tua</th>
    </tr>
    <tr>
      <td scope="row">Nama Ayah</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">No HP Ayah</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">Nama Ibu</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">No HP Ibu</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">Nama Wali</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">No HP Wali</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Tambahan</th>
    </tr>
    <tr>
      <td scope="row">Foto Calon Siswa</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">Kartu Keluarga</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">ijazah</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr>
      <td scope="row">Akta</td>
      <td><i class="bi bi-check text-success"></i></td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Nilai UN</th>
    </tr>
    <tr>
      <td scope="row">Bahasa Indonesia</td>
      <td><?php echo $data['bahasa']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Matematika</td>
      <td><?php echo $data['mtk']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">IPA</td>
      <td><?php echo $data['ipa']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Nilai Akhir</td>
      <td><?php echo $data['nilai_akhir']; ?></td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Status Pendaftaran</th>
    </tr>
    <tr>
      <td scope="row">status</td>
      <td><?php echo $data['status']; ?></td>
    
    </tr>
   
 
</table>
       
            </div>
        </div>
</div>
<!-- end container 1 -->


               
          
  
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
<?php }?> 


  
<?php if(isset($gagalcari)){ ?>

  <div class="modal fade" id="gagalcari" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
    
     <div class="col col-lg-4 col-md-4 col-12 ">
     <link rel="stylesheet" href="5.css">
     <img src="img/banner.png" style="width: 1350px;" alt="...">
        <img src="image/gagal.jpg" style="width: 190px; " alt="...">
      </div>
         <div class="col col-lg-4 col-md-4 col-12 ">
          <h1>Data tidak ditemukan!</h1>
          <p>Jika Anda melakukan pencarian NISN, Mohon periksa kembali nomor yang Anda isikan.</p> 
          <p>Jika kesalahan ini berasal dari tautan yang Anda klik, mohon periksa kembali alamat tautan yang Anda tuju.</p> <br> 
          <a href="index.php" class="btn btn-primary "  ><i class="bi bi-undo"></i>ke Halaman Sebelumnya</a>
          </div>
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
          <?php } ?>
              

  


  <!-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">DATA PRIBADI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Lengkap</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Nama Lengkap">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Jenis Kelamin</label><br>
          <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>

</div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Asal SD/MI</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Asal SD/MI">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Tempat / Tanggal Lahir</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Tempat tanggal lahir">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Alamat Tempat Tinggal</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Alamat">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="No HP/WA">
        </div>










      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">NEXT</button>
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
      <div class="modal-body">
      <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">1. Data Ayah</label>
           </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Ayah</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Nama Ayah">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA </label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="No HP/WA">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">2. Data Ibu</label>
           </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Ibu</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Nama Ibu">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/WA</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="No HP/WA">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">3. Data Wali (<i>tidak serumah dengan bapak ibu </i></label>
             </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">Nama Wali</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="Nama Wali">
        </div>
        <div class="mb-3">
          <label for="disabledSelect" class="form-label ms-1">No HP/Wali</label>
          <input type="text" class="form-control rounded-pill" name="nama_menu" required placeholder="No HP/WA">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div> -->






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>