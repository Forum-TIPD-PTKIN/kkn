<div class="p-5 mb-4 bg-light rounded-3 shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 100%);">
    <div class="container-fluid py-3 position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-md-2 text-center text-md-start mb-4 mb-md-0">
                <img src="<?= base_url('assets/img/logoapp.png') ?>" alt="Logo" class="img-fluid" style="max-height: 120px;">
            </div>
            <div class="col-md-10">
                <h1 class="display-5 fw-bold text-primary">Portal <?= $this->config->item('app_singkatan') ?></h1>
                <p class="col-md-10 fs-5 text-muted">Platform terintegrasi pengelolaan Kuliah Kerja Nyata (<?= $this->config->item('app_singkatan') ?>). Silakan jelajahi informasi pendaftaran, kegiatan mahasiswa, dan berita terbaru.</p>
                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4"><i class="bi bi-box-arrow-in-right"></i> Masuk Sistem</a>
                    <a href="#" class="btn btn-success btn-lg rounded-pill act-kelompok shadow-sm px-4" data-kategori="teraktif"><i class="bi bi-arrow-up-right"></i> Kelompok Teraktif</a>
                    <a href="#" class="btn btn-info btn-lg rounded-pill act-aktifitas shadow-sm px-4 text-white" data-kategori="best"><i class="bi bi-graph-up-arrow"></i> Aktifitas Terbaik</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <!-- start daftar kkn -->
            <div class="row">
                <?php
                $color = array("purple", "blue", "green", "red", "yellow");
                if (count($kkn['db']) > 0)
                    foreach ($kkn['db'] as $i => $dp) {
                        $url = base_url('dashboard/kkn/' . $dp['idkkn']);
                        $randcolor = rand(0, 4);
                ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <a href="<?= $url ?>">
                                <div class="card-body px-3 py-4-5" title="<?= $dp['keterangan'] ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon <?= $color[$randcolor] ?>">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold mb-0"><?= $dp['tema'] ?></h6>
                                            <div class="mb-0" style="font-size:12px">Tahun <?= $dp['tahun'] ?></div>
                                            <h6 class="font-extrabold mb-0"><i class="bi bi-person-check"></i> <?= $dp['jumlahvalidasi'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- end daftar kkn -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Berita Terbaru</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <?php foreach ($daftarberita as $i => $dp) {
                                    $detail = strip_tags($dp['detail']);
                                    $berita = explode(" ", $detail);
                                    $urlberita = base_url("web/detailberita/" . $dp['slug']);
                                ?>

                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                                        <div class="card h-100 shadow-sm border-0">
                                            <a href="<?= $urlberita ?>">
                                                <?php if ($dp['thumbnail']) { ?>
                                                    <img src="<?= base_url($dp['thumbnail']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="<?= $dp['judul'] ?>">
                                                <?php } else { ?>
                                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                                    </div>
                                                <?php } ?>
                                            </a>
                                            <div class="card-body d-flex flex-column">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="badge bg-light-primary text-primary" style="font-size:11px;">
                                                        <i class="bi bi-person-circle"></i> <?= $dp['nama'] ?>
                                                    </span>
                                                    <span class="text-muted" style="font-size:11px;">
                                                        <i class="bi bi-clock"></i> <?= waktu_lalu($dp['waktu']) ?>
                                                    </span>
                                                </div>
                                                <h5 class="card-title"><a href="<?= $urlberita ?>" class="text-dark"><?= $dp['judul'] ?></a></h5>
                                                <p class="card-text text-muted flex-grow-1" style="font-size: 14px;">
                                                    <?php
                                                    if (count($berita) > 25) {
                                                        echo implode(" ", array_slice($berita, 0, 25)) . "...";
                                                    } else {
                                                        echo $dp['detail'];
                                                    }
                                                    ?>
                                                </p>
                                                <div class="mt-3">
                                                    <a href="<?= $urlberita ?>" class="btn btn-outline-primary btn-sm rounded-pill">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>Update Kegiatan Terakhir</h4>
                    <div id="daftarlkh"></div>


                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <?php if ($this->session->userdata('iduser')) { ?>
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="<?= $this->session->userdata('profilpic') ?>" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?= $this->session->userdata('nama') ?></h5>
                                <!--
                            <h6 class="text-muted mb-0"><?= $this->session->userdata('email') ?></h6>
                            -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>



            <div class="card">
                <div class="card-header">
                    <h4>Komentar Terbaru</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (count($daftarkomentar) > 0) {
                        echo "<ul>";
                        foreach ($daftarkomentar as $i => $dp) {
                            echo "  <li>
                                        <div><b>" . $dp['nama'] . "</b></div>
                                        <div style='font-size:12px;'><i class='bi bi-clock'></i> " . waktu_lalu($dp['waktu']) . "</div>
                                        <div><a href='" . base_url('dashboard/detail_aktifitas/' . $dp['idaktifitas']) . "'>&ldquo;" . $dp['komentar'] . "&rdquo;</a></div>
                                    </li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "Tidak ditemukan";
                    }
                    ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>User Aktif</h4>
                </div>
                <div class="card-body">
                    <h3 id="jum-user-aktif"></h3>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Modal web -->
<div class="modal fade text-left w-100" id="modal-aktifitas" tabindex="-1" role="dialog" aria-labelledby="myModalForm" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Aktifitas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i> x
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <i style="font-size:13px;">Tingkatkan Aktifitas dan Like pada kegiatan anda </i>
                    <div class="detail-aktifitas-populer"></div>
                </div>
            </div>

            <div class=" modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<!-- full size modal-->