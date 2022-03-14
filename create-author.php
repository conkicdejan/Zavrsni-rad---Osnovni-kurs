<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['gender'])) {

        $sqlWriteNewPost = "INSERT INTO author (first_name, last_name, gender) 
        VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['gender']}')";
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
                <form class='new-post-form' action="create-author.php" method="post">
                    <h4>Create new author</h4>
                    <input type="text" name="firstname" id="" placeholder="Enter first name" required>
                    <input type="text" name="lastname" id="" placeholder="Enter last name" required>
                    <div class='new-author-gender'>
                        <input type="radio" name="gender" value='M' id="m">
                        <label for="m">M</label>
                        <input type="radio" name="gender" value='F' id="f">
                        <label for="f">F</label>
                    </div>
                    <input type="Submit" value="Add new author">
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