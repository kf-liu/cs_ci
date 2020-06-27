<!-- <body onLoad=setTimeout("suc.style.display='none'",1000)> -->
<div id="suc" class="alert-dismissible alert-success" style="
    position:fixed; left:40%; top:10%;
    width:20%; height:40px; z-index:1;
    border-radius:3px; color:#eee; text-align:center; line-height:40px;
    margin:auto auto; font-size:18px; padding-right:0px;">
    ✔<?php echo $suc; ?>
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
</div>
<script>
    window.onload = function() {
        setTimeout(function() {
            $("#suc").css('display','none');
        }, 1000)
    };
</script>