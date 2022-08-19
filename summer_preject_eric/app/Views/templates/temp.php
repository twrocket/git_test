<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->renderSection('head_info') ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <header class="container-fluid text-center">
        <div class="row">

                <?= $this->renderSection('header') ?>

        </div>
    </header>
    <main class="container-fluid text-center">
        <div class="row">
            <div id="sidebar" class="col-12 col-md-2">

                <?= $this->renderSection('sidebar') ?>

            </div>
            <div id="content" class="col-12 col-md-10">

                <?= $this->renderSection('content') ?>

            </div>
        </div>
    </main>
    <footer class="container-fluid text-center">
        <div class="row">

                <?= $this->renderSection('footer') ?>
            
        </div>
    </footer>

    <?= $this->renderSection('body_script') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>