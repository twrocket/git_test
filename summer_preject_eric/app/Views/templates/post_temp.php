<?= $this->extend('templates\temp') ?>

<?php
include('..\app\Views\controlsystems\check.php');
check();
?>

<?= $this->section('head_info') ?>
	<link href="/css/post.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    <!-- 上側導覽列 -->
    <div class="row">
        <div class="col-8 text-start">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">回首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/UnivStar/index">大學繁星</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">大學個申</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">高中繁星</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">高中個申</a>
                </li>
            </ul>
        </div>
        <div class="col-4 text-end">
            <?php
            if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] == 0) {
                echo '
                    <span>訪客</span>
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-light">管理者登入</button>
                    </a>
                ';    
            }
            else {
                echo '
                    <span>'.$_SESSION['name'].'</span>
                    <a href="/LoginController/sign_out">
                        <button type="button" class="btn btn-sm btn-light">登出</button>
                    </a>
                ';    
            }
            ?>
        </div>
    </div>

	<!-- 標題 -->
    <div class="row">
        <div class="col">
			<h1>公告管理頁面</h1>
        </div>
    </div> 
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>	
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link" href="/PostController/index">已發布公告</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/PostController/draft">草稿</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/PostController/create">發布公告</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">控制頁面</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/PostController/upload">上架中</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/PostController/unupload">未上架</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/PostController/disuploaded">已下架</a>
		</li>
		
		
	</ul>
<?= $this->endSection() ?>

<!-- content 未定 -->

<?= $this->section('footer') ?>
    2022 大學徵選委員會網頁
<?= $this->endSection() ?>

<!-- body_script 未定 -->