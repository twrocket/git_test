<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大學招生委員會網頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/login/my_header.css">
</head>
<body >
    <div class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md">
            <a class="navbar-brand" href="#" style="margin-left: 1%;">大學招生委員會</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">首頁<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">聯絡我們</a>
                    </li>
                    <li class="nav-item dropdown " >
                    <a class="nav-link dropdown-toggle navbar-brand active"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h5 style="display: inline;">申請方式</h5>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">高中申請</a>
                        <a class="dropdown-item" href="#">高中繁星</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">大學申請</a>
                        <a class="dropdown-item" href="#">大學繁星</a>
                    </div>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                <?php
                if ($_SESSION['LOGIN'] == 0){
                    echo '<a class="btn btn-light action-button Login" role="button" href="#">登入</a>';
                }
                else{
                    echo '<a class="btn btn-light action-button Login" role="button" href="#">登出</a>';
                }
                ?> 
            </div>
        </nav>
        <div class="container">
            <div class="row align-items-center" style="margin-top:15vh; text-align:center; padding:-100vh;">
                <div class="col-md-6">
                    <h1 style="font-size:5em;">111</h1>
                    <p class="p-111">邁向大學之路 開創成功未來</p><a href="https://rdrc.mnd.gov.tw/"><button class="btn btn-light btn-lg action-button" type="button">了解更多</button></a>
                </div>
                <div class="col-md-6">
                    <div class="device pic">
                        <!-- https://www.webdesigns.com.tw/css-zoom_in.asp -->
                        <img src="laptop2.png">                   
                    </div>
                </div>
                <!-- https://medium.com/@kansetsu7/%E5%88%A9%E7%94%A8clearfix%E8%A7%A3%E6%B1%BAbootstrap-grid-system%E8%B7%91%E7%89%88%E5%95%8F%E9%A1%8C-%E4%BB%A5%E5%8F%8A%E5%85%B6%E8%83%8C%E5%BE%8C%E5%8E%9F%E7%90%86-58f6f461e4ca -->
                <div class="clearfix hidden-xs"></div>
            </div>
            <div class="row align-items-center" style="margin: 5vh;">
                <div class="col-sm-6" >
                    <div class="card action-card">
                        <div class="card-body" style="fill-opacity: 5vh;">
                        <h5 class="card-title">繁星資格</h5>
                        <p class="card-text">繁星推薦資格</p>
                        <a href="https://www.jbcrc.edu.tw/star.html" class="btn btn-primary action-button" style="color: blue;">前往</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="card action-card" >
                        <div class="card-body" style="fill-opacity: 5vh;">
                        <h5 class="card-title">申請流程</h5>
                        <p class="card-text">申請流程</p>
                        <a href="https://www.jbcrc.edu.tw/apply.html" class="btn btn-primary action-button" style="color: blue;">前往</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</html>