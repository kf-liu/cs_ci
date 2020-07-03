<style type="text/css">
    #leftHome {
        width: 20%;
        float: left;
        margin-top: 20px;
    }

    #leftHome li:hover{
        background-color: #DDE2E6!important;
        cursor: pointer;
    }

    #rightHome {
        width: 80%;
        float: left;
    }
</style>
<div id="leftHome">
    <ul class="list-group">
        <li onclick="window.location.href='#allNews'" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
            发布的短讯
            <span class="badge badge-primary badge-pill"><?php echo sizeof($news);?></span>
        </li>
        <li onclick="window.location.href='#allComments'" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
            我的评论
            <span class="badge badge-primary badge-pill"><?php echo sizeof($myComments);?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
            其他内容
            <span class="badge badge-primary badge-pill"></span>
        </li>
    </ul>
</div>
<div id="rightHome">
    <?php include 'allNews.php';
    include 'allComments.php'; ?>
</div>