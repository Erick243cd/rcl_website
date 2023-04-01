<?php

namespace App\Controllers;


class Posts extends BaseController
{
    public function index()
    {
        $data = [
            'user_data' => session()->get('user_data'),
            'title' => altData(),
            'posts' => $this->postModel->asObject()
                ->join('categories', 'categories.categoryId=posts.category_id')
                ->where('is_deleted', '0')->findAll()
        ];
        return view('posts/admin/list', $data);
    }


    public function create()
    {
        $user = session()->get('user_data');
        $data = [
            'title' => "Nouvelle Activité",
            'validation' => null,
            'categories' => $this->categoryModel->asObject()->findAll()
        ];
        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'title' => [
                    'label' => 'Post', 'rules' => 'required',
                    'errors' => ['required' => 'Le titre est requis'],
                ],
                'category_id' => [
                    'label' => 'Catégorie', 'rules' => 'required',
                    'errors' => ['required' => 'La catégorie est requise'],
                ],
                'description' => [
                    'label' => 'Description', 'rules' => 'required',
                    'errors' => ['required' => 'La description est requise'],
                ],
                'picture' => [
                    'label' => 'Picture',
                    'rules' => 'uploaded[picture]|is_image[picture]|max_size[picture,5096]',
                    'errors' => [
                        'uploaded' => 'Ne doit pas être vide',
                        'is_image' => 'Le format de cet image est inconnu',
                        'max_size' => 'Ne doit pas dépasser 5 Mo de taille',
                    ]
                ]
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $file = $this->request->getFile('picture');

                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();

                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'category_id' => $this->request->getVar('category_id'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'postImage' => $imageName,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d'),
                    );

                    $this->postModel->save($data);

                    $file->move('./public/assets/img/posts', $imageName);

                    session()->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('/list-posts');
                }
            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }
        echo view('posts/admin/create', $data);
    }

    public function edit($id)
    {
        $post = $this->postModel->asObject()
            ->join('categories', 'categories.categoryId=posts.category_id')
            ->where('postId', $id)->first();

        if (!empty($post)) {
            $data = [
                'title' => "Modifier le post",
                'validation' => null,
                'post' => $post,
                'categories'=>$this->categoryModel->asObject()->findAll()
            ];

            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'title' => [
                        'label' => 'Titre', 'rules' => 'required',
                        'errors' => ['required' => 'Le titre est requis'],
                    ], 'category_id' => [
                        'label' => 'Catégorie', 'rules' => 'required',
                        'errors' => ['required' => 'La catégorie est requise'],
                    ],
                    'description' => [
                        'label' => 'Description', 'rules' => 'required',
                        'errors' => ['required' => 'La description est requise'],
                    ],
                ]);
                if ($this->validation->withRequest($this->request)->run()) {
                    $data = array(
                        'title' => $this->request->getVar('title'),
                        'category_id' => $this->request->getVar('category_id'),
                        'slug' => strtolower(convert_accented_characters(url_title($this->request->getVar('title')))),
                        'description' => $this->request->getVar('description'),
                        'updated_at' => date('Y-m-d'),
                    );


                    $this->postModel->update($id, $data);

                    session()->setFlashData("success", "Ajouté avec succès");
                    return redirect()->to('/list-posts');
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('posts/admin/edit', $data);
        } else {
            session()->setFlashData("error", "Aucune information trouvée pour la requête envoyée");
            return redirect()->to('/list-posts');
        }
    }

    function addImage($id)
    {
        $post = $this->postModel->asObject()->where('postId', $id)->first();

        if (!empty($post)) {

            $data = [
                'title' => "Modifier l'image de l'activité",
                'validation' => null,
                'post' => $post
            ];
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'picture' => [
                        'label' => 'Image',
                        'rules' => 'uploaded[picture]|is_image[picture]|max_size[picture,5096]',
                        'errors' => [
                            'uploaded' => 'Ne doit pas être vide',
                            'is_image' => 'Le format de cet image est inconnu',
                            'max_size' => 'Ne doit pas dépasser 5 Mo de taille',
                        ]
                    ]
                ];
                if ($this->validate($rules)) {
                    $file = $this->request->getFile('picture');

                    if ($file->isValid() && !$file->hasMoved()) {
                        $imageName = $file->getRandomName();

                        $data = ['postImage' => $imageName];

                        $this->postModel->update($id, $data);

                        $file->move('./public/assets/img/posts', $imageName);
                        session()->setFlashData("success", "Mise à jour effectué avec succès !");
                        return redirect()->to('/list-posts');
                    }
                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            echo view('posts/admin/image', $data);

        } else {
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_deleted' => '1'];

            $this->postModel->update($id, $data);
            session()->setFlashData("success", "Suppression succès");
            return redirect()->to('/list-posts');
        }
    }

    public function removeAsFeatured($id)
    {
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_featured' => '0'];

            $this->postModel->update($id, $data);
            session()->setFlashData("success", "Opération effectuée");
            return redirect()->to('/list-posts');
        }
    }

    public function makeAsFeatured($id)
    {
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_featured' => '1'];
            $this->postModel->update($id, $data);
            session()->setFlashData("success", "Opération effectuée");
            return redirect()->to('/list-posts');
        }
    }
    public function makeAsMostFormat($id)
    {
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_most_format' => '1'];
            $this->postModel->update($id, $data);

            session()->setFlashData("success", "Opération effectuée");
            return redirect()->to('/list-posts');
        }

    }
    public function removeAsMostFormat($id)
    {
        $post = $this->postModel->where('postId', $id)->first();

        if (!empty($post)) {
            $data = ['is_most_format' => '0'];
            $this->postModel->update($id, $data);
            session()->setFlashData("success", "Opération effectuée");
            return redirect()->to('/list-posts');
        }
    }


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
                'news' => $this->postModel->asObject()
                    ->where(['slug !=' => $slug])
                    ->orderBy('postId', 'DESC')->findAll(3),
                'most_reads' => $this->postModel->asObject()
                    ->join('categories', 'posts.category_id=categories.categoryId')
                    ->orderBy('viewNumber', 'DESC')
                    ->where(['is_deleted' => '0'])->findAll(4),
                'categories' => $this->postModel->postNumberByCategory(),
                'user_data' => session()->get('user_data')
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
            'categories' => $this->postModel->postNumberByCategory(),
            'user_data' => session()->get('user_data')
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
                'user_data' => session()->get('user_data')
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
                'user_data' => session()->get('user_data')
            ];
            echo view('posts/search', $data);
        }

    }
}
