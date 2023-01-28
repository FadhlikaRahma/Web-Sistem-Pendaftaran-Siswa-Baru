<?php
session_start();

require '../functions.php';
if( $_SESSION["level"] != "admin") {
    header("Location: ../user/dashboard.php");
    exit;
  }

if( !isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

if( $_SESSION["level"] != "admin") {
  header("Location: ../calonsiswa/berandacalonsiswa.php");
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
    $berhasil_disimpan = true;
}
}

$user = query("SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);
$daftar_calon_siswa = query("SELECT * FROM calonsiswa ORDER BY nisn DESC LIMIT 5 ");
$daftar_akun = query("SELECT * FROM akun ORDER BY id_user DESC LIMIT 5 ");

$tahun_depan = date('Y')+1;
$tahun_sekarang = date('Y');
$tahun_dulu = date('Y')-1;
$all     = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar");
$all     = mysqli_num_rows($all);
$lk      = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar=$tahun_sekarang AND jenis_kelamin='Laki-Laki'");
$lk      = mysqli_num_rows($lk);
$p       = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar=$tahun_sekarang AND jenis_kelamin='Perempuan'");
$p       = mysqli_num_rows($p);

$jumlahakun = mysqli_query($conn,"SELECT * FROM akun where level='admin'");
$rowakun = mysqli_num_rows($jumlahakun);

$jumlahakun = mysqli_query($conn,"SELECT * FROM akun where level='user'");
$rowsiswa = mysqli_num_rows($jumlahakun);

$proses      = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar AND status='menunggu'");
$proses      = mysqli_num_rows($proses);
$diterima    = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar AND status='diterima'");
$diterima    = mysqli_num_rows($diterima);
$tidak       = mysqli_query($conn,"SELECT * FROM calonsiswa WHERE tanggal_daftar AND status='ditolak'");
$tidak       = mysqli_num_rows($tidak);
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
            $("#berhasil_disimpan").modal('show');
        });
        $(document).ready(function(){
            $("#berhasil_dihapus").modal('show');
        });
        $(document).ready(function(){
            $("#gagal_disimpan").modal('show');
        });
        $(document).ready(function(){
            $("#gagal_dihapus").modal('show');
        });
        $(document).ready(function(){
            $("#konfirmasi_password").modal('show');
        });
    </script>
</head>

<body>
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
        <a class="nav-link text-center active" id="menu1" href="dashboard.php"><i class="bi bi-house-fill"><br>Dashboard</i></a>
       </li>

        <li class="nav-item">
        <a class="nav-link text-center" id="menu2" href="daftar_akun.php"><i class="bi bi-person-badge-fill"><br>Daftar Akun</i></a>
       </li>

        <li class="nav-item">
        <a class="nav-link text-center" id="menu3" href="daftar_calon_siswa.php"><i class="bi bi-people-fill"><br>Calon Siswa</i></a> 
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
       
      </ul>
    </div>
    
    </div>
 
  </nav>

</div>
<!-- end Nabvar --> 
    
<!-- Main -->
    <div class="container-fluid">  
        <div class="row">
            <div class="col col-lg-2 col-md-0 col-0 bg-info justify-content-center text-center">
          
            </div>

            


            <!-- Konten -->
            <div class="col col-lg-10 col-md-12 col-12 border sidebar">
            <div class="row mt-4">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-danger border-5 shadow">
                <h5 class="mt-3 mb-3 text-danger">Jumlah Pendaftar TA <?php echo $tahun_sekarang ?>/<?php echo $tahun_depan ?></h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                   
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $all; ?></h1>    
                </div> 
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-success border-5 shadow">
                <h5 class="mt-3 mb-3 text-success">Jumlah Akun admin</h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                 <!-- <img src="../image/laki-laki.png" class="img-fluid w-100" alt=""> -->
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $rowakun?></h1>    
                </div> 
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-warning border-5 shadow">
                <h5 class="mt-3 mb-3 text-warning">Jumlah akun calon siswa</h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                 
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $rowsiswa?></h1>    
                </div> 
                </div>
            </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-primary border-5 shadow">
                <h5 class="mt-3 mb-3 text-primary">Jumlah Pendaftar Dalam Proses</h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
               
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $proses; ?></h1>    
                </div> 
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-info border-5 shadow">
                <h5 class="mt-3 mb-3 text-info">Jumlah Pendaftar Diterima</h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $diterima; ?></h1>    
                </div> 
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
            <div class="card text-center border-start border-secondary border-5 shadow">
                <h5 class="mt-3 mb-3 text-secondary">Jumlah Pendaftar Tidak Diterima</h5>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1 class="mb-3 mt-3"><?php echo $tidak; ?></h1>    
                </div> 
                </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <!-- Data Pendaftaran Terbaru -->
            <h4 class="fw-bold mt-3"> Data Pendaftaran Terbaru </h4>
                <hr>
                <div class="table-responsive mb-3">
                    <table class="table text-center shadow">
                        <thead class="thead table-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Pendaftaran</th>
                            <th scope="col">Nama Calon Siswa</th>
                            </tr>
                        </thead>
                        <tbody>    
                        <?php $i = 1 ?>
                        <?php foreach( $daftar_calon_siswa as $row)  : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td scope="row"><?= $row["nisn"] ?></td>
                                <td><?= $row["nama"] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                </div>
            <div class="col-lg-6">        
                <!-- Data Pendaftaran Terbaru -->
                <h4 class="fw-bold mt-3"> Data Akun Terbaru </h4>
                <hr>
                     <div class="col col-lg-12 col-md-12 col-12">
                        <div class="table-responsive">
                            <table class="table text-center shadow">
                                <thead class="thead table-dark">
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Id User</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Hak Akses</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach( $daftar_akun as $row)  : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $row["id_user"] ?></td>
                                            <td><?= $row["username"] ?></td>
                                            <td><?= $row["level"] ?></td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col col-lg-6 col-md-0 col-0">
                        </div>
                    </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    






<!-- Modal Ganti Password -->
<div class="modal fade" id="exampleModalGantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
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
                    <button type="submit" class="btn text-white rounded-pill" style="background-color: var(--brand3);" name="ubah_password">
                        Simpan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>    
    <?php    if(isset($berhasil_disimpan)){ ?>
    <div class="modal fade" id="berhasil_disimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="../image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
            <h6 class="lh-lg">Berhasil Disimpan</h6>
          </div>
            <div class="col-lg-12 justify-content-end text-end">
            <a href="dashboard.php" style="background-color: var(--brand3)" class="btn rounded-pill mb-2 me-2 text-white">OK</a>
          </div>
        </div>
      </div>
    </div>

<?php } 

if(isset($konfirmasi_password)){ ?>
            <div class="modal fade" id="konfirmasi_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Konfirmasi Password Tidak Sesuai!</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="dashboard.php" style="background-color: var(--brand3)" class="btn rounded-pill mb-2 me-2  text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?> 
            <?php include('../footer/footer.php'); ?>
</body>

</html>