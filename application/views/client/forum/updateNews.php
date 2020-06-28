<div class="card border-primary mb-3 bg">
    <form class="card border-primary mb-3 bg lNews" method="POST" action="<?php echo site_url('client/forum/updateNews') ?>">
        <div class="card-header oNews">更新短讯</div>
        <button type="button" class="btn btn-outline-secondary xAdd">
            &times;
        </button>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="标题（11字以内）" name="biaoti" value="<?php echo $news[0]['biaoti']; ?>">
                <?php echo form_error(
                    'biaoti',
                    '<a style="text-align:center;color:#000;font-size:12px;">',
                    '</a>'
                ); ?>
                <input type="text" class="form-control" placeholder="摘要（13字/行，可为空）" name="zhaiyao" value="<?php echo $news[0]['zhaiyao']; ?>">
                <textarea class="form-control" rows="8" name="zhengwen" placeholder="正文（100-200字为佳）"><?php echo $news[0]['zhengwen']; ?></textarea>
                <?php echo form_error(
                    'zhengwen',
                    '<a style="text-align:center;color:#000;font-size:12px;">',
                    '</a>'
                ); ?>
                <br>
                <input type="hidden" name="news_id" value="<?php echo $news_id;?>">
                <button type="submit" class="btn btn-primary">发布 ✈</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(".xAdd").click(function() {
        this.parentNode.className = "";
    })
</script>