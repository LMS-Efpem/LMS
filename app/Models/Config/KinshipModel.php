<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class KinshipModel extends Model
{
    protected $table         = 'kinship_type';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'description'];
}
