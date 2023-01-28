<!-- Modal -->
    
    <div class="modal-dialog text-start modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Status Pendaftaran</h1>
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
                                        <input type="text" hidden class="form-control-plaintext" name="nisn" value="<?= $row["nisn"]?>">
                                        <input type="text" hidden class="form-control-plaintext" name="id_user" value="<?= $row["id_user"]?>">
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Lengkap</label>
                                        <div class="col-lg-8 col-md-8 col-6">   
                                            <input type="text" readonly class="form-control-plaintext" name="nama" value=": <?= $row["nama"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Jenis Kelamin</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <input type="text" readonly class="form-control-plaintext" name="jenis_kelamin" value=": <?= $row["jenis_kelamin"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Tempat Lahir</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <input type="text" readonly class="form-control-plaintext" name="tempat_lahir" value=": <?= $row["alamat"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Tanggal Lahir</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <input type="text" readonly class="form-control-plaintext" name="tanggal_lahir" value=": <?= $row["tanggal_lahir"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Agama</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <input type="text" readonly class="form-control-plaintext" name="agama" value=": <?= $row["agama"]?>">
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Tahun Pendaftaran</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <input type="text" readonly class="form-control-plaintext" name="tanggal_daftar" value=": <?= $row["tanggal_daftar"]?>/<?php echo $tahun_depan ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <label class="col-lg-4 col-md-4 col-6 col-form-label">Status</label>
                                        <div class="col-lg-8 col-md-8 col-6">
                                            <?php if( $row["status"] == "Diterima") : ?>
                                                <select class="form-select" name="status" required>
                                                    <option value="<?= $row["status"]?>" selected><?= $row["status"]?></option>
                                                    <option value="Menunggu">Menunggu</option>
                                                    <option value="Ditolak">Tidak Diterima</option>
                                                </select>
                                            <?php elseif( $row["status"] == "Ditolak") : ?>
                                                <select class="form-select" name="status" required>
                                                    <option value="<?= $row["status"]?>" selected><?= $row["status"]?></option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Menunggu">Menunggu</option>
                                                </select>
                                            <?php else : ?>
                                                <select class="form-select" name="status" required>
                                                    <option value="Menunggu" selected>menunggu</option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>

                    <!-- Input Data Orang Tua Siswa -->
                            <div class="col col-lg-6 col-md-6 col-12 ">
                                <p class="fw-bold mb-3">Data Orang Tua</p>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Ayah</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="nama_ayah" value=": <?= $row["nama_ayah"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nomor HP Ayah</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="no_hp_ayah" value=": <?= $row["no_hp_ayah"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Ibu</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="nama_ibu" value=": <?= $row["nama_ibu"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nomor HP Ibu</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="no_hp_ibu" value=": <?= $row["no_hp_ibu"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nama Wali</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="nama_wali" value=": <?= $row["nama_wali"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nomor Telepon Ibu</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <input type="text" readonly class="form-control-plaintext" name="no_hp_wali" value=": <?= $row["no_hp_wali"]?>">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-lg-4 col-md-4 col-6 col-form-label">Nomor HP calon siswa</label>
                                    <div class="col-lg-8 col-md-8 col-6">
                                        <textarea class="form-control-plaintext" name="alamat" readonly>: <?= $row["no_hp"] ?>  </textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- Lampiran -->
                    <div class="container-fluid">  
                        <div class="row">
                            <p class="fw-bold mb-3">Lampiran</p>
                            <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
                                <div class="card">
                                <div class="card-header"> Foto Calon Siswa </div>
                                    <div class="card-body">
                                        <a href="..\img\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" target="blank"><img src="..\img\foto_siswa\foto<?= $row["foto_calonsiswa"]?>" class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        <input type="text" hidden readonly class="form-control-plaintext" name="foto_calon_siswa_lama" value="<?= $row["foto_calonsiswa"]?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
                                <div class="card">
                                <div class="card-header"> Akta </div>
                                    <div class="card-body">
                                        <a href="..\img\akta\foto<?= $row["akta"]?>" target="blank"><img src="..\img\akta\foto<?= $row["akta"]?>"class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        <input type="text" hidden readonly class="form-control-plaintext" name="akta_lama" value="<?= $row["akta"]?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
                                <div class="card">
                                <div class="card-header"> Kartu Keluarga </div>
                                    <div class="card-body">
                                        <a href="..\img\kartu_keluarga\foto<?= $row["kk"]?>" target="blank"><img src="..\img\kartu_keluarga\foto<?= $row["kk"]?>" class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        <input type="text" hidden readonly class="form-control-plaintext" name="kartu_keluarga_lama" value="<?= $row["kk"]?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="col col-lg-6 col-md-6 col-12 text-center mb-3">
                                <div class="card">
                                <div class="card-header"> Ijazah </div>
                                    <div class="card-body">
                                        <a href="../img/ijazah/<?= $row["ijazah"]?>" target="blank"><img src="..\img\ijazah\foto<?= $row["ijazah"]?>" class="rounded mx-auto d-block" alt="Logo" height="150" ></a>
                                        <input type="text" hidden readonly class="form-control-plaintext" name="ijazah" value="<?= $row["ijazah"]?>">
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> 
        <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn text-white rounded-pill" style="background-color: green;" name="edit">Simpan</button>
            </div>
        </div>
    </div>
