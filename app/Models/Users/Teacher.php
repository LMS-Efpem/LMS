<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Teacher extends Model
{
    protected $table         = 'teacher';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'username', 'name', 'lastname', 'email', 'picture', 'role'];
}
