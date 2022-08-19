<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學徵選委員會網頁-發布公告</title>
	<script src="/Javascript/ckeditor/ckeditor.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<h3>發布公告</h3>
    <form action="/PostController/store"enctype="multipart/form-data" method="POST">
    	<label for="title">標題<br>
			<input type="text" name="title" placeholder="請輸入標題" required>
		</label><br>
    	<label for="website">發布到哪個網頁<br>
			<select name="website">
				<option selected disabled>請選擇網站</option>
				<option value="大學繁星">大學繁星</option>
				<option value="大學個申">大學個申</option>
				<option value="高中繁星">高中繁星</option>
				<option value="高中個申">高中個申</option>
			</select>
        </label><br>
        <label for="category">類別<br>
			<select name="category">
				<option selected disabled>請選擇類別</option>
				<option value="簡章訊息事項">簡章訊息事項</option>
				<option value="招生事務">招生事務</option>
				<option value="徵選資訊">徵選資訊</option>
				<option value="會議簡報">會議簡報</option>
				<option value="其他事項">其他事項</option>
        	</select>
        </label><br>
		<label for="content" style = "margin:auto; width:40%; max-width:600px;">內文<br>
			<textarea id ="editor1" name="content" placeholder="請輸入內文" required></textarea>	
		</label><br>
		<label for="file">上傳檔案<br>
			<input type="file" name="file"  multiple><!--裝飾上傳檔案的部分 都是將input忽略 在用新的去美化 -->			
		</label><br>
		<label for="dateStart">公告發布日期<br>
			<input type="date" name="dateStart" required>
		</label><br>
		<label for="dateEnd">公告下架日期<br>
			<input type="date" name="dateEnd" required>
		</label><br>

		<input type="datetime" name="update" value="<?php echo date("Y-m-d h:i:s") ?>" style="display: none">

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
		const fileUploader = document.querySelector('#file-uploader');
		fileUploader.addEventListener('change', (e) => {
			e.target.files; // FileList object
			e.target.files[0]; // File Object (Special Blob)  
		});
    </script>
<?= $this->endSection() ?>
