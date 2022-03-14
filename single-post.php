<?php
require_once('db.php');
ini_set('display_errors', 1);

$sqlGetPostById = "SELECT * FROM posts WHERE posts.id = '{$_GET['id']}'";
$post = getDataFromServer($sqlGetPostById, $connection, false);

$sqlGetCommentsByPostId = "SELECT * FROM comments WHERE post_id = '{$_GET['id']}'";
$comments = getDataFromServer($sqlGetCommentsByPostId, $connection);

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog - single post</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

    <header>

        <?php include 'header.php' ?>

    </header>

    <main role="main" class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <a href="" class="blog-post-title">
                        <h2><?php echo $post['title'] ?></h2>
                    </a>
                    <p class="blog-post-meta"><?php echo date_format(date_create($post['created_at']), 'd-F-Y') ?> by <a href="#"><?php echo $post['author'] ?></a></p>
                    <p><?php echo $post['body'] ?></p>
                </div><!-- /.blog-post -->

                <div class='comments-container'>
                    <h3>Comments:</h3>
                    <ul class='comment-list'>
                        <?php foreach ($comments as $comment) { ?>
                            <li class='comment-item'>
                                <h4><?php echo $comment['author'] ?></h4>
                                <p><?php echo $comment['text'] ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div><!-- /.blog-main -->

            <?php include 'sidebar.php' ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">

        <?php include 'footer.php' ?>

    </footer>
</body>

</html>