<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table         = 'unit';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'description'];
}
