<?php
    if(isset($_POST['title']) and isset($_POST['content']) and isset($_POST['theme']))
    {
        session_start();
        require_once('connectionAction.php');
        
        $title=$_POST['title'];
        $theme_id=$_POST['theme'];
        $content=$_POST['content'] ;
        $user_id=$_SESSION['user_id'];
    
        $sql="INSERT INTO articles VALUES(NULL,'{$user_id}','{$theme_id}','{$title}','{$content}',current_timestamp(),0,0)";
        $mysqli->query($sql);
        
        $select_sql="SELECT max(article_id) AS new_article_id  FROM articles WHERE article_userid='{$_SESSION['user_id']}'";
        $result=$mysqli->query($select_sql);
        $row=$result->fetch_assoc();
        $result->free();

        echo "{$row['new_article_id']}";
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>