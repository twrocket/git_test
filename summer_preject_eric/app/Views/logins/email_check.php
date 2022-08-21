<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>身分認證</title>
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
						<h1 style=" text-align: center; -webkit-text-stroke: 0.5px black; color: white;">忘記密碼</h1>
						<form action="/LoginController/email_code_check" enctype="mutipart/form-data" method="POST">
							<div class="row ">
								<div><label class="col-sm-12 col-form-label" style="font-size: 1.5rem; text-align: center;">五個字元的身分認證碼已寄到您的信箱</label></div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-13 ">
								<input name="email_code" type="text" required="true" class="form-control" placeholder="請在此輸入信箱中的mail認證碼">
								</div>
							</div>
							<div class="row mb-3">
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
