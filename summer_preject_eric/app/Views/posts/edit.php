<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學甄選入學委員會-編輯頁面</title>
	<script src="/Javascript/ckeditor/ckeditor.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<h3>編輯頁面</h3>
    <form action="/PostController/update" enctype="mutipart/form-data" method="POST">
    	<input type="text" name="id" value="<?php echo $posts['id'] ?>" style="display: none">
		<label for="title">標題<br>
			<input type="text" name="title" placeholder="請輸入標題" required value="<?php echo $posts['title'] ?>">
		</label><br>
    	<label for="website">發布到哪個網頁<br>
			<select name="website" selected="selected">
				<option disabled>請選擇網站</option>
				<option value="大學繁星" <?php if($posts['website'] == "大學繁星") echo "selected" ?>>大學繁星</option>
				<option value="大學個申" <?php if($posts['website'] == "大學個申") echo "selected" ?>>大學個申</option>
				<option value="高中繁星" <?php if($posts['website'] == "高中繁星") echo "selected" ?>>高中繁星</option>
				<option value="高中個申" <?php if($posts['website'] == "高中個申") echo "selected" ?>>高中個申</option>
			</select>
        </label><br>
        <label for="category">類別<br>
			<select name="category">
				<option disabled>請選擇類別</option>
				<option value="簡章訊息事項" <?php if($posts['category'] == "簡章訊息事項") echo "selected" ?>>簡章訊息事項</option>
				<option value="招生事務" <?php if($posts['category'] == "招生事務") echo "selected" ?>>招生事務</option>
				<option value="徵選資訊" <?php if($posts['category'] == "徵選資訊") echo "selected" ?>>徵選資訊</option>
				<option value="會議簡報" <?php if($posts['category'] == "會議簡報") echo "selected" ?>>會議簡報</option>
				<option value="其他事項" <?php if($posts['category'] == "其他事項") echo "selected" ?>>其他事項</option>
        	</select>
        </label><br>
		<label for="content">內文<br>
			<textarea id ="editor1" name="content" placeholder="請輸入內文" required><?php echo $posts['content'] ?></textarea>
		</label><br>
		<label for="file">上傳檔案<br>
			<input type="file" name="file" multiple>
		</label><br>
		<label for="dateStart">公告發布日期<br>
			<input type="date" name="dateStart" required value="<?php echo $posts['dateStart'] ?>">
		</label><br>
		<label for="dateEnd">公告下架日期<br>
			<input type="date" name="dateEnd" required value="<?php echo $posts['dateEnd'] ?>">
		</label><br>
		<input type="datetime" name="update" value="<?php date_default_timezone_set("Asia/Taipei"); echo date("Y-m-d H:i:s") ?>" style="display: none">
		<div>
			<button type="submit" name="status" value="草稿">儲存草稿</button>
			<button type="submit" name="status" value="發布">發布</button>
		</div>
    </form>
<?= $this->endSection() ?>

<?= $this->section('body_script') ?>
	<script>
        CKEDITOR.replace( 'editor1' );
    </script>
<?= $this->endSection() ?>
