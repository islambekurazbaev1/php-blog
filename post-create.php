<?php
$title = "Добавить Post";
require 'includes/navbar.php';
require 'includes/css.php';
require 'includes/database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="container py-3">
        <h1 class="text-center mt-5">Добавить POST</h1>
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <form class="container-fluid py-5" method="POST" action="#">
                <div class="mb-3">
                    <label class="form-label">Загаловка</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <textarea class="form-control" rows="3" name="text"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require 'includes/footer.php'; ?>