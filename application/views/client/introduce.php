<link href="<?php echo base_url() . '/resources/client/css/introduce.css' ?>" rel="stylesheet" type="text/css">
<div id="left">
    <div id=catalogue>
        <ul>
            <h2>
                <?php
                foreach ($intros as $i) { ?>
                    <li><a href="<?php echo '#' . $i['cname']; ?>"><?php echo $i['cname']; ?></a></li>
                <?php } ?>
            </h2>
        </ul>
    </div>
</div>
<div id=middle>
    <?php
    foreach ($intros as $i) { ?>
        <div id="<?php echo $i['cname']; ?>">
            <h2>
                <?php echo $i['cname']; ?>
            </h2>
            <?php echo $i['cintro']; ?>
        </div>
    <?php } ?>
</div>