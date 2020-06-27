<?php
$config = array(
    'loginSub' => array(
        array(
            'field' => 'username',
            'label' => '用户名',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'required'
        ),
        array(
            'field' => 'yanzheng',
            'label' => '验证码',
            'rules' => 'required'
        )
    ),
    'newsSub' => array(
        array(
            'field' => 'biaoti',
            'label' => '文章标题',
            'rules' => 'required'
        ),
        array(
            'field' => 'zhengwen',
            'label' => '正文内容',
            'rules' => 'required'
        )
    ),
    'commentsSub' => array(
        array(
            'field' => 'comments',
            'label' => '评论内容',
            'rules' => 'required'
        )
    ),
);
