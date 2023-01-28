<?php
session_start();
require '../functions.php';
//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM panitia_ppdb WHERE id = $id");
    $row    = mysqli_fetch_assoc($result);
    //cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}
if (isset($_SESSION['login'])) {
    header("Location: akun.php");
    exit;
}
if( isset($_POST["login"]) ) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $result   = mysqli_query($conn, "SELECT * FROM panitia_ppdb WHERE username = '$username'");
    //cek username
    if ( mysqli_num_rows($result) === 1 ) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
            // set session
            $_SESSION["login"]= true;
            //cek remember
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time()+3600);
                setcookie('key', hash('sha256', $row['username']), time()+3600);
            }
            header('location: akun.php');
            exit;
        }
        
        }
    $error = true;
} ?>
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
    <title>Login</title>
</head>
<body class="background">
<div class="container">
<div class="row justify-content-center">
  <div class="col-md-6">
  <div class="card mt-4 mb-4" id="card">
    <div class="text-center">
    <img src="../img/logosmp2.png" class="card-img-top mt-3" style="width: 10rem">
      <div class="mt-3">
        <h1 class="display-6" style="font-size: 170%;">Login Panitia PPDB<br>SMP NEGERI 2 KEBONAGUNG</h1>
      </div>
    </div>
    <div class="card-body">
        <form action="" method="post" >
            <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="mb-3">
                <input type="text" class="form-control mt-2" name="username" required placeholder="Masukan NIM">
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control mt-2" name="password" data-toggle="password" id="password" required  placeholder="Masukan Password">
            <div class="input-group-append">
                <span class="input-group-text mt-2"><i class="fa fa-eye"></i></span>
            </div>
            </div>
            <div class="mb-2 mt-2 form-check">
                <div class="ms-1">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label text-dark" for="exampleCheck1">Remember Me</label>
                </div>
            </div> 
            <div class="text-center">
                <button type="submit" name="login" class="btn mt-4 btn-warning"  id="btn_signin">Masuk</button>
                <p class="border-5 mt-3 col-md-10 border-bottom border-dark"></p>
                <a class="btn btn-danger" id="btn_home" href="../calonsiswa/login_calonsiswa.php">Kembali</a>
            </div>
            </div>
            </div>
        </form>
    </div>
  </div>
  </div>
</div>
</div>
<?php   
    if(isset($error)) {
    echo '<script>alert("Username Atau password Salah!"); window.history.back();</script>';           
    }
?>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


              