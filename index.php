<?php
    require_once('action/show_index.php');
    require_once('layout/header.php');
?>

<div class="container">
    <div class="blog-header"></div>
    <div class="row">
        <!-- 左列 文本和轮播图 start -->
        <div class="col-sm-8 blog-main">
            <!-- 轮播图 start -->
            <div>
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol><!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="http://ww1.sinaimg.cn/large/44287191gw1excbq6tb3rj21400migrz.jpg" alt="..." />
                            <div class="carousel-caption">...</div>
                        </div>
                        <div class="item">
                            <img src="http://ww3.sinaimg.cn/large/44287191gw1excbq5iwm6j21400min3o.jpg" alt="..." />
                            <div class="carousel-caption">...</div>
                        </div>
                        <div class="item">
                            <img src="http://ww2.sinaimg.cn/large/44287191gw1excbq4kx57j21400migs4.jpg" alt="..." />
                            <div class="carousel-caption">...</div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- 轮播图 end -->
            <div style="height: 20px;"></div>
            <div>
                <?php
                    while($row=$result->fetch_assoc())
                    {
                        echo <<<TR
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="articles.php?id={$row['article_id']}">{$row['article_title']}</a></h2>
                            <p class="blog-post-meta">{$row['article_time']} <a href="{$row['article_userid']}">{$row['user_name']}</a></p>
                            <p class="blog-post-meta">赞 {$row['article_good']}  | 评论 {$row['article_comment']}</p>
                        </div>
TR;
                    }
                ?>

                <ul class="pagination" style="padding-left:35%;">
                    <?php
                        if($page==1)
                        {
                            echo "<li class='disabled'><span>&laquo;</span></li>";
                        }
                        else
                        {
                            echo "<li><a href='index.php?page={$previous_page}' rel='previous'>&laquo;</a></li>";
                        }
                        echo "<li class='active'><span>{$page}</span></li>";
                        if($page==$page_count)
                        {
                            echo "<li class='disabled'><span>&raquo;</span></li>";
                        }
                        else
                        {
                            echo "<li><a href='index.php?page={$next_page}' rel='next'>&raquo;</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- 左列 文本和轮播图 end -->
        <!-- 右列 网站简介 start -->
        <div>
            <?php
                require_once('layout/right.php');
            ?>
        </div>
        <!-- 右列 网站简介 end -->
    </div>    
</div>

<?php
    $result->free();
    require_once('layout/footer.php');
?>
