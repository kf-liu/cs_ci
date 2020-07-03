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
        /* max-height: 100px; */
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
    <?php if (!isset($_SESSION['client'])) { ?>
        您尚未登录<br>
        <button type="button" class="btn btn-primary log" id="loginBtn">登录</button>
        <br>or
        <br>
        <button type="button" class="btn btn-primary log" id="registerBtn">注册</button>
    <?php } else { ?>
        您好，
        <a href="javascript:void(0);" class="username"><?php echo $_SESSION['client_name']; ?></a>
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
                    <textarea class="form-control" rows="8" name="zhengwen" placeholder="正文（100-200字为佳，点击表头“发布短讯”可放大编辑框）"><?php echo set_value('zhengwen') ?></textarea>
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

<?php include 'forum_header_js.php'; ?>

<div id=right>

    <!-- 右侧短讯版块 -->
    <h3>百字短讯</h3>
    <hr>
    <?php for ($i = count($news) - 1; $i >= 0 and $i >= count($news) - 6; $i--) {
        include 'pNewsCard.php';
    } ?>

    <h3>长篇新闻彩页 <a href="<?php echo site_url('client/forum/lnews') ?>">>>武汉抗疫情专栏</a></h3>

    <hr>
    <br>

</div>

</div>


<?php include 'forum_js.php'; ?>