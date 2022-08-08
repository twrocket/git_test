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
    public function captcha()
    {
        echo '<script language="javascript">';
        echo 'alert(message successfully sent)';  //not showing an alert box.
        echo '</script>';
        if(!isset($_SESSION)){ session_start(); } //檢查SESSION是否啟動
            $_SESSION['check_word'] = ''; //設置存放檢查碼的SESSION

        //設置定義為圖片
        header("Content-type: image/PNG");

        /*
        imgcode($nums,$width,$high)
        設置產生驗證碼圖示的參數
        $nums 生成驗證碼個數
        $width 圖片寬
        $high 圖片高
        */
        imgcode(5,120,30);

        //imgcode的function
        function imgcode($nums,$width,$high) {
        
            //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
            $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
            $code = '';
            for ($i = 0; $i < $nums; $i++) {
                $code .= $str[mt_rand(0, strlen($str)-1)];
            }

            $_SESSION['check_word'] = $code;

            //建立圖示，設置寬度及高度與顏色等等條件
            $image = imagecreate($width, $high);
            $black = imagecolorallocate($image, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
            $border_color = imagecolorallocate($image, 21, 106, 235);
            $background_color = imagecolorallocate($image, 235, 236, 237);

            //建立圖示背景
            imagefilledrectangle($image, 0, 0, $width, $high, $background_color);

            //建立圖示邊框
            imagerectangle($image, 0, 0, $width-1, $high-1, $border_color);

            //在圖示布上隨機產生大量躁點
            for ($i = 0; $i < 80; $i++) {
                imagesetpixel($image, rand(0, $width), rand(0, $high), $black);
            }
        
            $strx = rand(3, 8);
            for ($i = 0; $i < $nums; $i++) {
                $strpos = rand(1, 6);
                imagestring($image, 5, $strx, $strpos, substr($code, $i, 1), $black);
                $strx += rand(10, 30);
            }

            imagepng($image);
            imagedestroy($image);
        }
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
