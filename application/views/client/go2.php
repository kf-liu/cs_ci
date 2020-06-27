<div id="map-ctl">
    <div id="map-handle"></div>
    <div id="map-content">
        <!--input onclick="roads()" id="roadbtn" type="button" class="btn" value="隐藏实时路况"-->
        <input type="text" value="input to search" id="searchbox" onfocus="javascript:if(this.value=='input to search')this.value=''">
        <img src="go/images/search.png" id="glass" onclick="gosearch()" />
        <a href="javascript:void(0)" data-title="搜索公交站" class="btn" onclick="gosearch()"></a>
        <a href="javascript:void(0)" data-title="取消搜索" class="btn" onclick="notsearch()"></a>
        <a href="javascript:void(0)" data-title="实时路况" class="btn" id="roadbtn" onclick="roads()"></a>
    </div>
</div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php echo base_url('/resources/client/js/go.js') ?>"></script>
</div>

<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.15&key=f2c09bb48fb15159d213d6b31e7828c4"></script>
<script src="<?php echo base_url('/resources/client/js/map.js') ?>"></script>
