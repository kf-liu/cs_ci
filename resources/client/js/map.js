var changsha = [112.59, 28.12]; 
var stations = new Array();
var loactions = new Array();
var searchtxt = "������ѧ";

var map = new AMap.Map('map-div',{
    mapStyle: 'amap://styles/fresh', //���õ�ͼ����ʾ��ʽ
});

//////**************��ͼ���*3
	AMap.plugin(['AMap.ToolBar','AMap.Driving','AMap.OverView'/*,'AMap.MapType'*/],function(){//�첽ͬʱ���ض�����
      var toolbar = new AMap.ToolBar();
      map.addControl(toolbar);
      var driving = new AMap.Driving();//�ݳ�·�߹滮
      driving.search(/*����*/)
      var overview = new AMap.OverView();
      map.addControl(overview);/*
      var maptype = new AMap.MapType();
      map.addControl(maptype);*/
	});

////////////************ʵʱ·��
    var traffic = new AMap.TileLayer.Traffic({
	'autoRefresh': true,     //�Ƿ��Զ�ˢ�£�Ĭ��Ϊfalse
	'interval': 180,         //ˢ�¼����Ĭ��180s
    });

    map.add(traffic); //ͨ��add�������ͼ��
    //map.remove(traffic) //��Ҫʱ�����Ƴ�




///////////****************��ѯ����վ��
/*// ���� AMap.Icon ʵ����
var icon = new AMap.Icon({
    size: new AMap.Size(40, 50),    // ͼ��ߴ�
    image: 'go/images/loc.png',  // Icon��ͼ��
    //imageOffset: new AMap.Pixel(0, -60),  // ͼ�����չʾ�����ƫ����������ѩ��ͼ��
    imageSize: new AMap.Size(40, 50)   // ���������õĴ�С�����ѹ��ͼƬ
});
console.log(icon);*/

function gosearch(){
	searchtxt = document.getElementById("searchbox").value;
	map.remove(stations);
	////*****************��ѯ����վ��
		AMap.plugin(["AMap.StationSearch"], function() {
	  //ʵ��������վ���ѯ��
	  var station = new AMap.StationSearch({
		pageIndex: 1, //ҳ�룬Ĭ��ֵΪ1
		pageSize: 10, //��ҳ��ʾ���������Ĭ��ֵΪ20�����ֵΪ50
		city: '0731' //�޶���ѯ���У������ǳ�����������/����ȫƴ�������б��룬Ĭ��ֵΪ��ȫ����
	  });

	  //ִ�йؼ��ֲ�ѯ
	  station.search(searchtxt, function(status, result) {
		//��ӡ״̬��Ϣstatus�ͽ����Ϣresult
		//status��complete ��ʾ��ѯ�ɹ���no_data Ϊ��ѯ�޽����error �����ѯ����
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
				//icon: icon, // ��� Icon ʵ��
				icon: 'go/images/loc-small.png', // ��� Icon ͼ�� URL
				position:lnglat,   // ��γ�ȶ���Ҳ�����Ǿ�γ�ȹ��ɵ�һά����[116.39, 39.9]
				title: name
			});
			console.log(i,marker);
			stations.push(marker);/*
			////////////////////////****************locations
			locations.push({
				lnglat: lnglat, //����λ��
				name: name,
				id:i})*/
		}
		console.log(stations);
		map.add(stations);
	  });	
	});
}


////*******************��ѯ������·
AMap.plugin(["AMap.LineSearch"], function() {
    //ʵ����������·��ѯ��
    var linesearch = new AMap.LineSearch({
        pageIndex: 1, //ҳ�룬Ĭ��ֵΪ1
        pageSize: 1, //��ҳ��ʾ���������Ĭ��ֵΪ20�����ֵΪ50
        city: "����", //�޶���ѯ���У������ǳ�����������/����ȫƴ�������б��룬Ĭ��ֵΪ��ȫ����
        extensions: "all" //�Ƿ񷵻ع�����·��ϸ��Ϣ��Ĭ��ֵΪ��base��
    });
/*
    //ִ�й���·�߹ؼ��ֲ�ѯ
    linesearch.search('536', function(status, result) {
        //��ӡ״̬��Ϣstatus�ͽ����Ϣresult
        console.log(status, result);
    });*/
});


/*******************��ť******************/

///***********���м����ð�ť
function reset(){
	map.setCenter(changsha);
	map.setZoom(10);
	//map.setZoomAndCenter(8, changsha);
}



////*************ʵʱ·����ť
var showroads = true;
function roads(){
	if(showroads){
		map.remove(traffic);
		showroads=false;
		//$("#roadbtn").css("value","��ʾʵʱ·��");
		document.getElementById("roadbtn").value="��ʾʵʱ·��";
	}else{
		map.add(traffic);
		showroads=true;
		document.getElementById("roadbtn").value="����ʵʱ·��";
	}
}

////******ȡ������
function notsearch(){
	map.remove(stations);
}


/*
////////****************������(��һ�ֶ�λ����)
// ������ʽ����
var styleObject = {
    url: 'go/images/loc.png',  // ͼ���ַ
    size: new AMap.Size(11,11),      // ͼ���С
    anchor: new AMap.Pixel(5,5) // ͼ����ʾλ��ƫ��������׼��Ϊͼ�����Ͻ�
}

var massMarks = new AMap.MassMarks({
    zIndex: 5,  // ������ͼ����ӵ�˳��
    zooms: [3, 19],  // ��ָ����ͼ���ż���Χ��չʾ������ͼ��
    style: styleObject  // ������ʽ����
});

function search(){
	gosearch();

	massMarks.setData(gosearch);

	// ���������������ͼʵ��
	massMarks.setMap(map);
}*/