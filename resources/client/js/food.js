function login()
       { 
	//document.getElementById("btn_file").click();
	window.alert("您的用户名或密码输入错误");
       } 
function register()
       { 
	window.alert("技术太low所以暂时无法注册");
       } 
function forget()
       { 
	window.alert("dbq找不回来了");
       } 

var show=true;

function loginclick(){
	$("#form").animate({height:'toggle'});
	if(show){
		$("#loginimg").css("height","30px");
		show=false;
	}else{
		$("#loginimg").css("height","60px");
		show=true;
	}
} 

/*//直接用jQuery
$(document).ready(function(){
	$("#loginimg").click(function(){
		$("#form").animate({height:'toggle'});
	});
});*/