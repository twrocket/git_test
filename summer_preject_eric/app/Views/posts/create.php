<?= $this->extend('templates\post_temp') ?>

<?= $this->section('post_content') ?>
	<h3>發布公告</h3>
    <form action="/PostController/store" enctype="mutipart/form-data" method="POST">
    	<label for="title">標題<br><input type="text" name="title" required></label><br>
    	<label for="website">發布到哪個網頁<br>
        <!-- <input type="checkbox" value="1">大學繁星
        <input type="checkbox" value="2">大學個申
        <input type="checkbox" value="3">高中繁星
        <input type="checkbox" value="4">高中個申 -->
        <select name="website">
    	    <option value="1">大學繁星</option>
            <option value="2">大學個申</option>
            <option value="3">高中繁星</option>
            <option value="4">高中個申</option>
        </select>
        </label><br>
        <label for="category">分類<br>
			<select name="category">
				<option value="1">簡章訊息事項</option>
				<option value="2">招生事務</option>
				<option value="3">徵選資訊</option>
				<option value="4">會議簡報</option>
				<option value="5">其他事項</option>
        	</select>
        </label><br>
		<label for="content">內文<br><textarea name="content" required></textarea></label><br>
		<label for="file">上傳檔案<br><input type="file" name="file"></label><br>
		<label for="dateStart">公告發布時間<br><input id="dateStart" type="date" name="dateStart" required></label><br>
		<label for="dateEnd">公告下架時間<br><input id="dateEnd" type="date" name="dateEnd" required></label><br>
		<button type="submit">Submit</button>
    </form>
<?= $this->endSection() ?>
