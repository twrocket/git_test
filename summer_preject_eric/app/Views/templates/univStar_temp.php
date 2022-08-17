<?= $this->extend('templates\temp') ?>

<?= $this->section('head_info') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link href="/css/star.css" rel="stylesheet">
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
            session_start();
            if($_SESSION['LOGIN'] == 0) {
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
                    <a href="#">
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
            <h1>2022 大學繁星推薦</h1>
        </div>
    </div>

    <!-- 下側導覽列 -->
    <div class="row">
        <div class="col">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">校系分則查詢</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">網路購買簡章</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">聽障生免英聽檢定</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">錄取(篩選)結果查詢</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">網路聲明放棄</a>
                </li>
            </ul>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('sidebar') ?>	
	<ul class="nav flex-column">
		<li class="nav-item" id="anno_dropdown">
            <a class="nav-link" href="/UnivStar/index">
                v 訊息公告
            </a>
            <div style="display: none">
                <a class="list-group-item" href="/UnivStar/announce_1">簡章訊息事項</a>
                <a class="list-group-item" href="/UnivStar/announce_2">招生事務</a>
                <a class="list-group-item" href="/UnivStar/announce_3">徵選資訊</a>
                <a class="list-group-item" href="/UnivStar/announce_4">會議簡報</a>
                <a class="list-group-item" href="/UnivStar/announce_5">其他事項</a>
            </div>    
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">法令規章</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">重要時程</a>
		</li>
		<li class="nav-item" id="purchase_dropdown">
			<a class="nav-link" href="#">
                v 簡章發售
            </a>
            <div style="display: none">
                <a class="list-group-item" href="#">發售辦法</a>
                <a class="list-group-item" href="#">網路購買簡章</a>
            </div>
		</li>
        <li class="nav-item" id="appform_dropdown">
			<a class="nav-link" href="#">
                v 簡章公告
            </a>
            <div style="display: none">
                <a class="list-group-item" href="#">簡章總則</a>
                <a class="list-group-item" href="#">簡章附錄</a>
                <a class="list-group-item" href="#">校系分則查詢</a>
                <a class="list-group-item" href="#">其他事項</a>
                <a class="list-group-item" href="#">簡章修正事項</a>
                <a class="list-group-item" href="#">111參採科目檢表</a>
            </div>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="#">統計資料</a>
		</li>
        <li class="nav-item" id="download_dropdown">
			<a class="nav-link" href="#">
                v 下載專區        
            </a>
            <div style="display: none">
                <a class="list-group-item" href="#">資料表件下載</a>
                <a class="list-group-item" href="#">其他事項下載</a>
            </div>
		</li>
        <li class="nav-item" id="site_dropdown">
			<a class="nav-link" href="#">
                v 相關網站
            </a>
            <div style="display: none">
                <a class="list-group-item" href="#">招生單位</a>
                <a class="list-group-item" href="#">考試單位</a>
                <a class="list-group-item" href="#">其他網站</a>
            </div>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="#">歷年資料</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="#">高中作業資訊系統</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="#">大學作業資訊系統</a>
		</li>
	</ul>
<?= $this->endSection() ?>

<!-- content 未定 -->

<?= $this->section('footer') ?>
    2022 大學甄選入學委員會
<?= $this->endSection() ?>

<?= $this->section('body_script') ?>
    <script>
        $('#anno_dropdown').hover(function() {
            $('#anno_dropdown > div').toggle();
        });
        $('#purchase_dropdown').hover(function() {
            $('#purchase_dropdown > div').toggle();
        });
        $('#appform_dropdown').hover(function() {
            $('#appform_dropdown > div').toggle();
        });
        $('#download_dropdown').hover(function() {
            $('#download_dropdown > div').toggle();
        });
        $('#site_dropdown').hover(function() {
            $('#site_dropdown > div').toggle();
        });
    </script>
<?= $this->endSection() ?>