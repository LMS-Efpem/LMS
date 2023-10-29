<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class NationalityModel extends Model
{
    protected $table         = 'nationality';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'alpha2','alpha3','name'];
}
