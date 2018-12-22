<?php
    if(isset($_GET['id']))
    {
        require_once('connectionAction.php');

        //文章
        $sql="SELECT * FROM articles INNER JOIN users ON articles.article_userid=users.user_id WHERE article_id={$_GET['id']}";
        $result=$mysqli->query($sql);
        $row=$result->fetch_assoc();

        //评论
        $sql="SELECT * FROM comment INNER JOIN users ON comment.user_id=users.user_id WHERE article_id={$_GET['id']}";
        $results=$mysqli->query($sql);
    }
    else
    {
        echo "<script>window.location.href='../index.php';</script>";
    }
    
?>