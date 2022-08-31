<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
session_start();

class PostController extends BaseController
{
    public function index()
    {   
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }
        
        $model = new Post();

        $data = [
            'posts' => $model->where('status', "發布")->findAll()
        ];

        return view('posts/index', $data);
    }

    public function draft()
    {   
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        $model = new Post();

        $data = [
            'posts' => $model->where('status', "草稿")->findAll()
        ];

        return view('posts/draft', $data);
    }

    public function create()
    {   
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        return view('posts/create');
    }

    public function enter()
    {
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        return view('posts/create');
    }
    
    public function store()
    {   
        $title = $this->request->getVar('title');        
        $title = trim($title);
        $title = preg_replace('/\s(?=)/', '', $title);
        $title = date('m-d-Y_h-i-s');
        $title = preg_replace('/\s(?=)/', '', $title);
        # 檢查檔案是否上傳成功        
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK){
        /*
          echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
          echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
          echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
          echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';
        */
        # 檢查檔案是否已經存在
        if (!(is_dir('File/'.$title)))//資料夾名稱不存在
        {    $path = '../public/File/'.$title;
             mkdir($path, 0777, false);//建立資料夾
        } 
        if (file_exists('File/'.$title.'/'.$_FILES['file']['name'])){
            //echo '檔案已存在。<br/>';
        } 
        else {
            $file = $_FILES['file']['tmp_name'];
            $dest = 'File/'.$title.'/'.$_FILES['file']['name'];
        
            # 將檔案移至指定位置
            move_uploaded_file($file, $dest);
        }
        }
        else {
            //echo '錯誤代碼：' . $_FILES['files']['error'] . '<br/>';
        }
        
        $model = new Post();

        $data = [
            'title' => $this->request->getVar('title'),
            'website' => $this->request->getVar('website'),
            'category' => $this->request->getVar('category'),
            'content' => $this->request->getVar('content'),
            'file' =>$_FILES['file']['name'],
            'dateStart' => $this->request->getVar('dateStart'),
            'dateEnd' => $this->request->getVar('dateEnd'),
            'update' => $this->request->getVar('update'),
            'status' => $this->request->getVar('status'),
            'status_time'=>'未處理',
            'file_name' => $title
        ];
        
        $model->save($data);

        echo '
            <script>		
                alert("資料已儲存!");
                window.location.href="/PostController/index";
            </script>';

        // return redirect('PostController');
    }

    public function update()
    {
        $model = new Post();
        $title = $this->request->getVar('id');
        $title = trim($title);
        $title = preg_replace('/\s(?=)/', '', $title);
        # 檢查檔案是否上傳成功        
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK){
        /*
          echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
          echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
          echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
          echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';
        */
        # 檢查檔案是否已經存在
        if (!(is_dir('File/'.$title)))//資料夾名稱不存在
        {    $path = '../public/File/'.$title;
             mkdir($path, 0777, false);//建立資料夾
        } 
        if (file_exists('File/'.$title.'/'.$_FILES['file']['name'])){
            //echo '檔案已存在。<br/>';
            unlink('File/'.$title.'/'.$_FILES['file']['name']);//刪除檔案             
        } 
        else {
            $file = $_FILES['file']['tmp_name'];
            $dest = 'File/'.$title.'/'.$_FILES['file']['name'];
        
            # 將檔案移至指定位置
            move_uploaded_file($file, $dest);
        }
        }
        else {
            //echo '錯誤代碼：' . $_FILES['files']['error'] . '<br/>';
        }
        $data_id = [
            'id' => $this->request->getVar('id')
        ];
        
		$data = [
            'title' => $this->request->getVar('title'),
            'website' => $this->request->getVar('website'),
            'category' => $this->request->getVar('category'),
            'content' => $this->request->getVar('content'),
            'file' =>$_FILES['file']['name'],
            'dateStart' => $this->request->getVar('dateStart'),
            'dateEnd' => $this->request->getVar('dateEnd'),
            'update' => $this->request->getVar('update'),
            'status' => $this->request->getVar('status'),
            'status_time'=>'未處理',                  
        ];

        $model->update($data_id, $data);

        echo '
            <script>		
                alert("資料已更新!");
                window.location.href="/PostController/index";
            </script>';

        // return redirect()->to('PostController');
    }

    public function show($post_id)
    {
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/show', $data);
    }

    public function edit($post_id)
    {
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }
        
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/edit', $data);
    }
    
    public function upload()
    {      
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        $model = new Post();

        $data = [
            'posts' => $model->where('status_time', "上架中")->findAll()
        ];

        return view('posts/upload', $data);
    }

    public function unupload()
    {      
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        $model = new Post();

        $data = [
            'posts' => $model->where('status_time', "未上架")->findAll()
        ];

        return view('posts/unupload', $data);
    }

    public function disuploaded()
    {      
        // 未登入者，將跳轉至登入頁面
        if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
            echo '
                <script>		
                    alert("抱歉! 您尚未登入\n請先進行登入動作!");
                    alert("將為您跳轉到登入頁面!");
                    window.location.href="/LoginController/index";
                </script>';
        }

        $model = new Post();

        $data = [
            'posts' => $model->where('status_time', "已下架")->findAll()
        ];

        return view('posts/disuploaded', $data);
    }
}
