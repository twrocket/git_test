<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>重設密碼</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/login.css">
    </head>
    <body>
        <div style="text-align: center"> 
            <h1>重設密碼</h1>
            <form action="/LoginController/password_update" enctype="mutipart/form-data" method="POST"> 
            <input  type="password" id="pwd1" name="new_password" required="true" missingMessage="必填"  placeholder="輸入密碼">
            <br>
            <input  type="password" id="pwd2" name="new_pwcheck" required="true" missingMessage="必填"  placeholder="再次輸入密碼" onkeyup="validate()">
            <br>
            <span id="tishi"></span>
            <br>
            <button type="submit" id="submit" name="SubmitButton"  class="button_color">確認</button>
                <script>
                    function validate() {
                        var pwd1 = document.getElementById("pwd1").value;
                        var pwd2 = document.getElementById("pwd2").value;
                        if(pwd1 == pwd2) {
                        document.getElementById("tishi").innerHTML="<font color='green'>密碼相同</font>";
                        document.getElementById("submit").disabled = false;
                        }
                        else {
                        document.getElementById("tishi").innerHTML="<font color='red'>密碼不相同</font>";
                            document.getElementById("submit").disabled = true;
                        }
                    }
                </script>
            </form>
        <div>
    </body>
</html>