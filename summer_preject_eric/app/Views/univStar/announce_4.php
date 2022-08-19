<?= $this->extend('templates\star_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-會議簡報</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">會議簡報</span>
        </div>
    </div>
	<div class="border-top"></div>
    <?php
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		echo '<table class="table"><tbody>';
		foreach($posts as $posts_item) {
			if($posts_item['website'] == "大學繁星" and $posts_item['status'] == "發布" and $posts_item['category'] == "會議簡報") {
				echo '
					<tr>
						<td>'.substr($posts_item['update'], 0, 10).'</td>
						<td>'.$posts_item['category'].'</td>
						<td><a href="/UnivStar/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
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