<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['author'])) {

        $sqlWriteNewPost = "INSERT INTO posts (title, body, author, created_at) 
        VALUES ('{$_POST['title']}', '{$_POST['body']}', '{$_POST['author']}', NOW())";
        setDataToServer($sqlWriteNewPost, $connection);
    }
}

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
            <div class='col-sm-8 blog-main'>
                <form class='new-post-form' action="create-post.php" method="post">
                    <input type="text" name="author" id="" placeholder="Enter your name" required>
                    <input type="text" name="title" id="" placeholder="Enter post title" required>
                    <textarea name="body" id="" cols="50" rows="5" placeholder="Enter some text..." required></textarea>
                    <input type="Submit" value="Add new post">
                </form>
            </div>

            <?php include 'sidebar.php' ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">

        <?php include 'footer.php' ?>

    </footer>
</body>

</html>