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
            <span class="fs-3">控制時間</span>
        </div>
    </div>

	<!-- 內容 -->
	<div class="container col-lg-10 mt-3">
		<form class="needs-validation" novalidate action="/controlController/store" enctype="multipart/form-data" method="POST" >
			
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
				<label for="category" class="input-group-text">需要關閉的網頁</label>
				<select name="category" class="form-select" required>
					<option selected disabled value="">請選擇網頁</option>
					<option value="錄取(篩選)結果查詢">錄取(篩選)結果查詢</option>
					
				</select>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>		
			
			<div class="input-group mb-3">
				<label for="dateStart" class="input-group-text">開啟時間</label>
				<input type="date" class="form-control" name="start_time" required>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>
			<div class="input-group mb-3">
				<label for="dateStart" class="input-group-text">關閉時間</label>
				<input type="date" class="form-control" name="end_time" required>
				<div class="invalid-feedback">請填寫這個欄位</div>
			</div>				
			<input type="datetime" name="update" value="<?php date_default_timezone_set("Asia/Taipei"); echo date("Y-m-d H:i:s") ?>" style="display: none">
			<div class="mb-3">

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_2">發布</button>
								

				<!-- Modal 發布 -->
				<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">請再次確認</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								您確定要更改控制時間嗎?
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
			if($('input[name="start_time"]').val() >= $('input[name="end_time"]').val()) {
				alert("發布日期必須早於下架日期")
				event.preventDefault()
				return flase
			}
		})
	</script>
<?= $this->endSection() ?>
