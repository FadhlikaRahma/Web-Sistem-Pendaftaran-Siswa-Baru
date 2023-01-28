<?php 
session_start();
require '../functions.php';

if( !isset($_SESSION["login"])) {
    header("Location: ../login_admin.php");
    exit;
} 
$nisn = $_GET["nisn"];
$daftar = query("SELECT * FROM `hasil_pendaftaran` WHERE nisn = $nisn")[0];

//cek apakah tombol submit dah dipencet
if(isset($_POST["submit"])){
//cek data berhasil atau tidak
if(ubah_pendaftarr($_POST) > 0 ) {
    echo "<script>alert('Data Berhasil Diubah'); document.location.href='../admin/pendaftar.php'; </script>";
}else{
    echo "<script>alert('Data Gagal Diubah'); document.location.href='../pendaftar.php'; </script>";
} }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../2.css">
    <title>Edit Pendaftar</title>
</head>
<body class="background">
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card-body">
    <form action="" method="post" >
          <div class="card mt-2" id="card">
            <div class="text-center">
                <img src="../img/img/edit.png" class="card-img-top mt-3" style="width: 4rem;">
                <h2 class="mt-2 mb-2 display-6" style="font-size:190%; line-height: 2rem;">Edit Pendaftar</h2>
            </div>
            <div class="row mt-4 mb-4 justify-content-center ms-1 me-1">
            <div class="col-md-10">
           

            <div class="mb-3">
                <input type="hidden" class="form-control mt-2" name="nisn" id="nisn" required value="<?php echo $daftar['nisn'] ?>">
            </div>
            <fieldset disabled>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nisn" id="nisn" required value="<?php echo $daftar['nisn'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama" id="nama" required value="<?php echo $daftar['nama'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="jenis_kelamin" id="jenis_kelamin" required value="<?php echo $daftar['jenis_kelamin'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="asal_sekolah" id="asal_sekolah" required value="<?php echo $daftar['asal_sekolah'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="tanggal_lahir" id="tanggal_lahir" required value="<?php echo $daftar['tanggal_lahir'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="alamat" id="alamat" required value="<?php echo $daftar['alamat'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="tanggal_lahir" id="tanggal_lahir" required value="<?php echo $daftar['tanggal_lahir'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nohp" id="nohp" required value="<?php echo $daftar['no_hp'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama_ayah" id="nama_ayah" required value="<?php echo $daftar['nama_ayah'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="no_hp_ayah" id="no_hp_ayah" required value="<?php echo $daftar['no_hp_ayah'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama_ibu" id="nama_ibu" required value="<?php echo $daftar['nama_ibu'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="no_hp_ibu" id="no_hp_ibu" required value="<?php echo $daftar['no_hp_ibu'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama_wali" id="nama_wali" required value="<?php echo $daftar['nama_wali'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="no_hp_wali" id="no_hp_wali" required value="<?php echo $daftar['no_hp_wali'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="akta" id="akta" required value="<?php echo $daftar['akta'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="kk" id="kk" required value="<?php echo $daftar['kk'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="ijazah" id="ijazah" required value="<?php echo $daftar['ijazah'] ?>">
            </div>
            
        </fieldset>
       
           <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Status</label>
            <select class="form-select"  name="status" id="status">
                <?php $status = $pinjam['status']; ?>
                <option <?php echo ($status == 'Diterima') ? "selected": "" ?>>Menunggu</option>
                <option <?php echo ($status == 'Diterima') ? "selected": "" ?>>Diterima</option>
                <option <?php echo ($status == 'Ditolak') ? "selected": "" ?>>Ditolak</option>
             
            </select>
            </div> 
            </div>
            </div>
                <div class="row justify-content-center">
                <div class="col-4 mb-3">
                    <a class="btn" id="btn_signup" href="../admin/pendaftar.php">Kembali</a>
                </div>
                <div class="col-4 mb-3">
                    <button type="submit" name="submit" class="btn" id="btn_signin">Simpan</button>  
                </div>                            
                </div>
        </form>
    </div>
  </div>
  </div>
</div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
