<style type="text/css">
    body {
        margin: 0 0;
    }

    #toForum {
        position: fixed;
        top: 10%;
        right: 5%;
        font-size: 20px;
        color: #fff;
        background-color: rgba(160, 160, 217, 0.8);
        padding: 3px 5px;
        border-radius: 3px;
        cursor: pointer;
    }

    #toForumTxt {
        display: none;
    }

    #toForum:hover #toForumTxt {
        display: inline;
    }
</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<div id="toForum">
    <a id="toForumTxt">返回资讯评论</a>🔙
</div>
<iframe src="<?php echo site_url('../../changsha_html/wuhan.html') ?>" width="100%" height="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" <!--scrolling="no" --> allowtransparency="yes" /></iframe>
<script type="text/javascript">
    $('#toForum').click(function() {
        console.log('1');
        window.location.href = "<?php echo site_url('client/forum'); ?>";
    })
</script>