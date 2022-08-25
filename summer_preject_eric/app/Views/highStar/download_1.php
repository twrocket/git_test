<?= $this->extend('templates\highStar_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-資料表件下載</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">資料表件下載</span>
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