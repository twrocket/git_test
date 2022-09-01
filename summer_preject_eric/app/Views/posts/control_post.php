<!-- 
	公告管理頁面--上架中
	引用post_temp模板
-->

<?= $this->extend('templates\post_temp') ?>

<?= $this->section('header') ?>
    <title>大學甄選入學委員會-上架中</title>
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
            <span class="fs-3">上架中</span>
        </div>
    </div>

	<!-- 內容 -->
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
					<th style="width: 10%">編輯與刪除</th>
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
							<td>'.$posts[$i]['status_time'].'</td>
							<td><a class="text-decoration-none" href="/PostController/show/'.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a></td>
							<td>
								<a href="/PostController/edit/'.$posts[$i]['id'].'"><button class="btn btn-primary btn-sm">編輯</button></a>
								
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal'.$posts[$i]['id'].'">刪除</button>
								
								<!-- Modal -->
								<div class="modal fade" id="exampleModal'.$posts[$i]['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">請再次確認</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												您確定要刪除'.$posts[$i]['title'].'這則公告嗎?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
												<a href="/PostController/delete/upload/'.$posts[$i]['id'].'"><button type="button" class="btn btn-primary">確認</button></a>
											</div>
										</div>
									</div>
								</div>	
							
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