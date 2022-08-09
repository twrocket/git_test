<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class PostController extends BaseController
{
    public function index()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('posts/index', $data);
    }

    public function draft()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('posts/draft', $data);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $model = new Post();

        $data = [
            'title' => $this->request->getVar('title'),
            'website' => $this->request->getVar('website'),
            'category' => $this->request->getVar('category'),
            'content' => $this->request->getVar('content'),
            'file' => $this->request->getVar('file'),
            'dateStart' => $this->request->getVar('dateStart'),
            'dateEnd' => $this->request->getVar('dateEnd'),
            'update' => $this->request->getVar('update'),
            'status' => $this->request->getVar('status')
        ];

        $model->save($data);

        return redirect('PostController');
    }

    public function update()
    {
        $model = new Post();

        $data_id = [
            'id' => $this->request->getVar('id')
        ];

        $data = [
            'title' => $this->request->getVar('title'),
            'website' => $this->request->getVar('website'),
            'category' => $this->request->getVar('category'),
            'content' => $this->request->getVar('content'),
            'file' => $this->request->getVar('file'),
            'dateStart' => $this->request->getVar('dateStart'),
            'dateEnd' => $this->request->getVar('dateEnd'),
            'update' => $this->request->getVar('update'),
            'status' => $this->request->getVar('status')
        ];

        $model->update($data_id, $data);

        return redirect()->to('PostController');
    }

    public function show($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/show', $data);
    }

    public function edit($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/edit', $data);
    }
}
