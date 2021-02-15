<?= $this->extend('admin/adminLayout/data_master') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Negara</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Konfigurasi</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Master Negara</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Input Data Negara</h2>
            <p class="section-lead">Halaman ini untuk mengisi formulir data negara</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/penduduk" class="btn btn-primary ml-auto">Lihat Data Penduduk</a>
                        </div>
                        <div class="card-body">
                            <form action="/admin/save_master_negara" method="post" id="form-input" autocomplete="off">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Negara</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="negara" id="negara" class="form-control" autofocus>
                                        <div class="invalid-feedback negara">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-negara">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Negara</th>
                                            <th>Dibuat Pada</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
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
<script type="text/javascript">
    let table;
    $(document).ready(function() {
        table = $('#table-negara').DataTable({
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "/admin/showData/master_negara",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [2, -1],
                "orderable": false,
            }, ],
        })
    })

    function reloadTable() {
        table.api().ajax.reload(null, false);
    }

    function validationForm(response) {
        if (response.error.negara) {
            $('#negara').addClass('is-invalid');
            $('.negara').html(response.error.negara);
        } else {
            $('#negara').removeClass('is-invalid');
            $('.negara').html('');
        }
    }

    function deleteNegara(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data tidak bisa dipulihkan kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/delete_negara/' + id,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    beforeSend: function() {
                        $('.btn-hapus').attr('disabled', true);
                        $('.btn-hapus').html('<div class="spinner-border text-info spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success
                        });
                        reloadTable()
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
        })
    }

    $('#form-input').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/admin/save_master_negara',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#btn-simpan').attr('disabled', true);
                $('#btn-simpan').html('<div class="spinner-border text-info spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
            },
            success: function(response) {
                if (response.error) {
                    validationForm(response);
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success
                    })
                    $('#form-input')[0].reset();
                    $('#negara').removeClass('is-invalid');
                    $('.negara').html('');
                    reloadTable()
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
</script>
<?= $this->endSection() ?>