<!-- 
    高中個申模板
    引用temp的模板，並完成header、sidebar、footer三個部分
    content維持空白，待後續使用此模板者自行設計
-->

<?= $this->extend('templates\temp') ?>

<?= $this->section('head_info') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link href="/css/apply.css" rel="stylesheet">   
<?= $this->endSection() ?>

<?= $this->section('header') ?>
<!-- 上側導覽列 -->
    <nav id="navbar_top" class="py-2">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="/home" class="nav-link link-light px-2">回首頁</a></li>
                <li class="nav-item"><a href="/UnivStar/index" class="nav-link link-light px-2">大學繁星</a></li>
                <li class="nav-item"><a href="/UnivApply/index" class="nav-link link-light px-2">大學個申</a></li>
                <li class="nav-item"><a href="/HighStar/index" class="nav-link link-light px-2">高中繁星</a></li>
                <li class="nav-item"><a href="/HighApply/index" class="nav-link link-light px-2">高中個申</a></li>
            </ul>
            <ul class="nav">
                <div class="wrap">
                    <form name = "keyword" action="/ControlController/search_highApply" enctype="mutipart/form-data" method="GET" >                       
                        <input  type="text" name="search" id="search" placeholder="輸入關鍵字">
                        <button class="btn btn-outline-light" type = "submit"> 搜尋 </button>
                    </form>
                </div>
            </ul>
        </div>
    </nav>
 
<!-- 標題 -->
    <div id="title" class="pb-3 mb-0">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex align-items-center py-2 mb-0 mb-lg-0 text-dark text-decoration-none">
                <img class="bi me-2" width="40" height="35" src="/img/cac.png">
                <span class="fs-2">2022 高中個人申請</span>
                <span class="fs-6 mx-3 d-none d-md-block">大學之位 為您預留</span>
                <img class="bi me-2 d-none d-md-block" width="90" height="" src="/img/stair-climbing.png">
                <img class="bi me-2 d-none d-md-block" width="70" height="" src="/img/global-icon.png">
            </div>
        </div>
    </div>

 <!-- 下側導覽列 -->
    <nav id="navbar_bottom" class="py-2">
        <ul class="nav d-flex flex-wrap justify-content-around">
            <li class="nav-item"><a href="/HighApply/query" class="nav-link link-light px-auto">校系分則查詢</a></li>
            <li class="nav-item"><a href="/HighApply/online" class="nav-link link-light px-auto">網路購買簡章</a></li>
            <li class="nav-item"><a href="/HighApply/apply" class="nav-link link-light px-auto">網路報名系統</a></li>
            <li class="nav-item"><a href="/HighApply/freetelc" class="nav-link link-light px-auto">聽障生免英聽檢定</a></li>
            <li class="nav-item"><a href="/HighApply/result" class="nav-link link-light px-auto">篩選結查詢果</a></li>
            <li class="nav-item"><a href="/HighApply/dataupload" class="nav-link link-light px-auto">審查資料上傳</a></li>
            <li class="nav-item"><a href="/HighApply/list" class="nav-link link-light px-auto">各校榜單連結</a></li>
            <li class="nav-item"><a href="/HighApply/rank" class="nav-link link-light px-auto">網路登記志願</a></li>
            <li class="nav-item"><a href="/HighApply/dispense" class="nav-link link-light px-auto">分發結果查詢</a></li>
            <li class="nav-item"><a href="/HighApply/abandon" class="nav-link link-light px-auto">網路聲明放棄</a></li>
        </ul>
    </nav>
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
                    <li class="nav-item" id="anno_dropdown">
                        <a class="nav-link link-dark" href="/HighApply/index">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            訊息公告
                        </a>
                        <div class="dropdownList" style="display: none">
                            <a class="list-group-item link-dark" href="/HighApply/announce_1">簡章訊息事項</a>
                            <a class="list-group-item link-dark" href="/HighApply/announce_2">招生事務</a>
                            <a class="list-group-item link-dark" href="/HighApply/announce_3">徵選資訊</a>
                            <a class="list-group-item link-dark" href="/HighApply/announce_4">會議簡報</a>
                            <a class="list-group-item link-dark" href="/HighApply/announce_5">其他事項</a>
                        </div>    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/regulation">法令規章</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/schedule">重要時程</a>
                    </li>
                    <li class="nav-item" id="purchase_dropdown">
                        <a class="nav-link link-dark" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            簡章發售
                        </a>
                        <div class="dropdownList" style="display: none">
                            <a class="list-group-item link-dark" href="/HighApply/purchase_1">發售辦法</a>
                            <a class="list-group-item link-dark" href="/HighApply/purchase_2">網路購買簡章</a>
                        </div>
                    </li>
                    <li class="nav-item" id="appform_dropdown">
                        <a class="nav-link link-dark" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            簡章公告
                        </a>
                        <div class="dropdownList" style="display: none">
                            <a class="list-group-item link-dark" href="/HighApply/appform_1">簡章總則</a>
                            <a class="list-group-item link-dark" href="/HighApply/appform_2">簡章附錄</a>
                            <a class="list-group-item link-dark" href="/HighApply/appform_3">校系分則查詢</a>
                            <a class="list-group-item link-dark" href="/HighApply/appform_4">其他事項</a>
                            <a class="list-group-item link-dark" href="/HighApply/appform_5">簡章修正事項</a>
                            <a class="list-group-item link-dark" href="/HighApply/appform_6">111參採科目檢表</a>
                        </div>
                    </li>
                    <li class="nav-item" id="appform_dropdown">
                        <a class="nav-link link-dark" href="/HighApply/help_vulnerable">扶弱措施</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/statistic">統計資料</a>
                    </li>
                    <li class="nav-item" id="download_dropdown">
                        <a class="nav-link link-dark" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            下載專區        
                        </a>
                        <div class="dropdownList" style="display: none">
                            <a class="list-group-item link-dark" href="/HighApply/download_1">資料表件下載</a>
                            <a class="list-group-item link-dark" href="/HighApply/download_2">其他事項下載</a>
                        </div>
                    </li>
                    <li class="nav-item" id="site_dropdown">
                        <a class="nav-link link-dark" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            相關網站
                        </a>
                        <div class="dropdownList" style="display: none">
                            <a class="list-group-item link-dark" href="/HighApply/site_1">招生單位</a>
                            <a class="list-group-item link-dark" href="/HighApply/site_2">考試單位</a>
                            <a class="list-group-item link-dark" href="/HighApply/site_3">其他網站</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/history_statistics">歷年資料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/system_area_highschool">高中作業資訊系統</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="/HighApply/system_area_college">大學作業資訊系統</a>
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