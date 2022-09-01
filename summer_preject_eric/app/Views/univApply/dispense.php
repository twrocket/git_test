<?= $this->extend('templates\univApply_temp') ?>
<input type="button" value="click me" />

    <!--引用jQuery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <!--引用SweetAlert2.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>    
<?= $this->section('head_info') ?>    
	<title>大學甄選入學委員會-錄取(篩選)結果查詢</title>
    
    
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