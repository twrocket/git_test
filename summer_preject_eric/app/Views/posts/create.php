<!-- 
	公告管理頁面--發布公告
	引用post_temp模板
-->

<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學甄選入學委員會-發布公告</title>
	<script src="/Javascript/ckeditor/ckeditor.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- 內容的標題 -->
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3 border-bottom">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">發布公告</span>
        </div>
    </div>

	<!-- 內容 -->
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
				<input class="form-control" type="file" name="file">
			</div>
			<div class="d-flex justify-content-center align-items-center mb-3">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				</svg>
				<span>至多上傳一個檔案</span>
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

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_1">儲存草稿</button>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_2">發布</button>
				
				<!-- Modal 草稿 -->
				<div class="modal fade" id="exampleModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">請再次確認</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								您確定要儲存這則公告嗎?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
								<button type="submit" class="btn btn-primary" name="status" value="草稿">確認</button>
							</div>
						</div>
					</div>
				</div>	

				<!-- Modal 發布 -->
				<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">請再次確認</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								您確定要儲存這則公告嗎?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
								<button type="submit" class="btn btn-primary" name="status" value="發布">確認</button>
							</div>
						</div>
					</div>
				</div>	

			</div>
		</form>
	</div>

	
<?= $this->endSection() ?>

<?= $this->section('body_script') ?>
	<script>
        CKEDITOR.replace( 'editor1' );
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
							alert("部分欄位尚未完成")
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>
	<script>
		// 防呆(並免發布日期晚於下架日期)
		$('form').submit(function() {
			if($('input[name="dateStart"]').val() >= $('input[name="dateEnd"]').val()) {
				alert("發布日期必須早於下架日期")
				event.preventDefault()
				return flase
			}
		})
	</script>
	<script>
		// 編輯中切至其他頁面前提醒使用者尚未儲存
		$('form').data('serialize', $('form').serialize()); // On load save form current state
	
		$(window).bind('beforeunload', function(e) {
			if($('form').serialize() != $('form').data('serialize')) return true;
			else e=null; // i.e; if form state change show warning box, else don't show it.
		});
	</script>
<?= $this->endSection() ?>
