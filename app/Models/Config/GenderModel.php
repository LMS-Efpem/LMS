<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class GenderModel extends Model
{
    protected $table         = 'gender';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'description'];
}
