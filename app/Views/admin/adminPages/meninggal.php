<?= $this->extend('admin/adminLayout/dataLayout') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penduduk Meninggal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kependudukan Desa</a></div>
                <div class="breadcrumb-item"><a href="#">Data Penduduk</a></div>
                <div class="breadcrumb-item">Penduduk Meninggal</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Penduduk Meninggal</h2>
            <p class="section-lead">
                Halaman ini berisi penduduk yang sudah meninggal dunia.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:history.back()" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="/admin/input_kematian" class="btn btn-primary ml-auto">Input Data Kematian Penduduk</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="data-penduduk-kematian">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Induk Kependudukan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Umur</th>
                                            <th>Pekerjaan Terakhir</th>
                                            <th>Penyebab</th>
                                            <th>Tanggal Meninggal</th>
                                            <th>Tempat Pemakaman</th>
                                            <th>Di Input Pada</th>
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
<script>
    var table;
    $(document).ready(function() {
        table = $('#data-penduduk-kematian').dataTable({
            "autoWidth": false,
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "/admin/showData/data_kematian_penduduk",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [1, 4, 5, 7, 8, -1],
                    "orderable": false
                },
                {
                    "targets": [-1],
                    "className": "text-center"
                }

            ]
        })
    })

    function reloadTable() {
        table.api().ajax.reload(null, false)
    }

    function deletePenduduk(nik) {
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
                    url: '/admin/delete_penduduk_kematian/' + nik,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nik: nik
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
</script>
<?= $this->endSection() ?>