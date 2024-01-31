<?php 

require 'includes/database.php';
$title = 'Подробно БЛОГ';


if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $post_id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id=:id";
    $statement = $pdo->prepare($sql);
    
    $statement->execute([
        'id' => $post_id,
    ]);

    $post = $statement->fetch();
}

?>


<!doctype html>
<html lang="en">

<head>
    <?php 
        require 'includes/navbar.php';
        require 'includes/css.php';
        
    ?>
</head>

<body>

    <main>
        <div class="container py-4 mt-3">
            <div class="p-3 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?= $post['title']?></h1>
                    <p class="col-md-8 fs-4"><?= $post['text'] ?></p>
                    <a href="blog.php" class="btn btn-primary btn-lg" type="button">Назад</a>
                </div>
            </div>
        </div>
    </main>

    <?php require 'includes/footer.php' ?>

</body>

</html>