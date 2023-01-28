<?php 
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "databaseta");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}



//funtion tambah data akun
//ambil data dari tiap elemen form
function tambah_data($data){
    
    global $conn;
    $nisn      = htmlspecialchars($data["nisn"]);
    $nama     = htmlspecialchars($data["nama"]);
    $jenis_kelamin    = htmlspecialchars($data["jenis_kelamin"]);
    $asal_sekolah    = htmlspecialchars($data["asal_sekolah"]);
    $tanggal_lahir     = htmlspecialchars($data["tanggal_lahir"]);
    $agama     = htmlspecialchars($data["agama"]);
    $alamat     = htmlspecialchars($data["alamat"]);
    $no_hp     = htmlspecialchars($data["no_hp"]);
 
    $nama_ayah     = htmlspecialchars($data["nama_ayah"]);
    $no_hp_ayah     = htmlspecialchars($data["no_hp_ayah"]);
    $nama_ibu     = htmlspecialchars($data["nama_ibu"]);
    $no_hp_ibu     = htmlspecialchars($data["no_hp_ibu"]);
    $nama_wali     = htmlspecialchars($data["nama_wali"]);

    $no_hp_wali     = htmlspecialchars($data["no_hp_wali"]);
    $akta     = htmlspecialchars($data["akta"]);
    $kk     = htmlspecialchars($data["kk"]);
    $ijazah     = htmlspecialchars($data["ijazah"]);

  $bahasa     = htmlspecialchars($data["bahasa"]);
  $mtk     = htmlspecialchars($data["mtk"]);
  $ipa     = htmlspecialchars($data["ipa"]);
  $akhir     = htmlspecialchars($data["akhir"]);



    $result   = mysqli_query($conn, "SELECT nisn FROM calon_siswa WHERE nisn= '$nisn'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('NIsn Sudah Terdaftar!');</script>";  
    }else{
        

    //tambahkan Pendaftar calon siswa
    $query="INSERT INTO calon_siswa values('$nisn','1','$nama','$jenis_kelamin','$asal_sekolah','$tanggal_lahir',$agama,'$alamat',CURDATE(),'$no_hp','menunggu')";
    mysqli_query($conn, $query);
    $query1="INSERT INTO data_ortu values('','$nama_ayah','$no_hp_ayah','$nama_ibu','$no_hp_ibu','$nama_wali','$no_hp_wali','$nisn')";
    mysqli_query($conn, $query1);
    $query2="INSERT INTO berkas_calon_siswa values('','$akta','$kk','$ijazah','$nisn')";
    mysqli_query($conn, $query2);
    $query3="INSERT INTO nilai values('','$bahasa','$mtk','$ipa','$akhir','$nisn')";
    mysqli_query($conn, $query3);
 

    return mysqli_affected_rows($conn);
    }
}

