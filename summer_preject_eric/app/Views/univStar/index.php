<?= $this->extend('templates\star_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-大學繁星推薦</title>
	<style>
		#contentTable{
			word-break:break-all;
			word-wrap:break-all;
		}
	</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<?php
		$total_num = count($posts);
		$page = isset($_GET['page'])? $_GET['page'] : 12;
		$num_per_page = 2;
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
		<ul class="pagination">
			<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
			</li>
		</ul>
	</nav>

<ul>
	<?php
	for($i=1; $i<=($total_num/$num_per_page+1); $i++) {
		echo '<li><a href="index?page='.$i.'">page'.$i.'</a></li>';
	}
	?>

</ul>


<?= $this->endSection() ?>

<?php
function sort_by_update($a, $b)
{
	if($a['update'] == $b['update']) return 0;
	return ($a['update'] > $b['update']) ? -1 : 1;
}
?>