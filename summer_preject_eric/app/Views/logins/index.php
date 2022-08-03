<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div style="text-align: center"> 
                <h1>建立貼文</h1>
                <?php
                    session_start();
                    $vb = 0;
                    $_SESSION['num'] = $vb; ?>
            <form action="/LoginController/store" enctype="mutipart/form-data" method="POST"> 
                <h2>帳號: </h2>
                <input name="account" type="text">
                <br>
                <h2>密碼: </h2>
                <input name="password" type="text">
                <br>
                <button type="submit">Add New Post</button>
            </form>
        <div>
    </body>
</html>