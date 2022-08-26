<?php

namespace App\Controllers;
session_start();
class Home extends BaseController
{
    public function index()
    {
        return view('front_page');
    }
}
