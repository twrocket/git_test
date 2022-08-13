<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<title>大學徵選委員會網頁</title>
</head>
<body>
    <h1 align="center">首頁<h1>
    <?php
    
    if ($_SESSION['LOGIN'] == 0){
        echo '<form action="/LoginController/index">';
        echo '<div align="center"><button type="submit">登錄1</button></div>';
        echo '</form>';
    }
    else{
        echo '<form action="/LoginController/sign_out">';
        echo '<div align="center"><button type="submit">登出</button></div>';
        echo '</form>';
    }
    ?>   
  <div align="center">
    <a href="#"><button type="button">大學繁星推薦</button></a><br>
    <a href="#"><button type="button">大學個人申請</button></a><br>
    <a href="#"><button type="button">高中繁星推薦</button></a><br>
    <a href="#"><button type="button">高中個人申請</button></a><br>   
  </div>       
</body>
</html>