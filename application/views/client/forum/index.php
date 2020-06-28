<style type="text/css">
    #left {
        width: 20%;
        margin: 0 0;
        float: left;
        /* background-color: red; */
    }

    #right {
        width: 80%;
        margin: 0 0;
        float: left;
    }

    #left .card-body {
        padding: 6px 6px;
    }

    #left .form-group {
        margin: 0px;
    }

    #left .form-group button {
        width: 100%;
    }

    #left>.username {
        font-size: 24px;
        text-decoration: none;
    }

    #left .logout {
        color: grey;
        font-size: 12px;
    }

    #right>h3 {
        margin-top: 16px;
        margin-left: 16px;
        margin-bottom: 0px;
        text-align: left;
    }

    #right hr {
        margin-top: 0px;
        margin-left: 16px;
        margin-bottom: 0px;
    }

    .log {
        width: 100%;
    }

    .news {
        float: left;
        text-align: justify;
    }

    .sNews {
        width: 31%;
        margin-top: 2%;
        margin-left: 2%;
        height: 350px;
        overflow: hidden;
    }

    /* .news:hover, */
    .lNews {
        /* position: fixed; */
        z-index: 20;
        box-shadow: 0px 0px 1000px 1000px #a9a9a996;
        position: fixed;
        margin: auto;
        top: 10%;
        left: 10%;
        height: 80%;
        width: 80%;
    }

    .sNews .xNews {
        display: none;
    }

    .lNews .xNews,
    .lNews .xAdd {
        display: inline;
        position: fixed;
        top: 11%;
        left: 86%;
        font-weight: bold;
    }

    .sNews .updateNews,
    .sNews .deleteNews {
        display: none;
    }

    .news .card-header {
        text-align: center;
    }

    /* .news h5{
        overflow: hidden;
        min-height: 30px;
    } */

    .news ul {
        white-space: nowrap;
    }

    .news li {
        float: left;
        width: 10%;
    }

    .news .biaoti {
        padding-bottom: 0.5em;
    }

    .news .xiangqing {
        padding-top: 0px;
        /* height: 168px;
        overflow: auto; */
        /* padding: 0px 5px; */
    }

    .news .sanlian {
        margin-top: 0rem;
        margin-bottom: 0rem;
        box-shadow: 0px -8px 8px -2px #eee;
    }

    .news .card-footer {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        border-top: 0rem;
        text-align: center;
    }

    .news .card-body-all {
        /* height: 180px; */
        overflow: auto;
        /* margin-bottom: 0.5rem; */
        margin-bottom: 0px;
    }

    .news .pinglun-textarea {
        /* margin-top: -128px; */
        margin-bottom: 0px;
        z-index: 5;
    }

    .news .commentTxt {
        resize: none;
    }

    .news .pinglun-textarea .btn {
        /* margin-top: -80px;
        margin-bottom: 0px; */
        width: 100%;
    }

    .pinglunp {
        font-family: "Neucha", -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        line-height: 16px;
        color: #212529;
        margin: 2px 5px;
    }

    .pingluns {
        max-height: 100px;
        overflow: auto;
    }

    .timestamp {
        color: grey;
        text-decoration: none;
    }

    .timestamp:hover {
        cursor: text;
        text-decoration: none;
    }

    .news .updateNews {
        color: grey;
        font-weight: normal;
        text-decoration: none;
    }

    .news .updateNews:hover {
        text-decoration: none;
        font-weight: bold;
        color: black;
    }

    .news .deleteNews {
        color: grey;
        font-weight: normal;
        text-decoration: none;
        cursor: pointer;
    }

    .news .deleteNews:hover {
        text-decoration: none;
        font-weight: bold;
        color: red;
    }

    .xAdd {
        display: none;
    }
</style>

<div id=left>

    <!-- 左侧个人信息版块 -->
    <br>
    <?php if (!$this->session->userdata('client')) { ?>
        您尚未登录<br>
        <button type="button" class="btn btn-primary log" id="loginBtn">登录</button>
        <br>or
        <br>
        <button type="button" class="btn btn-primary log" id="registerBtn">注册</button>
    <?php } else { ?>
        您好，
        <a href="javascript:void(0);" class="username"><?php echo $this->session->userdata('client_name'); ?></a>
        <br>
        <a href="<?php echo site_url('client/forum/logout') ?>" class="card-link logout">注销</a>
        <a href="<?php echo site_url('client/forum/logout/loging') ?>" class="card-link logout">重新登录</a>
    <?php } ?>

    <!-- 左侧发布短讯版块 -->
    <br>
    <br>
    <div class="card border-primary mb-3 bg" style="max-width: 20rem;">
        <form method="POST" action="<?php echo site_url('client/forum/addNews') ?>">
            <div class="card-header oNews">发布短讯</div>
            <button type="button" class="btn btn-outline-secondary xAdd">
                &times;
            </button>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="标题（11字以内）" name="biaoti" value="<?php echo set_value('biaoti') ?>">
                    <?php echo form_error(
                        'biaoti',
                        '<a style="text-align:center;color:#000;font-size:12px;">',
                        '</a>'
                    ); ?>
                    <input type="text" class="form-control" placeholder="摘要（13字/行，可为空）" name="zhaiyao" value="<?php echo set_value('zhaiyao') ?>">
                    <textarea class="form-control" rows="8" name="zhengwen" placeholder="正文（100-200字为佳）"><?php echo set_value('zhengwen') ?></textarea>
                    <?php echo form_error(
                        'zhengwen',
                        '<a style="text-align:center;color:#000;font-size:12px;">',
                        '</a>'
                    ); ?>
                    <br>
                    <button type="submit" class="btn btn-primary">发布 ✈</button>
                </div>
            </div>
        </form>
    </div>

