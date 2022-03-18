<?php
require_once('db.php');

$sqlGetPostById = "SELECT posts.*, author.first_name, author.last_name, author.gender FROM posts
LEFT JOIN author ON posts.author_id = author.id
WHERE posts.id = '{$_GET['id']}'";
$post = getDataFromServer($sqlGetPostById, $connection, false);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['body'])) {

        $sqlUpdatePost = "UPDATE posts 
        SET title = '{$_POST['title']}',
        body = '{$_POST['body']}',
        modify_at = NOW()
        WHERE id = '{$_POST['id']}'";
        setDataToServer($sqlUpdatePost, $connection);

        header("Location: index.php");
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

    <title>Vivify Blog - create post</title>

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
                <form class='new-post-form' action="edit-post.php" method="post">
                    Edit post:
                    <select name="author" id="" disabled>
                        <option value="" selected disabled hidden><?php echo "{$post['first_name']} {$post['last_name']}" ?></option>
                    </select>
                    <input type="hidden" name="id" value=<?php echo $_GET['id'] ?>>
                    <input type="text" name="title" id="" placeholder="Enter post title" required value='<?php echo $post['title'] ?>'>
                    <textarea name="body" id="" cols="50" rows="5" placeholder="Enter some text..." required><?php echo $post['body'] ?></textarea>
                    <input type="Submit" value="Edit post">
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