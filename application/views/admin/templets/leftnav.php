<link href="<?php echo base_url('/resources/admin/css/leftnav.css') ?>" rel="stylesheet" type="text/css">
<span id=leftnav>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
            更新首页
            <span class="badge badge-primary badge-pill">0</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action" onclick=toIntro()>
            更新简介
            <span class="badge badge-primary badge-pill">0</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
            吃货商城
            <span class="badge badge-primary badge-pill">0</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action" onclick=toForum()>
            更新游记
            <span class="badge badge-primary badge-pill">0</span>
        </li>
    </ul>
</span>
<script>
    function toIntro() {
        var url = "<?php echo site_url('admin/intro/index') ?>";
        window.location.href = url;
    }
    function toForum() {
        var url = "<?php echo site_url('admin/forum/news') ?>";
        window.location.href = url;
    }
</script>
