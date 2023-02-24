<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'postId';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['title', 'description', 'created_at','postImage', 'is_active', 'is_deleted'];
}
