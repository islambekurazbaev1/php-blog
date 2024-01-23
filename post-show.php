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

            <!-- <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2>Change the background</h2>
                        <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron
                            look. Then, mix and match with additional component themes and more.</p>
                        <button class="btn btn-outline-light" type="button">Example button</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>Add borders</h2>
                        <p>Or, keep it light and add a border for some added definition to the boundaries of your
                            content. Be sure to look under the hood at the source HTML here as we've adjusted the
                            alignment and sizing of both column's content for equal-height.</p>
                        <button class="btn btn-outline-secondary" type="button">Example button</button>
                    </div>
                </div>
            </div> -->

        </div>
    </main>

    <?php require 'includes/footer.php' ?>

</body>

</html>