<?php
    if(isset($_POST['name']) and isset($_POST['password']))
    {
        session_start();
        require_once('connectionAction.php');
        
        $name=$_POST['name'];
        $password=$_POST['password'];
        $password_md5=md5($password);
        $user_id=$_SESSION['user_id'];
    
        $sql="UPDATE users SET user_name='{$name}',user_password='{$password_md5}' WHERE user_id={$user_id}";
        $mysqli->query($sql);
        
        $_SESSION['user_name']=$name;

        echo "修改成功";
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>