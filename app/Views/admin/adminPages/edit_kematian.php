<?= $this->extend('admin/adminLayout/input_pindahLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kematian Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Input Penduduk</a></div>
                <div class="breadcrumb-item">Kematian Penduduk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Kematian Penduduk</h2>
            <p class="section-lead">Halaman ini guna untuk menyatakan bahwa warga yang bersangkutan telah meninggal dunia</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/kematian" class="btn btn-primary ml-auto">Lihat Data Kematian Penduduk</a>
                        </div>
                        <div class="card-body">
                            <form action="/admin/save_edit_kematian_penduduk/<?= $penduduk['nik'] ?>" method="post" enctype="multipart/form-data" id="form-input">
                                <div class="alert alert-primary alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Catatan</div>
                                        Perlu di ingat bahwa data-data dibawah ini adalah data yang akan tercantum pada surat keterangan, harap periksa kembali bila terdapat kekeliruan.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-id-card"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nik" id="nik" value="<?= $penduduk['nik'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-signature"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nama" id="nama" value="<?= $penduduk['nama'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar-day"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= $penduduk['tanggal_lahir'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-flag"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= $penduduk['kewarganegaraan'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-map-marked-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="alamat" id="alamat" value="<?= $penduduk['alamat'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-praying-hands"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="agama" id="agama" value="<?= $penduduk['agama'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Pekerjaan Terakhir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $penduduk['pekerjaan'] ?>" class="form-control">
                                                <div class="invalid-feedback pekerjaan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Umur</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="umur" id="umur" value="<?= $penduduk['umur'] ?>" class="form-control">
                                                <div class="invalid-feedback umur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Kematian</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar-week"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="tanggal_kematian" id="tanggal_kematian" value="<?= $penduduk['tanggal_kematian'] ?>" class="form-control datetimepicker">
                                                <div class="invalid-feedback tanggal_kematian">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Penyebab</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-procedures"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="penyebab" id="penyebab" value="<?= $penduduk['penyebab'] ?>" class="form-control">
                                                <div class="invalid-feedback penyebab">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Pemakaman</label>
                                            <textarea type="text" name="tempat_pemakaman" id="tempat_pemakaman" class="form-control" style="height: 138px;"><?= $penduduk['tempat_pemakaman'] ?></textarea>
                                            <div class="invalid-feedback tempat_pemakaman">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Sweet Alerts -->
<script src="/assets/plugins/sweetalerts/dist/sweetalert2.all.min.js"></script>
<script>
    function validationForm(response) {
        if (response.error.nik) {
            $('#nik').addClass('is-invalid');
            $('.nik').html(response.error.nik);
        } else {
            $('#nik').removeClass('is-invalid');
            $('.nik').html('');
        }

        if (response.error.pekerjaan) {
            $('#pekerjaan').addClass('is-invalid');
            $('.pekerjaan').html(response.error.pekerjaan);
        } else {
            $('#pekerjaan').removeClass('is-invalid');
            $('.pekerjaan').html('');
        }

        if (response.error.umur) {
            $('#umur').addClass('is-invalid');
            $('.umur').html(response.error.umur);
        } else {
            $('#umur').removeClass('is-invalid');
            $('.umur').html('');
        }

        if (response.error.tanggal_kematian) {
            $('#tanggal_kematian').addClass('is-invalid');
            $('.tanggal_kematian').html(response.error.tanggal_kematian);
        } else {
            $('#tanggal_kematian').removeClass('is-invalid');
            $('.tanggal_kematian').html('');
        }

        if (response.error.penyebab) {
            $('#penyebab').addClass('is-invalid');
            $('.penyebab').html(response.error.penyebab);
        } else {
            $('#penyebab').removeClass('is-invalid');
            $('.penyebab').html('');
        }

        if (response.error.tempat_pemakaman) {
            $('#tempat_pemakaman').addClass('is-invalid');
            $('.tempat_pemakaman').html(response.error.tempat_pemakaman);
        } else {
            $('#tempat_pemakaman').removeClass('is-invalid');
            $('.tempat_pemakaman').html('');
        }
    }
    $(document).ready(function() {
        $('#form-input').submit(function(event) {
            event.preventDefault()
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btn-simpan').attr('disabled', true);
                    $('#btn-simpan').html('<div class="spinner-border text-info spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
                },
                success: function(response) {
                    if (response.error) {
                        validationForm(response)
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success
                        })
                        $('.invalid-feedback').html('');
                        $('.form-control').removeClass('is-invalid');
                    }
                },
                complete: function() {
                    $('#btn-simpan').removeAttr('disabled');
                    $('#btn-simpan').html('Simpan');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + xhr.responseText + thrownError);
                }
            })
            return false
        })
    })
</script>
<?= $this->endSection() ?>