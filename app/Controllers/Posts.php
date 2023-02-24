<?php

namespace App\Controllers;


class Posts extends BaseController
{
    public function detail($slug)
    {
        $new = $this->postModel->asObject()->where('slug', $slug)->first();

        $data = [
            'title' => $new->title,
            'new' => $new,
            'news'=>$this->postModel->asObject()->where(['slug !='=>$slug])->findAll()
        ];
        return view('posts/detail', $data);
    }
}
