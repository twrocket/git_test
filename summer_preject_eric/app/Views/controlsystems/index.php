
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script type="text/javascript" src="/Javascript/alert.js">
   </script>
</head>
<body>

<input type="button" value="test, click me" onclick = "ShowAlert('2016-11-25T12:30:00','notice')">
<input type="button" value="test, click me" onclick = "/ControlController/alert">
<a href ="/ControlController/alert"> 連結</a>

</body>
</html>
<?php
    echo "現在時間是：" . date("Y年m月d日 H:i:s");//運用php Date之函式直接抓取時間函數  date(format,timestamp) 前者選擇使用模式 後者則是參考時間 但默認為 time() 本地時間 可參考 https://cloud.tencent.com/developer/article/1537822
    echo "<br>";    
    $date_variable = date("w");//做出比較 可以轉換成中文星期幾
    
    if($date_variable==0){
       echo"今天是星期天";
    }
    else if($date_variable==1){
       echo"今天是星期一";
    }
    else if($date_variable==2){
       echo"今天是星期二";
    }
    else if($date_variable==3){
       echo"今天是星期三";
    }
    else if($date_variable==4){
       echo"今天是星期四";
    }
    else if($date_variable==5){
       echo"今天是星期五";
    }
    else if($date_variable==6){
       echo"今天是星期六";
    }
    //如果後面沒有非php之程式 手冊上建議不要關起來
    
 ?>


 