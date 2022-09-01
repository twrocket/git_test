<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\control;
use App\Controllers\BaseController;

class ControlController extends BaseController{   
    public function store()
    {          
        $model = new control();
        
        $data = [            
            'category' => $this->request->getVar('website'),
            'location' => $this->request->getVar('category'),
            'time' => $this->request->getVar('start_time'),
            'time_end' => $this->request->getVar('end_time'),      
           
        ];
        $category = $this->request->getVar('category');
        
        $user = $model->where('location',$category)->findAll();
        
        if($user!=NULL)
        {   
            $location = $this->request->getVar('website');
            $i=0;
            $correct = 0;
            foreach($user as $part)
            {   
                
                if($user[$i]['category']==$location)
                {
                    $correct = $i;
                    
                }
                else
                {
                    $i++;
                }

                
            }
            // print_r($user);
            // echo $user[$correct]['category'];
            // echo $location;
            if($user[$correct]['category']==$location)
            {       
                $data_id = $user[$correct]['id'];                
                $model->update($data_id, $data);

                echo '
                    <script>		
                        alert("資料已儲存!");                       
                    </script>';
                  return view('posts/control.php');
            }
            else
            {
                $model->save($data);        
                echo '
                    <script>		
                        alert("資料已儲存!");
                        
                    </script>';
                    return view('posts/control.php');
            }
            
        }
        else//如果沒有就創立
        {
            $model->save($data);        
                echo '
                    <script>		
                        alert("資料已儲存!");
                        
                    </script>';
                  return view('posts/control.php');
        }
   
    }
    public function control_consequence($location)
    {           
        $model = new control();
        $controls = ['category'=>$model->where('category',$location)->findall()];
        if($controls==null)
        {
            return 1;
        }
        else
        {
        
        
        $time_start = $controls['category'][0]['time'];
        $time_end =  $controls['category'][0]['time_end'];
        $today = date("Y-m-d");
        if($today>$time_end||$today<$time_start)
        {
            return 0;//代表不能進入
        }        
        else
        {
            return 1;
        }
        }
       
    }


    public function search_univStar()
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
    public function search_univApply()
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
        return view('univApply/query');       
        }
        else
        {   
            $data_store = find_string($keyword); 
                   
            $data = ['datas'=>$data_store];            
            return view('univApply/search.php',$data);
        }
        
        
    }
    public function search_highApply()
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
        return view('highApply/query');       
        }
        else
        {   
            $data_store = find_string($keyword); 
                   
            $data = ['datas'=>$data_store];            
            return view('highApply/search.php',$data);
        }
        
        
    }
    public function search_highStar()
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
        return view('highStar/query');       
        }
        else
        {   
            $data_store = find_string($keyword); 
                   
            $data = ['datas'=>$data_store];            
            return view('highStar/search.php',$data);
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
