<!-- File: application/views/post/view/all_posts.php -->
<style>
    .center-text {
        text-align: center;
    }

    .center-text h1 {
        display: inline;
    }

    .judul h1 {
        color: aliceblue;
    }

    /* Gaya untuk elemen dengan kelas carousel-judul */
    .carousel-judul {
        position: relative;
        font-size: 56px;
        /* Ukuran huruf besar */
        color: white;
        /* Warna teks putih */
        text-shadow: 2px 2px 5px black;
        transition: color 0.3s ease-in-out, border-bottom-color 0.3s ease-in-out;
        /* Transisi warna saat dihover */
    }

    .carousel-judul:hover {
        color: orange;
        /* Warna teks menjadi orange saat dihover */
        border-bottom-color: orange;
        /* Warna garis bawah menjadi orange saat dihover */
    }

    .carousel-caption p {
        font-style: italic;
        color: white;
        text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    }

    /* CSS untuk gambar carousel */
    .carousel-item img {
        max-width: 100%;
        /* Lebar maksimum sesuai dengan parent element */
        height: auto;
        /* Tinggi otomatis sesuai proporsi aslinya */
        display: block;
        /* Menghilangkan whitespace tambahan */
        margin: 0 auto;
        /* Pusatkan gambar dalam carousel-item */
    }

    /* Media query untuk mengatur gambar carousel pada ukuran layar tertentu */
    @media (min-width: 768px) {
        .carousel-item img {
            max-width: 1920px;
            /* Lebar maksimum gambar */
            max-height: 750px;
            /* Tinggi maksimum gambar */
        }
    }
</style>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-12 mx-auto">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($all_posts as $index => $post) : ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                <img src="assets/img/posting/<?= $post['gambar']; ?>" class="d-block w-100" alt="Post Image">
                                <div class="carousel-caption">
                                    <a href="<?= base_url('post/view/' . $post['id']); ?>">
                                        <h2 class="carousel-judul"><?= $post['judul_tulisan']; ?></h2>
                                    </a>
                                    <p><?= substr($post['isi_tulisan'], 0, 100) . '...'; ?></p>
                                    <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="center-text mt-50">
        <h1>TULISAN ANGGOTA SERIKAT PEKERJA KAMPUS</h1>
    </div>

    <div class="tp-blog-2__area pt-100 pb-90">
        <div class="container">
            <div class="row">
                <?php
                // Sort the $all_posts array by 'waktu_posting' in descending order (from newest to oldest)
                usort($all_posts, function ($a, $b) {
                    return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                });
                ?>
                <div class="container">
                    <div class="row">
                        <?php if (!empty($all_posts)) : ?>
                            <?php foreach ($all_posts as $post) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                                    <div class="tp-blog-2__item">
                                        <div class="tp-blog-2__thumb p-relative">
                                            <!-- Ganti 'src' dengan path gambar dari postingan -->
                                            <img src="assets/img/posting/<?= $post['gambar']; ?>" alt="Post Image" style="width: 370px; height: 260px;">
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
                                            <a href="<?= base_url('post/view/' . $post['id']); ?>">
                                                <h4 class="tp-blog-2__title-sm"><?= $post['judul_tulisan']; ?></h4>
                                            </a>
                                            <!-- Tampilkan sekilas isi tulisan -->
                                            <p><?= substr($post['isi_tulisan'], 0, 100) . '...'; ?></p>
                                            <!-- Tampilkan tanggal posting -->
                                            <span class="tp-blog-2__meta"><?= date('F j, Y', strtotime($post['waktu_posting'])); ?></span>
                                            <!-- Tambahkan tombol untuk melihat detail posting -->
                                            <a href="<?= base_url('post/view/' . $post['id']); ?>">
                                                <div class="tp-blog-2__link text-center">
                                                    <span>Baca Postingan<i class="flaticon-arrow-right"></i></span>
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