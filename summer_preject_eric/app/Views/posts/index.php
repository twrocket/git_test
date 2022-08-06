<?= $this->extend('templates\post_temp') ?>

<?= $this->section('post_content') ?>
	<h3>Post</h3>
	<?php
	if(!empty($posts)) {
		foreach($posts as $posts_i) {
			echo '
				<a href="/PostController/show/'.$posts_i['id'].'">'.$posts_i['title'].'</a><br>
			';
		}
	}
	?>
<?= $this->endSection() ?>