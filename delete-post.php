<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['postid'])) {
        $sqlDeleteComments = "DELETE FROM comments WHERE post_id = '{$_POST['postid']}'";
        setDataToServer($sqlDeleteComments, $connection);
        $sqlDeletePost = "DELETE FROM posts WHERE id = '{$_POST['postid']}'";
        setDataToServer($sqlDeletePost, $connection);
    }
}
header("Location: index.php");
