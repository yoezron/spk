<div class="card mx-auto" style="width: 65rem;">
    <img src="<?= base_url('assets/img/breadcrumb/') . 'breadcrumb-bg.png' ?>" class="card-img-top" alt="...">

    <div class="card-body">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800" style="font-weight:bold"> <?= $title; ?> Anggota Serikat Pekerja Kampus</h1>

            <div class="row">
                <div class="col-lg-8">

                    <?= form_open_multipart('user/formulir') ?>

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
                            <button type="submit" class="btn btn-primary">Mendaftar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <div class="card border-success">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" onclick="changePage('Manfaat')">Manfaat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" onclick="changePage('FAQ')">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" onclick="changePage('AD-ART')">AD-ART</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <iframe id="pageFrame" src="<?= base_url('user/manfaat'); ?>" style="width: 100%; height: 800px; border: none;"></iframe>
                </div>
            </div>

        </div>

    </div>
    <!-- End of Main Content -->

    <script>
        function changePage(pageName) {
            var frame = document.getElementById('pageFrame');
            switch (pageName) {
                case 'AD-ART':
                    frame.src = '<?= base_url('user/pdf_viewer'); ?>';
                    setActiveTab('AD-ART');
                    break;
                case 'FAQ':
                    frame.src = '<?= base_url('user/faq'); ?>'; // Ganti dengan URL FAQ Anda
                    setActiveTab('FAQ');
                    break;
                case 'Manfaat':
                    frame.src = '<?= base_url('user/manfaat'); ?>'; // Ganti dengan URL Info Anda
                    setActiveTab('Manfaat');
                    break;
                default:
                    break;
            }
        }

        function setActiveTab(tabName) {
            var tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(function(tab) {
                if (tab.innerHTML === tabName) {
                    tab.classList.add('active');
                    tab.setAttribute('aria-current', 'true');
                } else {
                    tab.classList.remove('active');
                    tab.setAttribute('aria-current', 'false');
                }
            });
        }
    </script>
</div>
</div>
<!-- End of Main Content -->

</div>

</div>