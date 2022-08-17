<?php

namespace App\Controllers;
use App\Models\Post;

use App\Controllers\BaseController;
session_start();

class UnivStar extends BaseController
{
    public function index()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/index', $data);
    }

    public function announce_1()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_1', $data);
    }

    public function announce_2()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_2', $data);
    }

    public function announce_3()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_3', $data);
    }

    public function announce_4()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_4', $data);
    }

    public function announce_5()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('univStar/announce_5', $data);
    }
}