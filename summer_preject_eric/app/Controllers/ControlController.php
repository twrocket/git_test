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
    public function find_string()
    {
        $model = new Post();
        $posts = $model->findAll();         
        $array = [];
          
  
    if(!empty($posts)) {            
        foreach($posts as $posts_item) {
            $original_string_title = $posts_item['title'];
            $original_string_content = $posts_item['content'];
                        
            $value_title = strpos($original_string_title,$goal_string);//第一個參數用來放我們要找的字串 第二個則是目標字串 第三個為偏移 可不寫==>可從終點開始找
            $value_content = strpos($original_string_content,$goal_string);
            
            if( $value_content!==false || $value_title!==false) 
            {
                array_push($array,$posts_item['id']);
               // echo $posts_item['title'].'<br>'.$posts_item['content'];
            }
            else
            {
               // echo "no such content or title <br>";
            }
            
        }
    }
}}
?>
