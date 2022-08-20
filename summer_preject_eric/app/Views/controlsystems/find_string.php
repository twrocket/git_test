<?php
use App\Models\Post;
function find_string($goal_string)
{   $model = new Post();

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
    return $array;
}
//$test = find_string("test");
//print_r($test);
?>