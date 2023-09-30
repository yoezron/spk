<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight:bold"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['kampus']; ?></p>
                    <p class="card-text"><?= $user['prodi']; ?></p>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-body-secondary">Bergabung sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="<?= base_url('assets/img/qr/confirm.png') ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><b>Pembayaran Iuran Anggota</b></h5>
            <?php if (isset($iuran) && !empty($iuran)) { ?>
                <p>Jumlah Iuran: <?= $iuran['iuran']; ?> /bulan</p>
                <p class="card-text">Pembayaran iuran dapat di transfer melalui:</p>
                <p class="card-text">Bank Syariah Indonesia (BSI)</p>
                <p class="card-text"><b>No.Rek: 706 068 7875</b></p>
                <p class="card-text">a.n. Rr. Diah Asih Purwaningrum</p>
                <a href="https://api.whatsapp.com/send?phone=61402096486&text=Salam%20perjuangan!%20Saya%20<?= $user['name']; ?>,%20telah%20melakukan%20pembayaran%20Iuran%20Anggota%20SPK,%20sebesar%20<?= $iuran['iuran']; ?>" target="_blank" class="btn btn-primary">Konfirmasi Pembayaran</a>
                <a class="btn btn-danger mt-3" href="https://api.whatsapp.com/send?phone=61402096486&text=Salam%20perjuangan!%20Saya%20<?= $user['name']; ?>,%20menyatakan%20keberatan%20membayar%20Iuran%20Anggota%20SPK,%20sebesar%20<?= $iuran['iuran']; ?>.%20Mohon%20kebijaksanaannya!" target="_blank" class="btn btn-primary">Ajukan Keberatan</a>
            <?php } else { ?>
                <p class="card-text">Data iuran tidak ditemukan. Silakan mengisi formulir pendaftaran terlebih dahulu!</p>
            <?php } ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->