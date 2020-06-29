<div id="news<?php echo $news[$i]['id'];?>"class="box card mb-3 news bg <?php if (isset($card_mode) and $card_mode == "large") echo "lNews";
                                    else echo "sNews"; ?>">
    <h5 class="card-header oNews">
        <?php echo $news[$i]['biaoti']; ?>
    </h5>
    <button class="btn btn-outline-secondary xNews hide">
        &times;
    </button>
    <div class="card-body-all oNews">
        <?php if ($news[$i]['zhaiyao'] != "") { ?>
            <div class="card-body biaoti">
                <h6 class="card-subtitle text-muted">
                    <?php echo $news[$i]['zhaiyao']; ?>
                </h6>
            </div>
        <?php } ?>
        <div class="card-body xiangqing">
            <p class="card-text">
                <?php echo $news[$i]['zhengwen']; ?>
            </p>
        </div>
    </div>
    <div class="btn-group sanlian" role="group" aria-label="Basic example">
        <button type="button" id="like<?php echo $news[$i]['id'] ?>" onclick="onClickLike(<?php echo $news[$i]['id'] ?>)" class="btn btn-outline-primary" id="zan">☎
            <a id="likeN<?php echo $news[$i]['id']; ?>"><?php echo $news[$i]['like_count']; ?></a>
            <?php if (!empty($client) and in_array($news[$i]['id'], $client['like'])) { ?>
                <script>
                    like(<?php echo $news[$i]['id']; ?>);
                </script>
            <?php } ?>
        </button>
        <button type="button" id="star<?php echo $news[$i]['id']; ?>" onclick="onClickStar(<?php echo $news[$i]['id'] ?>)" class="btn btn-outline-primary">★
            <a id="starN<?php echo $news[$i]['id']; ?>"><?php echo $news[$i]['star_count']; ?></a>
            <?php if (!empty($client) and in_array($news[$i]['id'], $client['star'])) { ?>
                <script>
                    star(<?php echo $news[$i]['id']; ?>);
                </script>
            <?php } ?>
        </button>
        <button type="button" class="btn btn-outline-primary" id="pinglun<?php echo $i ?>" onclick="pl(<?php echo $i ?>)">✎</button>
    </div>
    <div class="form-group pinglun-textarea" id="pinglun-textarea<?php echo $i ?>" style="display:none;">
        <form method="POST" action="<?php echo site_url('client/forum/addComments') ?>">
            <textarea class="form-control commentTxt" rows="3" name="comments" placeholder="<?php echo set_value('comments') ?>"></textarea>
            <?php echo form_error(
                'biaoti',
                '<a style="text-align:right;color:#000;font-size:12px;">',
                '</a>'
            ); ?>
            <button type="submit" class="btn btn-primary">评论</button>
            <input type="hidden" name="news_id" value="<?php echo $news[$i]['id']; ?>">
        </form>
    </div>
    <div class="pingluns oNews" id="pingluns<?php echo $i ?>">
        <?php /*if (!empty($comments[$i]))*/ foreach ($comments[$i] as $c) { ?>
            <p class="pinglunp"><a href="javascript:void(0);" class="card-link">
                    <?php echo $c['username']; ?>
                </a>
                ：<?php echo $c['words']; ?>
                <a href="javascript:return;" class="timestamp">
                    <?php echo $c['time']; ?>
                </a>
            </p>
        <?php } ?>
    </div>
    <div class="card-footer text-muted oNews">
        <?php if (isset($_SESSION['client']) and $news[$i]['author_id'] == $_SESSION['client']) { ?>
            <a onclick="deleteNews(<?php echo $news[$i]['id']; ?>)" class="deleteNews">删除&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="<?php echo site_url('client/forum/goUpdate/' . $news[$i]['id']) ?>" class="updateNews">更新&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <?php };
        echo $news[$i]['author_name'] . " · " . $news[$i]['time']; ?>
    </div>
</div>
<script>
    $like[<?php echo $news[$i]['id']; ?>] = <?php echo $news[$i]['like_count']; ?>;
    $star[<?php echo $news[$i]['id']; ?>] = <?php echo $news[$i]['star_count']; ?>;
</script>