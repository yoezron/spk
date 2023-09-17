<div class="card mx-auto" style="width: 65rem;">
    <img src="<?= base_url('assets/img/breadcrumb/') . 'breadcrumb-bg.png' ?>" class="card-img-top" alt="...">

    <div class="card-body">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> Anggota Serikat Pekerja Kampus</h1>

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
                                    <input type="radio" class="radio mx-1" id="gender" name="gender" value="laki-laki" checked>Laki-laki
                                </label>
                                <label class="form-check-label">
                                    <input type="radio" class="radio mx-1" id="gender" name="gender" value="perempuan" checked>Perempuan
                                </label>
                            </div>
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
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih Foto</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>

                    </form>

                </div>


            </div>



        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
</div>