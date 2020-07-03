<link href="<?php echo base_url('/resources/client/css/forumNewsCard.css') ?>" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<?php include 'forum_header_js.php';?>

<div class="content" id="allNews">
    <?php //echo $_SERVER['REQUEST_URI'];
    ?>
    <h3><?php echo $title;?></h3>
    <hr>
    <div id="masonry" class="container-fluid">
        <?php for ($i = count($news) - 1; $i >= 0; $i--) {
            include 'pNewsCard.php';
        } ?>
    </div>
</div>

<?php include 'forum_js.php';?>
<script src="<?php echo base_url('resources/client/js/masonry.js')?>"></script>