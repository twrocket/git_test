<?= $this->extend('templates\star_temp') ?>

<?= $this->section('head_info') ?>
    <title>大學甄選入學委員會-大學繁星推薦</title>
	<style>
		html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
margin: 0;
padding: 0;
border: 0;
font-size: 100%;
font: inherit;
vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
display: block;
}
body {
line-height: 1;
}
ol, ul {
list-style: none;
}
blockquote, q {
quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
content: '';
content: none;
}
table {
border-collapse: collapse;
border-spacing: 0;
}
	#link_newline { 
		word-wrap:break-word;
            white-space: pre-wrap; 
        }
	</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="pt-2 pb-3 mx-lg-5 mx-md-3">
        <div class="container d-flex flex-wrap justify-content-start">
            <span class="fs-3">訊息公告</span>
        </div>
    </div>
	<div class="border-top"></div>
	<?php
	if(!empty($posts)) {
		usort($posts, 'sort_by_update');
		echo '
			<table class="table">
				<thead>
					<tr>
						<th style="width: 19%">00</th>
						<th style="width: 16%">00</th>
						<th style="width: 5px">00</th>
					</tr>
				</thead>
				<tbody>
		';
		foreach($posts as $posts_item) {
			if($posts_item['website'] == "大學繁星" and /*$posts_item['status_time'] != "已下架" and*/ $posts_item['status'] == "發布") {
				echo '
					<tr>
						<td>'.substr($posts_item['update'], 0, 10).'</td>
						<td>'.$posts_item['category'].'</td>
						<td id="link_newline"><a  href="/UnivStar/show/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
					</tr>
				';
			}
		}
		echo '
				</tbody>
			</table>
		';
	}

	function sort_by_update($a, $b)
	{
		if($a['update'] == $b['update']) return 0;
		return ($a['update'] > $b['update']) ? -1 : 1;
	}
	?>
<?= $this->endSection() ?>