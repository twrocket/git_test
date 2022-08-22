<?= $this->extend('templates\post_temp') ?>

<?= $this->section('content') ?>
	
	<h3>上架中</h3>
	
	<?php
	use App\Models\Post;
	$model = new Post();

    $posts = $model->findAll();   
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		foreach($posts as $posts_item) {
			if($posts_item['status_time'] == "上架中") {
				echo '
					<span>'.substr($posts_item['update'], 0, 10).'</span>
					<span>'.$posts_item['category'].'</span>
					<span>'.$posts_item['dateStart'].'</span>
					<span>'.$posts_item['dateEnd'].'</span>	
					<span>上架中</span>
					<a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a>
					<a href="/PostController/edit/'.$posts_item['id'].'">編輯</a><br>
					
										
				';			
				
				
					
				
				
			}
		}
	}

	function sort_by_update($a, $b)
	{
		if($a['dateStart'] == $b['dateStart']) return 0;
		return ($a['dateStart'] > $b['dateStart']) ? -1 : 1;
	}
	?>
<?= $this->endSection() ?>