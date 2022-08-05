<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>大學徵選委員會網頁-大學繁星推薦</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <header class="container-fluid text-center" style="border: 1px solid black; height: 100px">
    <h1>大學繁星推薦</h1>
    <h2>發公告網頁測試</h2>
  </header>
  <main class="container-fluid text-center">
    <div class="row">
      <div class="col-2" style="border: 1px solid black">
        <h5>側邊標題欄</h5>
        <h4>側邊標題欄</h4>
        <h3>側邊標題欄</h3>
        <h3>側邊標題欄</h3>
        <h3>側邊標題欄</h3>
        <h3>側邊標題欄</h3>
      </div>
      <div class="col-10" style="border: 1px solid black">
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
      </div>
    </div>
  </main>
  <footer class="container-fluid text-center" style="border: 1px solid black; height: 100px">
    <h3>footer</h3>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>