<?php

namespace App\Controllers;


class Posts extends BaseController
{
    public function detail($slug)
    {
        $new = $this->postModel->asObject()->where('slug', $slug)->first();
        if (!empty($new)) {
            //Update post view number
            $this->postView($new->postId);

            $data = [
                'title' => $new->title,
                'page' => 'post-details',
                'new' => $new,
                'news' => $this->postModel->asObject()->where(['slug !=' => $slug])->orderBy('postId', 'DESC')->findAll(3)
            ];
            return view('posts/detail', $data);
        } else {
            return view('errors/error_404');
        }
    }

    //Add view number
    function postView($postId)
    {
        $post = $this->postModel->asObject()->where('postId', $postId)->first();
        $data = ['viewNumber' => $post->viewNumber + 1];
        $this->postModel->update($postId, $data);
    }


    public function news()
    {
        $data = [
            'title' => "Actualités || RCL",
            'subtitle' => 'Radio Communautaire du Lualaba RCL',
            'posts' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->where(['is_deleted' => '0'])
                ->orderBy('postId', 'DESC')->findAll(),

            'page' => 'news',

            'news' => $this->postModel->asObject()
                ->join('categories', 'posts.category_id=categories.categoryId')
                ->orderBy('postId', 'DESC')
                ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(),

            'podcasts' => $this->podcastModel->asObject()
                ->join('categories', 'podcasts.category_id=categories.categoryId')
                ->where('is_deleted', 0)
                ->orderBy('podcastId', 'DESC')->findAll(5),

            'one_post_by_category' => $this->postModel->onePostByCategory(),
            'categories' => $this->postModel->postNumberByCategory()
        ];
        echo view('posts/news', $data);
    }

    public function postByCategory($categorySlug)
    {
        $category = $this->categoryModel->asObject()->where('category_slug', $categorySlug)->first();

        if (!empty($category)) {
            $data = [
                'title' => "Actualités | {$category->name}",
                'page' => 'news-by-category',
                'subtitle' => 'Radio Communautaire du Lualaba RCL',
                'posts' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->where(['is_deleted' => '0', 'category_id' => $category->categoryId])->findAll(),
                'news' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->orderBy('postId', 'DESC')
                    ->where(['is_featured' => '', 'is_deleted' => '0'])->findAll(3),
            ];
            echo view('posts/post-by-category', $data);

        } else {
            echo view('errors/404');
        }
    }

    public function search()
    {
        $request = htmlspecialchars($this->request->getVar('search'));

        if ($request != null) {
            $data = [
                'title' => "Résultat de <b style='color: rgba(155,64,250,0.82); font-style: italic; text-transform: lowercase'> $request</b>",
                'page' => 'search',
                'posts' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->like('title', $request)->orLike('description', $request)->orLike('name', $request)
                    ->orderBy('postId', 'DESC')->findAll(),
            ];
            echo view('posts/search', $data);
        }

    }
}
