<?php
    if(isset($_GET['id']))
    {
        require_once('connectionAction.php');
        //查询文章相关信息
        $sql="SELECT * FROM articles WHERE article_id={$_GET['id']}";
        $result=$mysqli->query($sql);
        $row=$result->fetch_assoc();

        //查询所有专题
        $theme_sql="select * from theme";
        $all_theme=$mysqli->query($theme_sql);

    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
    
?>