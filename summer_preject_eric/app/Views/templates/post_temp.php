<!-- 
    公告管理頁面模板
    引用temp的模板，並完成header、sidebar、footer三個部分
    content維持空白，待後續使用此模板者自行設計
-->

<?= $this->extend('templates\temp') ?>

<?php
include('..\app\Views\controlsystems\check.php');
check();

?>

<?= $this->section('head_info') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <link href="/css/post.css" rel="stylesheet">   
<?= $this->endSection() ?>

<?= $this->section('header') ?>
<!-- 上側導覽列 -->
    <nav id="navbar_top" class="py-2">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="/home" class="nav-link px-2">回首頁</a></li>
                <li class="nav-item"><a href="/UnivStar/index" class="nav-link px-2">大學繁星</a></li>
                <li class="nav-item"><a href="/UnivApply/index" class="nav-link px-2">大學個申</a></li>
                <li class="nav-item"><a href="/HighStar/index" class="nav-link px-2">高中繁星</a></li>
                <li class="nav-item"><a href="/HighApply/index" class="nav-link px-2">高中個申</a></li>
            </ul>
            <ul class="nav">
                <?php
                if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
                    echo '
                        <li class="nav-item"><span class="nav-link px-2">訪客</span></li>
                        <li class="nav-item"><a href="/LoginController/index" class="nav-link px-2">管理者登入</a></li>
                    ';    
                }
                else {
                    echo '
                        <li class="nav-item"><span class="nav-link px-2">'.$_SESSION['name'].'</span></li>
                        <li class="nav-item"><a href="/LoginController/sign_out" class="nav-link px-2">登出</a></li>
                        <li class="nav-item"><a href="/LoginController/change_password_index" class="nav-link px-2">重設密碼</a></li>
                        ';    
                }
                ?>
            </ul>
        </div>
    </nav>

<!-- 標題 -->
    <div id="title" class="pb-3 mb-0">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex align-items-center py-2 mb-0 mb-lg-0 text-decoration-none">
                <span class="fs-2">公告管理頁面</span>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>	
    <nav class="navbar navbar-expand-md">
        <div class="container flex-md-column">
            <h3 class="navbar-brand">Main menu</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="sidebarToggler">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/index">已發布公告</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/draft">草稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/create">發布公告</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/upload">上架中</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/unupload">未上架</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/disuploaded">已下架</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/control">管理時間</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/PostController/time_state">時間狀態</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?= $this->endSection() ?>

<!-- content 未定 -->

<?= $this->section('footer') ?>
    <div class="py-2 mb-0">
        <div class="container d-flex flex-wrap justify-content-center">
            <span class="fs-6">2022 大學甄選入學委員會</span>
        </div>
    </div>
<?= $this->endSection() ?>

<!-- body_script 未定 -->