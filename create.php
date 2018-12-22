<?php
    require_once('action/show_theme.php');
    require_once('layout/header.php');
    if(!isset($_SESSION['user_name']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }
?>

<div class="container">
    <div class="blog-header"></div>  
    <div class="row">
        <!-- 输入框 start -->
        <div class="col-sm-12 blog-main">
            <form action="javascript:void(0)" id="form-create" method="POST" onsubmit="create()">
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="这里是标题" id="title" required="required">
                </div>
                <div class="form-group">
                    <label>专题</label>
                    <br>
                    <select name="theme" style="font-size:16px;">
                        <?php
                            $theme_id=1;
                            $theme_id=$_GET['theme'];
                            while($row=$result->fetch_assoc())
                            {
                                if($row['theme_id']==$theme_id)
                                {
                                    echo "<option value='{$row['theme_id']}' selected>{$row['theme_name']}</option>";
                                }
                                else
                                {
                                    echo "<option value='{$row['theme_id']}'>{$row['theme_name']}</option>";
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
        <!-- 输入框 end -->
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
</script>
<script>
    function create() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/createAction.php",
            type:"post",
            data:$('#form-create').serialize(),
            success: function (result) {
                window.location.href='articles.php?id='+result
            },
            error : function(result) {
                console.log(result)
            }
        });
    }
</script>

<?php
    $result->free();
    require_once('layout/footer.php');
?>
