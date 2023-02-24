<?php

namespace App\Controllers;


use App\Models\PostModel;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'=> "Page d'accueil",
            'subtitle'=> 'RCL Radio',
            'news'=>$this->postModel->asObject()->findAll()
        ];
        return view('pages/home', $data);
    }
}
