<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;

class LoginController extends BaseController
{
    public function index()
    {
        session_start();
        if(!isset($_SESSION['LOGIN'])){
            $_SESSION['LOGIN'] = 0;
            }
        return view('logins/index');
    }
    public function check()
    {
        $model = new Login();
        
        $logins = [                         //抓全部資料
            'logins' => $model->findAll()
        ]; 
        foreach($logins as $logins_item){
            print_r($logins_item);
        }

        session_start();
        if(isset($_SESSION['LOGIN'])){
            if(!empty($logins)) {
                
            }
            if($_POST['account'] == 'test'){
                $_SESSION['LOGIN'] = 1;
                return redirect('Home');
                }
            else{
                echo '<script>alert("incorrect username or password")</script>';
                return view('logins/index');
            }
        }
        else{
        return redirect('Home');
        }
        $data = [
            'account' => $this->request->getVar('account'), 
            'password' => $this->request->getVar('password')
        ];
    }
}
