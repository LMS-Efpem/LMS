<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table         = 'subject';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'name','description'];
}
