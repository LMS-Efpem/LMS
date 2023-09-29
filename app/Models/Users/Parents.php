<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Parents extends Model
{
    protected $table         = 'parent';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'username', 'name', 'lastname', 'email', 'picture', 'role'];
}
