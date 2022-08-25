<?php

namespace App\Controllers;
use App\Models\Post;
use App\Controllers\BaseController;

class ControlController extends BaseController
{
    public function search()
    {   
         
        include('..\app\Views\controlsystems\find_string.php');
        include('..\app\Views\controlsystems\check.php');
        check();
        //獲取搜索關鍵字
        
        $keyword=$this->request->getVar('search');
        //檢查是否為空
        if($keyword==''){
        echo'
        <script>
        alert("您要搜索的關鍵字不能為空")
        </script>
        '; 
        return view('univStar/query');       
        }
        else
        {   
            $data_store = find_string($keyword); 
                   
            $data = ['datas'=>$data_store];            
            return view('univStar/search.php',$data);
        }
        
        
    }
    public function alert()
    {
        return view('controlsystems/find_string');
    }
    public function upload()
    {
        return view('controlsystems/upload.php');
    }
    public function return_index()
    {
        return view('posts/index');
    }
    public function check()
    {
        $model = new Post();

        $posts = $model->findAll();         
            
    
        if(!empty($posts)) {            
            foreach($posts as $posts_item) {               
                    $data_id = [
                    'id'=> $posts_item['id']
                    ];
                    $var_start = $posts_item['dateStart'];
                    $var_end = $posts_item['dateEnd'];
                    $today = date('Y-m-d');
                    if($today<$var_start)
                    {    
                        $data = [
                            'status_time'    => '未上架',
                        ];           
                        
                        $model->update($data_id, $data);
                    }
                    else if($today>=$var_start&& $today<=$var_end)
                    {   $data = [
                        'status_time'    => '上架中',
                        ];           
                    
                        $model->update($data_id, $data);
                    }
                    else if($today>$var_end)
                    {   $data = [
                        'status_time'    => '已下架',
                        ];           
                    
                        $model->update($data_id, $data);                 
                    }
            }
        }
    }
    
}
?>
