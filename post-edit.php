<?php
$title = "Добавить Post";
require 'includes/navbar.php';
require 'includes/css.php';
require 'includes/database.php';
$title = "Изменить БЛОГ";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $post_id = $_GET['id'];

        $sql = "SELECT * FROM posts WHERE id=:id";
        $statement = $pdo->prepare($sql);

        $statement->execute([
            'id' => $post_id,
        ]);

        $post = $statement->fetch();
        // test($post);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post_id = $_POST['id'];
        $post_title = $_POST['title'];
        $post_text = $_POST['text'];

        $sql = "UPDATE posts SET title=:title, text=:text WHERE id=:id";
        $statement = $pdo->prepare($sql);

        $execute = $statement->execute([
            'title' => $post_title,
            'text' => $post_text,
            'id' => $post_id

        ]);

        if($execute) {
            $_SESSION['message'] = 'Duris ozgerdi';
        }
        else {
            $_SESSION['message'] = 'Ozgermedi';
        }

        header('Location: blog.php');

    }

?>
<body>
    <div class="container py-3">
        <h1 class="text-center mt-5">Изменить POST ID = <?= $post['id']?> </h1>
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <form class="container-fluid py-5" method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Загаловка</label>
                    <input type="hidden" name="id" value="<?= $post['id']?>">
                    <input type="text" class="form-control" name="title" value="<?= $post['title'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <textarea class="form-control" rows="3" name="text"> <?= $post['text']?> </textarea>
                    <input type="submit" class="btn btn-primary mt-3" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require 'includes/footer.php'; ?>