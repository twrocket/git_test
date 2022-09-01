<!-- 
	高中個申--公告的詳細資訊
	引用highApply_temp模板
-->

<?= $this->extend('templates\highApply_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-查看公告</title>
    <style>
        .newline { 
            word-wrap:break-word;
            white-space: pre-wrap;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- 內容的標題 -->
    <div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">訊息公告 - <?php echo $posts['category'] ?></span>
        </div>
    </div>
    <div class="border-top"></div>

    <!-- 內容 -->
    <div class="px-4 py-4 my-0 text-center">
        <div class="col-lg-10 mx-auto">
            <h3 class="newline fw-bold mb-3"><?php echo $posts['title'] ?></h3>
            <div class="newline mb-4 p-2 border border-dark rounded" style="min-height: 35vh"><?php echo $posts['content'] ?></div>
            
            <?php
            if(!($posts['file']==NULL)) {
                $path =  '/File/'.$posts["file_name"].'/'.$posts["file"];
                echo '
                    <span>上傳檔案 : </span>
                    <a href ="'.$path.'" download = '.$posts["file"].' class="text-decoration-none">'.$posts["file"].'</a>
                ';
            }
            ?>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3">
                <p class="px-4 me-sm-3">發布日期 : <?php echo $posts['dateStart'] ?></p>
                <p class="px-4">更新日期 : <?php echo substr($posts['update'], 0, 10) ?></p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>