<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
session_start();
class LoginController extends BaseController
{
    public function index()
    {
       //
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
            foreach($logins_item as $login){
                    if($login['account']==$_POST['account']&&$login['password']==$_POST['password']){
                            echo '<script>alert("correct")</script>';
                            $_SESSION['LOGIN'] = 1;
                            $message = "you log in 徵選會系統";
                            $email = \Config\Services::email();
                            $email->setFrom('liq71795@gmail.com', 'Login  Notification');
                            $email->setTo('11222255eric@gmail.com');
                            $email->setSubject('hi');
                            $email->setMessage($message);//your message here
                            $email->send();
                            return view('front_page');
                    }
                    else{
                        echo '<script>alert("incorrect username or password")</script>';
                        return view('logins/index');
                    }
            }
        }
    }
}
