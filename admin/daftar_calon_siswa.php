<?php
session_start();
require '../functions.php';
if( $_SESSION["level"] != "admin") {
    header("Location: ../calonsiswa/berandacalonsiswa.php");
    exit;
  }
$daftar_calon_siswa = query("SELECT * FROM calonsiswa");
$user = query("SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);



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

if(isset($_POST["edit"])){
    //cek data berhasil atau tidak
    if(admin_edit_data_siswa($_POST) > 0 ) {
        $berhasil_disimpan = true;
    }else{
        $gagal_disimpan = true;
    } 
}
$tahun_depan = date('Y')+1;
?>

<!doctype html>
<html lang="en">

<head>
<title>PPDB | SMPN2 Kebonagung!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include '../header/header.php'; ?>
  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="../5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
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

<!-- Main -->
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
        <a class="nav-link text-center" id="menu1" href="dashboard.php"><i class="bi bi-house-fill"><br>Dashboard</i></a>
       </li>

        <li class="nav-item">
        <a class="nav-link text-center " id="menu2" href="daftar_akun.php"><i class="bi bi-person-badge-fill"><br>Daftar Akun</i></a>
       </li>

        <li class="nav-item">
        <a class="nav-link text-center active" id="menu3" href="daftar_calon_siswa.php"><i class="bi bi-people-fill"><br>Calon Siswa</i></a> 
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
            <div class="container-fluid">  
        <div class="row">
            <div class="col col-lg-2 col-md-0 col-0 bg-info justify-content-center text-center">
         
            </div>
            <!-- Konten -->
            <div class="col col-lg-10 col-md-12 col-12 border p-3 sidebar">
                
                

            <div class="row">
                <div class="col-lg-6 text-start">
                <h4 class="fw-bold"> Data Calon Siswa (Pendaftar) </h4>
                </div>
                <div class="col-lg-6 text-end">
                    <a target="_blank" href="../cetakpdf.php" class="btn text-white rounded-pill" style="background-color: #dc3545" >Cetak PDF</a>
                    <a target="_blank" href="../cetakexcel.php" class="btn text-white rounded-pill" style="background-color: #fd7e14" >Cetak Excel</a>
                </div>
            </div>

                <hr>
                <div class="table-responsive">
                    <table id="table"  class="table text-center table-hover ">
                            <thead class="thead">
                            <tr>
                            <th scope="col">No Pendaftaran</th>
                            <th scope="col">Id Pendaftar</th>
                            <th scope="col">Nama Calon Siswa</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach( $daftar_calon_siswa as $row)  : ?>
                            
                            <tr>
                                <th scope="row"><?= $row["nisn"] ?></th>
                                <td><?= $row["id_user"] ?></td>
                                <td><?= $row["nama"] ?></td>
                          
                                <?php if( $row["status"] == "Diterima") : ?>
                                    <td class="table-success"><?= $row["status"] ?></td>
                                <?php elseif( $row["status"] == "Ditolak") : ?>
                                    <td class="table-danger"><?= $row["status"] ?></td>
                                <?php else : ?>
                                    <td class="table-secondary"><?= $row["status"] ?></td>
                                <?php endif ?>   
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row["nisn"]?>">
                                        <i class="bi bi-pencil-square"></i> Ganti Status Pendaftaran
                                    </button>
                                    <form action="" method="POST">
                                        <div class="modal fade" id="exampleModal<?= $row["nisn"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <?php include('modal.php'); ?>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <script>
                            $(document).ready(function(){
                            $('#table').DataTable();});
                        </script>
                    </table>
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
                    <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="ubah_password">
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
            <a href="daftar_calon_siswa.php" style="background-color: green" class="btn rounded-pill mb-2 me-2 text-white">OK</a>
          </div>
        </div>
      </div>
    </div>

    <?php  }  if(isset($gagal_disimpan)){ ?>
    <div class="modal fade" id="berhasil_disimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
            <h6 class="lh-lg">Gagal Disimpan</h6>
          </div>
            <div class="col-lg-12 justify-content-end text-end">
            <a href="daftar_calon_siswa.php" style="background-color: green" class="btn rounded-pill mb-2 me-2 text-white">OK</a>
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
                    <a href="daftar_calon_siswa.php" style="background-color: green" class="btn rounded-pill mb-2 me-2  text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?> 
    

</body>

</html>