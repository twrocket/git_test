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
    public function captcha_index()
    {
        return view('logins/captcha_index');
    }
    public function checkcode()
    {
        if(!isset($_SESSION)){
            session_start();
            }  //判斷session是否已啟動
        
        if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷此兩個變數是否為空
            
             if($_SESSION['check_word'] == $_POST['checkword']){
                 
                  $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
                 
                  header('content-Type: text/html; charset=utf-8');
                 
                  echo '<p> </p><p> </p><a href="./chptcha_index.php">OK輸入正確,將於一秒後跳轉(按此也可返回)</a>';
                 echo '<meta http-equiv="refresh" content="1; url=/LoginController/captcha_index">';
                 
                  exit();
             }else{
                 echo '<p> </p><p> </p><a href="./chptcha_index.php">Error輸入錯誤,將於一秒後跳轉(按此也可返回)</a>';
                 echo '<meta http-equiv="refresh" content="1; url=/LoginController/captcha_index">';
             }
        
        }
    }
}
