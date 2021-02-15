<?= $this->extend('admin/adminLayout/detail_kepala_pendudukLayout') ?>
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
            <p class="section-lead">Halaman ini berisi detail kepala keluarga dan beserta daftar keluarga</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="/template/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Nama</div>
                                    <div class="profile-widget-item-value"><?= $penduduk['nama'] ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Nama Istri</div>
                                    <div class="profile-widget-item-value"><?= $nameWife == null ? '-' : $nameWife ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Jumlah Anak</div>
                                    <div class="profile-widget-item-value"><?= count($family) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $penduduk['nama'] ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?= $penduduk['nik'] ?>
                                </div>
                            </div>
                            <ul class="nav nav-pills" id="myTab6" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-center" id="profil-tab6" data-toggle="tab" href="#profil6" role="tab" aria-controls="profil" aria-selected="true"><i class="fas fa-info-circle"></i> Profil Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" id="family-tab6" data-toggle="tab" href="#family6" role="tab" aria-controls="family" aria-selected="false"><i class="fas fa-users"></i> Daftar Keluarga</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent6">
                                <div class="tab-pane fade show active" id="profil6" role="tabpanel" aria-labelledby="profil-tab6">
                                    <div class="card-header mb-3">
                                        <h4>Profil Detail</h4>
                                    </div>
                                    <a href="/admin/edit_penduduk/<?= $penduduk['nik'] ?>" class="btn btn-primary mb-3">Ubah Data</a>
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
                                <div class="tab-pane fade" id="family6" role="tabpanel" aria-labelledby="family-tab6">
                                    <div class="card-header mb-3">
                                        <h4>Daftar Keluarga</h4>
                                    </div>
                                    <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder" id="show-family">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="/admin/save_input_keluarga_baru" method="post" enctype="multipart/form-data" id="form-input">
                            <div class="card-header">
                                <h4>Tambah Data Keluarga</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-smile"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nama_ayah" id="nama_ayah" value="<?= $penduduk['nama'] ?>" class="form-control" readonly>
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
                                                <input type="text" name="nama_ibu" id="nama_ibu" value="<?= $nameWife ?>" class="form-control" placeholder="Nama lengkap Ibu" <?= $nameWife ? 'readonly' : '' ?>>
                                                <div class="invalid-feedback nama_ibu">
                                                </div>
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
                                                <input type="text" name="kk" id="kk" value="<?= $penduduk['kk'] ?>" class="form-control" readonly>
                                                <div class="invalid-feedback kk">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="far fa-id-card"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="nik" id="nik" value="<?= old('nik') ?>" class="form-control" placeholder="Harus 16 Digit">
                                                <div class="invalid-feedback nik">
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
                                                <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" class="form-control" placeholder="Nama Depan Belakang">
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
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" class="form-control">
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
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir') ?>" class="form-control" placeholder="Hanya Kota">
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
                                                <input type="text" name="alamat" id="alamat" value="<?= old('alamat') ?>" class="form-control" placeholder="Alamat Lengkap">
                                                <div class="invalid-feedback alamat">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select class="form-control select2" id="pendidikan" name="pendidikan">
                                                <option value="" selected disabled>-- Pilih Pendidikan --</option>
                                                <?php foreach ($education as $pendidikan) : ?>
                                                    <option><?= $pendidikan['pendidikan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback pendidikan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <select class="form-control select2" id="kewarganegaraan" name="kewarganegaraan">
                                                <option value="" selected disabled>-- Pilih Kewarganegaraan --</option>
                                                <?php foreach ($countries as $negara) : ?>
                                                    <option><?= $negara['negara'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback kewarganegaraan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Pekerjaan</label>
                                            <select class="form-control select2" id="status_pekerjaan" name="status_pekerjaan">
                                                <option value="" selected disabled>-- Pilih Status Pekerjaan --</option>
                                                <option>Tidak/Belum Bekerja</option>
                                                <option>Sedang Bekerja</option>
                                            </select>
                                            <div class="invalid-feedback status_pekerjaan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control select2" id="agama" name="agama">
                                                <option value="" selected disabled>-- Pilih Agama --</option>
                                                <?php foreach ($religions as $agama) : ?>
                                                    <option><?= $agama['agama'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="invalid-feedback agama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Nikah</label>
                                            <select class="form-control select2" id="status_nikah" name="status_nikah">
                                                <option value="" selected disabled>-- Pilih Status Nikah --</option>
                                                <option>Tidak/Belum Menikah</option>
                                                <option>Sudah Menikah</option>
                                            </select>
                                            <div class="invalid-feedback status_nikah">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Hubungan Keluarga</label>
                                            <select class="form-control select2" id="status_keluarga" name="status_keluarga">
                                                <option value="" selected disabled>-- Pilih Status Kekeluargaan --</option>
                                                <?php if (!$checkWife) : ?>
                                                    <option value="1">Sebagai Istri</option>
                                                <?php endif ?>
                                                <option value="2">Sebagai Anak</option>
                                            </select>
                                            <div class="invalid-feedback status_keluarga">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">Laki laki</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input">
                                                    <span class="selectgroup-button">Perempuan</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Golongan Darah</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="Belum Diketahui" class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">Belum Diketahui</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="A" class="selectgroup-input">
                                                    <span class="selectgroup-button">A</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="B" class="selectgroup-input">
                                                    <span class="selectgroup-button">B</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="AB" class="selectgroup-input">
                                                    <span class="selectgroup-button">AB</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="goldar" value="O" class="selectgroup-input">
                                                    <span class="selectgroup-button">O</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
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

    showFamily()

    function showFamily() {
        let kk = $('#kk').val()

        $.ajax({
            url: '/admin/show_family/' + kk,
            dataType: 'json',
            success: function(response) {
                html = ''
                response.data.forEach(function(val) {
                    html += `<li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="50" src="/template/stisla/assets/img/avatar/avatar-1.png">
                                <div class="media-body">
                                    <div class="media-title"><a href="/admin/penduduk/${val.nik}">${val.nama}</a> ${val.status_keluarga == 1 ? '| Istri' : '| Anak'}</div>
                                        <div class="text-job text-muted">${val.jenis_kelamin}</div>
                                    </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">No Induk Kependudukan</div>
                                        <div class="media-label">${val.nik}</div>
                                    </div>
                                </div>
                            </li>`;
                })
                $('#show-family').html(html);
            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    $('#form-input').submit(function(event) {
        event.preventDefault();
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
                    $('#form-input')[0].reset()
                    showFamily()
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
        return false;
    })
</script>
<?= $this->endSection() ?>