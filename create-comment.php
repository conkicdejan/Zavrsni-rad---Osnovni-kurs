<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['author']) && !empty($_POST['text']) && !empty($_POST['postid'])) {
        $sqlWriteNewComment = "INSERT INTO comments (author_id, text, post_id) 
        VALUES ('{$_POST['author']}', '{$_POST['text']}', '{$_POST['postid']}')";
        setDataToServer($sqlWriteNewComment, $connection);
    }
}
header("Location: single-post.php?id={$_POST['postid']}");
