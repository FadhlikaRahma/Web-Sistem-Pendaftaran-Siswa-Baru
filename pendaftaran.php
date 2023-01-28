<?php
session_start();
require 'functions.php';

if(isset($_POST["daftar"]) ) {

    $nisn               = $_POST["nisn"];
    $id_user            = $_POST["id_user"];
    $nama               = $_POST["nama"];
    $jenis_kelamin      = $_POST ["jenis_kelamin"];
    $asal_sekolah       = $_POST ["asal_sekolah"];
    $tanggal_lahir      = $_POST ["tanggal_lahir"];
    $agama              = $_POST ["agama"];
    $alamat             = $_POST ["alamat"];
    $no_hp              = $_POST ["no_hp"];
 
    $nama_ayah          = $_POST ["nama_ayah"];
    $no_hp_ayah         = $_POST ["no_hp_ayah"];
    $nama_ibu           = $_POST ["nama_ibu"];
    $no_hp_ibu          = $_POST ["no_hp_ibu"];
    $nama_wali          = $_POST["nama_wali"];
    $no_hp_wali         = $_POST ["no_hp_wali"];
  
  $bahasa               = $_POST ["bahasa"];
  $mtk                  = $_POST ["mtk"];
  $ipa                  = $_POST ["ipa"];
  $akhir                = $_POST ["akhir"];
    
    //cek nama sudah ada atau belum
    $result = mysqli_query($conn, "SELECT id_user FROM calonsiswa WHERE id_user = '$id_user'");
    
    if(mysqli_fetch_assoc($result) ) {

        $sudah_daftar = true;
    }else{
    $nm_foto_calonsiswa = $_FILES["foto_calonsiswa"]['name'];
    $ukuranFile_1  = $_FILES["foto_calonsiswa"]['size'];
    $error_1       = $_FILES["foto_calonsiswa"]['error'];
    $tmpName_1     = $_FILES["foto_calonsiswa"]['tmp_name'];

    $nm_foto_akta     = $_FILES["akta"]['name'];
    $ukuranFile_2    = $_FILES["akta"]['size'];
    $error_2         = $_FILES["akta"]['error'];
    $tmpName_2       = $_FILES["akta"]['tmp_name'];

    $nm_foto_kk      = $_FILES["kk"]['name'];
    $ukuranFile_3    = $_FILES["kk"]['size'];
    $error_3         = $_FILES["kk"]['error'];
    $tmpName_3       = $_FILES["kk"]['tmp_name'];

    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar_1 = explode('.', $nm_foto_calonsiswa);
    $ekstensiGambar_1 = strtolower(end($ekstensiGambar_1));

    $ekstensiGambar_2 = explode('.', $nm_foto_akta);
    $ekstensiGambar_2 = strtolower(end($ekstensiGambar_2));

    $ekstensiGambar_3 = explode('.', $nm_foto_kk);
    $ekstensiGambar_3 = strtolower(end($ekstensiGambar_3));

    if (!in_array($ekstensiGambar_1, $ekstensiGambarValid) || !in_array($ekstensiGambar_2, $ekstensiGambarValid) || !in_array($ekstensiGambar_3, $ekstensiGambarValid)) {
    
        $harus_foto = true;
        
    }else{
    //jika ukuran terlalu besar
    if ($ukuranFile_1 > 1000000 || $ukuranFile_2 > 1000000 || $ukuranFile_3 > 1000000 ) {

        $ukuran = true;
       
    }else{
        $nm_foto_ijazah     = $_FILES["ijazah"]['name'];
        $ukuranFile_4    = $_FILES["ijazah"]['size'];
        $error_4         = $_FILES["ijazah"]['error'];
        $tmpName_4       = $_FILES["ijazah"]['tmp_name'];
        $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensiGambar_4 = explode('.', $nm_foto_ijazah);
        $ekstensiGambar_4 = strtolower(end($ekstensiGambar_4));

        if(!empty($_FILES["ijazah"]['name'])) {


            if (!in_array($ekstensiGambar_4, $ekstensiGambarValid)) {
                $harus_foto = true;
            }else{
            //jika ukuran terlalu besar
            if ($ukuranFile_4 > 1000000) {
                $ukuran = true;
            }else{
                //Lolos semua pengecekan
                $namaFileBaru_1  = uniqid();
                $namaFileBaru_1 .= '.';
                $namaFileBaru_1 .= $ekstensiGambar_1;

                $namaFileBaru_2  = uniqid();
                $namaFileBaru_2 .= '.';
                $namaFileBaru_2 .= $ekstensiGambar_2;

                $namaFileBaru_3  = uniqid();
                $namaFileBaru_3 .= '.';
                $namaFileBaru_3 .= $ekstensiGambar_3;

                $namaFileBaru_4  = uniqid();
                $namaFileBaru_4 .= '.';
                $namaFileBaru_4 .= $ekstensiGambar_4;

                move_uploaded_file($tmpName_1, 'C:\xampp\htdocs\TAku\img\foto_siswa\foto'. $namaFileBaru_1);
                move_uploaded_file($tmpName_2, 'C:\xampp\htdocs\TAku\img\akta\foto'. $namaFileBaru_2);
                move_uploaded_file($tmpName_3, 'C:\xampp\htdocs\TAku\img\kartu_keluarga\foto'. $namaFileBaru_3);
                move_uploaded_file($tmpName_4, 'C:\xampp\htdocs\TAku\img\ijazah\foto'. $namaFileBaru_4);
                //tambahkan data baru
                //tambahkan Pendaftar calon siswa
                mysqli_query($conn, "INSERT INTO calonsiswa VALUES 
                ('$nisn',
                '$id_user',
                '$nama',
                '$jenis_kelamin',
                '$asal_sekolah',
                '$tanggal_lahir',
                '$agama',
                '$alamat',
                '$no_hp',
                CURDATE(),'Menunggu', 
                '$nama_ayah',
                '$no_hp_ayah',
                '$nama_ibu',
                '$no_hp_ibu',
                '$nama_wali',
                '$no_hp_wali',
                '$namaFileBaru_1',
                '$namaFileBaru_2', 
                '$namaFileBaru_3', 
                '$namaFileBaru_4', 
                '$bahasa',
                '$mtk',
                '$ipa',
                '$akhir')");
                
                $berhasil = true;
                
            }
    }}
      
        }
      }
    }
  
}
$user = query("SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);
?>


<!doctype html>
<html lang="en">

<head>
 
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>PPDB | SMPN2 Kebonagung!</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="5.css">
<script type="text/javascript">
        window.onload=function(){
        !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
        }
</script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $("#berhasil").modal('show');
    });
    $(document).ready(function(){
        $("#sudah_daftar").modal('show');
    });
    $(document).ready(function(){
        $("#harus_foto").modal('show');
    });
    $(document).ready(function(){
        $("#ukuran").modal('show');
    });
