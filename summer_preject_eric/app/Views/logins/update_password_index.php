<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>密碼重設</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="icon" href="/img/title_cac.ico" type="image/x-icon">
    </head>
	<body style="background:linear-gradient(45deg, #3f6fc8, #3ed9bf); width:100vw; height:100vh;">
	<div>
			<div class="container">
				<div class="row justify-content-start">
					<div class="col-4" style="height: 20vh;">
					</div>
					<div class="col-4" style="height: 20vh;">
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-3">
					</div>
					<div class="col-6" >
						<h1 style=" text-align: center; -webkit-text-stroke: 0.5px black; color: white;">密碼重設</h1>
						<form action="/LoginController/check_old_password_and_update" enctype="mutipart/form-data" method="POST">
                            <div class="row mb-3">
								<div><label  class="col-sm-12 col-form-label" style="font-size: 1.5rem; text-align: center;">輸入舊密碼</label></div>
								<div class="col-sm-13 ">
								    <input name="old_password" id="pwd0" type="password"  required="true" missingMessage="此欄位必填" class="form-control" placeholder="在此欄位輸入舊密碼">
								</div>
							</div>
                            <div class="row mb-3">
								<div><label class="col-sm-12 col-form-label" style="font-size: 1.5rem; text-align: center;">輸入新密碼</label></div>
								<div class="col-sm-13 ">
								    <input name="new_password" id="pwd1" type="password"  required="true" missingMessage="此欄位必填" class="form-control" placeholder="在此欄位輸入新密碼">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-13 ">
								    <input name="new_pwcheck" id="pwd2" type="password" required="true" missingMessage="此欄位必填" class="form-control" placeholder="再輸入一次新密碼" onkeyup="validate()">
								</div>
							</div>
							<div class="row mb-3">
                                <div><label id="tishi" class="col-sm-12 col-form-label" style="font-size: 1.5rem; text-align: center;"></label></div>
							</div>
							<div class="container" >
								<div class="row align-items-start">
									<div class="col" >
									</div>
									<div class="col" style="display: flex; justify-content: center; align-items: center; ">
                                        <button type="submit" class="btn btn-success">確認</button>
									</div>
									<div class="col" style="display: flex; justify-content: center; align-items: center; ">
									</div>
								</div>
						</form>
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
    		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		</div>  
	</body>
</html>
<script>
    function validate() {
        var pwd1 = document.getElementById("pwd1").value;
        var pwd2 = document.getElementById("pwd2").value;
        if(pwd1 == pwd2) {
        document.getElementById("tishi").innerHTML="<font color='green'>新密碼相同</font>";
        document.getElementById("submit").disabled = false;
        }
        else {
        document.getElementById("tishi").innerHTML="<font color='red'>新密碼不相同</font>";
            document.getElementById("submit").disabled = true;
        }
    }
</script>