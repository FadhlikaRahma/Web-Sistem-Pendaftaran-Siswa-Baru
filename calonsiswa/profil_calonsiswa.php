<?php
session_start();

require '../functions.php';


if( !isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

if( $_SESSION["level"] != "user") {
  header("Location: ../admin/akun.php");
  exit;
}

if(isset($_POST["ubah_password"]) ) {
    $id_user = ($_POST["id_user"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    //konfirmasi password
    if ($password !== $password2) {
        $konfirmasi_password = true;
    }else{

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan akun baru
    $query = "UPDATE akun SET password = '$password' WHERE id_user = $id_user";
    mysqli_query($conn, $query);
    $password_berhasil = true;
}
}
if(isset($_POST["edit"])){
    //cek data berhasil atau tidak
    if(edit_data_siswa($_POST) > 0 ) {
        $edit_data_berhasil = true;
    }else{
        $edit_data_gagal = true;
    } 
}
if(isset($_POST["kk"])){
    $nisn       = $_POST["nisn"];
    $namaFile   = $_FILES['kk']['name'];
    $ukuranFile = $_FILES['kk']['size'];
    $error      = $_FILES['kk']['error'];
    $tmpName    = $_FILES['kk']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        
        $bukan_foto = true;
    }else{
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        
        $ukuran_foto = true;
    }else{
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\TAku\img\kartu_keluarga\foto'. $namaFileBaru);
 
    	mysqli_query($conn, "UPDATE calonsiswa SET kk  = '$namaFileBaru' WHERE nisn = $nisn");

    $foto_berhasil = true;
    }}
}
if(isset($_POST["ijazah"])){
    $nisn     = $_POST["nisn"];
    $namaFile   = $_FILES['ijazah']['name'];
    $ukuranFile = $_FILES['ijazah']['size'];
    $error      = $_FILES['ijazah']['error'];
    $tmpName    = $_FILES['ijazah']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        
        $bukan_foto = true;
    }else{
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        
        $ukuran_foto = true;
    }else{
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\TAku\img\ijazah\foto'. $namaFileBaru);
 
    	mysqli_query($conn, "UPDATE calonsiswa SET ijazah  = '$namaFileBaru' WHERE nisn = $nisn");

    $foto_berhasil = true;
    }}
}
if(isset($_POST["akta"])){
    $nisn       = $_POST["nisn"];
    $namaFile   = $_FILES['akta']['name'];
    $ukuranFile = $_FILES['akta']['size'];
    $error      = $_FILES['akta']['error'];
    $tmpName    = $_FILES['akta']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        
        $bukan_foto = true;
    }else{
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        
        $ukuran_foto = true;
    }else{
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\TAku\img\akta\foto'. $namaFileBaru);
 
    	mysqli_query($conn, "UPDATE calonsiswa SET akta  = '$namaFileBaru' WHERE nisn = $nisn");

    $foto_berhasil = true;
    }}
}
if(isset($_POST["calon_siswa"])){
    $nisn       = $_POST["nisn"];
    $namaFile   = $_FILES['calon_siswa']['name'];
    $ukuranFile = $_FILES['calon_siswa']['size'];
    $error      = $_FILES['calon_siswa']['error'];
    $tmpName    = $_FILES['calon_siswa']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        
        $bukan_foto = true;
    }else{
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        
        $ukuran_foto = true;
    }else{
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\TAku\img\foto_siswa\foto'. $namaFileBaru);
 
    	mysqli_query($conn, "UPDATE calonsiswa SET foto_calonsiswa  = '$namaFileBaru' WHERE nisn = $nisn");

    $foto_berhasil = true;
    }}
}

$user = mysqli_query($conn,"SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);
$daftar_calonsiswa = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE id_user = ".$_SESSION["id_user"]);
$id_user = mysqli_query($conn,"SELECT id_user FROM calonsiswa WHERE id_user =".$_SESSION["id_user"]);
?>

<!doctype html>
<html lang="en">

<head>
<title>PPDB | SMPN2 Kebonagung!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include '../header/header.php'; ?>
    <link rel="stylesheet" href="../5.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
            window.onload=function(){
            !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
            }
    </script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#password_berhasil").modal('show');
        });
        $(document).ready(function(){
            $("#konfirmasi_password").modal('show');
        });
        $(document).ready(function(){
            $("#edit_data_berhasil").modal('show');
        });
        $(document).ready(function(){
            $("#edit_data_gagal").modal('show');
        });
        $(document).ready(function(){
            $("#foto_berhasil").modal('show');
        });
        $(document).ready(function(){
            $("#bukan_foto").modal('show');
        });
        $(document).ready(function(){
            $("#ukuran_foto").modal('show');
        });
    </script>
