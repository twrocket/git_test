<?php
use App\Models\Post;
function check()
{   $model = new Post();

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
?>