<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table         = 'grade';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id','id_group','description'];
}