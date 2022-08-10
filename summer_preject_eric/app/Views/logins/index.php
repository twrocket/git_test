<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/login.css">
    </head>
    <body>
        <div style="text-align: center"> 
                <h1>登入頁面</h1>
            <form action="/LoginController/check" enctype="mutipart/form-data" method="POST"> 
                <h2>帳號: </h2>
                <input name="account" type="text">
                <br>
                <h2>密碼: </h2>
                <input name="password" type="text">
                <br>
                <p>請輸入下圖字樣：</p>
                <p><img id="imgcode" src="<?= base_url('LoginController/captcha')?>" onclick="refresh_code();"><br />
                點擊圖片可以更換驗證碼
                <input type="text" name="checkword" size="10" maxlength="10" /><br></p>
                <button type="submit" name="SubmitButton"  class="button_color">login</button>
            </form>
        <div>
    </body>
</html>
<script type ="text/javascript">
        function refresh_code(){ 
            var img = document.getElementById("imgcode").src="<?= base_url('LoginController/captcha_test')?>";
            img.src = "imgcode?rnd" + Math.random();
        } 
</script>