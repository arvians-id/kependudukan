<?= $this->extend('admin/adminLayout/detail_pendudukLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Data Penduduk</a></div>
                <div class="breadcrumb-item">Detail Penduduk</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">No Kartu Keluarga - <?= $penduduk['kk'] ?></h2>
            <p class="section-lead">Halaman ini berisi detail penduduk</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="/template/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture" />
                                <div class="clearfix"></div>
                                <a href="/admin/edit_penduduk/<?= $penduduk['nik'] ?>" class="btn btn-primary mt-3">Ubah Data</a>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#"><?= $penduduk['nama'] ?></a>
                                </div>
                                <div class="author-box-job">No Induk Kependudukan - <?= $penduduk['nik'] ?></div>
                                <div class="author-box-description">
                                    <div class="card-header mb-3">
                                        <h4>Profil Detail</h4>
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
                                                <th>Tempat Lahir</th>
                                                <td><?= $penduduk['tempat_lahir'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td><?= $penduduk['jenis_kelamin'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kewarganegaraan</th>
                                                <td><?= $penduduk['kewarganegaraan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?= $penduduk['alamat'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Pekerjaan</th>
                                                <td><?= $penduduk['status_pekerjaan'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Agama</th>
                                                <td><?= $penduduk['agama'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Nikah</th>
                                                <td><?= $penduduk['status_nikah'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ayah</th>
                                                <td><?= $penduduk['nama_ayah'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ibu</th>
                                                <td><?= $penduduk['nama_ibu'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Hidup</th>
                                                <td><?= $penduduk['status_hidup'] == '0' ? 'Hidup' : 'Meninggal' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status Tinggal</th>
                                                <td><?= $penduduk['status_tinggal'] == '0' ? 'Tetap' : 'Sudah Pindah' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Golongan Darah</th>
                                                <td><?= $penduduk['goldar'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td><?= $penduduk['pendidikan'] ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <p style="text-align: right;">Dibuat Pada : <?= $penduduk['created_at'] ?> <br> Terakhir Diubah Pada : <?= $penduduk['updated_at'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card author-box card-primary">
                        <div class="card-header">
                            <h4>Daftar Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                <?php foreach ($family as $daftar_keluarga) : ?>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="/template/stisla/assets/img/avatar/avatar-1.png" />
                                        <div class="media-body">
                                            <div class="media-title"><a href="/admin/penduduk/<?= $daftar_keluarga['nik'] ?>"><?= $daftar_keluarga['nama'] ?></a> <?= ($daftar_keluarga['status_keluarga'] == 0 ? '| Ayah' : ($daftar_keluarga['status_keluarga'] == 1 ? '| Ibu' : '| Anak')) ?></div>
                                            <div class="text-job text-muted"><?= $daftar_keluarga['jenis_kelamin'] ?></div>
                                        </div>
                                        <div class="media-items">
                                            <div class="media-item">
                                                <div class="media-value">No Induk Kependudukan</div>
                                                <div class="media-label"><?= $daftar_keluarga['nik'] ?></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>