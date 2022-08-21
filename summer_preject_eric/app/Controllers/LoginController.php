<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
session_start();
class LoginController extends BaseController
{
    public function index() // %{登入首頁，在這個頁面輸入帳號密碼}
    {
        if(!isset($_SESSION['LOGIN'])){ //這個session來管理使用者登入狀態
            $_SESSION['LOGIN'] = 0;
        }
        return view('logins/index');
    }
    public function check() // %{比對帳密資料}
    {
        if(!isset($_SESSION['LOGIN'])){ //沒有定義，代表沒有進入過登入首頁，返回帳號密碼首頁
            return redirect("LoginController");
        }
        if((empty($_SESSION['check_word'])) || (empty($_POST['checkword']))){  //判斷圖片驗證碼是否為空   
            echo '<p style="text-align:center"><a href="./index">空的圖片驗證碼,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/index">';
            return;
        }
        if($_SESSION['check_word'] != $_POST['checkword']){ //判斷圖片驗證碼是否相符
            echo '<p style="text-align:center"><a href="./index">不正確的圖片驗證碼,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/index">';
            return;
        }
        $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
        $model = new Login();                        //抓全部資料
        $logins = $model->findAll();
        foreach($logins as $logins_item){
            if($logins_item['account']==$_POST['account']&&$logins_item['password']==$_POST['password']){//逐一判斷資料是否正確
                    $_SESSION['LOGIN'] = 1; //成功登入，$_SESSION['LOGIN']設定1
                    $_SESSION['name'] = $logins_item['name']; //使用者名字
                    echo '<p style="text-align:center"><a href="../PostController/index">'.$_SESSION['name'].'你好</a></p>';
                    echo '<meta http-equiv="refresh" content="1; url=/PostController/index">';
                    return;
            
            }
        }
        if($_SESSION['LOGIN'] == 0){
            echo '<p style="text-align:center"><a href="./index">不正確的帳號或密碼,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/index">';
            return;
        }
    }
    public function forgot_password_index() // %{忘記密碼頁面}
    {
        $_SESSION['check_usr'] = 0;
        return view('logins/forgot_password_index');
    }
    public function forgot_password_check() // %{比對帳戶 mail資料}
    {
        if(!isset($_SESSION['check_usr'])){ //如果沒有定義，返回忘記密碼頁面
            return redirect("LoginController/forgot_password_index");
        }
        if((empty($_SESSION['check_word'])) || (empty($_POST['checkword']))){  //判斷圖片驗證碼是否為空   
            echo '<p style="text-align:center"><a href="./forgot_password_index">空的圖片驗證碼,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
        if($_SESSION['check_word'] != $_POST['checkword']){ //判斷圖片驗證碼是否相符
            echo '<p style="text-align:center"><a href="./forgot_password_index">不正確的圖片驗證碼,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
        $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
        $model = new Login();
        $logins = $model->findAll();
        foreach($logins as $logins_item){
            if($logins_item['account']==$_POST['account']&&$logins_item['usr_email']==$_POST['usr_email']){
                    $_SESSION['check_usr'] = 1;
                    $str_check = "1234567890";
                    $email_code = '';
                    for ($i = 0; $i < 5; $i++) {
                    $email_code .= $str_check[mt_rand(0, strlen($str_check)-1)];
                    }
                    $_SESSION['email_code'] = $email_code;
                    $_SESSION['name'] = $logins_item['name'];
                    $_SESSION['id'] = $logins_item['id'];
                    $message = '您的驗證碼是'.'<p style="color:red;">'.$_SESSION['email_code'].'</p>'.'感謝您的耐心，輸入正確驗證碼後即可重設密碼';
                    $email = \Config\Services::email();
                    $email->setFrom('liq71795@gmail.com', '徵選會後台系統電子郵件認證碼');
                    $email->setTo($logins_item['usr_email']);
                    $email->setSubject('驗證您的電子郵件地址');
                    $email->setMessage($message);//your message here
                    $email->send();
                    return view('logins/email_check.php'); 
            }
        }
        if($_SESSION['check_usr'] == 0){
            echo '<p style="text-align:center"><a href="./forgot_password_index">不正確的帳號或mail,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
    }
    public function email_code_check()
    {
        //如果沒有定義，返回忘記密碼頁面
        if(!isset($_SESSION['check_usr'])||($_SESSION['check_usr'] == 0)||!isset($_SESSION['email_code'])){
            echo '<p style="text-align:center"><a href="./forgot_password_index">尚未驗證身分,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
        if($_SESSION['email_code'] != $_POST['email_code']){ //如果不正確，返回忘記密碼首頁
            echo '<p style="text-align:center"><a href="./forgot_password_index">電子郵件驗證碼錯誤</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
        $_SESSION['password_update'] = 1;
        $_SESSION['email_code'] = ''; //清除mail驗證碼
        $_SESSION['check_usr'] == 0; //將忘記密碼的身分認證歸零，不能再進入此函式
        return view('logins/reset_password');
    }
    public function password_update(){
        if(!isset($_SESSION['password_update'])||$_SESSION['password_update'] == 0){
            echo '<p style="text-align:center"><a href="./forgot_password_index">尚未驗證身分,兩秒後返回,按此也可返回</a></p>';
            echo '<meta http-equiv="refresh" content="2; url=/LoginController/forgot_password_index">';
            return;
        }
        $model = new Login();
        $data = [
            'password' => $_POST['new_password']
        ];
        $model->update($_SESSION['id'], $data);
        $_SESSION['password_update'] = 0;
        session_destroy();
        return redirect("LoginController");
    }
    public function sign_out() 
    {
        $_SESSION['LOGIN'] = 0; //登出設0
        $_SESSION['name'] = ''; //清除使用者名稱
        session_destroy();
        echo '<script>alert("已重設密碼，請重新登入")</script>';
        return redirect("LoginController");
    }
    public function captcha()
    {
        $_SESSION['check_word'] = ''; //設置存放檢查碼的SESSION
        //設置定義為圖片
        header("Content-type: image/PNG");
        $nums = 5; //生成驗證碼個數
        $width = $nums*25;  //圖片寬
        $high = 20;  //圖片高  
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
        for ($i = 0; $i < 30; $i++) {
            imagesetpixel($image, rand(0, $width), rand(0, $high), $img_text);
        }
        //imagestring (圖像資源,指定字型(1，2，3，4 ，5)，x坐標點,y坐標點,寫入的字串,文字顏色) 
        $strx = rand(2, 4);
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

