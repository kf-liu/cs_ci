<link href="<?php echo base_url() . '/resources/admin/css/' ?>login.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() . '/resources/admin/css/' ?>bootstrap.css" rel="stylesheet" type="text/css">
<div class="jumbotron">
    <form class="loginform" method="POST" action="<?php echo site_url('admin/login/register') ?>">
        <h1 class="display-3">Register</h1>
        <table class="table table-hover">
            <tr class="form-group">
                <td>
                    <label class="col-form-label" for="inputDefault">用户名</label>
                </td>
                <td>
                    <input type="text" class="input form-control " placeholder="username" name="username" value="<?php echo set_value('username') ?>">
                    <?php echo form_error('username', '<a style="text-align:right;color:#eee;font-size:12px;">', '</a>'); ?>
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="exampleInputPassword1">密码</label>
                </td>
                <td>
                    <input type="password" class="input form-control " name="password" placeholder="password" value="<?php echo set_value('password') ?>">
                    <?php echo form_error('password', '<a style="text-align:right;color:#eee;font-size:12px;">', '</a>'); ?>
                </td>
            </tr>
            <tr class="form-group">
                <td>
                    <label for="exampleInputPassword1">验证码</label>
                </td>
                <td>
                    <input type="text" class="form-control input" name="yanzheng" placeholder="请输入验证码" value="<?php echo set_value('password') ?>">
                    <?php echo form_error('yanzheng', '<a style="text-align:right;color:#eee;font-size:12px;">', '</a>'); ?>
                </td>
            </tr>
        </table>
        <div class="lead">
            <a href="<?php echo site_url('admin/login/index') ?>">登录</a><a>&nbsp;&nbsp;&nbsp;</a>
            <a><input name="submit" type="submit" value="注册" class="btn btn-primary btn-lg" role="button">
            </a>
            <a>&nbsp;&nbsp;&nbsp;</a>
        </div>
    </form>
</div>