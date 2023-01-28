<?php
require '../functions.php';
if(isset($_POST["signup"]) ) {
    if(registrasi($_POST) > 0 ) {
    echo "<script>alert('Data Berhasil Ditambahkan'); document.location.href='login_calonsiswa.php'; </script>";
    }else{
    echo "<script>alert('Data Gagal Ditambahkan'); document.location.href='login_calonsiswa.php'; </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../1.css"/>
    <!-- Bootstrap Icon --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Untuk menampilkan password -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        window.onload=function(){
        !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
        }
    </script>
    <title>Register</title>
</head>
<body class="background">
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-6">
  <div class="card mt-5" id="card">
    <div class="text-center">
    <img src="../img/signupp.png" class="card-img-top mt-4" style="width: 6rem">
      <div class="mt-3">
        <h1 class="judul2">Daftar</h1>
      </div>
    </div>
    <div class="card-body">
        <form action="" method="post" >
            <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nisn"  title="Hanya Angka" id="nim" required placeholder="Masukaan NISN">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="nama" id="nama" required placeholder="Masukan Nama">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="email" id="email" required placeholder="Masukan Email">
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control mt-2" name="password"  data-toggle="password" required  placeholder="Masukan Password">
            <div class="input-group-append">
                <span class="input-group-text mt-2"><i class="fa fa-eye"></i></span>
            </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control mt-2" name="password2"  data-toggle="password" required placeholder="Ulangi Password">
            <div class="input-group-append">
                <span class="input-group-text mt-2"><i class="fa fa-eye"></i></span>
            </div>
            </div>
                <div class="row justify-content-center">
                <div class="col-6">
                    <a class="btn mt-4" id="btn_signup" href="login_calonsiswa.php">Kembali</a>     
                </div>
                <div class="col-6">
                    <button type="submit" name="signup" class="btn mt-4" id="btn_signin">Daftar</button>   
                </div>                            
                </div>
            </div>
            </div>
        </form>
    </div>
  </div>
  </div>
</div>
</div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
