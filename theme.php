<?php
    require_once('action/show_theme_articles.php');
    require_once('layout/header.php');
?>

<div class="container">
    <div class="blog-header"></div>
    <div class="row">
        <!-- 左列 文本和轮播图 start -->
        <div class="col-sm-8">
            <blockquote>
                <?php
                    $sum=0;
                    while($fetch=$sums->fetch_assoc())
                    {
                        $name=$fetch['theme_name'];
                        $sum++;
                    }
                    echo "<p>{$name}</p>";
                    echo "<footer>文章：{$sum}</footer>";
                ?>
                <br>
                <a class="btn btn-default topic-submit" href="create.php?theme=<?php echo $theme_id ?>">
                    投稿
                </a>
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php
                            while($row=$result->fetch_assoc())
                            {
                                echo <<<TR
                                <div class="blog-post" style="margin-top: 30px">
                                    <p class=""><a href="user.php?id={$row['article_userid']}">{$row['user_name']}</a> {$row['article_time']}</p>
                                    <p class=""><a href="articles.php?id={$row['article_id']}">{$row['article_title']}</a></p>
                                </div>
TR;
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- 左列 文本和轮播图 end -->
        <!-- 右列 网站简介 start -->
        <?php
            require_once('layout/right.php');
        ?>
        <!-- 右列 网站简介 end -->
    </div>    
</div>

<?php
    $result->free();
    require_once('layout/footer.php');
?>
