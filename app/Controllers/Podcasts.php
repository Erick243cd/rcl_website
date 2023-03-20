<?php

namespace App\Controllers;

class Podcasts extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Page d'accueil",
            'page' => 'podcasts',
            'subtitle' => 'Radio Communautaire du Lualaba RCL',

            'podcasts' => $this->podcastModel->asObject()
                ->join('categories', 'podcasts.category_id=categories.categoryId')
                ->where('is_deleted', 0)
                ->orderBy('podcastId', 'DESC')->findAll(50),

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),

            'mostview'=>$this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where('viewNumber >', '0')
                ->findAll(5)
        ];

        echo view('podcasts/index', $data);
    }

}
