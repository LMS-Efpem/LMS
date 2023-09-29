<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Administrator extends Model
{
    protected $table         = 'administrator';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'username', 'name', 'lastname', 'email', 'picture', 'role'];
}
