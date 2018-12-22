<?php
    require_once('layout/header.php');
?>

<div class="container">
    <!-- 注册输入框 start -->
    <form action="javascript:void(0)" class="form-signin" id="form-register" method="POST" onsubmit="return register()">
        <h2 class="form-signin-heading">请注册</h2>
        <label for="name" class="sr-only">名字</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="请输入用户名" required autocomplete="false">
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="请输入邮箱" required autocomplete="false">
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="请输入密码" required>
        <label class="sr-only">重复密码</label>
        <input type="password" name="password_confirmation" id='passwordConfrim' class="form-control" placeholder="请重复输入密码" required></span>
        <button class="btn btn-primary btn-block" type="submit" id='button'>注册</button>
    </form>
    <!-- 注册输入框 end --> 
</div>

<script type="text/javascript">
    function register() {
        var pwd1 = document.getElementById("inputPassword").value;
        var pwd2 = document.getElementById("passwordConfrim").value;
    
        <!-- 对比两次输入的密码 -->
        if(pwd1 != pwd2)
        {
            alert('两次密码不一致');
            return false;
        }
        else
        {
            $.ajax({
            //几个参数需要注意一下
                url:"action/registerAction.php",
                type:"post",
                data:$('#form-register').serialize(),
                success: function (result) {
                    console.log(result)
                    if(result=="注册成功")
                    {
                        window.location.href='login.php'
                    }
                    else if(result=="邮箱已被注册")
                    {
                        alert("邮箱已被注册");
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
    }
</script>
<?php
    require_once('layout/footer.php');
?>
