<?= $this->extend('templates\univStar_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-會議簡報</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>會議簡報</h1>
    <?php
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		echo '<table class="table"><tbody>';
		foreach($posts as $posts_item) {
			if($posts_item['category'] == "會議簡報") {
				echo '
					<tr>
						<td>'.substr($posts_item['update'], 0, 10).'</td>
						<td>'.$posts_item['category'].'</td>
						<td><a href="/PostController/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
					</tr>
				';
			}
		}
		echo '</tbody></table>';
	}

	function sort_by_update($a, $b)
	{
		if($a['update'] == $b['update']) return 0;
		return ($a['update'] > $b['update']) ? -1 : 1;
	}
	?>
<?= $this->endSection() ?>