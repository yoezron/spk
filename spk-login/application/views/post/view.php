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
        padding-right: 5px;
        color: #333;
        background-color: #fff;
        text-align: justify;
        word-spacing: 1px;
    }

    .sidebar__widget {
        padding: 30px;
    }

    a:hover {
        color: orange;
    }
</style>
<section class="postbox__area pt-120 pb-80">
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <?php if ($post) : ?>
                    <div class="postbox__wrapper">
                        <article class="postbox__item format-image mb-50 transition-3">
                            <h3 class="postbox__title"><?= $post['judul_tulisan']; ?></h3>
                            <div class="postbox__thumb p-relative m-img">
                                <div class="postbox__thumb-text d-none d-md-block">
                                    <span><?= date('d F', strtotime($post['waktu_posting'])); ?></span>
                                </div>
                                <img src="<?= base_url('assets/img/posting/' . $post['gambar']); ?>" alt="">
                            </div>
                            <div class="postbox__content">
                                <div class="postbox__meta">
                                    <span><i class="flaticon-user"></i>By <?= $post['penulis']; ?></span>
                                    <!-- Pastikan $post['tag'] sesuai dengan tag yang ada -->
                                    <span><a href="#"><i class="flaticon-tag"></i><?= $post['tag']; ?></a></span>
                                    <!-- Jika perlu, tambahkan informasi komentar -->
                                    <!-- <span><a href="#"><i class="flaticon-comment"></i>02 Comments</a></span> -->
                                </div>

                                <div class="postbox__text mb-10">
                                    <?= $post['isi_tulisan']; ?>
                                    <!-- Tambahkan elemen HTML sesuai dengan konten yang Anda inginkan -->


                                </div>
                                <div class="postbox__details-share-wrapper">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-6 col-md-6">
                                            <div class="postbox__details-tag tagcloud">
                                                <span>Tag:</span>
                                                <a href="#"><?= $post['tag']; ?></a>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-6">
                                            <div class="postbox__details-share text-lg-end">
                                                <span>Bagikan:</span>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <a href="whatsapp://send?text=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php else : ?>
                    <p>Postingan tidak ditemukan.</p>
                <?php endif; ?>

                <div class="postbox__comment-form-box">
                    <h3 class="postbox__comment-form-title">Kirim Komentar</h3>
                    <div class="postbox__comment-form">
                        <form id="contact-form" action="#">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="postbox__comment-input">
                                        <input name="name" type="text" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="postbox__comment-input">
                                        <input name="email" type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="postbox__comment-input">
                                        <textarea name="message" placeholder="Tulis Komentar"></textarea>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="postbox__comment-btn">
                                        <button type="submit" class="tp-btn">Kirim Komentar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            // Urutkan $all_posts dari yang terbaru ke yang terlama berdasarkan waktu posting
            usort($all_posts, function ($a, $b) {
                return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
            });
            ?>
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__widget mb-30 mt-60">
                    <h3 class="sidebar__widget-title">Baca Juga...</h3>
                    <div class="sidebar__widget-content">
                        <div class="sidebar__post">
                            <?php if (!empty($all_posts)) : ?>
                                <?php $count = 0; ?>
                                <?php foreach ($all_posts as $post) : ?>
                                    <?php if ($count < 5) : ?>
                                        <div class="rc__post mb-10 d-flex align-items-center">
                                            <div class="rc__post-content">
                                                <div class="rc__meta">
                                                    <span><i class="flaticon-tag"></i><?= $post['jenis_tulisan']; ?></span>
                                                </div>
                                                <h3 class="rc__post-title">
                                                    <a href="<?= base_url('post/view/' . $post['id']); ?>"><?= $post['judul_tulisan']; ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                        <?php $count++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="text-center">Tidak ada postingan saat ini.</p>
                            <?php endif; ?>
                            <a href="<?= base_url('Post#') ?>">Baca Tulisan lainnya..</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>