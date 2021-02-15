<?= $this->extend('admin/adminLayout/input_pindahLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Cetak Surat Kematian Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Input Penduduk</a></div>
                <div class="breadcrumb-item">Cetak Surat Kematian Penduduk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Cetak Surat Kematian Penduduk</h2>
            <p class="section-lead">Halaman ini guna untuk membuat surat kematian warga yang telah meninggal dunia</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/kematian" class="btn btn-primary ml-auto">Lihat Data Kematian Penduduk</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Penduduk</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2" name="nik" id="nik">
                                        <option value="" selected disabled>-- Pilih Penduduk --</option>
                                        <?php foreach ($deadVillagers as $keluarga) : ?>
                                            <option value="<?= $keluarga['nik'] ?>"><?= $keluarga['nik'] . ' - ' . $keluarga['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback nik">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penduduk Yang Bersangkutan</h4>
                        </div>
                        <div class="card-body" id="show-data">
                            <div class="empty-state" data-height="600">
                                <img class="img-fluid" src="/template/stisla/assets/img/drawkit/drawkit-nature-man-colour.svg" alt="image">
                                <h2 class="mt-0">Tidak Bisa Menemukan Surat Kematian</h2>
                                <p class="lead">Pilih salah satu penduduk yang akan dibuatkan surat kematian terlebih dahulu!</p>
                                <a href="#" class="btn btn-warning mt-4">Try Again</a>
                                <a href="#" class="mt-4 bb">Need Help?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<a href=""></a>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Sweet Alerts -->
<script src="/assets/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nik').change(function() {
            const nik = $(this).val();
            $.ajax({
                url: '/admin/showSelectKematian/' + nik,
                dataType: 'json',
                success: response => {
                    html = `<div class="alert alert-danger alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Catatan</div>
                                    Perlu di ingat bahwa data-data dibawah ini adalah data yang akan tercantum pada surat keterangan, harap periksa kembali bila terdapat kekeliruan. Jika ada yang perlu dirubah <a href="/admin/edit_kematian/${response.nik}" class="text-dark text-decoration-none">Pergi Ke Profil</a>
                                </div>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>${response.nama}</td>
                                    </tr>
                                    <tr>
                                        <th>No Induk Kependudukan</th>
                                        <td>${response.nik}</td>
                                    </tr>
                                    <tr>
                                        <th>No Kartu Keluarga</th>
                                        <td>${response.kk}</td>
                                    </tr>
                                    <tr>
                                        <th>Umur</th>
                                        <td>${response.umur}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>${response.tanggal_lahir}</td>
                                    </tr>
                                    <tr>
                                        <th>Kewarganegaraan</th>
                                        <td>${response.kewarganegaraan}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan Terakhir</th>
                                        <td>${response.pekerjaan}</td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>${response.agama}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>${response.alamat}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Meninggal Dunia</th>
                                        <td>${response.tanggal_kematian}</td>
                                    </tr>
                                    <tr>
                                        <th>Penyebab Meninggal Dunia</th>
                                        <td>${response.penyebab}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Pemakaman</th>
                                        <td>${response.tempat_pemakaman}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/admin/cetak_surat_kematian/${nik}" class="btn btn-primary float-right"><i class="fas fa-print"></i> Cetak Surat</a>`;
                    $('#show-data').html(html);
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>