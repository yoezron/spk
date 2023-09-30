<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/edit') ?>

            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="radio mx-1" id="gender" name="gender" value="laki-laki" <?php if ($user['gender'] === 'laki-laki') echo 'checked'; ?>>Laki-laki
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="radio mx-1" id="gender" name="gender" value="perempuan" <?php if ($user['gender'] === 'perempuan') echo 'checked'; ?>>Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-4 col-form-label">Nomor Telepon/WA</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?>">
                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kampus" class="col-sm-4 col-form-label">Asal Kampus</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kampus" name="kampus" value="<?= $user['kampus']; ?>">
                    <?= form_error('kampus', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="prodi" class="col-sm-4 col-form-label">Asal Prodi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $user['prodi']; ?>">
                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-4 col-form-label">Status Kepegawaian</label>
                <div class="col-sm-8">
                    <select class="form-control col-sm-8" id="status" name="status" value="<?= $user['status']; ?>">
                        <option><?= $user['status']; ?></option>
                        <option>Dosen PNS</option>
                        <option>PPPK</option>
                        <option>Dosen Tetap Non PNS</option>
                        <option>Dosen Tidak Tetap/Honorer</option>
                        <option>Dosen Kontrak</option>
                        <option>Tendik PNS</option>
                        <option>Tendik Tetap Non PNS</option>
                        <option>Tendik Tidak Tetap/Honorer</option>
                        <option>Tendik Kontrak</option>
                        <option>Outsourcing</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="employer" class="col-sm-4 col-form-label">Pemberi Gaji/Upah</label>
                <div class="col-sm-8">
                    <select class="form-control col-sm-6" id="employer" name="employer" value="<?= $user['employer']; ?>">
                        <option><?= $user['employer']; ?></option>
                        <option>Kementerian Pendidikan/APBN</option>
                        <option>Kementerian Agama/APBN</option>
                        <option>APBD/PEMDA</option>
                        <option>YAYASAN</option>
                        <option>KAMPUS</option>
                        <option>PENYEDIA JASA/OUTSOURCING</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="gaji" class="col-sm-4 col-form-label">Range Gaji Per Bulan</label>
                <div class="col-sm-8">
                    <select class="form-control col-sm-8" id="gaji" name="gaji" value="<?= $user['gaji']; ?>">
                        <option><?= $user['gaji']; ?></option>
                        <optgroup label="Pegawai Negeri Sipil">
                            <option>Golongan I (Ia, Ib, Ic, Id)</option>
                            <option>Golongan II (IIa, IIb, IIc, IId)</option>
                            <option>Golongan III (IIIa, IIIb, IIIc, Id)</option>
                            <option>Golongan IV (IVa, IVb, IVc, IVd, IVe)</option>
                        </optgroup>
                        <optgroup label="Non-Pegawai Negeri Sipil">
                            <option>Rp0 - Rp1,500,000</option>
                            <option>Rp1,500,000 - Rp3,000,000</option>
                            <option>Rp3,000,001 - Rp6,000,000</option>
                            <option>Diatas Rp.6,000,000</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 mt-5">Foto</div>
                <div class="col-sm-10">
                    <div class="row mt-5">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image"><?= $user['image']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->