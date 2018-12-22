<?php
    if(isset($_GET['id']))
    {
        require_once('connectionAction.php');

        $theme_id=$_GET['id'];
        //查询部分专题
        $sql="SELECT * FROM articles INNER JOIN theme on articles.article_themeid=theme.theme_id INNER JOIN users on articles.article_userid=users.user_id WHERE article_themeid={$_GET['id']}";
	$sqls="SELECT * FROM theme WHERE theme_id={$_GET['id']}";
	$theme_name=$mysqli->query($sqls);
        $sums=$mysqli->query($sql);
        $result=$mysqli->query($sql);
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>
