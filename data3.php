<?php
require 'functions.php';


$print = $_GET['id'];
$sql_pendaftar = "SELECT * FROM calonsiswa where nisn = '$print'";
$result_pendaftar = mysqli_query($conn,$sql_pendaftar);
$daftar_calon_siswa = mysqli_fetch_array($result_pendaftar);

?>
<!doctype html>
<html lang="en">
<style>
table, th, td {
    font-size: 12px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
}
</style>

<img src="img/LOGOSMP.png" style="float: left; height: 60px">

<div style="margin-left: 60px">
<div style="font-size: 18px">Data pendaftaran siswa baru | Tahun ajaran 2022</div>
<div style="font-size: 20px">SMP NEGERI 2 KEBONAGUNG</div>
<div style="font-size: 12px">Dusun Krajan,Desa Ketro, Kecamatan Kebonagung, Kabupaten Pacitan, Jawa Timur 63561</div>
</div>
<hr style="border: 0,5px; solid black; margin: 10px 5px 10px 5px;">

<title>PPDB | SMPN2 Kebonagung!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
        text-align: center;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
    h4{
        text-align: center;
    }
   

	</style>

</head>

<body>
    <main>
    <div class="container-lg">
        <div class="row col-xl-12 justify-content-xl-center"> 
        <div class="col-xl-center">
        <div class="container border border-2 bg-light">  
        <h3 class="">Data Siswa Pendaftar</h3> 
        Setelah Status Diterima mohon langsung melakukan print/cetak data untuk daftar ulang  </div>
    </div>
  </div>
  </div>
<!-- end container 1 -->
<div class="container-lg">
        <div class="row col-xl-12 justify-content-xl-lefy"> 
        <div class="col-xl-left">
        <div class="container border border-2 bg-light">
     <!-- end content 2 -->
    


<form action="" method="POST">
<div class="container "style="background-color #ffffff8;">
<table class="table table-bordered">


    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Biodata Calon Siswa</th>
   
    </tr>
    <tr>
      <td scope="row">NISN</td>
      <td><?php echo $daftar_calon_siswa['nisn']; ?></td>

     
    </tr>
    <tr>
      <td scope="row">Nama</td>
      <td><?php echo $daftar_calon_siswa['nama']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Jenis Kelamin</td>
      <td><?php echo $daftar_calon_siswa['jenis_kelamin']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Asal Sekolah</td>
      <td><?php echo $daftar_calon_siswa['asal_sekolah']; ?></td>
    
    </tr>
    <tr>
      <td scope="row" >Tanggal Lahir</td>
      <td type="password"><?php $tgl = $daftar_calon_siswa['tanggal_lahir']; echo substr($tgl, 0, -5) . '**-**'; ?></td>
      
    
    </tr>
    <tr>
      <td scope="row">Alamat</td>
      <td><?php echo $daftar_calon_siswa['alamat']; ?></td>
    
    </tr>
    <tr>
      <td scope="row" >No HP</td>
      <td type="password"><?php $noTlp = $daftar_calon_siswa['no_hp']; echo substr($noTlp, 0, -5) . '*****'; ?></td>
      
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Orang Tua</th>
    </tr>
    <tr>
      <td scope="row">Nama Ayah</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">No HP Ayah</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">Nama Ibu</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">No HP Ibu</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">Nama Wali</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">No HP Wali</td>
      <td>✅</td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Tambahan</th>
    </tr>
    <tr>
      <td scope="row">Foto Calon Siswa</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">Kartu Keluarga</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">ijazah</td>
      <td>✅</td>
    
    </tr>
    <tr>
      <td scope="row">Akta</td>
      <td>✅</td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Data Nilai UN</th>
    </tr>
    <tr>
      <td scope="row">Bahasa Indonesia</td>
      <td><?php echo $daftar_calon_siswa['bahasa']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Matematika</td>
      <td><?php echo $daftar_calon_siswa['mtk']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">IPA</td>
      <td><?php echo $daftar_calon_siswa['ipa']; ?></td>
    
    </tr>
    <tr>
      <td scope="row">Nilai Akhir</td>
      <td><?php echo $daftar_calon_siswa['nilai_akhir']; ?></td>
    
    </tr>
    <tr bgcolor="#f0f0f0">
      <th scope="row"colspan="2">Status Pendaftaran</th>
    </tr>
    <tr>
      <td scope="row">status</td>
      <td><?php echo $daftar_calon_siswa['status']; ?></td>
    
    </tr>
   
 
</table>

   		
</div>
                </form>
                </div></div></div> </div>
        
   
    </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script>
		window.print();
	</script>
</body>

</html>
  






