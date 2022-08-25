<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學徵選委員會網頁-上架中</title>
	<script type="text/javascript" src="/Javascript/alert.js"></script>
	<link href="/css/pagination.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<?php
	$total_num = count($posts);
	$page = isset($_GET['page'])? $_GET['page'] : 1;
	$num_per_page = 10;
	?>

	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">上架中</span>
        </div>
    </div>
	<div class="container border-top">
		<table id="contentTable" class="table table-hover">
			<thead>
				<tr>
					<th style="width: 10%">更新日期</th>
					<th style="width: 10%">發布位置</th>
					<th style="width: 10%">類別</th>
					<th style="width: 10%">發布日期</th>
					<th style="width: 10%">下架日期</th>
					<th style="width: 10%">狀態</th>
					<th style="width: 20%">標題</th>
					<th style="width: 10%">編輯</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
			<?php
			if(!empty($posts)) {
				usort($posts, 'sort_by_update');
				for($i=($page-1)*$num_per_page; $i<min($page*$num_per_page, $total_num); $i++) {
					echo '
						<tr>
							<td>'.substr($posts[$i]['update'], 0, 10).'</td>
							<td>'.$posts[$i]['website'].'</td>
							<td>'.$posts[$i]['category'].'</td>
							<td>'.$posts[$i]['dateStart'].'</td>
							<td>'.$posts[$i]['dateEnd'].'</td>
					';
					$var_start = $posts[$i]['dateStart'];
					$var_end = $posts[$i]['dateEnd'];
					$today = date('Y-m-d');
					if($today<$var_start) {
						echo'
							<td>未上架</td>
							<td><a class="text-decoration-none" href="/PostController/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
							<td><a class="text-decoration-none" href="/PostController/edit/'.$posts[$i]['id'].'">編輯</a></td>
						';
					}
					else if($today>=$var_start&& $today<=$var_end) {
						echo'
							<td>上架中</td>
							<td><a class="text-decoration-none" href="/PostController/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
							<td><a class="text-decoration-none" href="/PostController/edit/'.$posts[$i]['id'].'">編輯</a></td>
						';
					}
					else if($today>$var_end) {
						echo'
							<td>已下架</td>
							<td><a class="text-decoration-none" href="/PostController/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
							<td></td>	
						';
					}
					echo'</tr>';	
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
	
	<?php if(!empty($posts)): ?>
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-sm justify-content-center">
			<li class="page-item">
				<a class="page-link link-dark" href="upload?page=1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php
			for($i=1; $i<=ceil($total_num/$num_per_page); $i++) {
				if($page-3 < $i && $i < $page) {
					echo '<li class="page-item"><a class="page-link link-dark" href="upload?page='.$i.'">'.$i.'</a></li>';
				}
				else if($i == $page) {
					echo '<li class="page-item"><a class="page-link link-dark active" href="upload?page='.$i.'">'.$i.'</a></li>';
				}
				else if($page < $i && $i < $page+3) {
					echo '<li class="page-item"><a class="page-link link-dark" href="upload?page='.$i.'">'.$i.'</a></li>';
				}
			}
			?>
    		<li class="page-item">
				<a class="page-link link-dark" href="upload?page=<?php echo ceil($total_num/$num_per_page) ?>" aria-label="Next">
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