<?= $this->extend('templates\post_temp') ?>

<?= $this->section('post_content') ?>
	
	<h3>已下架</h3>
	
	<?php
	use App\Models\Post;
	$model = new Post();

    $posts = $model->findAll();   
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		foreach($posts as $posts_item) {
			if($posts_item['status_time'] == "已下架") {
				echo '
					<span>'.substr($posts_item['update'], 0, 10).'</span>
					<span>'.$posts_item['category'].'</span>
					<span>'.$posts_item['dateStart'].'</span>
					<span>'.$posts_item['dateEnd'].'</span>	
					<span>已下架</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<br>
										
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