</script>

</head>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../5.css">
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
          <a class="nav-link text-center " aria-current="true" href="calonsiswa/berandacalonsiswa.php"><i class="bi bi-info-square text-center"><br>Beranda</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="calonsiswa/aturancalonsiswa.php"><i class="bi bi-book text-center"><br>Aturan</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="calonsiswa/jadwalcalonsiswa.php"><i class="bi bi-calendar2 text-center"><br>jadwal</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="calonsiswa/lokasicalonsiswa.php"><i class="bi bi-signpost-2 text-center"><br>Lokasi</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="calonsiswa/alurcalonsiswa.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-center active" aria-current="page" href="pendaftaran.php"><i class="bi bi-pencil"><br>Daftar</i></a>
        </li>
        <li class="nav-item">
    <a class="nav-link text-center" aria-current="page" href="calonsiswa/profil_calonsiswa.php"><i class="bi bi-card-list text-center"><br>Hasil</i></a>
  </li>
          <div class="dropdown">
              <a class="btn dropdown-toggle text-white nav-item" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill text-light"><br>Akun</i></a>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                
            <?php foreach( $user as $row)  : ?>
            <h6 class="me-3 ms-3 fw-bold">Selamat Datang <?= $row["username"] ?></h6>
            <?php endforeach ?>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalGantiPassword">
                    <i class="bi bi-gear-fill"></i></i> Ubah Password</a>
                </li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> Log Out</a></li>
            </ul>
       
      </ul>
    </div>
    
    </div>
 
  </nav>
