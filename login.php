<?php
    require_once('layout/header.php');
?>

<div class="container">
    <!-- 登陆输入框 start -->
    <form class="form-signin" onsubmit="login()" id="form-login" method="POST" action="javascript:void(0)">
        <h2 class="form-signin-heading">请登录</h2>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="请输入邮箱" required autocomplete="false">
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="请输入密码" required>
        <button class="btn btn-primary btn-block" type="submit">登陆</button>
        <a href="register.php" class="btn btn-primary btn-block" type="submit">去注册?</a>
    </form>
    <!-- 登陆输入框 end --> 
</div>

<script type="text/javascript">
    function login() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/loginAction.php",
            type:"post",
            data:$('#form-login').serialize(),
            success: function (result) {
                console.log(result)
                if(result=="登录成功")
                {
                    window.location.href='index.php'
                }
                else if(result=="用户名或密码错误")
                {
                    alert("用户名或密码错误");
                }
                else if(result=="没有该账号")
                {
                    alert("没有该账号");
                }
                else
                {
                    alert("输入不能为空");
                }
            },
            error : function(result) {
                alert("异常错误");
            }
        });
    }
</script>
<?php
    require_once('layout/footer.php');
?>
