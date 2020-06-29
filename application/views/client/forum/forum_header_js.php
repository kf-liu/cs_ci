<script>
    //点赞
    function like($news_id) {
        document.getElementById('like' + $news_id).className = "btn btn-secondary";
    }
    //收藏
    function star($news_id) {
        document.getElementById('star' + $news_id).className = "btn btn-secondary";
    }
    //取消点赞
    function dislike($news_id) {
        document.getElementById('like' + $news_id).className = "btn btn-outline-primary";
    }
    //取消收藏
    function disstar($news_id) {
        document.getElementById('star' + $news_id).className = "btn btn-outline-primary";
    }

    var $like = new Array();
    var $star = new Array();
    var $news = [$like, $star];
</script>