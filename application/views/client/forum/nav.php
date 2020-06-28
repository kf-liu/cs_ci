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

    .navul .caidan{
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

    <a class="navbar-brand" href="#">资讯评论 · 主页</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto navul">
            <li class="nav-item active">
                <a class="nav-link caidan" href="#">所有资讯<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link caidan" href="#">看评论</a>
            </li>
            <li class="nav-item dropdown show caidanli" id="my">
                <a class="nav-link caidan" role="button">我的</a>
                <!-- <div id="my-xiala" class="dropdown-menu show" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start">
                    <a class="dropdown-item" href="#">主页</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">评论</a>
                    <a class="dropdown-item" href="#">收藏</a>
                    <a class="dropdown-item" href="#">点赞</a>
                </div> -->
                <a class="nav-link xiala" role="button">『</a>
                <a class="nav-link xiala" role="button">主页</a>
                <a class="nav-link xiala" role="button">评论</a>
                <a class="nav-link xiala" role="button">收藏</a>
                <a class="nav-link xiala" role="button">点赞</a>
                <a class="nav-link xiala" role="button">』</a>
            </li>
            <li class="nav-item caidanli" id="others">
                <a class="nav-link caidan" role="button">其他</a>
                <a class="nav-link xiala" role="button">『</a>
                <a class="nav-link xiala" role="button">管理员登录</a>
                <a class="nav-link xiala" role="button">』</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>