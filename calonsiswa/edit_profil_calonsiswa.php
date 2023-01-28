<?php 
session_start();
require '../functions.php';
$nisn = $_GET["nisn"];
$akun_calonsiswa = query("SELECT * FROM akun_calonsiswa WHERE nisn=$nisn")[0];
//cek apakah tombol submit dah dipencet
if(isset($_POST["submit"])){
//cek data berhasil atau tidak
if(ubah_akun($_POST) > 0 ) {
    echo "<script>alert('Data Berhasil Diubah'); document.location.href='../calonsiswa/profil_calonsiswa.php'; </script>";
}else{
    echo "<script>alert('data gagal diubah'); document.location.href='../calonsiswa/profil_calonsiswa.php'; </script>";
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
    <title>Edit Profil</title>
</head>
<body class="background">
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card mt-1 mb-2" id="card">
            <div class="text-center">
                <img src="../img/edit.png" class="card-img-top mt-3" style="width: 4rem;">
                <h2 class="mt-2 mb-2 display-6" style="font-size:190%; line-height: 2rem;">Edit Profil</h2>
            </div>
            <div class="row mt-4 mb-4 justify-content-center ms-1 me-1">
            <div class="col-md-10">
           <div class="mb-3">
                <input type="hidden" class="form-control mt-2" name="nisn" id="nisn" required value="<?php echo $akun_calonsiswa['nisn'] ?>">
                <input type="hidden" class="form-control mt-2" name="gambarLama" id="gambarLama" required value="<?php echo $akun_calonsiswa['gambar'] ?>">
            </div>
           <div class="mb-3 text-center">
                <img src="../img/img/<?php echo $akun_calonsiswa['gambar'];?>" style="width: 50%;">
                <p class="mt-2 mb-2" style="font-size:100%"><?php echo $akun_calonsiswa['nisn'] ?></p>
                <p class="mt-2 ms-1 text-start" style="font-size:80%; margin-bottom: 1%;"><i>Edit foto profil</i></p>
                <input type="file" class="form-control" name="gambar" id="gambar" >
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama" id="nama" required value="<?php echo $akun_calonsiswa['nama'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="email" id="email" required value="<?php echo $akun_calonsiswa['email'] ?>">
            </div>
            </div>  
            </div>
                <div class="row justify-content-center">
                <div class="col-4 mb-3">
                    <a class="btn" id="btn_signup" href="profil.php">Kembali</a>
                </div>
                <div class="col-4 mb-3">
                    <button type="submit" name="submit" class="btn" id="btn_signin">Simpan</button>  
                </div>                            
                </div>
        </form>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
