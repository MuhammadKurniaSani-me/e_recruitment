<?php

namespace App\Models;

use CodeIgniter\Model;

class JobsModel extends Model
{
    protected $table = 'tbl_pekerjaan';

    protected $allowedFields = ['nama_pekerjaan', 'kota'];

    public function getJobs($nama_pekerjaan = false)
    {
        if ($nama_pekerjaan === false) {
            return $this->findAll();
        }

        return $this->where(['nama_pekerjaan' => ucwords(str_replace('-', ' ', $nama_pekerjaan))])->first();
    }
}
