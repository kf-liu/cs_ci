<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<style type="text/css">
    .allComments {
        margin-top: 5px;
    }

    .allComments .container-fluid {
        padding: 20px;
    }

    .allComments .box {
        margin-bottom: 10px;
        float: left;
        width: 18.8%;
        margin-right: 5px;
    }

    .allComments .box img {
        max-width: 100%
    }

    .comments .words {
        text-align: justify;
    }

    .comments .card-body {
        padding: 0.5rem;
    }

    .comments .card-text {
        margin-bottom: 0.5rem;
    }

    .comments .time {
        color: grey;
    }
</style>
<div id="allComments">
    <div id="masonry" class="container-fluid allComments">
        <?php foreach (array_reverse($myComments) as $c) { if($c['news_biaoti']=="") continue;?>
            <div class="box comments">
                <div class="card border-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header"><?php echo /*$c['id'] . */ $c['user_name']; ?></div>
                    <div class="card-body">
                        <h4 class="card-title words"><?php echo $c['words']; ?></h4>
                        <a class="card-text" href="<?php echo site_url($controller . '/' . $c['news_id']) ?>"><?php echo $c['news_biaoti']; ?></a>
                        <br>
                        <a class="time"><?php echo $c['time']; ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div id="aNews"></div>
<script src="<?php echo base_url('resources/client/js/masonry.js') ?>"></script>
<!-- <script>
    function aNews($news_id) {
        $.ajax({
            url: "",
            success: function(result) {
                $("#aNews").html(result);
            }
        });
    }
</script> -->