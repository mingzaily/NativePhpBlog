<?php
    if(isset($_POST['article_id']))
    {
        session_start();
        if(isset($_SESSION['user_id']))
        {
            require_once('connectionAction.php');

            $article_id=$_POST['article_id'];

            $select_sql="SELECT article_good FROM articles WHERE article_id={$article_id}";
            $select_result=$mysqli->query($select_sql);
            $fetch=$select_result->fetch_assoc();

            $num=$fetch['article_good'];
            $num++;
            $sql="UPDATE articles SET article_good={$num} WHERE article_id={$article_id}";
            $mysqli->query($sql);

            echo $num;
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