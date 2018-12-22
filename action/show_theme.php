<?php
    require_once('connectionAction.php');

    //查询所有专题
    $sql="select * from theme";
    $result=$mysqli->query($sql);

?>