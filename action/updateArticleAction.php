<?php
    if(isset($_POST['title']) and isset($_POST['content']) and isset($_POST['theme']))
    {
        session_start();
        require_once('connectionAction.php');
        
        $title=$_POST['title'];
        $theme_id=$_POST['theme'];
        $content=$_POST['content'] ;
        $article_id=$_POST['article_id'];
    
        $sql="UPDATE articles SET article_title='{$title}',article_themeid='{$theme_id}',article_content='{$content}' WHERE article_id={$article_id}";
        $mysqli->query($sql);
        
        $data = array("type"=>"Yes","id"=>$article_id);

        $res_data=json_encode($data);

        echo $res_data;
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>