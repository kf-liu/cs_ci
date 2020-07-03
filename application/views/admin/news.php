<style type="text/css">
    #loadNav,
    #right tbody {
        cursor: pointer;
    }

    .more {
        display: none;
    }

    .xiala:hover .more {
        display: block;
    }
</style>
<div id=right>
    <a id=loadNav onclick=loadleft()>
        <<收起导航栏</a> <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">news_id</th>
                    <th scope="col">标题</th>
                    <th scope="col">摘要</th>
                    <th scope="col">正文</th>
                    <th scope="col">作者</th>
                    <th scope="col">点赞</th>
                    <th scope="col">收藏</th>
                    <th scope="col">评论</th>
                    <th scope="col">时间</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = count($news) - 1; $i >= 0; $i--) { ?>
                    <tr class="table-dark" onclick="more(<?php echo $news[$i]['id']; ?>)">
                        <th scope="row"><?php echo $news[$i]['id']; ?></th>
                        <td><?php echo $news[$i]['biaoti']; ?></td>
                        <td><?php echo $news[$i]['zhaiyao']; ?></td>
                        <td><?php echo $news[$i]['zhengwen']; ?></td>
                        <td><?php echo $news[$i]['author_name']; ?></td>
                        <td><?php echo $news[$i]['like_count']; ?></td>
                        <td><?php echo $news[$i]['star_count']; ?></td>
                        <td><?php echo count($comments[$i]); ?></td>
                        <td><?php echo $news[$i]['time']; ?></td>
                        <td>更多</td>
                    </tr>
                    <tr class="more more<?php echo $news[$i]['id']; ?>">
                        <td colspan="4"></td>
                        <td colspan="4">删改短讯</td>
                        <td colspan="2" style="text-align:center;">
                            <botton type="button" class="btn btn-secondary btn-sm">修改</botton>
                            <botton type="button" class="btn btn-warning btn-sm">删除</botton>
                        </td>
                    </tr>
                    <?php foreach ($comments[$i] as $c) { ?>
                        <tr class="more more<?php echo $news[$i]['id']; ?>">
                            <th scope="row" colspan="1"><?php echo $c['id']; ?></th>
                            <td colspan="2"><?php echo $c['username']; ?></td>
                            <td colspan="1"><?php echo $c['words']; ?></td>
                            <td colspan="4"><?php echo $c['time']; ?></td>
                            <td colspan="2">
                                <botton type="button" class="btn btn-secondary btn-sm">修改</botton>
                                <botton type="button" class="btn btn-warning btn-sm">删除</botton>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
                <script>
                    $('.more').hide();
                </script>
            </tbody>
            </table>
</div>
<script>
    var isLeftNavOpen = true;

    function loadleft() {
        if (isLeftNavOpen) {
            document.getElementById('leftnav').style.display = "none";
            document.getElementById('right').style.width = "100%";
            document.getElementById('loadNav').innerHTML = ">>打开导航栏";
            isLeftNavOpen = false;
        } else {
            document.getElementById('leftnav').style.display = "inline";
            document.getElementById('right').style.width = "80%";
            document.getElementById('loadNav').innerHTML = "<<收起导航栏";
            isLeftNavOpen = true;
        }
    }

    function more($n) {
        $(".more" + $n).toggle();
    }
</script>