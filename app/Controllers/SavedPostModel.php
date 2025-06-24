<?php

namespace App\Models;

use CodeIgniter\Model;

class SavedPostModel extends Model
{
    protected $table = 'saved_posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'post_id', 'saved_at'];
}
