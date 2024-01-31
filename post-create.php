<?php
session_start();
$title = "Добавить Post";
// require 'includes/navbar.php';
require 'includes/css.php';
require 'includes/database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // var_dump($_POST);

        $title = $_POST['title'];
        $text = $_POST['text'];
   
        
        $statement = $pdo->prepare("INSERT INTO posts (title, text) VALUES (:title, :text)");
        $execute = $statement->execute([
            'title' => $title,
            'text' => $text,
        ]);

        if($execute) {
            $_SESSION['message'] = 'Cоздано успешно';
        }
        else {
            $_SESSION['message'] = 'Не создано';
        }
        
        header('Location: blog.php');

    }


?>
<body>
    <div class="container py-3">
        <h1 class="text-center mt-5">Добавить POST</h1>
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <form class="container-fluid py-5" method="POST" action="#">
                <div class="mb-3">
                    <label class="form-label">Загаловка</label>
                    <input type="text" class="form-control" name="title" require />
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <textarea class="form-control" rows="3" name="text"></textarea>
                    <input type="submit" class="btn btn-primary mt-3" name="message">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php require 'includes/footer.php'; ?>