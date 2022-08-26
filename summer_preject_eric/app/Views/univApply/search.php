<?= $this->extend('templates\univApply_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-簡章訊息事項</title>
	<style>
		#contentTable{
			word-break:break-all;
			word-wrap:break-all;
		}
	</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">您搜尋的事項</span>
        </div>
    </div>
	<div class="container border-top">
		<table id="contentTable" class="table table-hover table-borderless">
			<?php
            use App\Models\Post;
            $model = new Post();
            $posts = $model->findAll();        
			if(!empty($posts)) {
				usort($posts, 'sort_by_update');
				echo '
					<thead>
						<tr>
							<th style="width: 20%"></th>
							<th style="width: 20%"></th>
							<th style="width: 60%"></th>
						</tr>
					</thead>
					<tbody>
				';
				
				foreach($posts as $posts_item) {
					if($posts_item['website'] == "大學繁星" and $posts_item['status_time'] != "已下架" and $posts_item['status'] == "發布") {
                                                                        
                        foreach( $datas as $data_store){
														
                            if($posts_item['id'] == $data_store)
                            {	
                        echo '
							<tr>
								<td>'.substr($posts_item['update'], 0, 10).'</td>
								<td>'.$posts_item['category'].'</td>
								<td><a class="text-decoration-none" href="/UnivStar/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
							</tr>
						';
                            }                            
                            
                        }
						
					}
                    
				}
                
				echo '</tbody>';
			}
			?>
		</table>
	</div>

	<?php
	function sort_by_update($a, $b)
	{
		if($a['update'] == $b['update']) return 0;
		return ($a['update'] > $b['update']) ? -1 : 1;
	}
	?>
<?= $this->endSection() ?>