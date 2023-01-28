<?php
session_start();
require '../functions.php';
$user = mysqli_query($conn,"SELECT * FROM akun WHERE id_user = ".$_SESSION["id_user"]);
?>
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
          <a class="nav-link text-center active" aria-current="page" href="alurcalonsiswa.php"><i class="bi bi-shuffle text-center"><br>Alur</i></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-center" aria-current="page" href="../pendaftaran.php"><i class="bi bi-pencil"><br>Daftar</i></a>
        </li>
        <li class="nav-item">
    <a class="nav-link text-center" aria-current="page" href="../calonsiswa/profil_calonsiswa.php"><i class="bi bi-card-list text-center"><br>Hasil</i></a>
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
  <!-- end Nabvar -->       <br>

<!-- start container 1 -->
<div class="container-lg">
        <div class="row col-xl-12 justify-content-xl-center"> 
        <div class="col-xl-center">
        <div class="container border border-2 bg-light">  
        <h3 class="">Alur Pendaftaran Zonasi</h3> 
        Berikut adalah info Alur pendaftaran PPDB SMP NEGERI 2 KEBONAGUNG. 
     </div>
    </div>
  </div></div>
 
        <!-- end container 1 -->
        <div class="container-lg">
        <div class="row col-xl-12 justify-content-xl-center"> 
        <div class="col-xl-center">
        <div class="container border border-2 bg-light">
          <br>
      <img src="../img/gambaralurr.png" class="img-fluid"style="width: 1000px;height: 530px;">
      </div>
</div>

</div>
</div>

</div>
<?php include('footer/footer.php'); ?>
  


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