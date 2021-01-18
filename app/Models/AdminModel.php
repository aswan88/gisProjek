<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin';

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password'];

    public function getAdmin($id = false)
    {
        if ($id == false) {
            # code...
            return $this->findAll();
        }
        return $this->where(['id_desa' => $id])->first();
    }
}
