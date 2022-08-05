<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Login;
session_start();

class LoginController extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
       //
=======
        if(!isset($_SESSION['LOGIN'])){
            $_SESSION['LOGIN'] = 0;
            }
        return view('logins/index');
>>>>>>> afecba8fd76027dd8e80b95f531195172349855b
    }
    public function check()
    {
        $model = new Login();
        $logins = [                         //抓全部資料
            'logins' => $model->findAll()
        ]; 
        foreach($logins as $logins_item){
            foreach($logins_item as $login){
                print_r($login['id']);
            }
        }
        
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
