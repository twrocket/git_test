<?= $this->extend('templates\temp') ?>

<?= $this->section('web_title') ?>
    大學徵選委員會網頁-公告管理頁面
<?= $this->endSection() ?>

<!-- header -->
<?= $this->section('left_navbar') ?>
	<a href="/home">回首頁</a>
	<a href="#">大學繁星</a>
	<a href="#">大學個申</a>
	<a href="#">高中繁星</a>
	<a href="#">高中個申</a>
<?= $this->endSection() ?>

<?= $this->section('right_navbar') ?>
	<!-- if user not login -->
	<!-- <span>未登入</span>
	<a href="#">管理者登入</a> -->
	<!-- if user login -->
	<?php session_start(); ?>
	<span><?php //echo ''.$_SESSION['name'].'' ?> 
	<a href="http://localhost:8080/LoginController/sign_out" class="elements">
		<span>登出</span>
   		</a>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    <h1>公告管理頁面</h1>
<?= $this->endSection() ?>

<!-- main -->
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
	</ul>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->renderSection('post_content') ?>
<?= $this->endSection() ?>

<!-- footer -->
<?= $this->section('footer') ?>
    @2022 大學徵選委員會網頁
<?= $this->endSection() ?>