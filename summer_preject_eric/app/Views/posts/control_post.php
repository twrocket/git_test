

<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學甄選入學委員會-時間狀態</title>
	<link href="/css/pagination.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- 預設值 for分頁用 -->
	<?php
	$total_num = count($controls);
	$page = isset($_GET['page'])? $_GET['page'] : 1;
	$num_per_page = 10;
	?>

	<!-- 內容的標題 -->
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">時間狀態</span>
        </div>
    </div>

	<!-- 內容 -->
	<div class="container border-top">
		<table id="contentTable" class="table table-hover">
			<thead>
				<tr>
					<th style="width: 20%">關閉種類</th>
					<th style="width: 20%">關閉網站</th>
					<th style="width: 20%">開啟時間</th>
					<th style="width: 20%">關閉時間</th>
					<th style="width: 20%">編輯</th>						
				</tr>
			</thead>
			<tbody class="table-group-divider">

			<?php
			
			if(!empty($controls)) {				
				for($i=($page-1)*$num_per_page; $i<min($page*$num_per_page, $total_num); $i++) {
					echo '
						<tr>							
							<td>'.$controls[$i]['category'].'</td>
							<td>'.$controls[$i]['location'].'</td>
							<td>'.$controls[$i]['time'].'</td>
							<td>'.$controls[$i]['time_end'].'</td>							

							<td>
								<a href="/PostController/to_control/'.$controls[$i]['id'].'"><button class="btn btn-primary btn-sm">編輯</button></a>							
							</td>
						</tr>
					';
				}
			} 
			else {
				echo '
					<tr>
						<td>目前尚無資料</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				';
			}
			?>

			</tbody>
		</table>
	</div>

	<!-- 分頁功能 -->
	<?php if(!empty($posts)): ?>
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-sm justify-content-center">
			<li class="page-item">
				<a class="page-link link-dark" href="index?page=1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			
			<?php
			for($i=1; $i<=ceil($total_num/$num_per_page); $i++) {
				if($page-3 < $i && $i < $page) {
					echo '<li class="page-item"><a class="page-link link-dark" href="index?page='.$i.'">'.$i.'</a></li>';
				}
				else if($i == $page) {
					echo '<li class="page-item"><a class="page-link link-dark active" href="index?page='.$i.'">'.$i.'</a></li>';
				}
				else if($page < $i && $i < $page+3) {
					echo '<li class="page-item"><a class="page-link link-dark" href="index?page='.$i.'">'.$i.'</a></li>';
				}
			}
			?>
			
    		<li class="page-item">
				<a class="page-link link-dark" href="index?page=<?php echo ceil($total_num/$num_per_page) ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
	<?php endif ?>
<?= $this->endSection() ?>

<?php
function sort_by_update($a, $b)
{
	if($a['update'] == $b['update']) return 0;
	return ($a['update'] > $b['update']) ? -1 : 1;
}
?>