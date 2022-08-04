<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>大學徵選委員會網頁-公告管理頁面</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <header class="container-fluid text-center" style="border: 1px solid black">
    <div class="row">
      <div class="col-8 text-start">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">回首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">大學繁星</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">大學個申</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">高中繁星</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">高中個申</a>
          </li>
        </ul>
      </div>
      <div class="col-4 text-end">
        <!-- if user not login -->
        <span>未登入</span>
        <a href="#"><button type="button" class="btn btn-light">管理者登入</button></a>
        <!-- if user login -->
        <!-- <span>使用者</span> -->
        <!-- <a href="#"><button type="button" class="btn btn-light">登出</button></a> -->
      </div>
      <h1>公告管理頁面</h1>
    </div>
  </header>
  <main class="container-fluid text-center" style="height: 70vh">
    <div class="row">
      <div class="col-md-2" style="border: 1px solid black">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">已發布公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">草稿</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">發布公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">控制頁面</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10" style="border: 1px solid black">
        <h3>發布公告</h3>
        <form action="/PostController/store" enctype="mutipart/form-data" method="POST">
          <label for="title">標題<input type="text" name="title" required></label><br>
          <label for="website">發布到哪個網頁
            <select name="website">
              <option value="1">大學繁星</option>
              <option value="2">大學個申</option>
              <option value="3">高中繁星</option>
              <option value="4">高中個申</option>
            </select>
          </label><br>
          <label for="category">分類
            <select name="category">
              <option value="1">簡章訊息事項</option>
              <option value="2">招生事務</option>
              <option value="3">徵選資訊</option>
              <option value="4">會議簡報</option>
              <option value="5">其他事項</option>
            </select>
          </label><br>
          <label for="content">內文<textarea name="content" required></textarea></label><br>
          <label for="file">上傳檔案<input type="file" name="file"></label><br>
          <label for="dateStart">公告發布時間<input id="dateStart" type="date" name="dateStart" required></label><br>
          <label for="dateEnd">公告下架時間<input id="dateEnd" type="date" name="dateEnd" required></label><br>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
  <footer class="container-fluid text-center" style="border: 1px solid black">
    <h4>聯絡資訊</h4> 
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>