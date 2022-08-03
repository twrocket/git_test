<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;

class LoginController extends BaseController
{
    public function index()
    {
        return view('logins/index');
    }
    public function store()
    {
        $model = new Login();
        $data = [
            'account' => $this->request->getVar('account'), 
            'password' => $this->request->getVar('password')
        ];
        session_start();
        $val = $_SESSION['num'];
        echo $val;
    }
}
