<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoDesaModel extends Model
{
    protected $table      = 'info_desa';
    protected $primaryKey = 'id_info';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_desa', 'luas_wilayah', 'jumlah_pend', 'info_lengkap'];

    public function getInfoDesa($idDesa = false)
    {
        if ($idDesa == false) {
            # code...
            return $this->findAll();
        }
        return $this->join('desa', 'desa.id_desa = info_desa.id_desa')->where(['desa.id_desa' => $idDesa])->findAll();
    }
}
