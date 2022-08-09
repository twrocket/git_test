<?= $this->extend('templates\post_temp') ?>

<?= $this->section('post_content') ?>
	<h3>已發布公告</h3>
	<?php
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		foreach($posts as $posts_item) {
			if($posts_item['status'] == "發布") {
				echo '
					<span>'.substr($posts_item['update'], 0, 10).'</span>
					<span>'.$posts_item['category'].'</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<a href="/PostController/edit/'.$posts_item['id'].'">編輯</a><br>	
				';
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