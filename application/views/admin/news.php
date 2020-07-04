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

    .right {
        float: right;
    }
</style>
<div id=right>
    <a id=loadNav onclick=loadleft()>
        <<收起导航栏</a> <table class="table table-hover">
            <button type="button" class="btn btn-secondary btn-sm right" onclick=openComments()>打开所有详情</button>
            <button type="button" class="btn btn-secondary btn-sm right" onclick=closeComments()>关闭所有详情</button>
            <thead>
                <tr>
                    <th scope="col">Id</th>
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
                            <botton onclick="window.location.href='<?php echo site_url('admin/forum/goUpdate/' . $news[$i]['id']) ?>'" type="button" class="btn btn-primary btn-sm">修改</botton>
                            <botton onclick="deleteNews(<?php echo $news[$i]['id']; ?>)" type="button" class="btn btn-warning btn-sm">删除</botton>
                        </td>
                    </tr>
                    <?php foreach ($comments[$i] as $c) { ?>
                        <tr class="more more<?php echo $news[$i]['id']; ?>">
                            <th scope="row" colspan="1"><?php echo $c['id']; ?></th>
                            <td colspan="2"><?php echo $c['username']; ?></td>
                            <td colspan="1"><?php echo $c['words']; ?></td>
                            <td colspan="4"><?php echo $c['time']; ?></td>
                            <td colspan="2">
                                <botton type="button" class="btn btn-primary btn-sm">加精</botton>
                                <botton type="button" class="btn btn-warning btn-sm" onclick="deleteComments(<?php echo $c['id']; ?>)">删除</botton>
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

<a href="#">
    <div style="position:fixed;top:50%;right:0px;background-color:#002C37;"> ↑<br>回<br>顶<br>部</div>
</a>

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

    function openComments() {
        $(".more").show();
    }

    function closeComments() {
        $(".more").hide();
    }

    function deleteNews($n) {
        if (window.confirm('删除后无法恢复，是否确定删除？')) {
            window.location.href = '<?php echo site_url('admin/forum/deleteNews/') ?>' + $n;
        }
    }

    function deleteComments($n) {
        if (window.confirm('删除后无法恢复，是否确定删除？')) {
            window.location.href = '<?php echo site_url('admin/forum/deleteComments/') ?>' + $n;
        }
    }
</script>