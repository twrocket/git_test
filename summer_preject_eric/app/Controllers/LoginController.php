<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
session_start();
if(!isset($_SESSION['LOGIN'])){
    $_SESSION['LOGIN'] = 0;
}
if(!isset($_SESSION['check_usr'])){ //沒有定義，設為零
    $_SESSION['check_usr'] = 0;
}
class LoginController extends BaseController
{
    public function index() //帳號密碼首頁
    {
        echo $_SESSION['LOGIN'];
        return view('logins/index');
    }
    public function check()
    {
        if(!isset($_SESSION['LOGIN'])){ //沒有定義，設為零
            $_SESSION['LOGIN'] = 0;
        }
        if(!isset($_POST['account'])){
            echo '<script>alert("尚未登入")</script>';
            return view('logins/index');
        }
        if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷驗證碼是否為空   
            if($_SESSION['check_word'] == $_POST['checkword']){
                 $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
            }else{
                echo '<script>alert("incorrect CAPTCHA")</script>'; //錯誤給予提示並返回
                return view('logins/index');
                // echo '<meta http-equiv="refresh" content="1; url=/LoginController/index">';
            }
       }
        $model = new Login();
        $logins = [                         //抓全部資料
            'logins' => $model->findAll()
        ];
        foreach($logins as $logins_item){
            foreach($logins_item as $login){
                    //逐一判斷資料是否正確
                    if($login['account']==$_POST['account']&&$login['password']==$_POST['password']){
                            $_SESSION['LOGIN'] = 1; //成功登入，$_SESSION['LOGIN']設定1
                            $_SESSION['name'] = $login['name']; //使用者名字
                            echo '<script>alert("hello '.$_SESSION['name'].'")</script>';
                            return view('front_page');
                    }
            }
        }
        if($_SESSION['LOGIN'] == 0){
            echo '<script>alert("incorrect account or password")</script>';
            return view('logins/index');
        }
    }
    public function forgot_password_index() //忘記密碼頁面
    {
        if(!isset($_SESSION['check_usr'])){
            $_SESSION['check_usr'] = 0;
            }
        return view('logins/forgot_password_index');
    }
    public function forgot_password_check(){
        if(!isset($_POST['account'])){
            echo '<script>alert("尚未輸入帳號")</script>';
            return view('logins/forgot_password_index');
        }
        if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷驗證碼是否為空   
            if($_SESSION['check_word'] == $_POST['checkword']){
                 $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
            }else{
                echo '<script>alert("incorrect CAPTCHA")</script>'; //錯誤給予提示並返回
                return view('logins/index');
                // echo '<meta http-equiv="refresh" content="1; url=/LoginController/index">';
            }
       }
        $model = new Login();
        $logins = [                         //抓全部資料
            'logins' => $model->findAll()
        ];
        foreach($logins as $logins_item){
            foreach($logins_item as $login){
                    if($login['account']==$_POST['account']&&$login['usr_email']==$_POST['usr_email']){
                            $_SESSION['check_usr'] = 1;
                            $str_check = "1234567890";
                            $email_code = '';
                            for ($i = 0; $i < 5; $i++) {
                            $email_code .= $str_check[mt_rand(0, strlen($str_check)-1)];
                            }
                            $_SESSION['email_code'] = $email_code;
                            $_SESSION['name'] = $login['name'];
                            $_SESSION['id'] = $login['id'];
                            $message = $_SESSION['email_code'];
                            $email = \Config\Services::email();
                            $email->setFrom('liq71795@gmail.com', 'CI4認證碼');
                            $email->setTo($login['usr_email']);
                            $email->setSubject('你的認證碼是');
                            $email->setMessage($message);//your message here
                            $email->send();
                            return view('logins/email_check.php');
                    }
            }
        }
        if($_SESSION['check_usr'] == 0){
            echo '<script>alert("incorrect account or email")</script>';
            return view('logins/forgot_password_index');
        }
    }
    public function email_code_check()
    {
        if($_SESSION['check_usr'] == 0){
            return view('logins/forgot_password_index');
        }
        else if(!isset($_SESSION['email_code'])){
            return view('logins/forgot_password_index');
        }
        else if($_SESSION['email_code'] == $_POST['email_code']){
            $_SESSION['password_update'] = 1;
            return view('logins/reset_password');
        }
    }
    public function password_update(){
        if(!isset($_SESSION['password_update'])){
            echo '<script>alert("尚未驗證")</script>';
            return view('logins/forgot_password_index');
        }
        $model = new Login();
        $data = [
            'password' => $_POST['new_password']
        ];
        $model->update($_SESSION['id'], $data);
    }
    public function sign_out() 
    {
        $_SESSION['LOGIN'] = 0;
        $_SESSION['name'] = '';
        session_destroy();
        return view('front_page');
    }
    public function captcha_index() //這個func測試用
    {
        return view('logins/captcha_index');
    }
    public function captcha()
    {
        if(!isset($_SESSION)){ session_start(); } //檢查SESSION是否啟動
        $_SESSION['check_word'] = ''; //設置存放檢查碼的SESSION
        //設置定義為圖片
        header("Content-type: image/PNG");
        $nums=5; //生成驗證碼個數
        $width=$nums*25;  //圖片寬
        $high=20;  //圖片高  
        //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
        $code = '';
        for ($i = 0; $i < $nums; $i++) {
        $code .= $str[mt_rand(0, strlen($str)-1)];
        }
        //等待驗證用的驗證碼
        $_SESSION['check_word'] = $code;
        //建立圖示，設置寬度及高度
        $image = imagecreate($width, $high);
        //$image=imagecreatefrompng("images/bg.png"); //或是自行準備底圖
        //設置圖像的顏色
        $img_text = imagecolorallocate($image, 255, 255, mt_rand(0,255));  //文字顏色
        $background_color = imagecolorallocate($image, mt_rand(0,150), mt_rand(100,200), mt_rand(0,255));
        $border_color = imagecolorallocate($image, 21, 106, 235);
        //建立矩形底框(可省略)
        imagefilledrectangle($image, 0, 0, $width, $high, $background_color);
        imagerectangle($image, 0, 0, $width-1, $high-1, $border_color);
        //躁點
        for ($i = 0; $i < 80; $i++) {
            imagesetpixel($image, rand(0, $width), rand(0, $high), $img_text);
        }
        //imagestring (圖像資源,指定字型(1，2，3，4 ，5)，x坐標點,y坐標點,寫入的字串,文字顏色) 
        $strx = rand(2, 5);
        for ($i = 0; $i < $nums; $i++) {
            $strpos = rand(1, 6);
            imagestring($image, 5, $strx, $strpos, substr($code, $i, 1), $img_text);
            $strx += rand(10, 30);
        };
        imagepng($image);
        imagedestroy($image);  //少這行畫面會全黑
    }
    
    public function checkcode() //這個func測試用
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

