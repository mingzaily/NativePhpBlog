<footer class="blog-footer">
    <p>博客样式 by <a href="http://getbootstrap.com">Bootstrap</a></p>
    <p>
        <a href="#">@PRT 返回首页 </a>
    </p>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function quit() {
        $.ajax({
        //几个参数需要注意一下
            url:"action/quitAction.php",
            success: function (result) {
                location.reload()
            },
            error : function(result) {
                console.log(result)
            }
        });
    }
</script>
</body>
</html>