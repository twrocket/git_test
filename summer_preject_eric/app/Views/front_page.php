<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 align="center">首頁<h1>
    <?php
    
    if ($_SESSION['LOGIN'] == 0){
        echo '<div align="center"><a href="/LoginController/index"><button type="button">登錄</button></a></div>';
    }
    else{
        $_SESSION['LOGIN'] = 0;
        echo '<div align="center"><a href="/Home/index"><button type="button">登出</button></a></div>';
    }
    ?>   
</body>
</html>