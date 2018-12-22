<?php
    require_once('connectionAction.php');
    $sql="SELECT count(*) FROM articles INNER JOIN users on articles.article_userid=users.user_id";
    $result=$mysqli->query($sql);
    $num=$result->fetch_row();

    $page_size=5;//定义每页显示的记录数
    $totalNum=$num[0];//总记录数
    $page_count=ceil($totalNum/$page_size);//总页数
    //当前显示页
    if(!isset($_GET['page']))
    {
        $page=1;
    }
    else
    {
        $page=$_GET['page'];
    }
    //上一页，下一页
    $previous_page=$page-1;
    $next_page=$page+1;
    //当前页数大雨总页数，把当前页定义为总页数
    if($page<=1)
    {
        $page=1;
        $previous_page=1;
    }
    if($page>=$page_count)
    {
        $page=$page_count;
        $next_page=$page_count;
    }
    //当前页的第一条记录
    $f_pageNum=$page_size*($page-1);

    $sql_after="SELECT * FROM articles INNER JOIN users ON articles.article_userid=users.user_id LIMIT {$f_pageNum},{$page_size}";

    $result=$mysqli->query($sql_after)
?>