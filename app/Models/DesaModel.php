<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $table      = 'desa';
    protected $primaryKey = 'id_desa';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama_desa', 'latitude', 'longitude', 'polygon', 'warna_poli', 'gambar'];

    public function getDesa($id = false)
    {
        if ($id == false) {
            # code...
            return $this->findAll();
        }
        return $this->where(['id_desa' => $id])->first();
    }
}
