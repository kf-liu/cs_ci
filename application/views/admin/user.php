<div id=right>
    <table class="table table-hover search">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <td>用户名</td>
                <td>注册时间</td>
                <td>重置密码为123</td>
                <td>账号冻结后将无法使用</td>
                <td>进入账号主页</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client) { ?>
                <tr class="table-active">
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['username']; ?></td>
                    <td><?php echo $client['registation_date']; ?></td>
                    <td>
                        <botton style="float:center;" type="button" class="btn btn-warning btn-sm" onclick="window.location.href='<?php echo site_url('admin/user/resetPassword/' . $client['id']); ?>'">密码重置</botton>
                    </td>
                    <td>
                        <botton type="button" class="btn btn-primary btn-sm">冻结</botton>
                    </td>
                    <td>
                        <botton type="button" class="btn btn-secondary btn-sm" onclick="window.open('<?php echo site_url('client/forum/userHome/' . $client['id']); ?>','_userHome')">进入主页</botton>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>