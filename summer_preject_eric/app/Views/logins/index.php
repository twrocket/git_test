<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>登入頁面</title>
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
						<h1 style=" text-align: center; -webkit-text-stroke: 0.5px black; color: white;">登入頁面</h1>
						<form action="/LoginController/check" enctype="mutipart/form-data" method="POST">
							<div class="row mb-3">
								<div><label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 1.5rem;">帳號</label></div>
								<div class="col-sm-13 ">
								<input name="account" type="text" required="true" class="form-control" placeholder="請輸入帳號">
								</div>
							</div>
							<div class="row mb-3">
								<div><label for="inputPassword3" class="col-sm-2 col-form-label" style="font-size: 1.5rem;">密碼</label></div>
								<div class="col-sm-13 ">
								<input name="password" type="password" required="true" class="form-control" placeholder="請輸入密碼">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputPassword3" class="col-sm-2 col-form-label" style="font-size: 1.5rem;">驗證碼</label>
								<img id="imgcode" src="<?= base_url('LoginController/captcha')?>" onclick="refresh_code();" style="width: 20vh; height:5vh; border-style: solid; border-color: hsla(100, 100%, 100%, 0); " >
								<div class="col-sm-13 ">
									<input type="text" name="checkword" required="true" class="form-control" placeholder="驗證碼區分大小寫">
								</div>	
							</div>
							<div class="container" >
								<div class="row align-items-start">
									<div class="col" style="display: flex; justify-content: center; align-items: center; ">
									<button type="submit" class="btn btn-success">登入</button>
									</div>
									<!-- <div class="col">
									</div> -->
									<div class="col" style="display: flex; justify-content: center; align-items: center; ">
									<button type="button" class="btn btn-outline-success"><a href="http://localhost:8080/LoginController/forgot_password_index" class="elements" style="text-decoration:none; color:black;">忘記密碼</a></button>
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
<form action="/LoginController/update_password_index"><button type="submit">重設</button></form>
<script type ="text/javascript">
        function refresh_code(){ 
            var img = document.getElementById("imgcode").src="<?= base_url('LoginController/captcha')?>";
            img.src = "imgcode?rnd" + Math.random();
        } 
</script>