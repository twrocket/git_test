<?= $this->extend('templates\highApply_temp') ?>

<?= $this->section('head_info') ?>    
	<title>大學甄選入學委員會-錄取(篩選)結果查詢</title>
    <?php
    //重新導向 不能用header 因為header後不接受資料輸出 改用js
    
    echo '
    <script>
    alert("抱歉!現在不接受查詢");
    alert("現在為您跳轉到首頁!");
    window.location.href="/HighApply/index";
    </script>
    ';
    ?>
    
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">錄取(篩選)結果查詢</span>           
        </div>
    </div>
	<div class="container border-top">
		<table class="table table-hover table-borderless">
			<thead>
				<tr>
					<th style="width: 20%"></th>
					<th style="width: 20%"></th>
					<th style="width: 60%"></th>
				</tr>
			</thead>
			<tbody>
			    <tr>
					<td>目前尚無資料</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
<?= $this->endSection() ?>