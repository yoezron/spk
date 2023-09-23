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
                                <option>
                                    < Rp.1.000.000,-</option>
                                <option>Rp.1.000.000 - Rp.1.500.000</option>
                                <option>Rp.1.500.000 - Rp.2.000.000</option>
                                <option>Rp.2.000.000 - Rp.2.500.000</option>
                                <option>Rp.2.500.000 - Rp.3.000.000</option>
                                <option>Rp.3.000.000 - Rp.3.500.000</option>
                                <option>Rp.3.500.000 - Rp.4.000.000</option>
                                <option>> Rp.4.000.000</option>
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
            <div class="card-header bg-success text-white" style="font-weight:bold">
                Manfaat
            </div>
            <div class="card-body">
                <h5 class="card-title" style="font-weight:bold">Manfaat Keanggotaan</h5>
                <p class="card-text">Menjadi anggota Serikat Pekerja Kampus (SPK) adalah kontribusi penting pekerja kampus untuk memperjuangkan kesejahteraan yang layak dan membangun kondisi kerja yang baik. SPK adalah ruang perjuangan bersama bagi dosen, peneliti, tenaga kependidikan, seluruh pekerja di institusi perguruan tinggi, apapun posisi Anda, apapun status ketenagakerjaan Anda.</p>
                <ol>
                    <li>Konsultasi hukum dan pendampingan
                        <p>SPK memberikan bantuan konsultasi hukum dan pendampingan secara pro bono atas sengketa terkait masalah kerja yang dialami anggota seperti kenaikan pangkat, pemutusan hubungan kerja, diskriminasi, beban kerja berlebihan, sengketa kontrak, dan lain sebagainya.</p>
                    </li>
                    <li>Perwakilan (pengurus cabang/kantor?) di kampus Anda
                        <p>Saat ini, SPK telah memiliki perwakilan di (jumlah) perguruan tinggi negeri dan (jumlah) perguruan tinggi swasta. Jumlah perwakilan ini akan berkembang lebih lanjut seiring dengan keterlibatan Anda sebagai anggota.</p>
                    </li>
                    <li>Aspirasi kolektif
                        <p>Aspirasi anggota akan diperjuangkan melalui negosiasi yang dilakukan SPK dengan pengelola perguruan tinggi maupun advokasi hukum dan kebijakan. Anggota yang memiliki aspirasi dan masalah terkait kondisi kerja di institusinya tidak harus menghadapi pengelola perguruan tinggi secara individual, melainkan secara kolektif oleh institusi serikat.</p>
                    </li>
                    <li>Informasi terkini
                        <p>Anggota mendapatkan informasi terkini secara rutin atas kegiatan dan agenda SPK, perkembangan advokasi yang dilakukan oleh SPK, dan laporan pengelolaan keuangan yang bersumber dari iuran anggota maupun donasi publik.</p>
                    </li>
                    <li>Akses kegiatan dan discount merchandise
                        <p>Anggota dapat terlibat aktif dalam kegiatan-kegiatan SPK, di antaranya pendidikan dasar dan lanjutan, pelatihan teknis berserikat, dan lain sebagainya. Anggota juga mendapatkan discount untuk pembelian merchandise yang hasil penjualannya akan digunakan untuk kegiatan SPK.</p>
                    </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- End of Main Content -->

</div>

</div>