<style type="text/css">
    #registerDialog {
        box-shadow: 0px 0px 1000px 1000px #a9a9a996;
        border-radius: 8px;
    }

    #registerModal {
        position: fixed;
        left: 10%;
        top: 10%;
        width: 80%;
        height: 40%;
        display: none;
        z-index: 10;
    }
</style>

<div class="" id="registerModal">
    <div class="modal-dialog" role="document" id="registerDialog">
        <div class="modal-content bg">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close x">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?php echo site_url('client/forum/register') ?>">

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">
                            用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" name="username" placeholder="点击输入用户名" value="<?php echo set_value('username') ?>">
                        </div>
                        <?php echo form_error(
                            'username',
                            '<a style="text-align:right;color:#000;font-size:12px;margin-left:100px;">',
                            '</a>'
                        ); ?>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control-plaintext" name="password" placeholder="点击输入密码" value="<?php echo set_value('password') ?>">
                        </div>
                        <?php echo form_error(
                            'password',
                            '<a style="text-align:right;color:#000;font-size:12px;margin-left:100px;">',
                            '</a>'
                        ); ?>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">验证码</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" name="yanzheng" placeholder="点击输入验证码" value="<?php echo set_value('yanzheng') ?>">
                        </div>
                        <?php echo form_error(
                            'yanzheng',
                            '<a style="text-align:right;color:#000;font-size:12px;margin-left:100px;">',
                            '</a>'
                        ); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" id="toLogin">登录</a>
                    <button type="submit" class="btn btn-primary">注册</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(".x").click(function() {
        $("#registerModal").hide();
    });
    $("#toLogin").click(function() {
        $("#registerModal").hide();
        $("#loginModal").show();
    });
</script>