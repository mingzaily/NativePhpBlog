<?php
    if(isset($_POST['article_id']))
    {
        require_once('connectionAction.php');
        $article_id=$_POST['article_id'];

        $sql="DELETE FROM articles WHERE article_id={$article_id}";
        
        if($mysqli->query($sql))
            echo "成功";
        else
            echo "失败";
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>