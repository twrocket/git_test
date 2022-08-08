<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>php圖形驗證碼</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
        <form name="form1" method="post" action="/LoginController/checkcode">
            <p>請輸入下圖字樣：</p><p><img id="imgcode" src="<?=base_url('/LoginController/captcha')?>" onclick="refresh_code()" /><br />
            點擊圖片可以更換驗證碼
            </p>
            <input type="text" name="checkword" size="10" maxlength="10" />
            <input type="submit" name="Submit" value="送出" />
        </form>
    </body>
</html>
<script>
        function refresh_code(){ 
            document.getElementById("imgcode").src="/captcha.php"; 
        } 
</script>
    

