<!-- 
	公告管理頁面--公告的詳細資訊
	引用post_temp模板
-->

<?= $this->extend('templates\post_temp') ?>

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
            <span class="fs-3">查看公告</span>
        </div>
    </div>
    <div class="border-top"></div>

    <!-- 內容 -->
    <div class="px-4 py-4 my-0 text-center">
        <div class="card col-lg-10 mx-auto mb-3">
            <div class="card-body">
                <h3 class="card-text"><?php echo $posts['title'] ?></h3>
            </div>
        </div>
        <div class="col-lg-10 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <p class="px-4 me-sm-3">發布位置 : <?php echo $posts['website'] ?></p>
                <p class="px-4 me-sm-3">類別 : <?php echo $posts['category'] ?></p>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-text"><?php echo $posts['content'] ?></div>
                </div>
            </div>

            <?php
            if($posts['file']==NULL)
            {
                echo "<p>上傳檔案 : 此貼文無檔案</p>";
            }
            else
            {   $path =  '/File/'.$posts["file_name"].'/'.$posts["file"];
                echo '<span>上傳檔案 : </span>';
                echo '<a href ="'.$path.'" download = '.$posts["file"].' class="text-decoration-none">
                        '.$posts["file"].'
                     </a>
                     ';
            }
            ?>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3">
                <p class="px-4 me-sm-3">更新日期 : <?php echo substr($posts['update'], 0, 10) ?></p>
                <p class="px-4 me-sm-3">發布日期 : <?php echo $posts['dateStart'] ?></p>
                <p class="px-4 me-sm-3">下架日期 : <?php echo $posts['dateEnd'] ?></p>
                <p class="px-4 me-sm-3">狀態 : <?php echo $posts['status'] ?></p>
            </div>
            <a class="text-decoration-none" href="/PostController/edit/<?php echo $posts['id'] ?>"><button class="btn btn-primary btn-sm">編輯</button></a>
				
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">刪除</button>
								
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">請再次確認</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							您確定要刪除<?php echo $posts['title'] ?>這則公告嗎?
					    </div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
							<a href="/PostController/delete/index/<?php echo $posts['id'] ?>"><button type="button" class="btn btn-primary">確認</button></a>
						</div>
					</div>
			    </div>
		    </div>	

        </div>
    </div>
<?= $this->endSection() ?>