<?php
    if(isset($_POST['email']) and isset($_POST['password']))
    {
        require_once('connectionAction.php');
        $useremail=$_POST['email'];
        $password=$_POST['password'];
        $password_md5=md5($password);

        $sql="select * from users where user_email='{$useremail}'";

        $result=$mysqli->query($sql);
        if($mysqli->affected_rows)
        {
            while($row=$result->fetch_assoc())
            {
                if($row['user_password']==$password_md5)
                {
                    session_start();
                    $_SESSION['user_name']=$row['user_name'];
                    $_SESSION['user_id']=$row['user_id'];

                    echo "登录成功";
                }
                else
                {
                    echo "用户名或密码错误";
                }
            }
        }
        else
        {
            echo "没有该账号";
        }
        $result->free();
    }
    else
    {
        echo "<script>window.alert('输入不能为空');window.location.href='../index.php';</script>";
    }
?>