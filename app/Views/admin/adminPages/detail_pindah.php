<?= $this->extend('admin/adminLayout/detail_pendudukLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Penduduk Pindah Tempat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Data Penduduk</a></div>
                <div class="breadcrumb-item">Detail Penduduk Pindah Tempat</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">No Kartu Keluarga - <?= $penduduk['kk'] ?></h2>
            <p class="section-lead">Halaman ini berisi detail penduduk yang sudah pindah tempat</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="/template/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture" />
                                <div class="clearfix"></div>
                                <a href="/admin/edit_pindah/<?= $penduduk['nik'] ?>" class="btn btn-primary mt-3">Ubah Data</a>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#"><?= $penduduk['nama'] ?></a>
                                </div>
                                <div class="author-box-job">No Induk Kependudukan - <?= $penduduk['nik'] ?></div>
                                <div class="author-box-description">
                                    <div class="card-header mb-3">
                                        <h4>Profil Detail</h4>
                                        <a href="/admin/penduduk/<?= $penduduk['nik'] ?>" class="btn btn-primary float-right">Lihat Data Asli</a>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <td><?= $penduduk['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Induk Kependudukan</th>
                                                <td><?= $penduduk['nik'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Kartu Keluarga</th>
                                                <td><?= $penduduk['kk'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?= $penduduk['tanggal_lahir'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kewarganegaraan</th>
                                                <td><?= $penduduk['kewarganegaraan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Pekerjaan</th>
                                                <td><?= $penduduk['status_pekerjaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td><?= $penduduk['pendidikan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Asal</th>
                                                <td><?= $penduduk['alamat_asal'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Baru</th>
                                                <td><?= $penduduk['alamat_baru'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alasan Pindah</th>
                                                <td><?= $penduduk['alasan_pindah'] ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <p style="text-align: right;">Dibuat Pada : <?= $penduduk['created_at'] ?> <br> Terakhir Diubah Pada : <?= $penduduk['updated_at'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>