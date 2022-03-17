<?php
require_once('db.php');
ini_set('display_errors', 1);

$sqlGetAuthors = "SELECT * FROM author";
$authors = getDataFromServer($sqlGetAuthors, $connection);

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

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
        <div class='filter-author-container'>
            <form class='sort' action="index.php" method="post">
                <select name="author" id="" required>
                    <option value=0 selected>All</option>
                    <?php foreach ($authors as $author) { ?>
                        <option value="<?php echo $author['id'] ?>"><?php echo "{$author['first_name']} {$author['last_name']}" ?></option>
                    <?php } ?>
                </select>
                <input type="Submit" value="Show posts">
            </form>
            Sort:
            <form class='sort' action="index.php" method="post">
                <input type="hidden" name="sort" value=true>
                <input class='sort-button' type="Submit" value="ᐱ" id='sort-up'>
            </form>
            <form class='sort' action="index.php" method="post">
                <input class='sort-button' type="Submit" value="ᐯ" id='sort-down'>
            </form>
        </div>


        <div class="row">
            <?php include 'posts.php' ?>

            <?php include 'sidebar.php' ?>

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">

        <?php include 'footer.php' ?>

    </footer>
</body>
    <script>
        var buttonUp = document.getElementById('sort-up');
        var buttonDown = document.getElementById('sort-down');
        if (<?php echo "'$sortType'" ?> == 'ASC') {
            buttonUp.className += ' active-sort-button';
        } else {
            buttonDown.className += ' active-sort-button';
        } 
    </script>
</html>