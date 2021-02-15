<?= $this->extend('admin/adminLayout/input_pindahLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Pindah Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Input Penduduk</a></div>
                <div class="breadcrumb-item">Ubah Pindah Penduduk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Ubah Pindah Penduduk</h2>
            <p class="section-lead">Halaman ini guna untuk menyatakan bahwa warga yang bersangkutan akan pindah tempat</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/pindah" class="btn btn-primary ml-auto">Lihat Data Pindah Penduduk</a>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Catatan</div>
                                    Perlu di ingat bahwa data-data dibawah ini adalah data yang akan tercantum pada surat keterangan, harap periksa kembali bila terdapat kekeliruan.
                                </div>
                            </div>
                            <form action="/admin/save_edit_pindah_penduduk/<?= $penduduk['nik'] ?>" method="post" enctype="multipart/form-data" id="form-input">
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
                                                <input type="text" value="<?= $penduduk['nik'] ?>" class="form-control" readonly>
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
                                                <input type="text" value="<?= $penduduk['nama'] ?>" class="form-control" readonly>
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
                                                <input type="text" value="<?= $penduduk['tanggal_lahir'] ?>" class="form-control" readonly>
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
                                                <input type="text" value="<?= $penduduk['kewarganegaraan'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user-graduate"></i>
                                                    </div>
                                                </div>
                                                <input type="text" value="<?= $penduduk['pendidikan'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Status Pekerjaan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <input type="text" value="<?= $penduduk['status_pekerjaan'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Asal</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-house-damage"></i>
                                                    </div>
                                                </div>
                                                <input type="text" value="<?= $penduduk['alamat_asal'] ?>" class="form-control" readonly>
                                                <div class="invalid-feedback alamat_asal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Baru</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-home"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="alamat_baru" id="alamat_baru" value="<?= $penduduk['alamat_baru'] ?>" placeholder="Alamat lengkap" class="form-control">
                                                <div class="invalid-feedback alamat_baru">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alasan Pindah</label>
                                            <textarea type="text" name="alasan_pindah" id="alasan_pindah" class="form-control" style="height: 138px;"><?= $penduduk['alasan_pindah'] ?></textarea>
                                            <div class="invalid-feedback alasan_pindah">
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
        if (response.error.alamat_baru) {
            $('#alamat_baru').addClass('is-invalid');
            $('.alamat_baru').html(response.error.alamat_baru);
        } else {
            $('#alamat_baru').removeClass('is-invalid');
            $('.alamat_baru').html('');
        }

        if (response.error.alasan_pindah) {
            $('#alasan_pindah').addClass('is-invalid');
            $('.alasan_pindah').html(response.error.alasan_pindah);
        } else {
            $('#alasan_pindah').removeClass('is-invalid');
            $('.alasan_pindah').html('');
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