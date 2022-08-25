<?= $this->extend('templates\highApply_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-會議簡報</title>
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
            <span class="fs-3">會議簡報</span>
        </div>
    </div>
	<div class="container border-top">
		<table id="contentTable" class="table table-hover table-borderless">
			<thead>
				<tr>
					<th style="width: 20%"></th>
					<th style="width: 20%"></th>
					<th style="width: 60%"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(!empty($posts)) {
				usort($posts, 'sort_by_update');
				for($i=($page-1)*$num_per_page; $i<min($page*$num_per_page, $total_num); $i++) {
					echo '
						<tr>
							<td>'.substr($posts[$i]['update'], 0, 10).'</td>
							<td>'.$posts[$i]['category'].'</td>
							<td><a class="text-decoration-none" href="/UnivStar/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
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
				<a class="page-link link-dark" href="announce_4?page=1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php
			for($i=1; $i<=ceil($total_num/$num_per_page); $i++) {
				if($page-3 < $i && $i < $page) {
					echo '<li class="page-item"><a class="page-link link-dark" href="announce_4?page='.$i.'">'.$i.'</a></li>';
				}
				else if($i == $page) {
					echo '<li class="page-item"><a class="page-link link-dark active" href="announce_4?page='.$i.'">'.$i.'</a></li>';
				}
				else if($page < $i && $i < $page+3) {
					echo '<li class="page-item"><a class="page-link link-dark" href="announce_4?page='.$i.'">'.$i.'</a></li>';
				}
			}
			?>
    		<li class="page-item">
				<a class="page-link link-dark" href="announce_4?page=<?php echo ceil($total_num/$num_per_page) ?>" aria-label="Next">
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