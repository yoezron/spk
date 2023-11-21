<!-- File: application/views/post/view/all_posts.php -->

<body>
    <div class="tp-blog-2__area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($all_posts)) : ?>
                            <?php foreach ($all_posts as $post) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                                    <div class="tp-blog-2__item">
                                        <div class="tp-blog-2__thumb p-relative">
                                            <!-- Ganti 'src' dengan path gambar dari postingan -->
                                            <img src="assets/img/posting/<?= $post['gambar']; ?>" alt="Post Image">
                                            <div class="tp-blog-2__icon">
                                                <a class="popup-image" href="assets/img/posting/<?= $post['gambar']; ?>"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="tp-blog-2__content">
                                            <!-- Tambahkan logika untuk menampilkan tag jika ada -->
                                            <div class="tp-blog-2__tag">
                                                <span><i class="fas fa-tags"></i><?= $post['tag']; ?></span>
                                            </div>
                                            <!-- Tampilkan judul tulisan -->
                                            <a href="blog-details.html">
                                                <h4 class="tp-blog-2__title-sm"><?= $post['judul_tulisan']; ?></h4>
                                            </a>
                                            <!-- Tampilkan sekilas isi tulisan -->
                                            <p><?= substr($post['isi_tulisan'], 0, 100) . '...'; ?></p>
                                            <!-- Tampilkan tanggal posting -->
                                            <span class="tp-blog-2__meta"><?= date('F j, Y', strtotime($post['waktu_posting'])); ?></span>
                                            <!-- Tambahkan tombol untuk melihat detail posting -->
                                            <a href="<?= base_url('post/viewPost/' . $post['id']); ?>">
                                                <div class="tp-blog-2__link text-center">
                                                    <span>Read More<i class="flaticon-arrow-right"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center">Tidak ada postingan saat ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>