</head>


  
  <!-- BODY -->
  <body class="background_cahganteng">

  <!-- Start carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
  
      <img src="../img/banner.png" class="d-block w-100" alt="...">
    </div>
  </div> 
<!-- end Carousel -->

<!-- end Carousel -->


  

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #023e8a;margin-top -0.5px;margin-bottom:2px;">
    <div class="container ">
      <img src="../img/logosmp.png" style="width: 3rem;">
        <p class="navbar-brand mt-3 ms-2" style="font-size: 100%;">PPDB<br>SMPN 2 Kebonagung</p>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    <div class="collapse justify-content-center navbar-collapse" id="navbarNavDropdown">
     
    <ul class="navbar-nav  ">
        <li class="nav-item">
          <a class="nav-link text-center " aria-current="true" href="berandacalonsiswa.php"><i class="bi bi-info-square text-center"><br>Beranda</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="aturancalonsiswa.php"><i class="bi bi-book text-center"><br>Aturan</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="jadwalcalonsiswa.php"><i class="bi bi-calendar2 text-center"><br>jadwal</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center " aria-current="page" href="lokasicalonsiswa.php"><i class="bi bi-signpost-2 text-center"><br>Lokasi</i></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center  " aria-current="page" href="alurcalonsiswa.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-center" aria-current="page" href="../pendaftaran.php"><i class="bi bi-pencil"><br>Daftar</i></a>
        </li>
        <li class="nav-item">
    <a class="nav-link text-center active" aria-current="page" href="../calonsiswa/profil_calonsiswa.php"><i class="bi bi-card-list text-center"><br>Hasil</i></a>
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
            <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-power"></i> Log Out</a></li>
            </ul>
            </
      </ul>
    </div>
    
    </div>
 
  </nav>
</div>
  <!-- end Nabvar -->    

    
<!-- Main -->
    <div class="pt-3 pb-3">  


<div class="container card p-3">

<div class="row justify-content-center">

