<?= $this->extend('admin/adminLayout/input_pendudukLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Penduduk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Data Penduduk</a></div>
                <div class="breadcrumb-item">Ubah Penduduk</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Ubah Data Penduduk</h2>
            <p class="section-lead">Halaman ini untuk mengubah formulir data Penduduk baru atau pendatang</p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/penduduk" class="btn btn-primary ml-auto">Lihat Data Penduduk</a>
                        </div>
                        <div class="card-body">
                            <form action="/admin/save_edit_penduduk/<?= $penduduk['nik'] ?>" method="post" enctype="multipart/form-data" id="form-input">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="far fa-id-card"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nik" id="nik" value="<?= $penduduk['nik'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Kartu Keluarga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-id-card"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="kk" id="kk" value="<?= old('kk') ? old('kk') : $penduduk['kk'] ?>" class="form-control" placeholder="Harus 16 Digit">
                                                <div class="invalid-feedback kk">
                                                </div>
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
                                                <input type="text" name="nama" id="nama" value="<?= old('nama') ? old('nama') : $penduduk['nama'] ?>" class="form-control" placeholder="Nama Depan Belakang">
                                                <div class="invalid-feedback nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar-week"></i>
                                                    </div>
                                                </div>
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : $penduduk['tanggal_lahir'] ?>" class="form-control">
                                                <div class="invalid-feedback tanggal_lahir">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir') ? old('tempat_lahir') : $penduduk['tempat_lahir'] ?>" class="form-control" placeholder="Hanya Kota">
                                                <div class="invalid-feedback tempat_lahir">
                                                </div>
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
                                                <input type="text" name="alamat" id="alamat" value="<?= old('alamat') ? old('alamat') : $penduduk['alamat'] ?>" class="form-control" placeholder="Alamat Lengkap">
                                                <div class="invalid-feedback alamat">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-smile"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nama_ayah" id="nama_ayah" value="<?= old('nama_ayah') ? old('nama_ayah') : $penduduk['nama_ayah'] ?>" class="form-control" placeholder="Nama lengkap Ayah">
                                                <div class="invalid-feedback nama_ayah">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-grin-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nama_ibu" id="nama_ibu" value="<?= old('nama_ibu') ? old('nama_ibu') : $penduduk['nama_ibu'] ?>" class="form-control" placeholder="Nama lengkap Ibu">
                                                <div class="invalid-feedback nama_ibu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select class="form-control select2" id="pendidikan" name="pendidikan">
                                                <option value="" selected disabled>-- Pilih Pendidikan --</option>
                                                <?php foreach ($education as $pendidikan) : ?>
                                                    <option <?= $penduduk['pendidikan'] == $pendidikan['pendidikan'] ? 'selected' : '' ?>><?= $pendidikan['pendidikan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback pendidikan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <select class="form-control select2" id="kewarganegaraan" name="kewarganegaraan">
                                                <option value="" selected disabled>-- Pilih Kewarganegaraan --</option>
                                                <?php foreach ($countries as $negara) : ?>
                                                    <option <?= $penduduk['kewarganegaraan'] == $negara['negara'] ? 'selected' : '' ?>><?= $negara['negara'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback kewarganegaraan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Pekerjaan</label>
                                            <select class="form-control select2" id="status_pekerjaan" name="status_pekerjaan">
                                                <option value="" selected disabled>-- Pilih Status Pekerjaan --</option>
                                                <option <?= $penduduk['status_pekerjaan'] == 'Tidak/Belum Bekerja' ? 'selected' : ''  ?>>Tidak/Belum Bekerja</option>
                                                <option <?= $penduduk['status_pekerjaan'] == 'Sedang Bekerja' ? 'selected' : ''  ?>>Sedang Bekerja</option>
                                            </select>
                                            <div class="invalid-feedback status_pekerjaan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control select2" id="agama" name="agama">
                                                <option value="" selected disabled>-- Pilih Agama --</option>
                                                <?php foreach ($religions as $agama) : ?>
                                                    <option <?= $penduduk['agama'] == $agama['agama'] ? 'selected' : ''  ?>><?= $agama['agama'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback agama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Nikah</label>
                                            <select class="form-control select2" id="status_nikah" name="status_nikah">
                                                <option value="" selected disabled>-- Pilih Status Nikah --</option>
                                                <option <?= $penduduk['status_nikah'] == 'Tidak/Belum Menikah' ? 'selected' : ''  ?>>Tidak/Belum Menikah</option>
                                                <option <?= $penduduk['status_nikah'] == 'Sudah Menikah' ? 'selected' : ''  ?>>Sudah Menikah</option>
                                            </select>
                                            <div class="invalid-feedback status_nikah">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Hubungan Keluarga</label>
                                            <select class="form-control select2" id="status_keluarga" name="status_keluarga">
                                                <option value="" selected disabled>-- Pilih Status Kekeluargaan --</option>
                                                <option <?= $penduduk['status_keluarga'] == '0' ? 'selected' : ''  ?> value="0">Sebagai Bapak</option>
                                                <option <?= $penduduk['status_keluarga'] == '1' ? 'selected' : ''  ?> value="1">Sebagai Ibu</option>
                                                <option <?= $penduduk['status_keluarga'] == '2' ? 'selected' : ''  ?> value="2">Sebagai Anak</option>
                                            </select>
                                            <div class="invalid-feedback status_keluarga">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">Laki laki</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" <?= $penduduk['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">Perempuan</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Golongan Darah</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="Belum Diketahui" class="selectgroup-input" <?= $penduduk['goldar'] == 'Belum Diketahui' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">Belum Diketahui</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="A" class="selectgroup-input" <?= $penduduk['goldar'] == 'A' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">A</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="B" class="selectgroup-input" <?= $penduduk['goldar'] == 'B' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">B</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input" <?= $penduduk['goldar'] == 'AB' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">AB</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="O" class="selectgroup-input" <?= $penduduk['goldar'] == 'O' ? 'checked' : '' ?>>
                                                    <span class="selectgroup-button">O</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
        if (response.error.kk) {
            $('#kk').addClass('is-invalid');
            $('.kk').html(response.error.kk);
        } else {
            $('#kk').removeClass('is-invalid');
            $('.kk').html('');
        }

        if (response.error.nama) {
            $('#nama').addClass('is-invalid');
            $('.nama').html(response.error.nama);
        } else {
            $('#nama').removeClass('is-invalid');
            $('.nama').html('');
        }

        if (response.error.tanggal_lahir) {
            $('#tanggal_lahir').addClass('is-invalid');
            $('.tanggal_lahir').html(response.error.tanggal_lahir);
        } else {
            $('#tanggal_lahir').removeClass('is-invalid');
            $('.tanggal_lahir').html('');
        }

        if (response.error.tempat_lahir) {
            $('#tempat_lahir').addClass('is-invalid');
            $('.tempat_lahir').html(response.error.tempat_lahir);
        } else {
            $('#tempat_lahir').removeClass('is-invalid');
            $('.tempat_lahir').html('');
        }

        if (response.error.jenis_kelamin) {
            $('#jenis_kelamin').addClass('is-invalid');
            $('.jenis_kelamin').html(response.error.jenis_kelamin);
        } else {
            $('#jenis_kelamin').removeClass('is-invalid');
            $('.jenis_kelamin').html('');
        }

        if (response.error.kewarganegaraan) {
            $('#kewarganegaraan').addClass('is-invalid');
            $('.kewarganegaraan').html(response.error.kewarganegaraan);
        } else {
            $('#kewarganegaraan').removeClass('is-invalid');
            $('.kewarganegaraan').html('');
        }

        if (response.error.alamat) {
            $('#alamat').addClass('is-invalid');
            $('.alamat').html(response.error.alamat);
        } else {
            $('#alamat').removeClass('is-invalid');
            $('.alamat').html('');
        }

        if (response.error.status_pekerjaan) {
            $('#status_pekerjaan').addClass('is-invalid');
            $('.status_pekerjaan').html(response.error.status_pekerjaan);
        } else {
            $('#status_pekerjaan').removeClass('is-invalid');
            $('.status_pekerjaan').html('');
        }

        if (response.error.agama) {
            $('#agama').addClass('is-invalid');
            $('.agama').html(response.error.agama);
        } else {
            $('#agama').removeClass('is-invalid');
            $('.agama').html('');
        }

        if (response.error.status_nikah) {
            $('#status_nikah').addClass('is-invalid');
            $('.status_nikah').html(response.error.status_nikah);
        } else {
            $('#status_nikah').removeClass('is-invalid');
            $('.status_nikah').html('');
        }

        if (response.error.nama_ayah) {
            $('#nama_ayah').addClass('is-invalid');
            $('.nama_ayah').html(response.error.nama_ayah);
        } else {
            $('#nama_ayah').removeClass('is-invalid');
            $('.nama_ayah').html('');
        }

        if (response.error.nama_ibu) {
            $('#nama_ibu').addClass('is-invalid');
            $('.nama_ibu').html(response.error.nama_ibu);
        } else {
            $('#nama_ibu').removeClass('is-invalid');
            $('.nama_ibu').html('');
        }

        if (response.error.status_keluarga) {
            $('#status_keluarga').addClass('is-invalid');
            $('.status_keluarga').html(response.error.status_keluarga);
        } else {
            $('#status_keluarga').removeClass('is-invalid');
            $('.status_keluarga').html('');
        }

        if (response.error.pendidikan) {
            $('#pendidikan').addClass('is-invalid');
            $('.pendidikan').html(response.error.pendidikan);
        } else {
            $('#pendidikan').removeClass('is-invalid');
            $('.pendidikan').html('');
        }
    }
    $(document).ready(function() {
        $('#form-input').submit(function(event) {
            event.preventDefault()
            let nik = $('#nik').val()
            $.ajax({
                url: '/admin/save_edit_penduduk/' + nik,
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
                error: function(err) {
                    console.log(err)
                }
            })
        })
        return false;
    })
</script>
<?= $this->endSection() ?>