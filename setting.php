<?php
    require_once('action/show_setting.php');
    require_once('layout/header.php');
    if(!isset($_SESSION['user_name']))
    {
        echo "<script>window.location.href='login.php'</script>";
    }
    if(!isset($row))
    {
        echo "<script>window.location.href='index.php'</script>";
    }
?>

<div class="container">
    <div class="blog-header"></div>
    <div class="row">
        <!-- 左列 设置 start -->
        <div class="col-sm-8 blog-main">
            <form class="form-horizontal" id="form-update" action="javascript:void(0)" onsubmit="update()">
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="name" type="text" value="<?php echo $row['user_name'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="password" type="password" value="<?php echo $row['user_password'] ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">修改</button>
            </form>
            <br>

        </div>
        <!-- 左列 设置 end -->
        <!-- 右列 网站简介 start -->
        <?php
            require_once('layout/right.php');
        ?>
        <!-- 右列 网站简介 end -->
    </div>    
</div>

<script type="text/javascript">
    function update() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/updateUserAction.php",
            type:"post",
            data:$('#form-update').serialize(),
            success: function (result) {
                console.log(result)
                if(result=="修改成功")
                {
                    location.reload();
                }
                else
                {
                    alert("输入不能为空");
                }
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