</div>
<!-- end Nabvar -->    

        <br>

       

<body class="bg-info">
<div class="card p-3 m-3">
<!-- Bagian Judul -->
<div class="container-lg">
        <div class="row col-xl"> 
        <div class="col-xl-center">
        <div class="container bg-light text-center">  
        <h3 class="">Formulir Pendaftaran</h3> 
       Calon Siswa SMP Negeri 2 Kebonagung.  </div>
    </div>
  </div>
  </div>
<!-- Bagian Container Form -->
    <div class="container-fluid p-3">
    <!-- <form action="hasil.php" method="GET">   -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card p-3 mb-4">
        <div class="row justify-content-center pe-3 ps-3"> 

    <!-- Input Data Calon Siswa -->
            <div class="col col-lg-6 col-md-6 col-12">
            <p class="fw-bold mb-3">Data Calon Siswa</p>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">NISN<i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="nisn" required title="Angka (0-9)" pattern="[0-9]+">
                        <input type="hidden" class="form-control" name="id_user" value ="<?= $_SESSION["id_user"] ?>">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Lengkap <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="nama" required title="Huruf (A-Z atau a-z)" pattern="[A-Za-z ]+">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Jenis Kelamin <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12 mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" required >
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" required >
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Asal Sekolah <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="asal_sekolah" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Tanggal Lahir <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="date" class="form-control" name="tanggal_lahir" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Agama <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <select class="form-select" name="agama" required >
                            <option value="" selected>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Khong Hu Cu">Khong Hu Cu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Alamat <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <textarea class="form-control" name="alamat" title="Huruf (A-Z atau a-z)" pattern="[A-Za-z0-9 .,]+" required > </textarea>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">NO HP<i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="no_hp" required title="Angka (0-9)" pattern="[0-9]+">
                    </div>
                </div>
            </div>

    <!-- Input Data Orang Tua Siswa -->
            <div class="col col-lg-6 col-md-6 col-12 ">
            <h5 class="text-danger">Petunjuk Pengisian : </h5> 
            <p>1).Lengkapi formulir disamping sesuai dengan data anda.</p> 
            <p>2).gunakan nomer hp aktif menggunakan 08xxx.</p>
        
            <p ></p></li></ul></div> </div>  

    <!-- Input Data Orang Tua Siswa -->
    <div class="col col-lg-6 col-md-6 col-12 ">
            <p class="fw-bold mb-3">Data Orang Tua</p>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Ayah <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="nama_ayah" title="Huruf (A-Z atau a-z)" pattern="[A-Za-z ]+" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No. Telp Ayah <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="no_hp_ayah" title="Angka (0-9)" pattern="[0-9]+" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Ibu <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="nama_ibu" title="Huruf (A-Z atau a-z)" pattern="[A-Za-z ]+" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No Telp Ibu <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="no_hp_ibu" title="Angka (0-9)" pattern="[0-9]+" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Wali <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="nama_wali" title="Huruf (A-Z atau a-z)" pattern="[A-Za-z ]+" required >
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No Telp Wali <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="text" class="form-control" name="no_hp_wali" title="Angka (0-9)" pattern="[0-9]+" required >
                    </div>
                </div>
                </div>
        </div>
