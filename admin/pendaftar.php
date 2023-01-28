<?php
session_start();
require '../functions.php';

if( !isset($_SESSION["login"])) {
    header("Location: login_admin.php");
    exit;
}  
$jumlahpendaftar = query("SELECT * FROM hasil_pendaftaran");
$rowpendaftar = query("SELECT * FROM akun_calonsiswa");

$totalpendaftar = mysqli_query($conn,"SELECT * FROM hasil_pendaftaran");
$rowtotal = mysqli_num_rows($totalpendaftar);

$jumlahakun = mysqli_query($conn,"SELECT * FROM akun_calonsiswa");
$rowakun = mysqli_num_rows($jumlahakun);
// $jumlahbuku = mysqli_query($conn, "SELECT SUM(jumlah_buku) AS jumlah_buku FROM buku"); 
// $rowbuku = mysqli_fetch_array($jumlahbuku);
// $jumlahpeminjam = mysqli_query($conn,"SELECT * FROM peminjaman_buku");
// $rowpeminjam = mysqli_num_rows($jumlahpeminjam);
// $jumlahakun = mysqli_query($conn,"SELECT * FROM mahasiswa");
// $rowakun = mysqli_num_rows($jumlahakun);
// $jumlahjurnal = mysqli_query($conn,"SELECT * FROM jurnal");
// $rowjurnal = mysqli_num_rows($jumlahjurnal);
// $jumlahebook = mysqli_query($conn,"SELECT * FROM buku_online");
// $rowebook = mysqli_num_rows($jumlahebook);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap Icon --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="../1.css">
    <title>Pendaftar</title>
</head>
<body>
  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #023e8a;">
    <div class="container">
      <img src="../img/logo_uty.png" style="width: 3rem">
      <p class="navbar-brand mt-3 ms-2" style="font-size: 100%;">SMPN 2<br>KEBONAGUNG</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
      </div>
    </div>
  </nav>
  <!-- end Nabvar -->
  <section class="section1">
  <div class="container pb-5 mt-5">
    <h1 class="mt-2 pt-5 text-center display-6 mb-4" style="font-size:190%;"><strong>Dahsboard Admin</strong></h1>
      <!-- Info -->
      <div class="row justify-content-center text-white">
        <div class="col-md-3 mt-2 mb-2">
            <div style="background-color: #023e8a;" class="pt-3 shadow-sm d-flex justify-content-around align-items-center rounded">
            <div><h3 class="text-center"><?php echo $rowakun?></h3>     
                <p class="fs-6">Akun Mahasiswa</p>
            </div><i style="font-size:2rem;" class="fa fa-user"></i>
            </div>
        </div>
        <div class="col-md-3 mt-2 mb-2">
            <div style="background-color: #0096c7;" class="pt-3 shadow-sm d-flex justify-content-around align-items-center rounded">
            <div><h3 class="text-center"><?php echo $rowtotal ?></h3>  
                 <p class="fs-6">Daftar</p>
            </div><i style="font-size:2rem;" class="fa fa-users"></i>
            </div>
        </div>
        
        

        
                 
      </div>
    <!-- End Info -->       
    <!-- Nav Tabs -->
    <ul class="nav nav-tabs mt-3">
      <li class="nav-item">
        <a class="nav-link" href="akun.php">Akun</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page"  href="pendaftar.php">Pendaftar</a>
      </li>
      <li class="nav-item ms-auto">
        <a class="btn btn-sm btn-danger mt-1 mb-1 ms-1" aria-current="page"  href="logout_admin.php">Logout</a>
      </li>
    </ul>
    <!-- End Tabs -->
    <!-- Start Content -->
    <div class="card">
    <!-- Start Peminjam -->
      <div class="table-responsive mt-3 mb-3 me-3 ms-3">
      <table id="buku" class="table col-12 table-bordered display border mt-6 table-hover table-sm ">
          <thead class="text-white">
              <tr class="bg-primary text-center">           
              <th>nisn</th>
                <th>Nama</th>
                <th>jenis kelamin</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No hp</th>
                <th>Nama ayah</th>
                <th>No HP Ayah</th>
                <th>Nama ibu</th>
                <th>No hp ibu</th>
                <th>nama wali</th>
                <th>No hp wali</th>
                <th>akta</th>
                <th>kartu keluarga</th>
                <th>ijazah</th>
                <th>Status</th>   
                <th>Aksi</th>   
              </tr>
          </thead>
          <tbody  class="table-light" id="tbody">
              <!-- Looping Table -->
              <?php foreach( $jumlahpendaftar as $row) : ?>
              <tr>
              
                <td class="text-center"><?= $row["nisn"] ?></td>
                <td class="text-center"><?= $row["nama"] ?></td>
                <td class="text-center"><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["asal_sekolah"] ?></td>
                <td class="text-center"><?= $row["tanggal_lahir"] ?></td>
                <td class="text-center"><?= $row["alamat"] ?></td>
                <td class="text-center"><?= $row["no_hp"] ?></td>
                <td class="text-center"><?= $row["nama_ayah"] ?></td>
                <td class="text-center"><?= $row["no_hp_ayah"] ?></td>
                <td class="text-center"><?= $row["nama_ibu"] ?></td>
                <td class="text-center"><?= $row["no_hp_ibu"] ?></td>
                <td class="text-center"><?= $row["nama_wali"] ?></td>
                <td class="text-center"><?= $row["no_hp_wali"] ?></td>
                <td class="text-center"><?= $row["akta"] ?></td>
                <td class="text-center"><?= $row["kk"] ?></td>
                <td class="text-center"><?= $row["ijazah"] ?></td>
                <td><?= $row["status"] ?></td>  
                <td class="col-sm-1">
                  <!-- Action -->
                  <div class="text-center">
                  <a class="btn btn-sm btn-warning" href="../admin/edit_pendaftar.php?nisn=<?=$row["nisn"];?>"><i class="bi bi-pencil"></i></a>
                  <a class="btn btn-danger btn-sm" href="../admin/hapus_peminjaman.php?nisn=<?=$row["nisn"];?>"><i class="bi bi-trash"></i></a>
                  </div>
                  </td>                      
            </tr>
            <?php endforeach ?>
          </tbody>
          <script>
          $(document).ready(function(){
          $('#buku').DataTable();});
          </script>
      </table>   
      </div>
    <!-- End Peminjam -->
    </div>
    <!-- End Content -->
  </div>
  </section>
  <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
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
  <!-- end Footer -->
</html>