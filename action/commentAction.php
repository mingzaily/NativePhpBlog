<?php
    if(isset($_POST['article_id']) and isset($_POST['content']))
    {
        session_start();
        if(isset($_SESSION['user_id']))
        {
            require_once('connectionAction.php');

            $article_id=$_POST['article_id'];
            $content=$_POST['content'];
            $user_id=$_SESSION['user_id'];
            
            $insert_sql="INSERT INTO comment VALUES(NULL,'{$user_id}','{$article_id}','{$content}',current_timestamp())";
            $mysqli->query($insert_sql);

            $select_sql="SELECT article_comment FROM articles WHERE article_id={$article_id}";
            $select_result=$mysqli->query($select_sql);
            $fetch=$select_result->fetch_assoc();

            $num=$fetch['article_comment'];
            $num++;
            $update_sql="UPDATE articles SET article_comment={$num} WHERE article_id={$article_id}";
            $mysqli->query($update_sql);
            

            echo "发表成功";
        }
        else
        {
            echo "请登录";
        }
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>