<?php
    require_once('action/show_articles.php');
    if(!isset($row))
    {
        echo "<script>window.location.href='index.php'</script>";
    }
    require_once('layout/header.php');
?>

<div class="container">
    <div class="blog-header"></div>
    <div class="row">
        <!-- 左列 文章和评论 start -->
        <div class="col-sm-8 blog-main">
            <!-- 文章 start -->
            <div class="blog-post">
                <?php
                    echo <<<TR
                    <div style="display:inline-flex">
                        <h2 class="blog-post-title">{$row['article_title']}</h2>
TR;
                    if(isset($_SESSION['user_id']))
                    {
                        if($_SESSION['user_id']==$row['article_userid'])
                        {
                        echo <<<TR
                            <a style="margin: auto"  href="edit.php?id={$_GET['id']}">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <a style="margin: auto"  href="javascript:void(0)" onclick="deletes()">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>        
TR;
                        }
                    }
                    echo <<<TR
                    </div>
                    <p class="blog-post-meta">{$row['article_time']} <a href="users.php?id={$row['article_userid']}">{$row['user_name']}</a></p>
                    <div>
                        {$row['article_content']}
                    </div>
                    <br>
TR;
                ?>
                <div>
                    <form id="form_zan" onsubmit="return false" action="javascript:void(0)" method="post">
                        <input type="hidden" id="article_id" name="article_id" value="<?php echo $_GET['id'] ?>">
                        <button type="submit" class="btn btn-primary btn" onclick="zan()">赞</button>
                        <span id="article_good"><?php echo $row['article_good'] ?></span>
                    </form>
                </div>
            </div>
            <!-- 文章 end -->
            <!-- 评论 end -->
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">评论</div>
                <!-- List group -->
                <ul class="list-group" id="article_comment">
                    <?php 
                        if($mysqli->affected_rows)
                        {
                            while($fetch=$results->fetch_assoc())
                            {
                                echo <<<TR
                                <li class="list-group-item">
                                    <h5>{$fetch['user_name']} 在 {$fetch['comment_time']} 发表</h5>
                                    <div>
                                        {$fetch['comment_text']}
                                    </div>
                                </li>
TR;
                            }
                        }
                        else
                        {
                            echo <<<TR
                            <li class="list-group-item">
                                <h5>暂无评论，欢迎发表</h5>
                            </li>
TR;
                        }
                    ?>
                    
                </ul>
            </div>
            <!-- 评论 end -->
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">发表评论</div>

                <!-- List group -->
                <ul class="list-group">
                    <form onsubmit="comment()" method="post" id="form_comment" action="javascript:void(0)">
                        <input type="hidden" name="article_id" value="<?php echo $_GET['id'] ?>"/>
                        <li class="list-group-item">
                            <textarea id="form_textarea" name="content" class="form-control" rows="10" style="resize:none;" required></textarea>
                            <button class="btn btn-default" type="submit">提交</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
        <!-- 左列 文章和评论 end -->
        <!-- 右列 网站简介 start -->
        <?php
            require_once('layout/right.php');
        ?>
        <!-- 右列 网站简介 end -->
    </div>    
</div>

<!-- 点赞 -->
<script type="text/javascript">
    function zan() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/goodAction.php",
            type:"post",
            data:$('#form_zan').serialize(),
            success: function (result) {
                if(result=="请登录")
                {
                    window.location.href='login.php';
                }
                else
                {
                    $("#article_good").load(location.href+" #article_good");
                    //$("#article_good").text(result)
                    //location.reload()
                }
            },
            error : function(result) {
                console.log(result)
                alert("点赞失败");
            }
        });
    };
</script>
<!-- 删除 -->
<script type="text/javascript">
    function deletes() {
        if (confirm("此文章删除无法撤销，确定继续吗？"))
        {
            $.ajax({
            //几个参数需要注意一下
                url:"action/deleteArticleAction.php",
                type:"post",
                data:{
                    article_id:'<?php echo $_GET['id'] ?>'
                },
                success: function (result) {
                    if(result=="成功")
                    {
                        window.location.href='index.php';
                    }
                    else
                    {
                        alert('异常错误');
                    }
                },
                error : function(result) {
                    console.log(result)
                    alert("点赞失败");
                }
            });
        }
    };
</script>
<!-- 发表评论 -->
<script>
    function comment() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/commentAction.php",
            type:"post",
            data:$('#form_comment').serialize(),
            success: function (result) {
                if(result=="请登录")
                {
                    window.location.href='login.php';
                }
                else if(result=="发表成功")
                {
                    $("#article_comment").load(location.href+" #article_comment");
                    $("#form_textarea").val("");
                }
                else
                {
                    alert("异常")
                }
            },
            error : function(result) {
                console.log(result)
            }
        });
    };
</script>
<?php
    $result->free();
    $results->free();
    require_once('layout/footer.php');
?>
