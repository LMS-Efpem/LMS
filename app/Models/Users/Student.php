<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class Student extends Model
{
    protected $table         = 'student';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'username', 'name', 'lastname', 'email', 'picture', 'role'];
}
