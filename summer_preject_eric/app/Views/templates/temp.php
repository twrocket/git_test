<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->renderSection('web_title') ?>
    </title>
    <script src="/Javascript/ckeditor/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        header {
            min-height: 15vh;
        }

        main>div {
            min-height: 80vh;
        }

        footer {
            min-height: 5vh;
        }
    </style>
</head>
<body>
    <header class="container-fluid text-center" style="border: 1px solid black">
        <div class="row">
            <div class="col-8 text-start">
                <?= $this->renderSection('left_navbar') ?>
            </div>
            <div class="col-4 text-end">
                <?= $this->renderSection('right_navbar') ?>
            </div>
        </div>
        <div class="row">
            <?= $this->renderSection('title') ?>
        </div>
    </header>
    <main class="container-fluid text-center">
        <div class="row">
            <div class="col-12 col-md-2" style="border: 1px solid black">
                <?= $this->renderSection('sidebar') ?>
            </div>
            <div class="col-12 col-md-10" style="border: 1px solid black">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </main>
    <footer class="container-fluid text-center" style="border: 1px solid black">
        <?= $this->renderSection('footer') ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>