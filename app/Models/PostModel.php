<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'posts';
    protected $primaryKey = 'postId';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['title', 'description', 'category_id', 'created_at', 'updated_at', 'postImage', 'viewNumber', 'is_featured', 'is_active', 'is_most_format', 'is_deleted'];


    public function postsByCategory($categorySlug)
    {
        return $this->asObject()
            ->join('categories', 'categories.categoryId=posts.category_id')
            ->where(['categories.category_slug' => $categorySlug, 'posts.is_deleted' => '0'])
            ->orderBy('postId', 'DESC')->findAll();
    }

    public function onePostByCategory()
    {
        return $this->asObject()
            ->join('categories', 'categories.categoryId=posts.category_id')
            ->where(['posts.is_deleted' =>'0'])
            ->groupBy('category_id')
            ->orderBy('categories.name', 'ASC')->findAll();
    }

    public function postNumberByCategory()
    {
        return $this->asObject()
            ->selectCount('posts.category_id', 'nb_categories')
            ->select('categories.name,categories.category_color,categories.category_slug')
            ->join('categories', 'categories.categoryId=posts.category_id')
            ->where(['posts.is_deleted' => '0'])
            ->groupBy('category_id')
            ->orderBy('categories.name', 'ASC')->findAll();
    }
}
