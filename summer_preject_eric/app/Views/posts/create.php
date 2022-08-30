<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學甄選入學委員會-發布公告</title>
	<script src="/Javascript/ckeditor/ckeditor.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3 border-bottom">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">發布公告</span>
        </div>
    </div>
	<div class="container col-lg-10 mt-3">
		<form class="needs-validation" novalidate action="/PostController/store" enctype="multipart/form-data" method="POST" >
			<div class="input-group mb-3">
				<label for="title" class="input-group-text">標題</label>
				<input type="text" class="form-control" name="title" placeholder="請輸入標題" required>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="input-group mb-3">
				<label for="website" class="input-group-text">發布位置</label>
				<select name="website" class="form-select" required>
					<option selected disabled value="">請選擇網站</option>
					<option value="大學繁星">大學繁星</option>
					<option value="大學個申">大學個申</option>
					<option value="高中繁星">高中繁星</option>
					<option value="高中個申">高中個申</option>
				</select>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="input-group mb-3">
				<label for="category" class="input-group-text">類別</label>
				<select name="category" class="form-select" required>
					<option selected disabled value="">請選擇類別</option>
					<option value="簡章訊息事項">簡章訊息事項</option>
					<option value="招生事務">招生事務</option>
					<option value="徵選資訊">徵選資訊</option>
					<option value="會議簡報">會議簡報</option>
					<option value="其他事項">其他事項</option>
				</select>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="mb-3">
				<label for="content" class="input-group-text">內文</label>
				<textarea class="form-control" id="editor1" name="content" placeholder="請輸入內文" required></textarea>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="input-group mb-3">
				<label for="file" class="input-group-text">上傳檔案</label>
				<input class="form-control" type="file" name="file" multiple>
			</div>
			<div class="input-group mb-3">
				<label for="dateStart" class="input-group-text">發布日期</label>
				<input type="date" class="form-control" name="dateStart" required>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="input-group mb-3">
				<label for="dateEnd" class="input-group-text">下架日期</label>
				<input type="date" class="form-control" name="dateEnd" required>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<input type="datetime" name="update" value="<?php date_default_timezone_set("Asia/Taipei"); echo date("Y-m-d H:i:s") ?>" style="display: none">
			<div class="mb-3">
				<button type="submit" class="btn btn-primary" name="status" value="草稿">儲存草稿</button>
				<button type="submit" class="btn btn-primary" name="status" value="發布">發布</button>
			</div>
		</form>
	</div>
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
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>
<?= $this->endSection() ?>
