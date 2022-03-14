<?php
require_once('db.php');

$sqlGetAllPosts = "SELECT * FROM posts ORDER BY created_at DESC";
$posts = getDataFromServer($sqlGetAllPosts, $connection);

?>

<div class="col-sm-8 blog-main">
    <?php foreach ($posts as $post) { ?>
        <div class="blog-post">
            <a href="single-post.php?id=<?php echo $post['id'] ?>" class="blog-post-title">
                <h2><?php echo $post['title'] ?></h2>
            </a>
            <p class="blog-post-meta"><?php echo date_format(date_create($post['created_at']), 'd-F-Y') ?> by <a href="#"><?php echo $post['author'] ?></a></p>
            <p><?php echo $post['body'] ?></p>
        </div><!-- /.blog-post -->
    <?php } ?>

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div><!-- /.blog-main -->