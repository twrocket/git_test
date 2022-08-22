<?= $this->extend('templates\star_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-大學繁星推薦</title>
	<style>
		#contentTable {
			word-break:break-all;
			word-wrap:break-all;
		}
/* 
		.pagination > li > a
		{
			background-color: red;
			color: #5A4181;
		}

		.pagination > li > a:focus,
		.pagination > li > a:hover,
		.pagination > li > span:focus,
		.pagination > li > span:hover
		{
			color: #5a5a5a;
			background-color: #eee;
			border-color: #ddd;
		}

		.pagination > .active > a
		{
			color: white;
			background-color: #5A4181 !Important;
			border: solid 1px #5A4181 !Important;
		}

		.pagination > .active > a:hover
		{
			background-color: #5A4181 !Important;
			border: solid 1px #5A4181;
		} */
	</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<?php
		$total_num = count($posts);
		$page = isset($_GET['page'])? $_GET['page'] : 1;
		$num_per_page = 10;
	?>

	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">訊息公告</span>
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
					if($posts[$i]['website'] == "大學繁星" and /*$posts[$i]['status_time'] != "已下架" and*/ $posts[$i]['status'] == "發布") {
						echo '
							<tr>
								<td>'.substr($posts[$i]['update'], 0, 10).'</td>
								<td>'.$posts[$i]['category'].'</td>
								<td><a class="text-decoration-none" href="/UnivStar/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
							</tr>
						';
					}
				}
			}
			?>
			</tbody>
		</table>
	</div>
	
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-sm justify-content-center">
			<li class="page-item">
				<a class="page-link" href="index?page=1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php
			for($i=1; $i<=ceil($total_num/$num_per_page); $i++) {
				if($page-3 < $i && $i < $page+3) {
					echo '<li class="page-item"><a class="page-link" href="index?page='.$i.'">'.$i.'</a></li>';
			
				}
			}
			?>
    		<li class="page-item">
				<a class="page-link" href="index?page=<?php echo ceil($total_num/$num_per_page) ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
<?= $this->endSection() ?>

<?php
function sort_by_update($a, $b)
{
	if($a['update'] == $b['update']) return 0;
	return ($a['update'] > $b['update']) ? -1 : 1;
}
?>