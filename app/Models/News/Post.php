<?php

namespace App\Models\News;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table         = 'post';

    protected $primaryKey    = 'id';
    protected $allowedFields = ['id','title','description','created_date','last_edited_date'];
}
