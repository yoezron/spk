<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Salam Perjuangan <?= $user['name']; ?>!</h1>
    <div class="col-lg-10">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>

        <div class="card">
            <div class="card-header bg-success text-white">
                Tulis Tulisan Baru
            </div>

            <div class="row">
                <div class="card-body">
                    <form action="<?= base_url('user/addPost'); ?>" method="post" class="was-validated" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroup-sizing-default">Judul Tulisan</span>
                                <input type="text" name="judul_tulisan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <fieldset disabled>
                                <div class="mb-3 mt-3">
                                    <label for="disabledTextInput" class="form-label">Penulis</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= $user['name']  ?>">
                                </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Isi Tulisan:</label>
                            <textarea name="isi_tulisan" class="form-control" id="isi_tulisan" placeholder="Tulis konten tulisan di sini" rows="8" required></textarea>
                            <div class="invalid-feedback">
                                Harap isi konten tulisan.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_tulisan" class="form-label">Jenis Tulisan:</label>
                            <select class="form-select" name="jenis_tulisan" id="jenis_tulisan" required>
                                <option value="">Pilih jenis tulisan</option>
                                <!-- Isi dengan pilihan jenis tulisan yang sesuai -->
                                <option value="Berita">Berita</option>
                                <option value="Opini">Opini</option>
                                <option value="Analisis">Analisis</option>
                                <option value="Riset">Riset</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Harap pilih jenis tulisan.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="info_file" class="form-label">Gambar (Opsional):</label>
                            <input type="file" name="gambar" class="form-control" aria-label="file example">
                        </div>
                        <div class="mb-3">
                            <label for="tag" class="form-label">Tag:</label>
                            <input type="text" name="tag" class="form-control" id="tag" placeholder="Tambahkan tag tulisan (opsional)">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Kirim Tulisan</button>
                        </div>
                    </form>

                    <div class="mt-3 mb-3">
                        <strong><span style="font-size: larger;">Tulisan Terakhir Anda:</span></strong>
                    </div>

                    <?php
                    // Fungsi untuk membandingkan waktu posting
                    function compareTime($a, $b)
                    {
                        return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                    }

                    // Mengurutkan $user_posts dari yang terbaru hingga terlama
                    usort($user_posts, 'compareTime');
                    ?>
                    <div>
                        <?php if (!empty($user_posts)) : ?>
                            <?php foreach ($user_posts as $posting) : ?>
                                <div class="card mb-3" style="max-width: 940px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('assets/img/posting/' . $posting['gambar']); ?>" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center;"><strong><?= $posting['judul_tulisan'] ?></strong></h5>
                                                <p class="card-text"><?= substr($posting['isi_tulisan'], 0, 100) . '...'; ?></p>
                                                <p class="card-text"><small class="text-muted"><?= date('F j, Y, g:i a', strtotime($posting['waktu_posting'])); ?></small></p>
                                                <!-- Tombol Delete -->
                                                <a href="<?= base_url('user/delete_post/' . $posting['id']); ?>" class="btn btn-danger">Delete</a>
                                                <!-- Tombol Edit -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $posting['id']; ?>">Edit</button>
                                                <!-- Tombol View -->
                                                <a href="<?= base_url('post/view/' . $posting['id']); ?>" class="btn btn-success">Lihat</a>
                                            </div>
                                        </div>
                                        <!-- Modal Edit Posting -->
                                        <div class="modal fade" id="editModal<?= $posting['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $posting['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $posting['id']; ?>">Edit Tulisan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('user/updatePost/' . $posting['id']); ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="edit_judul_tulisan" class="form-label">Judul Tulisan</label>
                                                                <input type="text" name="edit_judul_tulisan" class="form-control" id="edit_judul_tulisan" value="<?= $posting['judul_tulisan']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="edit_isi_tulisan" class="form-label">Isi Tulisan</label>
                                                                <textarea name="edit_isi_tulisan" class="form-control" id="edit_isi_tulisan" rows="4"><?= $posting['isi_tulisan']; ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?> <?php else : ?> <p>Tidak ada postingan saat ini.</p>
                        <?php endif; ?>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
<script>
    CKEDITOR.replace('isi_tulisan');
    CKEDITOR.replace('edit_isi_tulisan');
</script>