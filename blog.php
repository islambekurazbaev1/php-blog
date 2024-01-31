<head>
    <?php 
    session_start();

    $title = 'Блогы';
    require 'includes/css.php';
    require 'includes/database.php';
    // test($_SESSION);
    $sql = "SELECT * FROM posts";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $posts = $statement->fetchAll();
    // echo  "<pre>";
    // print_r($posts);
    // echo  "</pre>";
?>
</head>

<body>
    <?php require 'includes/navbar.php'; ?>

    <main>

        <section class="py-3 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Блогы</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                        creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                        entirely.</p>
                    <p>
                        <a href="post-create.php" class="btn btn-primary my-2">Добавить POST</a>
                        <a href="index.php" class="btn btn-secondary my-2">Главный экран</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <?php if(isset($_SESSION['message'])):?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
                <?php endif; ?>
                <?php 
                    unset($_SESSION['message']);
                ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($posts as $post): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Blog"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                    dy=".3em">Blog</text>
                            </svg>
                            <div class="card-body">
                                <h4><a class="text-decoration-none"
                                        href="post-show.php?id=<?php echo $post['id']?>"><?php echo $post['title'] ?></a>
                                </h4>
                                <p class="card-text"><?= $post['text'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="post-edit.php?id=<?= $post['id']?>" type="button"
                                            class="btn btn-primary">Изменить</a>
                                        <a href="post-delete.php?id=<?= $post['id'] ?>" type="button"
                                            class="btn btn-danger">Удалить</a>
                                    </div>
                                    <small>
                                        <?= $post['created_at'] ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                    <script>
                    function truncateText() {
                        var text = document.getElementById("text").innerHTML;
                        var truncated = text.substring(0, 20) + "...";
                        document.getElementById("text").innerHTML = truncated;
                    }
                    </script>

                </div>
            </div>
        </div>

    </main>

    <?php require 'includes/footer.php'; ?>

</body>

</html>