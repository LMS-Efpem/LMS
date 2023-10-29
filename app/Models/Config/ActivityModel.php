<?php

namespace App\Models\Config;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table         = 'activity';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id','title', 'description','id_activity_type','id_subject_grade','worksheet','id_unit'];
}
