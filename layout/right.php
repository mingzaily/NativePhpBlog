<?php
    require_once('action/show_theme.php')
?>
<div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <aside id="widget-welcome" class="widget panel panel-default">
        <div class="panel-heading">
            欢迎！
        </div>
        <div class="panel-body">
            <p>
                欢迎来仿简书论坛
            </p>
            <p>
                <strong><a href="https://www.jianshu.com" target="_black">简书网站</a></strong>
            </p>
        </div>
    </aside>
    <aside id="widget-categories" class="widget panel panel-default">
        <div class="panel-heading">
            专题
        </div>
        <ul class="category-root list-group">
            <?php
                while($row=$result->fetch_assoc())
                {
                    echo <<<TR
                    <li class="list-group-item">
                        <a href="theme.php?id={$row['theme_id']}">{$row['theme_name']}</a>
                    </li>
TR;
                }
            ?>
        </ul>
    </aside>
</div>