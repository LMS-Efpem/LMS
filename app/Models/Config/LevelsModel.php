<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class LevelsModel extends Model
{
    protected $table         = 'academic_level';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'description'];
}
