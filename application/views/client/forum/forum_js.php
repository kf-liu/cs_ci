<div id="uploadLikeAndStar"></div>
<script>
    $("#loginBtn").click(function() {
        $("#loginModal").show();
    });
    $("#registerBtn").click(function() {
        $("#registerModal").show();
    });

    function pl($n) {
        $("#pinglun-textarea" + $n).fadeToggle("slow");
        $("#pingluns" + $n).toggle();
    }

    $(".oNews").click(function() {
        this.parentNode.className = "card mb-3 news bg lNews";
    });
    $(".xNews").click(function() {
        this.parentNode.className = "card mb-3 news bg sNews";
    })
    $(".xAdd").click(function() {
        this.parentNode.className = "";
    })

    function deleteNews($n) {
        if (window.confirm('删除后无法恢复，是否确定删除？')) {
            window.location.href = '<?php echo site_url('client/forum/deleteNews/') ?>' + $n;
        }
    }

    var $client = eval(<?php echo json_encode($client); ?>);
    //ix为要删除的news_id
    Array.prototype.remove = function(ix) {
        dx = this.indexOf(ix.toString());
        if (isNaN(dx) || dx > this.length) {
            return false;
        }
        for (var i = 0, n = 0; i < this.length; i++) {
            if (this[i] != this[dx]) {
                this[n++] = this[i]
            }
        }
        this.length -= 1
    }
    /**
     * 使用循环的方式判断一个元素是否存在于一个数组中
     * @param {Object} arr 数组
     * @param {Object} value 元素值
     */
    function isInArray(arr, value) {
        for (var i = 0; i < arr.length; i++) {
            if (value === arr[i]) {
                return true;
            }
        }
        return false;
    }
    //Like点击事件
    function onClickLike($news_id) {
        if (<?php if (isset($_SESSION['client'])) echo "true";
            else echo "false"; ?>) {
            if (isInArray($client['like'], $news_id.toString())) {
                dislike($news_id);
                $client['like'].remove($news_id);
                $like[$news_id]--;
            } else {
                like($news_id);
                $client['like'].push($news_id.toString());
                $like[$news_id]++;
            }
            document.getElementById("likeN" + $news_id).innerHTML = $like[$news_id];
            //传参给控制器
            $client_like = $client['like'];
            $like_cotroller = '<?php echo site_url('client/forum/uploadLike/') ?>' + $news_id + '/' + $like[$news_id] + '/' + $client_like.join('x');
            document.getElementById("uploadLikeAndStar").innerHTML = "<object id='viewObj' type='text/html' data=" + $like_cotroller + " > </object>";
        } else {
            window.alert('您尚未登录，请先登录');
            window.location.href = "<?php echo site_url('client/forum/index/loging'); ?>";
        }
    }

    //Star点击事件
    function onClickStar($news_id) {
        if (<?php if (isset($_SESSION['client'])) echo "true";
            else echo "false"; ?>) {
            if (isInArray($client['star'], $news_id.toString())) {
                disstar($news_id);
                $client['star'].remove($news_id);
                $star[$news_id]--;
            } else {
                star($news_id);
                $client['star'].push($news_id.toString());
                $star[$news_id]++;
            }
            document.getElementById("starN" + $news_id).innerHTML = $star[$news_id];
            //传参给控制器
            $client_star = $client['star'];
            $star_cotroller = '<?php echo site_url('client/forum/uploadStar/') ?>' + $news_id + '/' + $star[$news_id] + '/' + $client_star.join('x');
            document.getElementById("uploadLikeAndStar").innerHTML = "<object id='viewObj' type='text/html' data=" + $star_cotroller + " > </object>";
        } else {
            window.alert('您尚未登录，请先登录');
            window.location.href = "<?php echo site_url('client/forum/index/loging'); ?>";
        }
    }
</script>