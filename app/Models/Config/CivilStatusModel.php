<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class CivilStatusModel extends Model
{
    protected $table         = 'civil_status';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'description'];
}
