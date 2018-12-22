<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="个人博客">
    <meta name="author" content="Ming">

    <title>个人博客</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/wangEditor.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>

<body>
<div class="blog-masthead">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a class="blog-nav-item" href="index.php">首页</a>
            </li>
            <li>
                <a class="blog-nav-item" href="create.php">写文章</a>
            </li>
            <li>
                <a class="blog-nav-item" href="notices.php">通知</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                    <?php
                        if(isset($_SESSION['user_name']))
                        {
                            echo <<<TR
                            <a href="#" class="dropdown-toggle blog-nav-item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {$_SESSION['user_name']}
                                <span class="caret"></span>
                            </a>
TR;
                        }
                        else
                        {
                            echo <<<TR
                            <a href="login.php" class="dropdown-toggle blog-nav-item">
                                请登录
                            </a>
TR;
                        }
                    ?>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#">我的主页</a></li> -->
                    <li><a href="setting.php?id=<?php echo $_SESSION['user_id'] ?>">个人设置</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0)" id="quit_action" onclick="quit()">退出</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>