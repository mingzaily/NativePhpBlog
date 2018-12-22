<?php
    if(isset($_POST['email']) and isset($_POST['name']) and isset($_POST['password']) and isset($_POST['password_confirmation']))
    {
        require_once('connectionAction.php');
        $username=$_POST['name'];
        $useremail=$_POST['email'];
        $password=$_POST['password'];
        $password_md5=md5($password);

        $sql="select * from users where user_email='{$useremail}'";
        $result=$mysqli->query($sql);
        $fetch=$result->fetch_array();
        if(!isset($fetch))
        {
            $insert_sql="INSERT INTO users VALUES(NULL,'{$useremail}','{$username}','{$password_md5}')";
            $mysqli->query($insert_sql);

            echo "注册成功";
        }
        else
        {
            echo "邮箱已被注册";
        }
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.history.go(-1);</script>";
    }

    $result->free();
?>