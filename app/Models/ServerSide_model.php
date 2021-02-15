<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerSide_model extends Model
{
    private $column_order_agama = ['id', 'agama', null];
    private $column_search_agama = ['agama'];

    private $order = ['id' => 'desc'];

    private $column_order_negara = ['id', 'negara', null];
    private $column_search_negara = ['negara'];

    private $column_order_pendidikan = ['id', 'pendidikan', null];
    private $column_search_pendidikan = ['pendidikan'];

    private $column_search_penduduk = ['nik', 'kk', 'nama'];
    private $column_order_penduduk = ['id', null, null, 'nama', null, null];

    private $column_search_penduduk_pindah = ['nik', 'kk', 'nama'];
    private $column_order_penduduk_pindah = ['id', null, null, 'nama', null, null];

    private $column_search_penduduk_kematian = ['nama', 'data_kematian_penduduk.nik'];
    private $column_order_penduduk_kematian = ['id', null, 'nama', 'umur', null, null, 'tanggal_kematian', null, null, null];
    private function _get_datatables_query($builder)
    {
        if ($builder == $this->db->table('master_agama')) {
            $this->_master_agama($builder);
        } elseif ($builder == $this->db->table('master_negara')) {
            $this->_master_negara($builder);
        } elseif ($builder == $this->db->table('master_pendidikan')) {
            $this->_master_pendidikan($builder);
        } elseif ($builder == $this->db->table('data_pindah_penduduk')) {
            $this->_data_pindah_penduduk($builder);
        } elseif ($builder == $this->db->table('data_kematian_penduduk')) {
            $this->_data_kematian_penduduk($builder);
        } elseif ($builder == $this->db->table('data_penduduk')) {
            $this->_data_penduduk($builder);
        }
    }
    public function get_datatables($table)
    {
        $builder = $this->db->table($table);
        $this->_get_datatables_query($builder);
        if ($_POST['length'] != -1) {
            $builder->limit($_POST['length'], $_POST['start']);
        }
        return $builder->get()->getResult();
    }

    public function get_datatables_penduduk($table, $filters = null)
    {
        $builder = $this->db->table($table);
        $this->_get_datatables_query($builder);
        if ($_POST['length'] != -1) {
            $builder->limit($_POST['length'], $_POST['start']);
        }
        if ($filters != null) {
            return $builder->where('status_tinggal', $filters)->where('status_hidup', $filters)->get()->getResult();
        }
        return $builder->get()->getResult();
    }

    public function count_filtered($table)
    {
        $builder = $this->db->table($table);
        $this->_get_datatables_query($builder);
        return $builder->countAllResults();
    }

    public function count_all($table)
    {
        $builder = $this->db->table($table);
        return $builder->countAllResults();
    }
    // Core Function
    private function _master_agama($builder)
    {
        $i = 0;
        foreach ($this->column_search_agama as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_agama) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_agama[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }

    private function _master_negara($builder)
    {
        $i = 0;
        foreach ($this->column_search_negara as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_negara) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_negara[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }
    private function _master_pendidikan($builder)
    {
        $i = 0;
        foreach ($this->column_search_pendidikan as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_pendidikan) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_pendidikan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }
    private function _data_pindah_penduduk($builder)
    {
        $i = 0;
        foreach ($this->column_search_penduduk_pindah as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_penduduk_pindah) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_penduduk_pindah[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }
    private function _data_kematian_penduduk($builder)
    {
        $i = 0;
        $builder->select('data_penduduk.kk, data_penduduk.nama, data_penduduk.tanggal_lahir, data_penduduk.kewarganegaraan, data_penduduk.alamat, data_penduduk.agama, data_kematian_penduduk.nik, data_kematian_penduduk.umur, data_kematian_penduduk.tanggal_kematian, data_kematian_penduduk.id, data_kematian_penduduk.pekerjaan, data_kematian_penduduk.penyebab, data_kematian_penduduk.tempat_pemakaman, data_kematian_penduduk.created_at, data_kematian_penduduk.updated_at');
        $builder->join('data_penduduk', 'data_kematian_penduduk.nik = data_penduduk.nik');
        foreach ($this->column_search_penduduk_kematian as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_penduduk_kematian) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_penduduk_kematian[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }
    private function _data_penduduk($builder)
    {
        $i = 0;
        foreach ($this->column_search_penduduk as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $builder->groupStart();
                    $builder->like($item, $_POST['search']['value']);
                } else {
                    $builder->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search_penduduk) - 1 == $i)
                    $builder->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $builder->orderBy($this->column_order_penduduk[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $builder->orderBy(key($order), $order[key($order)]);
        }
    }
}