</div>    

       
<div class="card">
        <div class="row p-3">
                <!-- Input Data Calon Siswa -->
         
        <p class="fw-bold mb-3 text-center">Lampiran Berkas</p>
            <div class="col-lg-6">
            <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Pas Foto Calon Siswa <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="file" class="form-control" name="foto_calonsiswa" Required>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Akta <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="file" class="form-control" name="akta" >
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Kartu keluarga <i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="file" class="form-control" name="kk" Required>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="input-group mb-3">
                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Ijazah<i class="text-danger">*</i></label>
                    <div class="col-lg-8 col-md-8 col-12">
                        <input type="file" class="form-control" name="ijazah" required>
                    </div>
                </div>
            </div>
            <p class="fw-bold mb-3 text-danger">Keterangan File:</p>
            <H6>1). Harus memiliki format (.jpg), (.png), (.jpeg)</H6>
            <H6>2). Ukuran Minimal 100Mb</H6>

        </div>
        </div>
        
       

        <div class="card">
        <div class="row p-3">
            
        <p class="fw-bold mb-3 text-center">Nilai</p>
            <div class="col-lg-6">
            <div class="perhitungan">
          <div class="mb-3">
            <label for="disabledSelect" class="form-label ms-1">Bahasa Indonesia</label>
            <input type="text" class="form-control rounded-pill" name="bahasa" id="bahasa"  >
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label ms-1">Matematika</label>
            <input type="text" class="form-control rounded-pill" name="mtk" id="mtk"  >
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label ms-1">IPA</label>
            <input type="text" class="form-control rounded-pill" name="ipa" id="ipa" >
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label ms-1">Nilai Akhir</label>
            <input type="text" class="form-control rounded-pill" name="akhir" id="akhir" readonly>
          </div>
        </div>
     
          <script type="text/javascript"src=" https://code.jquery.com/jquery-3.6.1.min.js"></script>
          <script type="text/javascript">
            $(".perhitungan").keyup(function(){
              var bahasa = parseInt($("#bahasa").val())
              var mtk = parseInt($("#mtk").val())
              var ipa = parseInt($("#ipa").val())

              var akhir = bahasa + mtk + ipa;
              $("#akhir").attr("value", akhir)
            });
            </script>
        </div>
      </div>
    </div> </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    <div class="d-grid gap-2">
                            <a href="index.php" class="btn mt-3 rounded-pill text-white btn-danger">Batal</a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="d-grid gap-2">
                        <?php if( isset($_SESSION["login"])) : ?>
                            <button type="submit" name="daftar" class="btn mt-3 rounded-pill text-white" style="background-color: green">Daftar</button>
                        <?php else : ?>
                            <a href="login.php" type="submit" name="daftar" class="btn mt-3 rounded-pill text-white" style="background-color: green">
                                Daftar
                            </a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
    </form>
    </div>   
</div>
<!-- Footer-->

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
   

<!-- Modal Pesan -->
<?php
         if(isset($berhasil)){ ?>
            <div class="modal fade" id="berhasil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Berhasil Melakukan Pendaftaran</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="calonsiswa/profil_calonsiswa.php" style="" class="btn rounded-pill bg-primary mb-2 me-2  text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } 
            if(isset($harus_foto)){ ?>
            <div class="modal fade" id="harus_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="pendaftaran.php"  class="btn rounded-pill mb-2 me-2 bg-info text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

              <?php }
            if(isset($ukuran)){ ?>
            <div class="modal fade" id="ukuran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Ukuran Gambar Terlalu Besar</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="pendaftaran.php" style="background-color: var(--brand3)" class="btn mb-2 me-2 bg-info  rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php } if(isset($sudah_daftar)){ ?>
  
            <div class="modal fade" id="sudah_daftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Anda Sudah Melakukan Pendaftaran</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="pendaftaran.php" style="background-color: var(--brand3)" class="btn mb-2 me-2 bg-info rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
</body>

</html>