</div>

            <?php if( mysqli_fetch_assoc($id_user)) : ?>
                <!-- Data Pendaftaran -->
                    <h4 class="fw-bold mt-3"> Data Pendaftaran </h4>
                    <hr>
                    <div class="table-responsive mb-3">
                        <table class="table text-center table-bordered">
                            <thead class="thead">
                                <tr>
                                <th scope="col">Id Pendaftaran</th>
                                <th scope="col">Nama Calon Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                                <tr>
                                    <th scope="row"><?= $row["id_user"] ?></th>
                                    <td><?= $row["nama"] ?></td>
                                    <td><?= $row["jenis_kelamin"] ?></td>
                                    <td><?= $row["alamat"] ?></td>
                                    <td><?= $row["tanggal_lahir"] ?></td>
                                    <?php if( $row["status"] == "Diterima") : ?>
                                        <td class="table-success"><?= $row["status"] ?></td>
                                    <?php elseif( $row["status"] == "Tidak Diterima") : ?>
                                        <td class="table-danger"><?= $row["status"] ?></td>
                                    <?php else : ?>
                                        <td class="table-secondary"><?= $row["status"] ?></td>
                                    <?php endif ?>   
                                    
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <!-- Detail Data Pendaftaran -->
                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                    <h4 class="fw-bold d-lg-inline-block"> Detail Data Pendaftaran</h4>
                    <button type="submit" class="btn btn-outline-secondary col-lg-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2<?= $row["nisn"]?>">
                        <i class="bi bi-pencil-square"> Edit Pendaftaran</i>
                    </button>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal2<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <?php include('modal.php'); ?>
                        </div>
                    </form>
                <?php endforeach ?>
                    <hr>
                            <div class="container-fluid">  
                                <div class="row">
                                <!-- Input Data Calon Siswa -->
                                            <div class="col col-lg-4 col-md-4 col-12">
                                                <p class="fw-bold mb-3">Data Calon Siswa</p>
                                                    <input type="text" hidden class="form-control-plaintext" name="nisn" value="<?= $row["nisn"]?>">
                                                    <input type="text" hidden class="form-control-plaintext" name="id_user" value="<?= $row["id_user"]?>">
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Lengkap</label>
                                                    <div class="col-lg-8 col-md-8 col-12">   
                                                        <input type="text" readonly class="form-control-plaintext" name="nama_siswa" value=": <?= $row["nama"]?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="jenis_kelamin" value=": <?= $row["jenis_kelamin"]?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Asal Sekolah</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="asal_sekolah" value=": <?= $row["asal_sekolah"]?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="tanggal_lahir" value=": <?= $row["tanggal_lahir"]?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Agama</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="agama" value=": <?= $row["agama"]?>">
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">NO HP</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="no_hp" value=": <?= $row["no_hp"]?>">
                                                    </div>
                                                </div>
                                               
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Status</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                    <?php if( $row["status"] == "Diterima") : ?>
                                                            <input type="text" readonly class="form-control-plaintext text-success" name="agama" value=": <?= $row["status"] ?>">
                                                        <?php elseif( $row["status"] == "Tidak Diterima") : ?>
                                                            <input type="text" readonly class="form-control-plaintext text-danger" name="agama" value=": <?= $row["status"] ?>">
                                                        <?php else : ?>
                                                            <input type="text" readonly class="form-control-plaintext text-primary" name="agama" value=": <?= $row["status"] ?>">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Tanggal Pendaftaran</label>
                                                    <div class="col-lg-8 col-md-8 col-6">
                                                        <input type="text" readonly class="form-control-plaintext" name="tgl_pendaftaran" value=": <?= $row["tanggal_daftar"]?>">
                                                    </div>
                                                </div>
                                            </div>

                                <!-- Input Data Orang Tua Siswa -->
                                        <div class="col col-lg-4 col-md-4 col-12 ">
                                            <p class="fw-bold mb-3">Data Orang Tua</p>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Ayah</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="nama_ayah" value=": <?= $row["nama_ayah"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">No HP Ayah</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="no_hp_ayah" value=": <?= $row["no_hp_ayah"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Ibu</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="nama_ibu" value=": <?= $row["nama_ibu"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">No HP Ibu</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="no_hp_ibu" value=": <?= $row["no_hp_ibu"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Wali</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="nama_wali" value=": <?= $row["nama_wali"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Nomor HP Wali</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="no_hp_wali" value=": <?= $row["no_hp_wali"]?>">
                                                </div>
                                            </div>
                                          
                                        </div>
                            

 <!-- Input Data Orang Tua Siswa -->
 <div class="col col-lg-4 col-md-4 col-12 ">
                                            <p class="fw-bold mb-3">Data Nilai</p>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-12 col-form-label">Bahasa Indonesia</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="bahasa" value=": <?= $row["bahasa"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Matematika</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="mtk" value=": <?= $row["mtk"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">IPA</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="ipa" value=": <?= $row["ipa"]?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label class="col-lg-4 col-md-4 col-6 col-form-label">Nilai Akhir</label>
                                                <div class="col-lg-8 col-md-8 col-6">
                                                    <input type="text" readonly class="form-control-plaintext" name="nilai_akhir" value=": <?= $row["nilai_akhir"]?>">
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                            </div>
<!-- Lampiran -->
<div class="container-fluid">  
    <div class="row">
    <p class="fw-bold mb-3">Lampiran</p>
    <!-- Calon Siswa -->
    <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
        <div class="card">
            <div class="card-header"> Foto Calon Siswa </div>
            <div class="card-body">
                <a href="..\img\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" target="blank"><img src="..\img\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" class="rounded mx-auto d-block" alt="Logo" height="200" ></a>
                <input type="text" hidden readonly class="form-control-plaintext" name="foto_calonsiswa" value="<?= $row["foto_calonsiswa"]?>">
            </div>
        </div> 
            <div class="card-footer">
                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                <button type="submit" class="btn btn-outline-secondary col-lg-12 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal3<?= $row["nisn"]?>">
                    <i class="bi bi-pencil-square"> Edit Foto Calon Siswa</i>
                </button>
                <!-- Modal Edit -->
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal3<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                <!-- Modal -->
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lampiran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">  
                        <div class="row">
                            </div>
                            <div class="container-fluid">  
                                <div class="row">
                                    <div class="col col-lg-12 col-md-12 col-12 text-center mb-3">
                                        <div class="card">
                                            <div class="card-header"> Foto Calon Siswa </div>
                                            <div class="card-body">
                                                <a href="..\image\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" target="blank"><img src="..\img\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" class="rounded mx-auto w-75 d-block" alt="Logo"></a>
                                            </div>
                                            <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="nisn" value="<?= $row["nisn"]?>"> 
                                                <input type="text" hidden class="form-control" name="calon_siswa" value="<?= $row["foto_calonsiswa"]?>"> 
                                                <input type="file" required class="form-control" name="calon_siswa">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="calon_siswa">Simpan</button>
                </div>
                </div>
                </div>
                </div>
                </form>
                <?php endforeach ?>
            </div>
    </div>
    <!-- KIA -->
    <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
        <div class="card">
            <div class="card-header"> AKTA </div>
            <div class="card-body">
                <a href="..\img\akta\foto<?= $row["akta"]?>" target="blank"><img src="..\img\akta\foto<?= $row["akta"]?>"class="rounded mx-auto d-block" alt="Logo" height="200" ></a>
                <input type="text" hidden readonly class="form-control-plaintext" name="akta" value="<?= $row["akta"]?>">
            </div>
            <div class="card-footer">
                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                <button type="submit" class="btn btn-outline-secondary col-lg-12 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal4<?= $row["nisn"]?>">
                    <i class="bi bi-pencil-square"> Edit Akta</i>
                </button>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal4<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lampiran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="container-fluid">  
                    <div class="row"></div>
                        <div class="container-fluid">  
                            <div class="row">
                                <div class="col col-lg-12 col-md-12 col-12 text-center mb-3">
                                    <div class="card">
                                        <div class="card-header"> Akta </div>
                                        <div class="card-body">
                                            <a href="..\img\akta\foto<?= $row["akta"]?>" target="blank"><img src="..\img\akta\foto<?= $row["akta"]?>" class="rounded mx-auto w-75 d-block" alt="Logo"></a>
                                        </div>
                                        <div class="card-footer">
                                            
                                        <input type="text" hidden class="form-control" name="nisn" value="<?= $row["nisn"]?>"> 
                                            <input type="text" hidden class="form-control" name="akta" value="<?= $row["akta"]?>"> 
                                            <input type="file" required class="form-control" name="akta">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="kia">Simpan</button>
                    </div>
                </div>
            </div>
            </div>
            </form>
            <?php endforeach ?>
            </div>
        </div> 
    </div>
    <!-- Kaertu Keluarga -->
    <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
        <div class="card">
            <div class="card-header"> Kartu Keluarga </div>
            <div class="card-body">
                <a href="..\img\kartu_keluarga\foto<?= $row["kk"]?>" target="blank"><img src="..\img\kartu_keluarga\foto<?= $row["kk"]?>" class="rounded mx-auto d-block" alt="Logo" height="200" ></a>
                <input type="text" hidden readonly class="form-control-plaintext" name="kk" value="<?= $row["kk"]?>">
            </div>
            <div class="card-footer">
                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                <button type="submit" class="btn btn-outline-secondary col-lg-12 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal5<?= $row["nisn"]?>">
                    <i class="bi bi-pencil-square"> Edit Kartu Keluarga</i>
                </button>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal5<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lampiran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">  
                    <div class="row"></div>
                        <div class="container-fluid">  
                            <div class="row">
                                <div class="col col-lg-12 col-md-12 col-12 text-center mb-3">
                                    <div class="card">
                                        <div class="card-header"> Kartu Keluarga </div>
                                        <div class="card-body">
                                            <a href="..\img\kartu_keluarga\foto<?= $row["kk"]?>" target="blank"><img src="..\img\kartu_keluarga\foto<?= $row["kk"]?>" class="rounded mx-auto w-75 d-block" alt="Logo"></a>
                                        </div>
                                        <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="nisn" value="<?= $row["nisn"]?>"> 
                                            <input type="text" hidden class="form-control" name="kk" value="<?= $row["kk"]?>"> 
                                            <input type="file" required class="form-control" name="kk">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="kk">Simpan</button>
                </div>
                </div>
                </div>
                </div>
                </form>
                <?php endforeach ?>
            </div>
        </div> 
    </div>

    <!-- Calon KMS -->
    <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
        <div class="card">
            <div class="card-header"> Ijazah </div>
            <div class="card-body">
                <a href="..\img\ijazah\foto<?= $row["ijazah"]?>" target="blank"><img src="..\img\ijazah\foto<?= $row["ijazah"]?>" class="rounded mx-auto d-block" alt="Gambar" height="200" ></a>
                <input type="text" hidden readonly class="form-control-plaintext" name="ijazah" value="<?= $row["ijazah"]?>">
            </div>
        </div> 
            <div class="card-footer">
                <?php foreach( $daftar_calonsiswa as $row)  : ?>
                <button type="submit" class="btn btn-outline-secondary col-lg-12 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal6<?= $row["nisn"]?>">
                    <i class="bi bi-pencil-square"> Edit Ijazah</i>
                </button>
                <!-- Modal Edit -->
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal fade" id="exampleModal6<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                <!-- Modal -->
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Lampiran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">  
                        <div class="row">
                            </div>
                            <div class="container-fluid">  
                                <div class="row">
                                    <div class="col col-lg-12 col-md-12 col-12 text-center mb-3">
                                        <div class="card">
                                            <div class="card-header"> Ijazah </div>
                                            <div class="card-body">
                                                <a href="..\img\ijazah\foto<?= $row["ijazah"]?>" target="blank"><img src="..\img\ijazah\foto<?= $row["ijazah"]?>" class="rounded mx-auto w-75 d-block" alt="Logo"></a>
                                            </div>
                                            <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="nisn" value="<?= $row["nisn"]?>"> 
                                                <input type="text" hidden class="form-control" name="ijazah" value="<?= $row["ijazah"]?>"> 
                                                <input type="file" required class="form-control" name="ijazah">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="calon_siswa">Simpan</button>
                </div>
                </div>
                </div>
                </div>
                </form>
                <?php endforeach ?>
            </div>
    </div>
    </div>
    </div> 
            <?php else : ?>
                <tr>
                <h4 class="fw-bold mt-5"> Data Pendaftaran </h4>
                <hr>
                    <div class="table-responsive mb-5">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">Id Pendaftaran</th>
                                <th scope="col">Nama Calon Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7"><h5 class="fw-bold text-center text-secondary">Belum Melakukan Pendaftaran</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="fw-bold"> Detail Data Pendaftaran</h4>
                    <hr>
                    <td colspan="7"><h5 class="fw-bold text-center text-secondary">Belum Melakukan Pendaftaran</h5></td>  
                </tr>
            <?php endif ?>
        </div>
        </div>

    



<!-- Modal Ganti Password -->
    <div class="modal fade" id="exampleModalGantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row  row-cols-lg-4 row-cols-sm-4 row-cols-3  g-4">
                        <div class="input-group">
                            <input type="text" hidden class="form-control" name="id_user" value="<?= $_SESSION["id_user"] ?>">
                            <input type="password"  placeholder="Masukkan Password Baru" class="form-control" data-toggle="password" name="password" id="password">
                            <div class="input-group-append">
                                <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="password"  placeholder="Ulangi Password" class="form-control" data-toggle="password" name="password2" id="password">
                            <div class="input-group-append">
                                <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-white bg-primary rounded-pill"  name="ubah_password">
                        Simpan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal Pesan -->
<?php
            if(isset($konfirmasi_password)){ ?>
            <div class="modal fade" id="konfirmasi_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Konfirmasi Password Tidak Sesuai!</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="profil_calonsiswa.php"  class="btn rounded-pill mb-2 me-2 bg-primary text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } 
            if(isset($password_berhasil)){ ?>
            <div class="modal fade" id="password_berhasil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Pasword Berhasil Diubah!</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="profil_calonsiswa.php"  class="btn rounded-pill mb-2 me-2 bg-primary text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

              <?php }
            if(isset($edit_data_berhasil)){ ?>
            <div class="modal fade" id="edit_data_berhasil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Edit Data Pendaftararan Berhasil</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="profil_calonsiswa.php"  class="btn mb-2 me-2 bg-primary rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php }             if(isset($edit_data_gagal)){ ?>
            <div class="modal fade" id="edit_data_gagal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Edit Data Pendaftaran Gagal</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="profil_calonsiswa.php"  class="btn mb-2 me-2 bg-primary rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php }             if(isset($foto_berhasil)){ ?>
            <div class="modal fade" id="edit_data_gagal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Berhasil Edit Foto</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="profil_calonsiswa.php" style="" class="btn mb-2 me-2 bg-primary  rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php }             if(isset($bukan_foto)){ ?>
            <div class="modal fade" id="edit_data_gagal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="dashboard.php" style="background-color: var(--brand3)" class="btn mb-2 me-2  rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php }             if(isset($ukuran_foto)){ ?>
            <div class="modal fade" id="edit_data_gagal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Ukuran Gambar Terlalu Besar</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="dashboard.php" style="background-color: var(--brand3)" class="btn mb-2 me-2  rounded-pill text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>

<?php include('../footer/footer.php'); ?>
</body>

</html>