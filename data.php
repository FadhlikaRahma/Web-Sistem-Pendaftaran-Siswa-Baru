<?php
require 'functions.php';

$daftar_calon_siswa = query("SELECT * FROM calonsiswa");


?>
<!doctype html>
<html lang="en">

<head>
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
        <div class="container-fluid">
            <h4> Daftar Calon Siswa SMPN 2 Kebonagung </h4>  
                <table id="table"  class="table text-center table-bordered">
                        <thead class="thead">
                        <tr>
                        <th scope="col">NISN</th>
                        <th scope="col">Id Calon Siswa</th>
                        <th scope="col">Nama Calon Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Foto Calon Siswa</th>
                        <th scope="col">Akta</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nomor HP Ayah</th>
                        <th scope="col">Nama_Ibu</th>
                        <th scope="col">Nomor HP Ibu</th>
                        <th scope="col">Nama Wali</th>
                        <th scope="col">Nomor HP Wali</th>
                        <th scope="col">Nomor HP calon siswa</th>
                        <th scope="col">Kartu Keluarga</th>
                       
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $daftar_calon_siswa as $row)  : ?>
                        
                        <tr>
                            <td><?= $row["nisn"] ?></td>
                            <td><?= $row["id_user"] ?></td>
                            <td><?= $row["nama"] ?></td>
                            <td><?= $row["jenis_kelamin"] ?></td>
                            <td><?= $row["alamat"] ?></td>
                            <td><?= $row["tanggal_lahir"] ?></td>
                            <td><?= $row["agama"] ?></td>
                            <td><?= $row["foto_calonsiswa"] ?></td>
                            <td><?= $row["akta"] ?></td>
                            <td><?= $row["nama_ayah"] ?></td>
                            <td><?= $row["no_hp_ayah"] ?></td>
                            <td><?= $row["nama_ibu"] ?></td>
                            <td><?= $row["no_hp_ibu"] ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["no_hp_wali"] ?></td>
                            <td><?= $row["no_hp"] ?></td>
                            <td><?= $row["kk"] ?></td>
                          
                            <?php if( $row["status"] == "Diterima") : ?>
                                <td class="table-success"><?= $row["status"] ?></td>
                            <?php elseif( $row["status"] == "Ditolak") : ?>
                                <td class="table-danger"><?= $row["status"] ?></td>
                            <?php else : ?>
                                <td class="table-secondary"><?= $row["status"] ?></td>
                            <?php endif ?>   
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>