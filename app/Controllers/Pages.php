<?php

namespace App\Controllers;


use App\Models\PostModel;

class Pages extends BaseController
{
    public function __construct() {}

    public function beforeHome()
    {
        $data = [
            'title' => "Bienvenue | RCL",
            'page' => 'before-home',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',
        ];
        echo view('pages/before-home', $data);
    }

    public function index()
    {
        $data = [
            'title' => "Page d'accueil",
            'page' => 'home',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',

            'features' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '1', 'is_deleted' => '0'])->findAll(2),

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),

            'recent' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '1', 'is_deleted' => '0'])
                ->findAll(6),
            'most_format' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->where(['is_most_format' => '1', 'is_deleted' => '0'])
                ->first(),
            'most_reads' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('viewNumber', 'DESC')
                ->where(['is_deleted' => '0'])->findAll(3),

            'posts' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->where(['is_deleted' => '0'])->findAll(4),

            'one_post_by_category' => $this->postModel->onePostByCategory(),
            'categories' => $this->postModel->postNumberByCategory(),
            'user_data' => session()->get('user_data')
        ];



        return view('pages/home', $data);
    }

    public function liveRadio()
    {
        $data = [
            'title' => "Radio en direct | RCL",
            'page' => 'live-radio',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',
            'podcasts' => $this->podcastModel->asObject()
                ->join('categories', 'podcasts.category_id=categories.categoryId')
                ->where('is_deleted', '0')
                ->orderBy('podcastId', 'DESC')->findAll(5),

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/live-radio', $data);
    }


    public function contact()
    {
        $data = [
            'title' => "Contact | RCL",
            'page' => 'contact',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',
            'coords' => $this->coordonneeModel->asObject()->first(),
            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),
            'user_data' => session()->get('user_data')
        ];
        echo view('pages/contact', $data);
    }

   
}