function hapus_akun($data){
    global $conn;

    $id_user    = ($data["id_user"]);

    mysqli_query($conn,"DELETE FROM akun WHERE id_user = $id_user");
    return mysqli_affected_rows($conn);
}
function ubah_password($data){
    global $conn;

    $id_user = ($data["id_user"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //konfirmasi password
    if ($password !== $password2) {
        echo    "<script>
                    alert('Komfirmasi Password Tidak Sesuai!');
                </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan akun baru
    $query = "UPDATE akun SET password = '$password' WHERE id_user = $id_user";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function admin_edit_data_siswa($data) {
	global $conn;

	$nisn           = $data["nisn"];
    $id_user           = $data["id_user"];
    $status             = $data["status"];


	//tambahkan data baru
	mysqli_query($conn, "UPDATE calonsiswa SET
    id_user           = '$id_user', 
    status          = '$status'
    WHERE nisn = $nisn");

	return mysqli_affected_rows($conn);
}

function ubah_level($data){
    global $conn;

    $id_user    = ($data["id_user"]);
    $level      = ($data["level"]);

    //tambahkan akun baru
    $query = "UPDATE akun SET level = '$level' WHERE id_user = $id_user";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload_foto(){
    $namaFile   = $_FILES["foto_calon_siswa"]['name'];
    $ukuranFile = $_FILES["foto_calon_siswa"]['size'];
    $error      = $_FILES["foto_calon_siswa"]['error'];
    $tmpName    = $_FILES["foto_calon_siswa"]['tmp_name'];

    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Pas Foto Calon Siswa Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'c:/xampp/htdocs/taku/image/foto_siswa/'. $namaFileBaru);
    return $namaFileBaru;
}

function upload_akta(){
    $namaFile   = $_FILES['akta']['name'];
    $ukuranFile = $_FILES['akta']['size'];
    $error      = $_FILES['akta']['error'];
    $tmpName    = $_FILES['akta']['tmp_name'];

    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Akta Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'c:/xampp/htdocs/taku/image/akta/'. $namaFileBaru);
    return $namaFileBaru;
}

function upload_kk(){
    $namaFile   = $_FILES['kk']['name'];
    $ukuranFile = $_FILES['kk']['size'];
    $error      = $_FILES['kk']['error'];
    $tmpName    = $_FILES['kk']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Kartu Keluarga Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'c:/xampp/htdocs/taku/image/kartu_keluarga/'. $namaFileBaru);
    return $namaFileBaru;
}

function upload_ijazah(){
    $namaFile   = $_FILES['ijazah']['name'];
    $ukuranFile = $_FILES['ijazah']['size'];
    $error      = $_FILES['ijazah']['error'];
    $tmpName    = $_FILES['ijazah']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('ijazah Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'c:/xampp/htdocs/taku/image/ijazah/'. $namaFileBaru);
    return $namaFileBaru;
}

//funtion tambah data akun
function daftar_siswa($data) {
	global $conn;

	$nisn               = $data["nisn"];
    $nama_siswa         = $data["nama_siswa"];
    $jenis_kelamin      = $data["jenis_kelamin"];
    $tempat_lahir       = $data["tempat_lahir"];
    $tanggal_lahir      = $data["tanggal_lahir"];
    $agama              = $data["agama"];
    $nama_ayah         = $data["nama_ayah"];
    $pekerjaan_ayah    = $data["pekerjaan_ayah"];
    $no_telp_ayah      = $data["nomor_telp_ayah"];
    $nama_ibu           = $data["nama_ibu"];
    $pekerjaan_ibu      = $data["pekerjaan_ibu"];
    $no_telp_ibu        = $data["nomor_telp_ibu"];
    $alamat             = $data["alamat"];

	//cek nama sudah ada atau belum
	$result = mysqli_query($conn, "SELECT id_user FROM calon_siswa WHERE id_user = '$nisn'");

	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Nomor Identitas sudah terdaftar!');
				</script>";
		return false;
	}

    $foto_siswa=upload_foto();
    if (!$foto_siswa) {
        return false;
    }
    $kia=upload_akta();
    if (!$kia) {
        return false;
    }
    $kk=upload_kk();
    if (!$kk) {
        return false;
    }
    $ijazah=upload_ijazah();
    if (!$ijazah) {
        return false;
    }

	//tambahkan data baru
	mysqli_query($conn, "INSERT INTO calon_siswa VALUES 
    (
    '$nisn',
    '$nama_siswa', 
    '$jenis_kelamin', 
    '$tempat_lahir', 
    '$tanggal_lahir', 
    '$agama', 
    '$foto_siswa', 
    '$akta', 
    '$nama_ayah', 
    '$pekerjaan_ayah', 
    '$no_telp_ayah', 
    '$nama_ibu', 
    '$pekerjaan_ibu', 
    '$no_telp_ibu', 
    '$alamat', 
    '$kk',
    '$ijazah', 
    '', 
    'Menunggu')");

	return mysqli_affected_rows($conn);

    
}
//fungsi upload
function upload(){
    $namaFile   = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpName    = $_FILES['gambar']['tmp_name'];
    //cek apakah ada gambar atau tidak
    if ($error === 4) {
        echo "<script> alert('Tidak Ada Gambar'); </script>";
        return false;
    }
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('yang di upload bukan gambar'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'c:/xampp/htdocs/TAku/img/img/'. $namaFileBaru);
    return $namaFileBaru;
}

function edit_data_siswa($data) {
	global $conn;

	$nisn           = $data["nisn"];
    $id_user       = $data["id_user"];
    $nama         = $data["nama_siswa"];
    $jenis_kelamin      = $data["jenis_kelamin"];
    $asal_sekolah       = $data["asal_sekolah"];
    $tanggal_lahir      = $data["tanggal_lahir"];
    $agama              = $data["agama"];
    $nama_ayah          = $data["nama_ayah"];
    $no_hp_ayah     = $data["no_hp_ayah"];
    $nama_ibu       = $data["nama_ibu"];
    $no_hp_ibu           = $data["no_hp_ibu"];
    $nama_wali      = $data["nama_wali"];
    $no_hp_wali        = $data["no_hp_wali"];
    $no_hp             = $data["no_hp"];


	//tambahkan data baru
	mysqli_query($conn, "UPDATE calonsiswa SET 
    nisn        = '$nisn',
    id_user         = '$id_user',
    nama      = '$nama', 
    jenis_kelamin   = '$jenis_kelamin', 
    asal_sekolah    = '$asal_sekolah', 
    tanggal_lahir   = '$tanggal_lahir', 
    agama           = '$agama', 
    nama_ayah       = '$nama_ayah', 
    no_hp_ayah  = '$no_hp_ayah', 
    nama_ibu    = '$nama_ibu', 
    no_hp_ibu        = '$no_hp_ibu', 
    nama_wali   = '$nama_wali', 
    no_hp_wali     = '$no_hp_wali', 
    no_hp          = '$no_hp'
    WHERE nisn = $nisn");

	return mysqli_affected_rows($conn);
}



//function daftar
function registrasi($data) {
    global $conn;

    $nisn = stripcslashes($data["nisn"]);
    $nama = stripcslashes($data["nama"]);
    $email = stripcslashes($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek nim sudah ada atau belum
    $result = mysqli_query($conn, "SELECT id_akun FROM akun_calonsiswa WHERE id_akun = '$nisn'");

    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
                    alert('NISN sudah terdaftar!');
                </script>";
        return false;
    }
    //konfirmasi password
    if ($password !== $password2) {
        echo    "<script>
                    alert('Komfirmasi Password Tidak Sesuai!');
                </script>";

        return false;
    }
 //enkripsi password
 $password = password_hash($password, PASSWORD_DEFAULT);

 //tambahkan akun baru
mysqli_query($conn, "INSERT INTO akun_calonsiswa VALUES ('','$nisn', '$nama', '$email', '$password', '')");

 return mysqli_affected_rows($conn);
}

//funtion ubah data akun
function ubah_akun($data){
    global $conn;

    $nisn      = htmlspecialchars($data["nisn"]);
    $nama     = htmlspecialchars($data["nama"]);
    $email    = htmlspecialchars($data["email"]);
    $gambarLamaa = htmlspecialchars($data["gambarLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    }else{
        $gambar=upload();
    }
    $query = "UPDATE akun_calonsiswa SET  nisn = '$nisn', nama ='$nama', email = '$email', gambar ='$gambar' WHERE nisn= $nisn";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
//funtion edit peminjaman
// function ubah_pendaftar($data){
//     global $conn;

//     $daftar       = htmlspecialchars($data["kode_daftar"]);
//     $status      = htmlspecialchars($data["status"]);
    
//     $query = "UPDATE seleksi_calonsiswa SET status = '$status' WHERE kode_daftar = $daftar";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }
function ubah_pendaftarr($data){
    global $conn;

    $daftar = htmlspecialchars($data["nisn"]);
    $status      = htmlspecialchars($data["status"]);
    
    $query = "UPDATE hasil_pendaftaran SET status = '$status' WHERE nisn = $daftar; ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>