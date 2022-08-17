<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
session_start();
class PostController extends BaseController
{
    public function index()
    {
        // if(!isset($_SESSION['LOGIN'])||$_SESSION['LOGIN'] == 0){
        //     return redirect("LoginController");
        // }
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('posts/index', $data);
    }
    public function upload()
    {      
        return view('posts/upload');
    }
    public function unupload()
    {      
        return view('posts/unupload');
    }
    public function disuploaded()
    {      
        return view('posts/disuploaded');
    }

    public function draft()
    {   
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('posts/draft', $data);
    }

    public function create()
    {
        return view('posts/create');
    }
    public function enter()
    {
        return view('posts/create');
    }
    

    public function store()
    {   # 檢查檔案是否上傳成功
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK){
        /*
          echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
          echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
          echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
          echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';
        */
          # 檢查檔案是否已經存在
          if (file_exists('File/' . $_FILES['file']['name'])){
            //echo '檔案已存在。<br/>';
          } 
          else {
            $file = $_FILES['file']['tmp_name'];
            $dest = 'File/' . $_FILES['file']['name'];
        
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
            'file' => $this->request->getVar('file'),
            'dateStart' => $this->request->getVar('dateStart'),
            'dateEnd' => $this->request->getVar('dateEnd'),
            'update' => $this->request->getVar('update'),
            'status' => $this->request->getVar('status'),
            'status_time'=>'上架中'
        ];
        
        
        $model->save($data);

        return redirect('PostController');
    }

    public function update()
    {
        $model = new Post();
        
        $data_id = [
            'id' => $this->request->getVar('id')
        ];
        
		
                 $data = [
                        'title' => $this->request->getVar('title'),
                        'website' => $this->request->getVar('website'),
                        'category' => $this->request->getVar('category'),
                        'content' => $this->request->getVar('content'),
                        'file' => $this->request->getVar('file'),
                        'dateStart' => $this->request->getVar('dateStart'),
                        'dateEnd' => $this->request->getVar('dateEnd'),
                        'update' => $this->request->getVar('update'),
                        'status' => $this->request->getVar('status'),
                        'status_time'=>'未處理'          
                        ];
			
       

        $model->update($data_id, $data);

        return redirect()->to('PostController');
    }

    public function show($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/show', $data);
    }

    public function edit($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/edit', $data);
    }
    
    
}
