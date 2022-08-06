<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
session_start();
class LoginController extends BaseController
{
    public function index()
    {
        if(!isset($_SESSION['LOGIN'])){
            $_SESSION['LOGIN'] = 0;
            }
        return view('logins/index');
    }
    public function check()
    {
        $message = "hello";
        $email = \Config\Services::email();
        $email->setFrom('liq71795@gmail.com', 'from CI4 test');
        $email->setTo('twbooster@yahoo.com');
        $email->setSubject('hi');
        $email->setMessage($message);//your message here
        
    
        $email->send();
        

        // $this->load->library('email');
        // $this->email->from('twbooster@yahoo.com', 'Your Name');
        // $this->email->to('ericier11222255@gmail.com');
        // $this->email->subject('Email Test');
        // $this->email->message('Testing the email class.');

        // $this->email->send();
        $model = new Login();
        
        $logins = [                         //抓全部資料
            'logins' => $model->findAll()
        ]; 
        foreach($logins as $logins_item){
            foreach($logins_item as $item){
                print_r($item['account']);
            }
        }

        // session_start();
        // if(isset($_SESSION['LOGIN'])){
        //     if(!empty($logins)) {
                
        //     }
        //     if($_POST['account'] == 'test'){
        //         $_SESSION['LOGIN'] = 1;
        //         return redirect('Home');
        //         }
        //     else{
        //         echo '<script>alert("incorrect username or password")</script>';
        //         return view('logins/index');
        //     }
        // }
        // else{
        // return redirect('Home');
        // }
        $data = [
            'account' => $this->request->getVar('account'), 
            'password' => $this->request->getVar('password')
        ];
    }
}
