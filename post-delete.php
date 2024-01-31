<?php 
require 'includes/database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $post_id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE id=:id";
    $statement = $pdo->prepare($sql);

    $execute = $statement->execute([
        'id' => $post_id,
    ]);

    if($execute) {
        $_SESSION['message'] = 'Успешно удалено'; 
    }

    else {
        $_SESSION['message'] = 'Не удалено';
    }

    header('Location: blog.php');
}


// test($_GET);


?>