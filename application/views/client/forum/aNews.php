<link href="<?php echo base_url('/resources/client/css/forumNewsCard.css') ?>" rel="stylesheet" type="text/css">
<style type="text/css">
    .hide {
        display: none;
    }
</style>
<?php
$i = 0;
$card_mode = "large";
include 'pNewsCard.php'; ?>

<script>
    $(".xNews").click(function() {
        this.parentNode.className = "hide";
    })
    function pl($n) {
        $("#pinglun-textarea" + $n).fadeToggle("slow");
        $("#pingluns" + $n).toggle();
    }
</script>