<style type="text/css">
    #leftHome {
        width: 20%;
        float: left;
        margin-top: 20px;
    }

    #leftHome li:hover {
        background-color: #DDE2E6 !important;
        cursor: pointer;
    }

    #rightHome {
        width: 80%;
        float: left;
    }

    .theme {
        width: 20%;
        margin: 20px 10px;
        box-shadow: 2px 4px 4px 2px #888;
        cursor: pointer;
    }

    .theme:hover {
        /* position: fixed;
        top: 20%;
        left: 20%;
        width: 60%; */
        transform: scale(1.6);
    }
</style>
<div id="leftHome">
    <ul class="list-group">
        <li onclick="window.location.href='#allNews'" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
            发布的短讯
            <span class="badge badge-primary badge-pill"><?php echo sizeof($news); ?></span>
        </li>
        <li onclick="window.location.href='#allComments'" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
            我的评论
            <span class="badge badge-primary badge-pill"><?php echo sizeof($myComments); ?></span>
        </li>
        <?php if (isset($_SESSION['client_name']) and $user['username'] == $_SESSION['client_name']) { ?>
            <li onclick="window.location.href='#setting'" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action bg">
                设置
                <span class="badge badge-primary badge-pill"></span>
            </li>
        <?php } ?>
    </ul>
</div>
<div id="rightHome">
    <?php include 'allNews.php';
    include 'allComments.php'; ?>
</div>

<?php if (isset($_SESSION['client_name']) and $user['username'] == $_SESSION['client_name']) { ?>
    <div id="setting" style="width:100%;margin-bottom:100px;">
        <h3>修改主题</h3>
        <?php $themes = array(
            'sketchy' => '默认简约主题 | 管理员私人小号力荐',
            'journal' => '熊大同款粉红',
            'united' => '熊二同款蜂蜜色',
            'minty' => '宇宙无敌小清新',
            'flatly' => '世界之窗联名深海蓝',
            'litera' => '圆角明蓝',
            'yeti' => '李老板商务蓝',
            'spacelab' => '光头强怀旧复古蓝'
        ) ?>
        <?php foreach ($themes as $theme => $words) { ?>
            <img onclick="window.location.href='<?php echo site_url('client/forum/theme/' . $theme); ?>'" class="theme" src="<?php echo base_url('resources/client/img/theme/' . $theme . '.png') ?>" alt="<?php echo $words; ?>" title="<?php echo $words; ?>" />
        <?php } ?>
    </div>
<?php } ?>