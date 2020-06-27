<link href="<?php echo base_url() . '/resources/client/css/food.css' ?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('/resources/client/js/food.js') ?>"></script>
<div id="left">
    <div id="login">
        <img src="food/images/login.png" id="loginimg" height=60px onclick="loginclick()" />
        <form id="form" action="food/php/login.php" method="login">
            <p>用户: <input type="text" class="text"></p>
            <p>密码: <input type="text" class="text"></p>
            <!--打开文件input type="file" id="btn_file" style="display:none"-->
            <p><input type="submit" name="username" class="btn" value="登录" onclick="login()">
                <input type="submit" name='password' class="btn" value="注册">
                <!--onclick="register()"-->
                <a href="#" onclick="forget()">忘记密码</a></p>
            <p>>登录以购买长沙特产<</p> </form> <?php echo "hello"; ?> </div> <div id="category">
                    <h4><span>去向</span></h4>
                    <ul>
                        <li><a href="#">给自己吃</a></li>
                        <li><a href="#">送朋友吃</a></li>
                        <li><a href="#">送对象吃</a></li>
                        <li><a href="#">送领导吃</a></li>
                        <li><a href="#">送亲人吃</a></li>
                        <li><a href="#">送孩子吃</a></li>
                        <li><a href="#">送男士吃</a></li>
                        <li><a href="#">送女士吃</a></li>
                    </ul>
                    <h4><span>种类</span></h4>
                    <ul>
                        <li><a href="#">小吃</a></li>
                        <li><a href="#">粉面</a></li>
                        <li><a href="#">奶茶</a></li>
                        <li><a href="#">名菜</a></li>
                        <li><a href="#">零嘴</a></li>
                        <li><a href="#">长沙人的辣</a></li>
                        <li><a href="#">长沙人的不辣</a></li>
                        <li><a href="#">其他</a></li>
                    </ul>
                    <h4><span>价格</span></h4>
                    <ul>
                        <li><a href="#">0~5元</a></li>
                        <li><a href="#">5~10元</a></li>
                        <li><a href="#">10~20元</a></li>
                        <li><a href="#">20~50元</a></li>
                        <li><a href="#">50~100元</a></li>
                        <li><a href="#">100~500元</a></li>
                        <li><a href="#">500元以上</a></li>
                    </ul>
    </div>
</div>
<div id="main">
    <div id="update">
        <img src="food/images/update.png" height=60px />
        <div id="latest">
            <a href="#"><img src="food/images/update1.jpg"></a>
            <a href="#"><img src="food/images/update2.jpg"></a>
            <a href="#"><img src="food/images/update3.jpg"></a>
        </div>
    </div>
    <div id="recommend">
        <img src="food/images/recommend.png" height=60px />
        <ul>
            <li><a href="#"><img src="food/images/recommend1.jpg"><br>刮凉粉</a><br>￥10元</li>
            <li><a href="#"><img src="food/images/recommend2.jpg"><br>大香肠</a><br>￥10元</li>
            <li><a href="#"><img src="food/images/recommend3.gif"><br>小龙虾</a><br>￥100元</li>
            <li><a href="#"><img src="food/images/recommend4.jpg"><br>糖油粑粑</a><br>￥10元</li>
            <li><a href="#"><img src="food/images/recommend5.jpg"><br>兰花干</a><br>￥5元</li>
            <li><a href="#"><img src="food/images/recommend6.jpg"><br>茶颜悦色</a><br>￥20元</li>
            <li><a href="#"><img src="food/images/recommend7.jpg"><br>冬瓜山小香肠</a><br>￥10元</li>
            <li><a href="#"><img src="food/images/recommend8.jpg"><br>麻油猪血汤</a><br>￥10元</li>
        </ul>
        <br>&nbsp;
    </div>
    <div id="new">
        <img src="food/images/classic.png" height=60px />
        <ul>
            <li><a href="#"><img src="food/images/classic1.jpg"><br>剁椒鱼头</a></li>
            <li><a href="#"><img src="food/images/classic2.jpg"><br>麻辣子鸡</a></li>
            <li><a href="#"><img src="food/images/classic3.jpg"><br>辣椒炒肉</a></li>
            <li><a href="#"><img src="food/images/classic4.jpg"><br>擂辣椒皮蛋</a></li>
        </ul>
        <br>&nbsp;
    </div>
    <div id="tips">
        <ul>
            <li><a href="#">长沙名菜的历史故事</a></li>
            <li><a href="#">好吃的长沙饭店</a></li>
            <li><a href="#">为什么长沙人爱吃辣</a></li>
        </ul>
        <br>&nbsp;
    </div>
</div>