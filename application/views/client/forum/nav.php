<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="https://bootswatch.com/4/sketchy/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style type="text/css">
    body,
    .bg {
        /* background-color: #d8e3f6 !important; */
        background-color: #eee !important;
    }

    #my-xiala {
        display: none;
    }

    #my:hover #my-xiala {
        display: block;
    }

    .navul .caidan {
        display: inline;
    }

    .xiala {
        display: none;
        font-weight: normal;
    }

    .caidanli:hover .xiala {
        display: inline;
    }
</style>

<hr style="margin-top:3px;">
<nav class="navbar navbar-expand-lg navbar-light bg-light bg" id="">

    <a class="navbar-brand" href="<?php echo site_url('client/forum') ?>">资讯评论 · 主页</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto navul">
            <li class="nav-item active">
                <a class="nav-link caidan" href="<?php echo site_url('client/forum/allNews') ?>">所有资讯<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link caidan" href="<?php echo site_url('client/forum/allComments') ?>">看评论</a>
            </li>
            <li class="nav-item dropdown show caidanli" id="my">
                <a class="nav-link caidan" role="button" href="<?php echo site_url('client/forum/myHome') ?>">我的</a>
                <a class="nav-link xiala" role="button">『</a>
                <a class="nav-link xiala" role="button" href="<?php echo site_url('client/forum/myNews') ?>">发布</a>
                <a class="nav-link xiala" role="button" href="<?php echo site_url('client/forum/myComments') ?>">评论</a>
                <a class="nav-link xiala" role="button" href="<?php echo site_url('client/forum/myStar') ?>">收藏</a>
                <a class="nav-link xiala" role="button" href="<?php echo site_url('client/forum/myLike') ?>">点赞</a>
                <a class="nav-link xiala" role="button">』</a>
            </li>
            <li class="nav-item caidanli" id="others">
                <a class="nav-link caidan" role="button">其他</a>
                <a class="nav-link xiala" role="button">『</a>
                <a class="nav-link xiala" role="button" onclick="page('/client/forum/allNews')">管理员登录</a>
                <a class="nav-link xiala" role="button">』</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo site_url('client/forum/search') ?>" id="searchForm">
            <?php if (isset($_SESSION['client'])) echo "用户 " . $_SESSION['client_name'];
            else echo "<a href='" . site_url('client/forum/index/loging') . "'>登录</a>" . "<a href='" . site_url('client/forum/index/registering') . "'>/注册</a>"; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="keywords" id="keywords" class="form-control mr-sm-2" type="text" placeholder="Search" value="<?php echo set_value('keywords');?>">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit" onclick="" id="searchBtn">Search</button>
        </form>
    </div>
</nav>
<div id="below" width="100%">
    <script>
        function page($url) {
            $.ajax({
                url: '<?php echo site_url(); ?>' + $url,
                success: function(result) {
                    $("#below").html(result);
                }
            });
        }

        function search() {
            $.ajax({
                //几个参数需要注意一下
                type: "GET", //方法类型
                dataType: "array", //预期服务器返回的数据类型
                url: "<?php echo site_url('client/forum/search') ?>", //url
                data: $('#searchForm').serialize(),
                success: function(result) {
                    console.log(result); //打印服务端返回的数据(调试用)
                    if (result.resultCode == 200) {
                        alert("SUCCESS");
                    };
                },
                error: function() {
                    alert("异常！");
                }
            });
        }
    </script>