</div>



<div id=right>

    <!-- 右侧短讯版块 -->
    <h3>百字短讯</h3>
    <hr>
    <?php for ($i = count($news) - 1; $i >= 0; $i--) { ?>
        <div class="card mb-3 news bg sNews">
            <h5 class="card-header oNews">
                <?php echo $news[$i]['biaoti']; ?>
            </h5>
            <button class="btn btn-outline-secondary xNews">
                &times;
            </button>
            <div class="card-body-all oNews">
                <?php if ($news[$i]['zhaiyao'] != "") { ?>
                    <div class="card-body biaoti">
                        <h6 class="card-subtitle text-muted">
                            <?php echo $news[$i]['zhaiyao']; ?>
                        </h6>
                    </div>
                <?php } ?>
                <!-- <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image"> -->
                <div class="card-body xiangqing">
                    <p class="card-text">
                        <?php echo $news[$i]['zhengwen']; ?>
                    </p>
                </div>
            </div>
            <div class="btn-group sanlian" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary" id="zan">☎
                    <?php echo $news[$i]['like_count']; ?>
                </button>
                <button type="button" class="btn btn-outline-primary">★
                    <?php echo $news[$i]['star_count']; ?>
                </button>
                <button type="button" class="btn btn-outline-primary" id="pinglun<?php echo $i ?>" onclick="pl(<?php echo $i ?>)">✎</button>
            </div>
            <div class="form-group pinglun-textarea" id="pinglun-textarea<?php echo $i ?>" style="display:none;">
                <!-- <label for="exampleTextarea">Example textarea</label> -->
                <form method="POST" action="<?php echo site_url('client/forum/addComments') ?>">
                    <textarea class="form-control commentTxt" rows="3" name="comments" placeholder="<?php echo set_value('comments') ?>">
                        <?php echo form_error(
                            'biaoti',
                            '<a style="text-align:right;color:#000;font-size:12px;">',
                            '</a>'
                        ); ?>
                    </textarea>
                    <button type="submit" class="btn btn-primary">评论</button>
                    <input type="hidden" name="news_id" value="<?php echo $news[$i]['id']; ?>">
                </form>
            </div>
            <div class="pingluns oNews" id="pingluns<?php echo $i ?>">
                <?php foreach ($comments[$i] as $c) { ?>
                    <p class="pinglunp"><a href="javascript:void(0);" class="card-link">
                            <?php echo $c['username']; ?>
                        </a>
                        ：<?php echo $c['words']; ?>
                        <a href="javascript:return;" class="timestamp">
                            <?php echo $c['time']; ?>
                        </a>
                    </p>
                <?php } ?>
            </div>
            <div class="card-footer text-muted oNews">
                <?php if (isset($_SESSION['client']) and $news[$i]['author_id'] == $_SESSION['client']) { ?>
                    <a onclick="deleteNews(<?php echo $news[$i]['id']; ?>)" class="deleteNews">删除&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a href="<?php echo site_url('client/forum/goUpdate/' . $news[$i]['id']) ?>" class="updateNews">更新&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <?php };
                echo $news[$i]['author_name'] . " · " . $news[$i]['time']; ?>
            </div>
        </div>
    <?php } ?>

</div>
</div>



<script>
    $("#loginBtn").click(function() {
        $("#loginModal").show();
    });
    $("#registerBtn").click(function() {
        $("#registerModal").show();
    });

    function pl($n) {
        $("#pinglun-textarea" + $n).fadeToggle("slow");
        $("#pingluns" + $n).toggle();
    }

    $(".oNews").click(function() {
        this.parentNode.className = "card mb-3 news bg lNews";
    });
    $(".xNews").click(function() {
        this.parentNode.className = "card mb-3 news bg sNews";
    })
    $(".xAdd").click(function() {
        this.parentNode.className = "";
    })

    function deleteNews($n) {
        if (window.confirm('删除后无法恢复，是否确定删除？')) {
            window.location.href='<?php echo site_url('client/forum/deleteNews/') ?>' + $n;
        }
    }
</script>