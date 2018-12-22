<?php
    require_once('action/show_edit.php');
    require_once('layout/header.php');
    if(!isset($_SESSION['user_name']))//判断是否登陆
    {
        echo "<script>window.location.href='login.php'</script>";
    }
    if($_SESSION['user_id']!=$row['article_userid'])//判定登陆是否是本文作者
    {
        echo "<script>window.alert('非法入侵')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
    if(!isset($row))//判断是否要该文章
    {
        echo "<script>window.location.href='index.php'</script>";
    }
?>

<div class="container">
    <div class="blog-header"></div>  
    <div class="row">
        <!-- 左列 输入框 start -->
        <div class="col-sm-12 blog-main">
            <form action="javascript:void(0)" id="form-update" method="POST" onsubmit="update()">
                <div class="form-group">
                    <label>标题</label>
                    <input type="hidden" name="article_id" value="<?php echo $_GET['id'] ?>">
                    <input name="title" type="text" class="form-control" placeholder="这里是标题" id="title" required="required" value="<?php echo $row['article_title'] ?>">
                </div>
                <div class="form-group">
                    <label>专题</label>
                    <br>
                    <select name="theme" style="font-size:16px;">
                        <?php
                            while($theme=$all_theme->fetch_assoc())
                            {
                                if($theme['theme_id']==$row['article_theme_id'])
                                {
                                    echo "<option value='{$theme['theme_id']}' selected>{$theme['theme_name']}</option>";
                                }
                                else
                                {
                                    echo "<option value='{$theme['theme_id']}'>{$theme['theme_name']}</option>";
                                }
                                    
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="content" id='content'>
                    <label>内容</label>
                    <div id="edit" style="background-color: #f1f1f1;border: 1px solid #ccc;">
                    </div>
                    <div style="padding: 5px 0; color: #ccc"></div>
                    <div id="editor" style="border: 1px solid #ccc;height: 400px;"> <!--可使用 min-height 实现编辑区域自动增加高度-->
                    </div>
                </div>
                <button id='btn_sum' type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div>
        <!-- 左列 输入框 end -->
    </div>    
</div>

<script type="text/javascript" src="js/wangEditor.js"></script>
<script type="text/javascript">
    var E = window.wangEditor
    var editor = new E('#edit','#editor')
    editor.create()
    document.getElementById('btn_sum').addEventListener('click', function () {
        // 读取 html
        document.getElementById('content').value=editor.txt.html()
    }, false)
    <?php 
        if(isset($row['article_content']))
        {
            echo "editor.txt.html('{$row['article_content']}')";
        }
    ?>
</script>
<script type="text/javascript">
    function update() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/updateArticleAction.php",
            type:"post",
            data:$('#form-update').serialize(),
            success: function (result) {
                var obj = JSON.parse(result)
                if(obj.type=="Yes")
                {
                    window.location.href='articles.php?id='+obj.id
                }
            },
            error : function(result) {
                console.log(result)
            }
        });
    }
</script>
<?php
    $all_theme->free();
    $result->free();
    require_once('layout/footer.php');
?>
