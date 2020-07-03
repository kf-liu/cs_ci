<style type="text/css">
    .search {
        /* margin-top: 2%; */
        text-align: justify;
        box-shadow: 2px 2px 4px #888;
    }

    .search tbody {
        /* height: 120px; */
        overflow: auto;
        cursor: pointer;
    }

    .search .zhengwen {
        font-weight: normal;
    }

    .search .rtime {
        text-align: right !important;
    }

    #leftSearch {
        width: 900px;
        float: left;
        margin-right: 10px;
    }

    #rightSearch {
        width: 225px;
        float: left;
    }

    .highlight {
        background-color: #FFE7A1;
    }

    #range {
        position: fixed;
        top: 95%;
        left: 107px;
        width: 1135px;
    }
</style>
<br>
<?php p($keywords . " 搜索结果");
$highlight = "<a class='highlight'>";
$printedNews = array(); ?>
<div id="leftSearch">
    <table class="table table-hover search">
        <thead>
            <tr>
                <th scope="col">标题</th>
                <th scope="col">摘要</th>
                <th scope="col">正文</th>
                <th scope="col">作者</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['news'] as $part) {
                foreach ($part as $news) {
                    if (in_array($news['id'], $printedNews)) continue;
                    array_push($printedNews, $news['id']); ?>
                    <tr class="table-active" onclick="window.location.href='<?php echo site_url('client/forum/search/' . $keywords . '/' . $news['id']) ?>'">
                        <th scope="row"><?php echo str_replace($keywords, $highlight . $keywords . '</a>', $news['biaoti']); ?></th>
                        <td><?php echo str_replace($keywords, $highlight . $keywords . '</a>',  $news['zhaiyao']); ?></td>
                        <td class="zhengwen"><?php echo str_replace($keywords, $highlight . $keywords . '</a>', $news['zhengwen']); ?><br><br><a class="rtime">发布时间 · <?php echo $news['time']; ?></a></td>
                        <td><?php echo str_replace($keywords, $highlight . $keywords . '</a>',  $news['author_name']); ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>
<div id="rightSearch">
    <table class="table table-hover search">
        <thead>
            <tr>
                <th scope="col">用户</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['in_clients'] as $client) { ?>
                <tr class="table-active" onclick="window.open('<?php echo site_url('client/forum/userHome/' . $client['id']); ?>','_blank')">
                    <td><?php echo str_replace($keywords, $highlight . $keywords . '</a>',  $client['username']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="table table-hover search">
        <thead>
            <tr>
                <th scope="col">评论</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['in_comments'] as $comment) { ?>
                <tr class="table-active">
                    <td>
                        <a class="zhengwen" href="<?php echo site_url('client/forum/search/' . $keywords . '/' . $comment['news_id']) ?>"><?php echo $comment['biaoti'] ?></a>
                        <br>
                        <?php echo str_replace($keywords, $highlight . $keywords . '</a>',  $comment['words']); ?>
                        <br>
                        <a class="zhengwen"><?php echo $comment['username'] . " · " . $comment['time']; ?></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php //p($result); 
?>
<div id="show"></div>
<input type="range" class="custom-range" id="range" oninput="range(this.value)" value=80>
<script>
    function range($n) {
        if ($n > 90 || $n < 15) return;
        // document.getElementById("show").innerHTML = $n;
        document.getElementById("leftSearch").style.width = ($n / 100 * 1135 - 5).toString() + "px";
        document.getElementById("rightSearch").style.width = (1135 - 10 - $n / 100 * 1135 + 5).toString() + "px";
    }
</script>