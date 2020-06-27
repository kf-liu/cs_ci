var changsha = [112.59, 28.12]; 
var stations = new Array();
var loactions = new Array();
var searchtxt = "雅礼中学";

var map = new AMap.Map('map-div',{
    mapStyle: 'amap://styles/fresh', //设置地图的显示样式
});

//////**************地图插件*3
	AMap.plugin(['AMap.ToolBar','AMap.Driving','AMap.OverView'/*,'AMap.MapType'*/],function(){//异步同时加载多个插件
      var toolbar = new AMap.ToolBar();
      map.addControl(toolbar);
      var driving = new AMap.Driving();//驾车路线规划
      driving.search(/*参数*/)
      var overview = new AMap.OverView();
      map.addControl(overview);/*
      var maptype = new AMap.MapType();
      map.addControl(maptype);*/
	});

////////////************实时路况
    var traffic = new AMap.TileLayer.Traffic({
	'autoRefresh': true,     //是否自动刷新，默认为false
	'interval': 180,         //刷新间隔，默认180s
    });

    map.add(traffic); //通过add方法添加图层
    //map.remove(traffic) //需要时可以移除




///////////****************查询公交站点
/*// 创建 AMap.Icon 实例：
var icon = new AMap.Icon({
    size: new AMap.Size(40, 50),    // 图标尺寸
    image: 'go/images/loc.png',  // Icon的图像
    //imageOffset: new AMap.Pixel(0, -60),  // 图像相对展示区域的偏移量，适于雪碧图等
    imageSize: new AMap.Size(40, 50)   // 根据所设置的大小拉伸或压缩图片
});
console.log(icon);*/

function gosearch(){
	searchtxt = document.getElementById("searchbox").value;
	map.remove(stations);
	////*****************查询公交站点
		AMap.plugin(["AMap.StationSearch"], function() {
	  //实例化公交站点查询类
	  var station = new AMap.StationSearch({
		pageIndex: 1, //页码，默认值为1
		pageSize: 10, //单页显示结果条数，默认值为20，最大值为50
		city: '0731' //限定查询城市，可以是城市名（中文/中文全拼）、城市编码，默认值为『全国』
	  });

	  //执行关键字查询
	  station.search(searchtxt, function(status, result) {
		//打印状态信息status和结果信息result
		//status：complete 表示查询成功，no_data 为查询无结果，error 代表查询错误。
		console.log(status, result);
		
		stations = new Array();
		//console.log(result.stationInfo[0].location.lng);
		for(i = 0,len=result.stationInfo.length; i < len; i++) {
				var lnglat = new AMap.LngLat(result.stationInfo[i].location.lng, result.stationInfo[i].location.lat);
				var name = result.stationInfo[i].name;
				//console.log(i,lnglat,name);
			var marker = new AMap.Marker({
				//position: new AMap.LngLat(112.59, 28.12),
				//var sta = result.stationInfo.shift();
				//icon: icon, // 添加 Icon 实例
				icon: 'go/images/loc-small.png', // 添加 Icon 图标 URL
				position:lnglat,   // 经纬度对象，也可以是经纬度构成的一维数组[116.39, 39.9]
				title: name
			});
			console.log(i,marker);
			stations.push(marker);/*
			////////////////////////****************locations
			locations.push({
				lnglat: lnglat, //点标记位置
				name: name,
				id:i})*/
		}
		console.log(stations);
		map.add(stations);
	  });	
	});
}


////*******************查询公交线路
AMap.plugin(["AMap.LineSearch"], function() {
    //实例化公交线路查询类
    var linesearch = new AMap.LineSearch({
        pageIndex: 1, //页码，默认值为1
        pageSize: 1, //单页显示结果条数，默认值为20，最大值为50
        city: "北京", //限定查询城市，可以是城市名（中文/中文全拼）、城市编码，默认值为『全国』
        extensions: "all" //是否返回公交线路详细信息，默认值为『base』
    });
/*
    //执行公交路线关键字查询
    linesearch.search('536', function(status, result) {
        //打印状态信息status和结果信息result
        console.log(status, result);
    });*/
});


/*******************按钮******************/

///***********正中间重置按钮
function reset(){
	map.setCenter(changsha);
	map.setZoom(10);
	//map.setZoomAndCenter(8, changsha);
}



////*************实时路况按钮
var showroads = true;
function roads(){
	if(showroads){
		map.remove(traffic);
		showroads=false;
		//$("#roadbtn").css("value","显示实时路况");
		document.getElementById("roadbtn").value="显示实时路况";
	}else{
		map.add(traffic);
		showroads=true;
		document.getElementById("roadbtn").value="隐藏实时路况";
	}
}

////******取消搜索
function notsearch(){
	map.remove(stations);
}


/*
////////****************海量点(另一种定位方法)
// 创建样式对象
var styleObject = {
    url: 'go/images/loc.png',  // 图标地址
    size: new AMap.Size(11,11),      // 图标大小
    anchor: new AMap.Pixel(5,5) // 图标显示位置偏移量，基准点为图标左上角
}

var massMarks = new AMap.MassMarks({
    zIndex: 5,  // 海量点图层叠加的顺序
    zooms: [3, 19],  // 在指定地图缩放级别范围内展示海量点图层
    style: styleObject  // 设置样式对象
});

function search(){
	gosearch();

	massMarks.setData(gosearch);

	// 将海量点添加至地图实例
	massMarks.setMap(map);
}*/