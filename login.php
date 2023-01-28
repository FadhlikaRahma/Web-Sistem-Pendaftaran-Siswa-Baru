<?php
session_start();
require 'functions.php';
if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username' ");
    //cek username
    if ( mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["level"] = $row["level"];
            $_SESSION["id_user"] = $row["id_user"];
            if($row["level"] == 'admin'){
                header("Location: admin/dashboard.php");
                exit;
            }else{
                header("Location: calonsiswa/berandacalonsiswa.php");
                exit;
            }
        }
        $error1= true;
    }
    $error = true;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'header/header.php'; ?>
    <title>PPDB SMPN 2 KEBONAGUNG</title>
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
        $("#username_salah").modal('show');
    });
    $(document).ready(function(){
        $("#password_tidak_sesuai").modal('show');
    });
</script>
</head>
<body class="bg-info">
<div class="container-fluid">
<div class="row justify-content-center mt-3" style="display: flex; justify-content: center;">
<div class="col-lg-8 pt-5">
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-6 col-lg-6 d-none d-sm-none d-ls-blobk d-md-block">
      <img src="img/bannerlogin.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6 col-lg-6">
    <a href="index.php" class="nav-link btn-close  mt-2 me-2 ms-auto" aria-label="Close"></a>
      <h3 class="text-center mb-3" id="sub_judul2">Login</h3>
      <div class="card-body me-3 ms-3">
      <form action="" method="post">
            <div class="mb-3">
                <label class="form-label ms-1">Username</label>
                <input type="text" class="form-control"  name="username" id="username" required placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="disabledSelect" class="form-label ms-1">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control input-md" name="password" data-toggle="password" required  placeholder="Password">
                  <div class="input-group-append">
                      <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                  </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="login" class="btn mt-3 rounded-pill bg-info text-white" style="background-color: #004aad">Login</button>
            </div>
            <div class="text-center">
                <label class="form-label mt-3">Belum Memiliki Akun? <a class="fw-bold" href="daftar_akun.php" style="color: #004aad; text-decoration: none;">Daftar</a></label>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- Modal Pesan -->
<?php


if(isset($error)){ ?>
    <div class="modal fade" id="username_salah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
            <h6 class="lh-lg">Username Belum Terdaftar</h6>
          </div>
            <div class="col-lg-12 justify-content-end text-end">
            <a href="login.php" style="background-color: #004aad" class="btn rounded-pill mb-2 me-2 text-white">OK</a>
          </div>
        </div>
      </div>
    </div>

<?php } 
            if(isset($error1)){ ?>
            <div class="modal fade" id="password_tidak_sesuai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect">
                    <h6 class="lh-lg">Password Salah!</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="login.php" style="background-color: #004aad" class="btn rounded-pill mb-2 me-2 text-white">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php } ?>
</body>
</html>
