<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <h4 class="h4 mb-5 mt-5 text-gray-800"> Daftar Calon Anggota Serikat Pekerja Kampus</h4>
            <div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Anggota</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Email</th>
                            <th scope="col">Asal Kampus</th>
                            <th scope="col">Nomor Kontak</th>
                            <th scope="col">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($member as $me) : ?>
                            <tr>
                                <th scope="row"><?= $i;  ?></th>
                                <td><?= $me['date_created']; ?></td>
                                <td><?= $me['name']; ?></td>
                                <td><?= $me['email']; ?></td>
                                <td><?= $me['kampus']; ?></td>
                                <td><?= $me['telp']; ?></td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input-2" type="checkbox" id="checkbox<?= $me['id'] ?>" name="konfirmasi" value="6" <?= check_role($me['role_id']); ?> data-role="<?= $me['role_id'] ?>" data-id="<?= $me['id'] ?>">
                                        <label class="form-check-label mx-1" for="inlineCheckbox1">Terima</label>
                                    </div>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>
            </div>

            <h4 class="h4 mb-5 mt-5 text-gray-800"> Daftar Anggota Serikat Pekerja Kampus</h4>
            <div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Anggota</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Email</th>
                            <th scope="col">Asal Kampus</th>
                            <th scope="col">No Kontak</th>
                            <th scope="col">Status</th>
                            <th scope="col">Rincian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($active as $ac) : ?>
                            <tr>
                                <th scope="row"><?= $i;  ?></th>
                                <td><?= $ac['date_created']; ?></td>
                                <td><?= $ac['name']; ?></td>
                                <td><?= $ac['email']; ?></td>
                                <td><?= $ac['kampus']; ?></td>
                                <td><?= $ac['telp']; ?></td>
                                <td>Anggota</td>
                                <td><a href="<?= base_url(); ?>user/detail/<?= $ac['id']; ?>" class="badge badge-primary float-right">Rincian</a></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->