<!-- Modal -->
    
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Calon Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <!-- Form / Modal Body -->
            <div class="modal-body">
            <!-- Data -->
                <div class="container-fluid">  
                    <div class="row">
                    <!-- Input Data Calon Siswa -->
                                <div class="col col-lg-6 col-md-6 col-12">
                                    <p class="fw-bold mb-3">Data Calon Siswa</p>
                                        <input type="text" hidden class="form-control" name="nisn" value="<?= $row["nisn"]?>">
                                        <input type="text" hidden class="form-control" name="id_user" value="<?= $row["id_user"]?>">
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Lengkap</label>
                                        <div class="col-lg-8 col-md-8 col-12">   
                                            <input type="text" required class="form-control" name="nama_siswa" value="<?= $row["nama"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($row['jenis_kelamin']=='Laki-Laki') echo 'checked'?> required name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki">
                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" <?php if($row['jenis_kelamin']=='Perempuan') echo 'checked'?> required name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Asal Sekolah</label>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <input type="text" required class="form-control" name="asal_sekolah" value="<?= $row["asal_sekolah"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Tanggal Lahir</label>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <input type="date" required class="form-control" name="tanggal_lahir" value="<?= $row["tanggal_lahir"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-12 col-form-label">Agama</label>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <select class="form-select" name="agama" required>
                                                <option value="<?= $row["agama"]?>" selected><?= $row["agama"]?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Khong Hu Cu">Khong Hu Cu</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No HP</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <textarea class="form-control" name="no_hp" required><?= $row["no_hp"]?></textarea>
                                    </div>
                                </div>
                                </div>

                    <!-- Input Data Orang Tua Siswa -->
                            <div class="col col-lg-6 col-md-6 col-12 ">
                                <p class="fw-bold mb-3">Data Orang Tua</p>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Ayah</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="nama_ayah" value="<?= $row["nama_ayah"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No HP Ayah</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="no_hp_ayah" value="<?= $row["no_hp_ayah"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Ibu</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="nama_ibu" value="<?= $row["nama_ibu"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">No HP Ibu</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="no_hp_ibu" value="<?= $row["no_hp_ibu"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nama Wali</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="nama_wali" value="<?= $row["nama_wali"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-12 col-form-label">Nomor HP Wali</label>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <input type="text" required class="form-control" name="no_hp_wali" value="<?= $row["no_hp_wali"]?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    <!-- Lampiran -->
                        <!-- <div class="container-fluid">  
                            <div class="row">
                                <p class="fw-bold mb-3">Lampiran</p>
                                <div class="col col-lg-4 col-md-4 col-12 text-center mb-3">
                                    <div class="card">
                                        <div class="card-header"> Foto Calon Siswa </div>
                                        <div class="card-body">
                                            <a href="../image/foto_siswa/<?= $row["foto_siswa"]?>" target="blank"><img src="../image/foto_siswa/<?= $row["foto_siswa"]?>" class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        </div>
                                        <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="foto_calon_siswa_lama" value="<?= $row["foto_siswa"]?>"> 
                                            <input type="file" class="form-control" name="foto_calon_siswa">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col col-lg-4 col-md-4 col-12 text-center mb-3">
                                    <div class="card">
                                        <div class="card-header"> KIA (Kartu Identitas Anak) </div>
                                        <div class="card-body">
                                            <a href="../image/kia/<?= $row["akta"]?>" target="blank"><img src="../image/kia/<?= $row["akta"]?>"class="rounded mx-auto d-block" alt="Logo" height="150" ></a>  
                                        </div>
                                        <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="kia_lama" value="<?= $row["akta"]?>"> 
                                            <input type="file" class="form-control" name="kia">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col col-lg-4 col-md-4 col-12 text-center mb-3">
                                    <div class="card">
                                        <div class="card-header"> Kartu Keluarga </div>
                                        <div class="card-body">
                                            <a href="../image/kartu_keluarga/<?= $row["kk"]?>" target="blank"><img src="../image/kartu_keluarga/<?= $row["kk"]?>" class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        </div>
                                        <div class="card-footer">
                                            <input type="text" hidden class="form-control" name="kartu_keluarga_lama" value="<?= $row["kk"]?>"> 
                                            <input type="file" class="form-control" name="kartu_keluarga">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                
        <!-- Modal Footer -->
            <div class="modal-footer">
            <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="edit">
                        Simpan
                    </button>
            </div>
        </div>
    </div>
