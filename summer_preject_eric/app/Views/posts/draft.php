<?= $this->extend('templates\post_temp') ?>

<?= $this->section('post_content') ?>
	
	<h3>草稿</h3>
	
	<?php
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		foreach($posts as $posts_item) {
			if($posts_item['status'] == "草稿") {
				echo '
					<span>'.substr($posts_item['update'], 0, 10).'</span>
					<span>'.$posts_item['category'].'</span>
					<span>'.$posts_item['dateStart'].'</span>
					<span>'.$posts_item['dateEnd'].'</span>						
				';
				$var_start = $posts_item['dateStart'];
				$var_end = $posts_item['dateEnd'];
				$today = date('Y-m-d');
				if($today<$var_start)
				{
					echo'
					<span>未上架</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<a href="/PostController/edit/'.$posts_item['id'].'">編輯</a><br>
					
					';
				}
				else if($today>=$var_start&& $today<=$var_end)
				{
					echo'
					<span>上架中</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<a href="/PostController/edit/'.$posts_item['id'].'">編輯</a><br>
					
					';
				}
				else if($today>$var_end)
				{
					echo'
					<span>已下架</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<br>
					';
					
					
				}
			}
		}
	}

	function sort_by_update($a, $b)
	{
		if($a['update'] == $b['update']) return 0;
		return ($a['update'] > $b['update']) ? -1 : 1;
	}
	?>
<?= $this->endSection() ?>