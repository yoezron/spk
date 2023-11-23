<style>
    .postbox__thumb img {
        max-width: 100%;
        height: auto;
        width: 940px;
        max-height: 640px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .postbox__text {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
        padding-right: 10px;
        color: #333;
        background-color: #fff;
        text-align: justify;
        word-spacing: 1px;
    }
</style>
<section class="postbox__area pt-50 pb-80">
    <div class="container" style="width: 940px;">
        <?php if ($post) : ?>
            <div class="postbox__wrapper">
                <article class="postbox__item format-image mb-50 mt-50 transition-3">
                    <div class="postbox__thumb p-relative m-img">
                        <img src="<?= base_url('assets/img/posting/' . $post['gambar']); ?>" alt="">
                        <div class="postbox__thumb-text d-none d-md-block">
                            <span><?= date('d F', strtotime($post['waktu_posting'])); ?></span>
                        </div>
                    </div>
                    <div class="postbox__content">
                        <div class="postbox__meta">
                            <span><i class="flaticon-user"></i>By <?= $post['penulis']; ?></span>
                            <!-- Pastikan $post['tag'] sesuai dengan tag yang ada -->
                            <span><a href="#"><i class="flaticon-tag"></i><?= $post['tag']; ?></a></span>
                            <!-- Jika perlu, tambahkan informasi komentar -->
                            <!-- <span><a href="#"><i class="flaticon-comment"></i>02 Comments</a></span> -->
                        </div>
                        <h3 class="postbox__title"><?= $post['judul_tulisan']; ?></h3>
                        <div class="postbox__text mb-10">
                            <?= $post['isi_tulisan']; ?>
                            <!-- Tambahkan elemen HTML sesuai dengan konten yang Anda inginkan -->
                        </div>
                        <!-- Jika ada kutipan yang perlu ditampilkan -->
                        <!-- <div class="postbox__blockquote p-relative">
                        <div class="postbox__blockquote-shape">
                            <img src="assets/img/blog/quote.png" alt="">
                        </div>
                        <blockquote>
                            <p>Kutipan disini</p>
                            <cite>Penulis Kutipan</cite>
                        </blockquote>
                    </div> -->
                        <!-- Jika ada daftar yang perlu ditampilkan -->
                        <!-- <div class="postbox__list">
                        <h3 class="postbox__list-title">Judul Daftar</h3>
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-lg-6 col-md-6">
                                <div class="postbox__list-content">
                                    <ul>
                                        <li><span><i class="flaticon-check-mark-black-outline"></i></span>Item 1</li>
                                        <li><span><i class="flaticon-check-mark-black-outline"></i></span>Item 2</li>
                                        <li><span><i class="flaticon-check-mark-black-outline"></i></span>Item 3</li>
                                        <li><span><i class="flaticon-check-mark-black-outline"></i></span>Item 4</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-6">
                                <div class="posbox__list-img">
                                    <img src="assets/img/blog/blog-details-1-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <!-- Informasi tambahan atau tombol jika diperlukan -->

                    </div>
                </article>
            </div>
        <?php else : ?>
            <p>Postingan tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</section>