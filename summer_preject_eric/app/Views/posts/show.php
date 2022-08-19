<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學徵選委員會網頁-查看公告</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1><?php echo $posts['title'] ?></h1>
    <p>發布到<?php echo $posts['website'] ?></p>
    <p>類別 : <?php echo $posts['category'] ?></p>
    <p>內文 : <?php echo $posts['content'] ?></p>
    <p>上傳檔案 : <?php echo $posts['file'] ?></p>
    <p>公告發布日期 : <?php echo $posts['dateStart'] ?></p>
    <p>公告下架日期 : <?php echo $posts['dateEnd'] ?></p>
    <p>更新日期 : <?php echo $posts['update'] ?></p>
    <p>狀態 : <?php echo $posts['status'] ?></p>
    <a href="/PostController/edit/<?php echo $posts['id'] ?>">編輯</a>
<?= $this->endSection() ?>