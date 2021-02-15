<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'data_penduduk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nik', 'kk', 'nama', 'tanggal_lahir', 'tempat_lahir', 'jenis_kelamin', 'kewarganegaraan', 'alamat', 'status_pekerjaan', 'agama', 'status_nikah', 'nama_ayah', 'nama_ibu', 'status_keluarga', 'status_hidup', 'status_tinggal', 'goldar', 'pendidikan'];

    // Index
    public function countAll($tableVillagers)
    {
        return $this->db->table($tableVillagers)->countAllResults();
    }
    public function countAllActive($tableVillagers)
    {
        return $this->db->table($tableVillagers)->where('status_tinggal', 0)->where('status_hidup', 0)->countAllResults();
    }
    // Penduduk
    public function deletePenduduk($nik)
    {
        return $this->db->table('data_penduduk')->delete($nik);
    }
    public function getRowPenduduk($nik)
    {
        return $this->db->table('data_penduduk')->where('nik', $nik)->get()->getRowArray();
    }
    public function getAllFamily($kk)
    {
        return $this->db->table('data_penduduk')->where('kk', $kk);
    }
    public function getAllFamilies()
    {
        return $this->db->table('data_penduduk')->where('status_tinggal', 0)->where('status_hidup', 0)->get()->getResultArray();
    }
    public function insertFamily($data)
    {
        return $this->db->table('data_penduduk')->insert($data);
    }
    public function editFamily($nik, $data)
    {
        return $this->db->table('data_penduduk')->where('nik', $nik)->set($data)->update();
    }

    // Pindah Penduduk
    public function insertPindahPenduduk($data)
    {
        return $this->db->table('data_pindah_penduduk')->insert($data);
    }
    public function changeToStatusPenduduk($data, $nik)
    {
        return $this->db->table('data_penduduk')->set($data)->where('nik', $nik)->update();
    }
    public function deletePendudukPindah($nik)
    {
        return $this->db->table('data_pindah_penduduk')->delete($nik);
    }
    public function getRowPendudukPindah($nik)
    {
        return $this->db->table('data_pindah_penduduk')->where('nik', $nik)->get()->getRowArray();
    }
    public function editPindah($nik, $data)
    {
        return $this->db->table('data_pindah_penduduk')->where('nik', $nik)->set($data)->update();
    }

    // Kematian Penduduk
    public function getDataKematian()
    {
        $builder = $this->db->table('data_kematian_penduduk a');
        $builder->select('b.kk, b.nama, b.tanggal_lahir, b.kewarganegaraan, b.alamat, b.agama, a.nik, a.umur, a.tanggal_kematian, a.id, a.pekerjaan, a.penyebab, a.tempat_pemakaman, a.created_at, a.updated_at');
        $builder->join('data_penduduk b', 'a.nik = b.nik');
        return $builder;
    }
    public function insertKematianPenduduk($data)
    {
        return $this->db->table('data_kematian_penduduk')->insert($data);
    }
    public function getRowPendudukKematian($nik)
    {
        return $this->db->table('data_kematian_penduduk')->where('nik', $nik)->get()->getRowArray();
    }
    public function deletePendudukKematian($nik)
    {
        return $this->db->table('data_kematian_penduduk')->delete($nik);
    }
    public function editKematian($nik, $data)
    {
        return $this->db->table('data_kematian_penduduk')->where('nik', $nik)->set($data)->update();
    }
    public function getAllPendudukMeninggal()
    {
        return $this->db->table('data_kematian_penduduk')->get()->getResultArray();
    }

    // Master Agama
    public function getAllReligions()
    {
        return $this->db->table('master_agama')->get()->getResultArray();
    }
    public function insertMasterAgama($data)
    {
        return $this->db->table('master_agama')->insert($data);
    }
    public function deleteAgama($id)
    {
        return $this->db->table('master_agama')->delete($id);
    }

    // Master Negara
    public function getAllCountries()
    {
        return $this->db->table('master_negara')->get()->getResultArray();
    }
    public function insertMasterNegara($data)
    {
        return $this->db->table('master_negara')->insert($data);
    }
    public function deleteNegara($id)
    {
        return $this->db->table('master_negara')->delete($id);
    }

    // Master Pendidikan
    public function getAllEducation()
    {
        return $this->db->table('master_pendidikan')->get()->getResultArray();
    }
    public function insertMasterPendidikan($data)
    {
        return $this->db->table('master_pendidikan')->insert($data);
    }
    public function deletePendidikan($id)
    {
        return $this->db->table('master_pendidikan')->delete($id);
    }
}
