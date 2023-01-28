<?php
session_start();
require '../functions.php';
if( $_SESSION["level"] != "admin") {
    header("Location: ../user/dashboard.php");
    exit;
  }
$daftar_akun = query("SELECT * FROM akun");
$user = query("SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);

if(isset($_POST["kelola_akun"]) ) {
    if(ubah_level($_POST) > 0 ) {
        $berhasil_disimpan = true;
    }else{
        $gagal_disimpan = true;
    }
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
if(isset($_POST["ubah_password_akun"]) ) {
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
if(isset($_POST["hapus_akun"]) ) {
    if(hapus_akun($_POST) > 0 ) {
        $berhasil_dihapus = true;
    }else{
        $gagal_dihapus = true;
    }
}
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
        <a class="nav-link text-center active" id="menu2" href="daftar_akun.php"><i class="bi bi-person-badge-fill"><br>Daftar Akun</i></a>
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
            <div class="container-fluid">  
        <div class="row">
            <div class="col col-lg-2 col-md-0 col-0 bg-info justify-content-center text-center">
           
            </div>

            <!-- Konten -->
            <div class="col col-lg-10 col-md-12 col-12 border p-3 sidebar">
            <h4 class="fw-bold ">Daftar Akun</h4>
            <hr>
                <div class="col col-lg-12 col-md-12 col-12">
                    <div class="table-responsive">
                        <table id="table"  class="table text-center table-hover ">
                            <thead class="thead table-dark">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Id User</th>
                                <th scope="col">Username</th>
                                <th scope="col">Hak Akses</th>
                                <th scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 1 ?>
                            <?php foreach( $daftar_akun as $row)  : ?>
                                <tr>
                                    <th><?= $i ?></th>
                                    <td><?= $row["id_user"] ?></td>
                                    <td><?= $row["username"] ?></td>
                                    <td><?= $row["level"] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-1 mt-1"  data-bs-toggle="modal" data-bs-target="#exampleModal1<?= $row["id_user"]?>">
                                            <i class="bi bi-search"></i> Kelola Akun
                                        </button>
                                        <button type="button" class="btn btn-outline-success btn-sm mb-1 mt-1""  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row["id_user"]?>">
                                        <i class="bi bi-pencil-square"></i> Ubah Password
                                        </button>
                                        <button type="submit" class="btn btn-outline-danger btn-sm mb-1 mt-1"" data-bs-toggle="modal" data-bs-target="#ModalHapusAkun<?= $row["id_user"]?>">
                                        <i class="bi bi-trash"></i> Hapus Akun
                                        </button>

                                        <!-- Modal Kelola Akun -->
                                            <form action="" method="POST">
                                                <div class="modal fade text-start" id="exampleModal1<?= $row["id_user"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kelola Akun</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row  row-cols-lg-4 row-cols-sm-4 row-cols-3  g-4">
                                                                    <div class="input-group">
                                                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Pengguna</label>
                                                                        <div class="col-lg-8 col-md-8 col-12">
                                                                            <input type="text" hidden class="form-control" name="id_user" value="<?= $row["id_user"]?>">
                                                                            <input type="text" readonly class="form-control-plaintext"name="username" value=": <?= $row["username"]?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Hak Akses</label>
                                                                        <div class="col-lg-8 col-md-8 col-12">
                                                                            <?php if( $row["level"] == "admin") : ?>
                                                                                <select class="form-select" name="level">
                                                                                    <option value="<?= $row["level"]?>" selected><?= $row["level"]?></option>
                                                                                    <option value="user">user</option>
                                                                                </select>
                                                                            <?php else : ?>
                                                                                <select class="form-select" name="level">
                                                                                    <option value="<?= $row["level"]?>" selected><?= $row["level"]?></option>
                                                                                    <option value="admin">admin</option>
                                                                                </select>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>     
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="kelola_akun">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        <!-- Modal Ubah Password Akun -->
                                            <form action="" method="POST">
                                                <div class="modal fade" id="exampleModal<?= $row["id_user"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password <b style="color: blue"><?= $row["id_user"]?></b></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row  row-cols-lg-4 row-cols-sm-4 row-cols-3  g-4">
                                                                    <div class="input-group">
                                                                        <input type="text" hidden class="form-control" name="id_user" value="<?= $row["id_user"]?>">
                                                                        <input type="text" hidden class="form-control-plaintext"name="username" value="<?= $row["username"]?>">
                                                                        <input type="password" placeholder="Masukkan Password Baru" required class="form-control" data-toggle="password" name="password" id="password">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                                                        </div>
                                                                    </div>    
                                                                    <div class="input-group">
                                                                        <input type="password" placeholder="Ulangi Password" required class="form-control" data-toggle="password" name="password2" id="password">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                                                        </div>
                                                                    </div>     
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn text-white rounded-pill"style="background-color: green;"  name="ubah_password_akun">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        <!-- Modal Hapus Akun -->
                                            <form action="" method="POST">
                                                <div class="modal fade" id="ModalHapusAkun<?= $row["id_user"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered ">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title text-center" id="exampleModalLabel">Anda yakin untuk menghapus akun <?= $row["username"]?>?</h5>
                                                            </div>
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body text-center">
                                                                <input type="text" hidden class="form-control" name="id_user" value="<?= $row["id_user"]?>">
                                                                
                                                                
                                                            <div class="row justify-content-end">
                                                                <div class="col-lg-4 col-lg-4 col-sm-4 col-4">
                                                           
                                                                <button type="button" class="btn text-white rounded-pill" style="background-color: #dc3545;" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                            
                                                                <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="hapus_akun">Hapus</button>
                                                                </div>
                                                             

                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                    </td>
                                </tr>
                            <?php $i++ ?>
                            <?php endforeach ?>
                            </tbody>
                            <script>
                                $(document).ready(function(){
                                $('#table').DataTable();});
                            </script>
                        </table>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-0 col-0">

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
                    <button type="submit" class="btn text-white rounded-pill bg-primary"  name="ubah_password">
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
            <a href="daftar_akun.php" class="btn  bg-primary rounded-pill mb-2 me-2 text-white">OK</a>
          </div>
        </div>
      </div>
    </div>

<?php } 
            if(isset($gagal_disimpan)){ ?>
            <div class="modal fade" id="gagal_disimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Gagal Disimpan</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="daftar_akun.php" class="btn bg-primary rounded-pill mb-2 me-2 text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php  }  if(isset($berhasil_dihapus)){ ?>
    <div class="modal fade" id="berhasil_dihapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="../image/berhasil.jpg" class="img-fluid w-25" id="gambar_effect">
            <h6 class="lh-lg">Berhasil Dihapus</h6>
          </div>
            <div class="col-lg-12 justify-content-end text-end">
            <a href="daftar_akun.php" class="btn bg-primary rounded-pill mb-2 me-2 text-white">OK</a>
          </div>
        </div>
      </div>
    </div>

<?php } 
            if(isset($gagal_dihapus)){ ?>
            <div class="modal fade" id="gagal_dihapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="../image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Gagal Dihapus</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="daftar_akun.php" class="btn bg-primary rounded-pill mb-2 me-2 text-white">OK</a>
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
                    <a href="daftar_akun.php" class=" btn bg-primary rounded-pill mb-2 me-2  text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?> 
</body>

</html>