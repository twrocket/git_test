<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function index()
    {
        return view('universityStar/index');
    }

    public function store()
    {
        $data = [
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content')
        ];

        print_r($data);
    }
}
