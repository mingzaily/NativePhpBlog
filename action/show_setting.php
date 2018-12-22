<?php
    if(isset($_GET['id']))
    {
        require_once('connectionAction.php');

        $theme_id=$_GET['id'];
        //查询部分专题
        $sql="SELECT * FROM users WHERE user_id={$_GET['id']}";
        $result=$mysqli->query($sql);
        $row=$result->fetch_assoc();
        $result->free();
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>