<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="row">
        <div class="col-lg-10">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <h4 class="h4 mb-5 mt-5 text-gray-800"> Daftar Anggota & Calon Anggota</h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor Anggota</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Email</th>
                        <th scope="col">Asal Kampus</th>
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
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->