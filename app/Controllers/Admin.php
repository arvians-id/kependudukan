<?php

namespace App\Controllers;

use App\Models\Admin_model;
use App\Models\ServerSide_model;
use TCPDF;

class Admin extends BaseController
{
    protected $admin_m, $serverSide;
    public function __construct()
    {
        $this->admin_m = new Admin_model();
        $this->serverSide = new ServerSide_model();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin',
            'allVillagers' => $this->admin_m->countAll('data_penduduk'),
            'activeVillagers' => $this->admin_m->countAllActive('data_penduduk'),
            'deadVillagers' => $this->admin_m->countAll('data_kematian_penduduk'),
            'moveVillagers' => $this->admin_m->countAll('data_pindah_penduduk'),
        ];
        return view('admin/adminPages/index', $data);
    }
    // -- START Input Penduduk Penduduk
    public function penduduk($nik = null)
    {
        if ($nik != null) {
            $penduduk = $this->admin_m->getRowPenduduk($nik);
            if ($penduduk['status_keluarga'] == 0) {
                $wife = $this->admin_m->getAllFamily($penduduk['kk'])->where('status_keluarga !=', 0)->where('status_keluarga', 1)->get()->getRowArray();
                $data = [
                    'title' => 'Detail Penduduk ' . $nik,
                    'penduduk' => $penduduk,
                    'religions' => $this->admin_m->getAllReligions(),
                    'countries' => $this->admin_m->getAllCountries(),
                    'education' => $this->admin_m->getAllEducation(),
                    'family' => $this->admin_m->getAllFamily($penduduk['kk'])->where('status_keluarga !=', 0)->get()->getResultArray(),
                    'checkWife' => $this->admin_m->getAllFamily($penduduk['kk'])->where('status_keluarga !=', 0)->where('status_keluarga', 1)->get()->getResultArray(),
                    'nameWife' => $wife ? $wife['nama'] : ''
                ];
                return view('admin/adminPages/detail_kepala_penduduk', $data);
            } else {
                $data = [
                    'title' => 'Detail Penduduk ' . $nik,
                    'penduduk' => $penduduk,
                    'family' => $this->admin_m->getAllFamily($penduduk['kk'])->orderBy('status_keluarga', 'asc')->get()->getResultArray(),
                ];
                return view('admin/adminPages/detail_penduduk', $data);
            }
        }
        $data = [
            'title' => 'Daftar Semua Penduduk',
        ];
        return view('admin/adminPages/penduduk', $data);
    }
    public function show_family($kk)
    {
        $data['data'] = $this->admin_m->getAllFamily($kk)->where('status_keluarga !=', 0)->orderBy('status_keluarga', 'asc')->get()->getResultArray();
        echo json_encode($data);
    }
    public function save_input_keluarga_baru()
    {
        if (!$this->validate('tambah_data_keluarga')) {
            $view = [
                'error' => [
                    'nik' => $this->validation->getError('nik'),
                    'kk' => $this->validation->getError('kk'),
                    'nama' => $this->validation->getError('nama'),
                    'tanggal_lahir' => $this->validation->getError('tanggal_lahir'),
                    'tempat_lahir' => $this->validation->getError('tempat_lahir'),
                    'jenis_kelamin' => $this->validation->getError('jenis_kelamin'),
                    'kewarganegaraan' => $this->validation->getError('kewarganegaraan'),
                    'alamat' => $this->validation->getError('alamat'),
                    'status_pekerjaan' => $this->validation->getError('status_pekerjaan'),
                    'agama' => $this->validation->getError('agama'),
                    'status_nikah' => $this->validation->getError('status_nikah'),
                    'nama_ayah' => $this->validation->getError('nama_ayah'),
                    'nama_ibu' => $this->validation->getError('nama_ibu'),
                    'status_keluarga' => $this->validation->getError('status_keluarga'),
                    'pendidikan' => $this->validation->getError('pendidikan'),
                ]
            ];
        } else {
            $data = [
                'nik' => htmlspecialchars(trim($this->request->getVar('nik'))),
                'kk' => htmlspecialchars(trim($this->request->getVar('kk'))),
                'nama' => htmlspecialchars(trim($this->request->getVar('nama'))),
                'tanggal_lahir' => htmlspecialchars(trim($this->request->getVar('tanggal_lahir'))),
                'tempat_lahir' => htmlspecialchars(trim($this->request->getVar('tempat_lahir'))),
                'jenis_kelamin' => htmlspecialchars(trim($this->request->getVar('jenis_kelamin'))),
                'kewarganegaraan' => htmlspecialchars(trim($this->request->getVar('kewarganegaraan'))),
                'alamat' => htmlspecialchars(trim($this->request->getVar('alamat'))),
                'status_pekerjaan' => htmlspecialchars(trim($this->request->getVar('status_pekerjaan'))),
                'agama' => htmlspecialchars(trim($this->request->getVar('agama'))),
                'status_nikah' => htmlspecialchars(trim($this->request->getVar('status_nikah'))),
                'nama_ayah' => htmlspecialchars(trim($this->request->getVar('nama_ayah'))),
                'nama_ibu' => htmlspecialchars(trim($this->request->getVar('nama_ibu'))),
                'status_keluarga' => htmlspecialchars(trim($this->request->getVar('status_keluarga'))),
                'status_hidup' => 0,
                'status_tinggal' => 0,
                'goldar' => htmlspecialchars(trim($this->request->getVar('goldar'))),
                'pendidikan' => htmlspecialchars(trim($this->request->getVar('pendidikan'))),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ];
            $this->admin_m->insertFamily($data);
            $view = ['success' => 'Data berhasil dibuat'];
        }
        echo json_encode($view);
    }
    public function edit_penduduk($nik)
    {
        $data = [
            'title' => 'Edit Penduduk ' . $nik,
            'religions' => $this->admin_m->getAllReligions(),
            'countries' => $this->admin_m->getAllCountries(),
            'education' => $this->admin_m->getAllEducation(),
            'penduduk' =>  $this->admin_m->getRowPenduduk($nik)
        ];
        return view('admin/adminPages/edit_penduduk', $data);
    }
    public function save_edit_penduduk($nik)
    {
        if (!$this->validate('edit_penduduk')) {
            $view = [
                'error' => [
                    'kk' => $this->validation->getError('kk'),
                    'nama' => $this->validation->getError('nama'),
                    'tanggal_lahir' => $this->validation->getError('tanggal_lahir'),
                    'tempat_lahir' => $this->validation->getError('tempat_lahir'),
                    'jenis_kelamin' => $this->validation->getError('jenis_kelamin'),
                    'kewarganegaraan' => $this->validation->getError('kewarganegaraan'),
                    'alamat' => $this->validation->getError('alamat'),
                    'status_pekerjaan' => $this->validation->getError('status_pekerjaan'),
                    'agama' => $this->validation->getError('agama'),
                    'status_nikah' => $this->validation->getError('status_nikah'),
                    'nama_ayah' => $this->validation->getError('nama_ayah'),
                    'nama_ibu' => $this->validation->getError('nama_ibu'),
                    'status_keluarga' => $this->validation->getError('status_keluarga'),
                    'pendidikan' => $this->validation->getError('pendidikan'),
                ]
            ];
        } else {
            $data = [
                'nik' => htmlspecialchars(trim($this->request->getVar('nik'))),
                'kk' => htmlspecialchars(trim($this->request->getVar('kk'))),
                'nama' => htmlspecialchars(trim($this->request->getVar('nama'))),
                'tanggal_lahir' => htmlspecialchars(trim($this->request->getVar('tanggal_lahir'))),
                'tempat_lahir' => htmlspecialchars(trim($this->request->getVar('tempat_lahir'))),
                'jenis_kelamin' => htmlspecialchars(trim($this->request->getVar('jenis_kelamin'))),
                'kewarganegaraan' => htmlspecialchars(trim($this->request->getVar('kewarganegaraan'))),
                'alamat' => htmlspecialchars(trim($this->request->getVar('alamat'))),
                'status_pekerjaan' => htmlspecialchars(trim($this->request->getVar('status_pekerjaan'))),
                'agama' => htmlspecialchars(trim($this->request->getVar('agama'))),
                'status_nikah' => htmlspecialchars(trim($this->request->getVar('status_nikah'))),
                'nama_ayah' => htmlspecialchars(trim($this->request->getVar('nama_ayah'))),
                'nama_ibu' => htmlspecialchars(trim($this->request->getVar('nama_ibu'))),
                'status_keluarga' => htmlspecialchars(trim($this->request->getVar('status_keluarga'))),
                'goldar' => htmlspecialchars(trim($this->request->getVar('goldar'))),
                'pendidikan' => htmlspecialchars(trim($this->request->getVar('pendidikan'))),
                'updated_at' => date('Y-m-d h:i:s')
            ];
            $this->admin_m->editFamily($nik, $data);
            $view = ['success' => 'Data berhasil diubah'];
        }
        echo json_encode($view);
    }
    public function delete_penduduk($nik)
    {
        $this->admin_m->deletePenduduk(['nik' => $nik]);
        $view = ['success' => 'Data berhasil dihapus'];
        echo json_encode($view);
    }
    // -- END Input Penduduk Penduduk Aktif

    // -- START Data Penduduk Pindah
    public function kematian()
    {
        $data = [
            'title' => 'Daftar Penduduk Yang Meninggal',
        ];
        return view('admin/adminPages/meninggal', $data);
    }
    public function delete_penduduk_kematian($nik)
    {
        $penduduk = $this->admin_m->where('status_hidup', 1)->getRowPendudukKematian($nik);
        if ($penduduk) {
            $this->admin_m->deletePendudukKematian(['nik' => $nik]);
            $this->admin_m->changeToStatusPenduduk(['status_hidup' => 0], $nik);
            $view = ['success' => 'Data berhasil dihapus'];
            echo json_encode($view);
        } else {
            return 'User masih hidup';
        }
    }
    public function edit_kematian($nik)
    {
        $penduduk = $this->admin_m->where('status_hidup', 1)->getRowPendudukKematian($nik);
        if ($penduduk) {
            $data = [
                'title' => 'Edit Kematian Penduduk',
                'penduduk' => $this->admin_m->getDataKematian()->where('b.nik', $nik)->get()->getRowArray(),
            ];
            return view('admin/adminPages/edit_kematian', $data);
        } else {
            return 'User masih hidup';
        }
    }
    public function save_edit_kematian_penduduk($nik)
    {
        if (!$this->validate('edit_kematian')) {
            $view = [
                'error' => [
                    'pekerjaan' => $this->validation->getError('pekerjaan'),
                    'umur' => $this->validation->getError('umur'),
                    'tanggal_kematian' => $this->validation->getError('tanggal_kematian'),
                    'penyebab' => $this->validation->getError('penyebab'),
                    'tempat_pemakaman' => $this->validation->getError('tempat_pemakaman'),
                ]
            ];
        } else {
            $data = [
                'pekerjaan' => htmlspecialchars(trim($this->request->getVar('pekerjaan'))),
                'umur' => htmlspecialchars(trim($this->request->getVar('umur'))),
                'tanggal_kematian' => htmlspecialchars(trim($this->request->getVar('tanggal_kematian'))),
                'penyebab' => htmlspecialchars(trim($this->request->getVar('penyebab'))),
                'tempat_pemakaman' => htmlspecialchars(trim($this->request->getVar('tempat_pemakaman'))),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $this->admin_m->editKematian($nik, $data);
            $view = ['success' => 'Data berhasil disimpan'];
        }
        echo json_encode($view);
    }
    // -- END Input Penduduk Penduduk Aktif

    // -- START Data Penduduk Pindah
    public function pindah($nik = null)
    {
        if ($nik != null) {
            $penduduk = $this->admin_m->where('status_tinggal', 1)->getRowPendudukPindah($nik);
            if ($penduduk) {
                $data = [
                    'title' => 'Detail Penduduk Yang Pindah ' . $nik,
                    'penduduk' => $penduduk,
                ];
                return view('admin/adminPages/detail_pindah', $data);
            } else {
                return 'User masih tetap';
            }
        }
        $data = [
            'title' => 'Daftar Penduduk Yang Pindah',
        ];
        return view('admin/adminPages/pindah', $data);
    }
    public function delete_penduduk_pindah($nik)
    {
        $penduduk = $this->admin_m->where('status_tinggal', 1)->getRowPendudukPindah($nik);
        if ($penduduk) {
            $this->admin_m->deletePendudukPindah(['nik' => $nik]);
            $this->admin_m->changeToStatusPenduduk(['status_tinggal' => 0], $nik);
            $view = ['success' => 'Data berhasil dihapus'];
            echo json_encode($view);
        } else {
            return 'User masih tetap';
        }
    }
    public function edit_pindah($nik)
    {
        $penduduk = $this->admin_m->where('status_tinggal', 1)->getRowPendudukPindah($nik);
        if ($penduduk) {
            $data = [
                'title' => 'Edit Pindah Penduduk',
                'penduduk' => $this->admin_m->getRowPendudukPindah($nik),
            ];
            return view('admin/adminPages/edit_pindah', $data);
        } else {
            return 'User masih tetap';
        }
    }
    public function save_edit_pindah_penduduk($nik)
    {
        if (!$this->validate('edit_pindah')) {
            $view = [
                'error' => [
                    'alamat_baru' => $this->validation->getError('alamat_baru'),
                    'alasan_pindah' => $this->validation->getError('alasan_pindah'),
                ]
            ];
        } else {
            $data = [
                'alamat_baru' => htmlspecialchars(trim($this->request->getVar('alamat_baru'))),
                'alasan_pindah' => htmlspecialchars(trim($this->request->getVar('alasan_pindah'))),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $this->admin_m->editPindah($nik, $data);
            $view = ['success' => 'Data berhasil disimpan'];
        }
        echo json_encode($view);
    }
    // -- END Data Penduduk Penduduk Pindah

    // -- START Input Penduduk Penduduk
    public function input_penduduk()
    {
        $data = [
            'title' => 'Input Penduduk',
            'religions' => $this->admin_m->getAllReligions(),
            'countries' => $this->admin_m->getAllCountries(),
            'education' => $this->admin_m->getAllEducation(),
        ];
        return view('admin/adminPages/input_penduduk', $data);
    }
    public function save_input_penduduk()
    {
        if (!$this->validate('input_penduduk')) {
            $view = [
                'error' => [
                    'nik' => $this->validation->getError('nik'),
                    'kk' => $this->validation->getError('kk'),
                    'nama' => $this->validation->getError('nama'),
                    'tanggal_lahir' => $this->validation->getError('tanggal_lahir'),
                    'tempat_lahir' => $this->validation->getError('tempat_lahir'),
                    'jenis_kelamin' => $this->validation->getError('jenis_kelamin'),
                    'kewarganegaraan' => $this->validation->getError('kewarganegaraan'),
                    'alamat' => $this->validation->getError('alamat'),
                    'status_pekerjaan' => $this->validation->getError('status_pekerjaan'),
                    'agama' => $this->validation->getError('agama'),
                    'status_nikah' => $this->validation->getError('status_nikah'),
                    'nama_ayah' => $this->validation->getError('nama_ayah'),
                    'nama_ibu' => $this->validation->getError('nama_ibu'),
                    'status_keluarga' => $this->validation->getError('status_keluarga'),
                    'pendidikan' => $this->validation->getError('pendidikan'),
                ]
            ];
        } else {
            $data = [
                'nik' => htmlspecialchars(trim($this->request->getVar('nik'))),
                'kk' => htmlspecialchars(trim($this->request->getVar('kk'))),
                'nama' => htmlspecialchars(trim($this->request->getVar('nama'))),
                'tanggal_lahir' => htmlspecialchars(trim($this->request->getVar('tanggal_lahir'))),
                'tempat_lahir' => htmlspecialchars(trim($this->request->getVar('tempat_lahir'))),
                'jenis_kelamin' => htmlspecialchars(trim($this->request->getVar('jenis_kelamin'))),
                'kewarganegaraan' => htmlspecialchars(trim($this->request->getVar('kewarganegaraan'))),
                'alamat' => htmlspecialchars(trim($this->request->getVar('alamat'))),
                'status_pekerjaan' => htmlspecialchars(trim($this->request->getVar('status_pekerjaan'))),
                'agama' => htmlspecialchars(trim($this->request->getVar('agama'))),
                'status_nikah' => htmlspecialchars(trim($this->request->getVar('status_nikah'))),
                'nama_ayah' => htmlspecialchars(trim($this->request->getVar('nama_ayah'))),
                'nama_ibu' => htmlspecialchars(trim($this->request->getVar('nama_ibu'))),
                'status_keluarga' => htmlspecialchars(trim($this->request->getVar('status_keluarga'))),
                'status_hidup' => 0,
                'status_tinggal' => 0,
                'goldar' => htmlspecialchars(trim($this->request->getVar('goldar'))),
                'pendidikan' => htmlspecialchars(trim($this->request->getVar('pendidikan'))),
            ];
            $this->admin_m->save($data);
            $view = ['success' => 'Data berhasil dibuat'];
        }
        echo json_encode($view);
    }
    // --- END Input Penduduk Penduduk

    // -- START Input Penduduk Pindah
    public function input_pindah()
    {
        $data = [
            'title' => 'Input Pindah Penduduk',
            'allFamilies' => $this->admin_m->getAllFamilies()
        ];
        return view('admin/adminPages/input_pindah', $data);
    }
    public function showSelect($nik)
    {
        $data = $this->admin_m->getRowPenduduk($nik);
        echo json_encode($data);
    }
    public function save_pindah_penduduk()
    {
        if (!$this->validate('input_pindah')) {
            if ($this->validation->hasError('nik')) {
                $view = [
                    'error' => [
                        'nik' => $this->validation->getError('nik'),
                    ]
                ];
            } else {
                $view = [
                    'error' => [
                        'alamat_baru' => $this->validation->getError('alamat_baru'),
                        'alasan_pindah' => $this->validation->getError('alasan_pindah'),
                    ]
                ];
            }
        } else {
            $nik = htmlspecialchars(trim($this->request->getVar('nik')));
            $data = [
                'nik' => $nik,
                'kk' => htmlspecialchars(trim($this->request->getVar('kk'))),
                'nama' => htmlspecialchars(trim($this->request->getVar('nama'))),
                'tanggal_lahir' => htmlspecialchars(trim($this->request->getVar('tanggal_lahir'))),
                'kewarganegaraan' => htmlspecialchars(trim($this->request->getVar('kewarganegaraan'))),
                'pendidikan' => htmlspecialchars(trim($this->request->getVar('pendidikan'))),
                'status_pekerjaan' => htmlspecialchars(trim($this->request->getVar('status_pekerjaan'))),
                'alamat_asal' => htmlspecialchars(trim($this->request->getVar('alamat_asal'))),
                'alamat_baru' => htmlspecialchars(trim($this->request->getVar('alamat_baru'))),
                'alasan_pindah' => htmlspecialchars(trim($this->request->getVar('alasan_pindah'))),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $this->admin_m->changeToStatusPenduduk(['status_tinggal' => 1], $nik);
            $this->admin_m->insertPindahPenduduk($data);
            $view = ['success' => 'Data berhasil disimpan'];
        }
        echo json_encode($view);
    }
    // --- END Input Penduduk Pindah

    // --- START Input Penduduk Kematian
    public function input_kematian()
    {
        $data = [
            'title' => 'Input Kematian Penduduk',
            'allFamilies' => $this->admin_m->getAllFamilies()
        ];
        return view('admin/adminPages/input_kematian', $data);
    }
    public function save_kematian_penduduk()
    {
        if (!$this->validate('input_kematian')) {
            if ($this->validation->hasError('nik')) {
                $view = [
                    'error' => [
                        'nik' => $this->validation->getError('nik'),
                    ]
                ];
            } else {
                $view = [
                    'error' => [
                        'pekerjaan' => $this->validation->getError('pekerjaan'),
                        'umur' => $this->validation->getError('umur'),
                        'tanggal_kematian' => $this->validation->getError('tanggal_kematian'),
                        'penyebab' => $this->validation->getError('penyebab'),
                        'tempat_pemakaman' => $this->validation->getError('tempat_pemakaman'),
                    ]
                ];
            }
        } else {
            $nik = htmlspecialchars(trim($this->request->getVar('nik')));
            $data = [
                'nik' => $nik,
                'pekerjaan' => htmlspecialchars(trim($this->request->getVar('pekerjaan'))),
                'umur' => htmlspecialchars(trim($this->request->getVar('umur'))),
                'tanggal_kematian' => htmlspecialchars(trim($this->request->getVar('tanggal_kematian'))),
                'penyebab' => htmlspecialchars(trim($this->request->getVar('penyebab'))),
                'tempat_pemakaman' => htmlspecialchars(trim($this->request->getVar('tempat_pemakaman'))),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $this->admin_m->changeToStatusPenduduk(['status_hidup' => 1], $nik);
            $this->admin_m->insertKematianPenduduk($data);
            $view = ['success' => 'Data berhasil disimpan'];
        }
        echo json_encode($view);
    }
    // --- END Input Penduduk Kematian

    // --- START Input Surat Kematian
    public function surat_kematian()
    {
        $data = [
            'title' => 'Cetak Surat Kematian Penduduk',
            'deadVillagers' => $this->admin_m->getDataKematian()->get()->getResultArray()
        ];
        return view('admin/adminPages/surat_kematian', $data);
    }
    public function showSelectKematian($nik)
    {
        $data = $this->admin_m->getDataKematian()->where('b.nik', $nik)->get()->getRowArray();
        echo json_encode($data);
    }
    public function cetak_surat_kematian($nik)
    {
        $data = [
            'title' => 'Cetak Surat ' . $nik,
            'penduduk' => $this->admin_m->getDataKematian()->where('b.nik', $nik)->get()->getRowArray()
        ];
        $surat = view('admin/adminPages/cetak_surat/cetak_kematian', $data);
        // create new PDF document
        $pdf = new TCPDF('PDF_PAGE_ORIENTATION', PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Widdy Arfiansyah');
        $pdf->SetTitle('Surat Kematian');
        $pdf->SetSubject('Surat Kematian');
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'PEMERINTAH KOTA SUKABUMI', 'KECAMATAN GUNUNG PUYUH KELURAHAN GUNUNG PUYUH');
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->addPage();
        // output the HTML content
        $pdf->writeHTML($surat, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('SURAT-KEMATIAN-' . $nik . '.pdf', 'I');
    }
    // --- END Input Surat Kematian

    // --- START Input Master Agama
    public function master_agama()
    {
        $data = [
            'title' => 'Master Data Agama',
            'religions' => $this->admin_m->getAllReligions()
        ];
        return view('admin/adminPages/master_agama', $data);
    }
    public function delete_agama($id)
    {
        $this->admin_m->deleteAgama(['id' => $id]);
        $view = ['success' => 'Data berhasil dihapus'];
        echo json_encode($view);
    }
    public function save_master_agama()
    {
        if (!$this->validate('input_agama')) {
            $view = [
                'error' => [
                    'agama' => $this->validation->getError('agama')
                ]
            ];
        } else {
            $data = [
                'agama' => $this->request->getVar('agama'),
                'created_at' => date('Y-m-d h:i:s')
            ];
            $this->admin_m->insertMasterAgama($data);
            $view = ['success' => 'Data berhasil dibuat'];
        }
        echo json_encode($view);
    }
    // --- END Input Master Agama

    // --- START Input Master Negara
    public function master_negara()
    {
        $data = [
            'title' => 'Master Data Negara',
        ];
        return view('admin/adminPages/master_negara', $data);
    }
    public function delete_negara($id)
    {
        $this->admin_m->deleteNegara(['id' => $id]);
        $view = ['success' => 'Data berhasil dihapus'];
        echo json_encode($view);
    }
    public function save_master_negara()
    {
        if (!$this->validate('input_negara')) {
            $view = [
                'error' => [
                    'negara' => $this->validation->getError('negara')
                ]
            ];
        } else {
            $data = [
                'negara' => $this->request->getVar('negara'),
                'created_at' => date('Y-m-d h:i:s')
            ];
            $this->admin_m->insertMasterNegara($data);
            $view = ['success' => 'Data berhasil dibuat'];
        }
        echo json_encode($view);
    }
    // --- END Input Master Negara

    // --- START Input Master Pendidikan
    public function master_pendidikan()
    {
        $data = [
            'title' => 'Master Data Pendidikan',
        ];
        return view('admin/adminPages/master_pendidikan', $data);
    }
    public function delete_pendidikan($id)
    {
        $this->admin_m->deletePendidikan(['id' => $id]);
        $view = ['success' => 'Data berhasil dihapus'];
        echo json_encode($view);
    }
    public function save_master_pendidikan()
    {
        if (!$this->validate('input_pendidikan')) {
            $view = [
                'error' => [
                    'pendidikan' => $this->validation->getError('pendidikan')
                ]
            ];
        } else {
            $data = [
                'pendidikan' => $this->request->getVar('pendidikan'),
                'created_at' => date('Y-m-d h:i:s')
            ];
            $this->admin_m->insertMasterPendidikan($data);
            $view = ['success' => 'Data berhasil dibuat'];
        }
        echo json_encode($view);
    }
    // --- END Input Master Pendidikan

    // SHOW DATATABLES
    public function showData($master)
    {
        $list = $this->serverSide->get_datatables($master);
        $data = array();
        $no = $_POST['start'];
        if ($master == 'master_agama') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->agama;
                $row[] = date_format(date_create($field->created_at), 'l d F Y');
                $row[] = '<button type="button" onclick="deleteAgama(' . $field->id . ')" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></button>';

                $data[] = $row;
            }
        } elseif ($master == 'master_negara') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->negara;
                $row[] = date_format(date_create($field->created_at), 'l d F Y');
                $row[] = '<button type="button" onclick="deleteNegara(' . $field->id . ')" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></button>';

                $data[] = $row;
            }
        } elseif ($master == 'master_pendidikan') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->pendidikan;
                $row[] = date_format(date_create($field->created_at), 'l d F Y');
                $row[] = '<button type="button" onclick="deletePendidikan(' . $field->id . ')" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></button>';

                $data[] = $row;
            }
        } elseif ($master == 'data_penduduk') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->kk;
                $row[] = $field->nama;
                $row[] = $field->alamat;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example"><a href="/admin/penduduk/' . $field->nik . '" class="btn btn-primary"><i class="fas fa-eye"></i></a><a href="/admin/edit_penduduk/' . $field->nik . '" class="btn btn-info"><i class="fas fa-edit"></i></a><button type="button" onclick="deletePenduduk(' . $field->nik . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button></div>';

                $data[] = $row;
            }
        } elseif ($master == 'data_pindah_penduduk') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->kk;
                $row[] = $field->nama;
                $row[] = $field->alamat_baru;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example"><a href="/admin/pindah/' . $field->nik . '" class="btn btn-primary"><i class="fas fa-eye"></i></a><a href="/admin/edit_pindah/' . $field->nik . '" class="btn btn-info"><i class="fas fa-edit"></i></a><button type="button" onclick="deletePenduduk(' . $field->nik . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button></div>';

                $data[] = $row;
            }
        } elseif ($master == 'data_kematian_penduduk') {
            foreach ($list as $field) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nik;
                $row[] = $field->nama;
                $row[] = $field->umur;
                $row[] = $field->pekerjaan;
                $row[] = $field->penyebab;
                $row[] = $field->tanggal_kematian;
                $row[] = $field->tempat_pemakaman;
                $row[] = $field->created_at;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example"><a href="/admin/penduduk/' . $field->nik . '" class="btn btn-primary"><i class="fas fa-eye"></i></a><a href="/admin/edit_kematian/' . $field->nik . '" class="btn btn-info"><i class="fas fa-edit"></i></a><button type="button" onclick="deletePenduduk(' . $field->nik . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button></div>';

                $data[] = $row;
            }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->serverSide->count_all($master),
            "recordsFiltered" => $this->serverSide->count_filtered($master),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function showData_2($master)
    {
        $filters = $this->request->getVar('status_tinggal');
        $list = $this->serverSide->get_datatables_penduduk($master, $filters);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nik;
            $row[] = $field->kk;
            $row[] = $field->nama;
            $row[] = $field->alamat;
            $row[] = '<div class="btn-group" role="group" aria-label="Basic example"><a href="/admin/penduduk/' . $field->nik . '" class="btn btn-primary"><i class="fas fa-eye"></i></a><a href="/admin/edit_penduduk/' . $field->nik . '" class="btn btn-info"><i class="fas fa-edit"></i></a><button type="button" onclick="deletePenduduk(' . $field->nik . ')" class="btn btn-danger"><i class="fas fa-trash"></i></button></div>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->serverSide->count_all($master),
            "recordsFiltered" => $this->serverSide->count_filtered($master),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
