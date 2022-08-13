<?php

namespace App\Controllers;
session_start();
class Home extends BaseController
{
    public function index()
    {
        if(!isset($_SESSION['LOGIN'])){     //未定義時,賦值0
            $_SESSION['LOGIN'] = 0;      //0代表還沒登錄
            }
        return view('front_page');
    }
}
