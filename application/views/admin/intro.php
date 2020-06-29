<link href="<?php echo base_url('/resources/admin/css/intro.css') ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('/resources/admin/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">

<div id=right>
    <br>
    <h1>更新简介</h1>
    <hr>
    <h3>修改当前简介</h3>
    <?php foreach ($intros as $i) { ?>
        <form method="POST" action="<?php echo site_url('admin/intro/update') ?>">
            <input type="hidden" name="cid" value="<?php echo $i['cid']; ?>">
            <div class="form-group">
                <!-- <label for="exampleTextarea">
                    <?php echo $i['cname']; ?>
                </label> -->
                <br>
                <input type="text" class="form-control-plaintext" name="cname" value="<?php echo $i['cname']; ?>">
                <textarea class="form-control" name="intro" rows="3"><?php echo $i['cintro'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">保存修改</button>
        </form>
    <?php } ?>
    <hr>
    <div class="form-group">
        <form method="POST" action="<?php echo site_url('admin/intro/newIntro') ?>">
            <fieldset class="form-group">
                <label class="col-form-label" for="inputDefault">
                    <h3>新增简介</h3>
                </label>
                <input type="text" class="form-control" placeholder="新增简介名称" name="cname">
                <br>
                <button type="submit" class="btn btn-primary">确定新增</button>
            </fieldset>
        </form>
    </div>
    <hr>
    <div class="form-group">
        <form method="POST" action="<?php echo site_url('admin/intro/delIntro') ?>">
            <label class="col-form-label" for="inputDefault">
                <h3>删除简介</h3>
            </label>
            <select class="custom-select" name="selected">
                <option selected="">选择您要删除的简介</option>
                <?php foreach ($intros as $i) { ?>
                    <option value=<?php echo $i['cid']; ?>>
                        <?php echo $i['cname'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-warning">确定删除</button>
        </form>
    </div>
    <hr>
    <br>
    <br>
</div>
<style type="text/css">
</style>