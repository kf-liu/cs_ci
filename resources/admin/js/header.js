$(function(){

    //参数设置，若用默认值可以省略以下面代
    
    toastr.options = {
    
    "closeButton": false, //是否显示关闭按钮
    
    "debug": false, //是否使用debug模式
    
    "positionClass": "toast-top-full-width",//弹出窗的位置
    
    "showDuration": "300",//显示的动画时间
    
    "hideDuration": "100",//消失的动画时间
    
    "timeOut": "200", //展现时间
    
    "extendedTimeOut": "100",//加长展示时间
    
    "showEasing": "swing",//显示时的动画缓冲方式
    
    "hideEasing": "linear",//消失时的动画缓冲方式
    
    "showMethod": "fadeIn",//显示时的动画方式
    
    "hideMethod": "fadeOut" //消失时的动画方式
    
    };
    
    
    
    //成功提示绑定
    
    $("#success").click(function(){
    
    toastr.success("祝贺你成功了");
    
    })
    
    
    
    //信息提示绑定
    
    $("#info").click(function(){
    
    toastr.info("这是一个提示信息");
    
    })
    
    
    
    //敬告提示绑定
    
    $("#warning").click(function(){
    
    toastr.warning("警告你别来烦我了");
    
    })
    
    
    
    //错语提示绑定
    
    $("#error").click(function(){
    
    toastr.error("出现错误，请更改");
    
    })
    
    
    //清除窗口绑定
    
    $("#clear").click(function(){
    
    toastr.clear();
    
    })
    
    });

function suc(){
    toastr.success("success");
}