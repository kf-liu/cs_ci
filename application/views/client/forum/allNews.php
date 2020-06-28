<link href="<?php echo base_url('/resources/client/css/forumNewsCard.css') ?>" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

<div class="content">
    <?php //echo $_SERVER['REQUEST_URI'];
    ?>
    <h3>所有资讯</h3>
    <hr>
    <div id="masonry" class="container-fluid">
        <?php for ($i = count($news) - 1; $i >= 0; $i--) {
            include 'pNewsCard.php';
        } ?>
    </div>
</div>
<script>
    function pl($n) {
        $("#pinglun-textarea" + $n).fadeToggle("slow");
        $("#pingluns" + $n).toggle();
    }

    $(".oNews").click(function() {
        this.parentNode.className = "card mb-3 news bg lNews";
    });
    $(".xNews").click(function() {
        this.parentNode.className = "box card mb-3 news bg sNews";
    })
    $(".xAdd").click(function() {
        this.parentNode.className = "";
    })

    function deleteNews($n) {
        if (window.confirm('删除后无法恢复，是否确定删除？')) {
            window.location.href = '<?php echo site_url('client/forum/deleteNews/') ?>' + $n;
        }
    }
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