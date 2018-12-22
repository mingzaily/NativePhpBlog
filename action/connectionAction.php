<?php
    date_default_timezone_set('PRC');
    //1、连接数据库
    $hostname='127.0.0.1';
    $hostuser='root';//数据库管理员
    $hostpassword='mingzai';//密码

    $mysqli=new mysqli($hostname,$hostuser,$hostpassword);

    /* check connection */
    if (mysqli_connect_errno()) 
    {
        printf("数据库连接错误:%s\n", mysqli_connect_error());
        exit();
    }

    /* change db to world db */
    $mysqli->select_db("boke");
    $mysqli->query("set names utf8")

?>