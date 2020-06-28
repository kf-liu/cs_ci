<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<style type="text/css">
    .container-fluid {
        padding: 20px;
    }

    .box {
        margin-bottom: 10px;
        float: left;
        width: 18.8%;
        margin-right: 5px;
    }

    .box img {
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

<div id="masonry" class="container-fluid">
    <?php foreach (array_reverse($comments) as $c) { ?>
        <div class="box comments">
            <div class="card border-primary mb-3" style="max-width: 20rem;">
                <div class="card-header"><?php echo /*$c['id'] . */$c['user_name']; ?></div>
                <div class="card-body">
                    <h4 class="card-title words"><?php echo $c['words']; ?></h4>
                    <a class="card-text" href="<?php echo site_url('client/forum/aNews/'.$c['news_id'])?>"><?php echo $c['news_biaoti']; ?></a>
                    <br>
                    <a class="time"><?php echo $c['time']; ?></a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    $(function() {
        var $container = $('#masonry');
        // $container.imagesLoaded(function() {
        $container.masonry({
            itemSelector: '.box',
            gutterWidth: 20,
            isAnimated: true,
        });
        // });
    });
</script>