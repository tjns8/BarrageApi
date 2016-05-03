/**
 * version 0.0.1
 */
function Barrage() {
	/**
	 * 私有方法
	 */
	/**
	 * 内部计时器
	 */
	var time = 0;
	/**
	 * 弹幕数据缓存
	 */
	var array = null;
	/**
	 * 弹幕数据缓存指针
	 */
	var fp = 0;
	/**
	 * 启动控制开关
	 */
	var stop = false;
	/**
	 * 弹幕控制逻辑
	 */
	function popBarrage() {
		if (fp >= array.length)
			return;
		if (stop)
			return;
		var obj = {
			start : 0
		};
		var nfp=fp-1;
		if(nfp>=0){
			// 显示前一个元素
			 obj = array[nfp];
			addBarrage(obj.text);			
		}
		if (fp < array.length) {
			// 准备显示下一个元素
			var nextobj = array[fp];
			var st = nextobj.start - obj.start;
			setTimeout(function() {
				popBarrage();
			}, st);
		}
		fp+= 1;
	}
	;
	/**
	 * 从服务器获取弹幕资源
	 */
	function getText() {
		if(testError())return;
		var request = new XMLHttpRequest();
		request.open("get", barrageApi.ip + "?appkey=" + barrageApi.appkey
				+ "&sid=" + barrageApi.sid);
		request.onreadystatechange = function() {
//			console.log("readyState:"+request.readyState);
//			console.log("state:"+request.status);
			if(request.readyState!=4||request.status!=200)return;
			var c = request.responseText;
			if (c == "")
				return;
//			console.log(c);
			var cs = c.split("\n");
			array = new Array();
			for (var i = 0; i < cs.length; i++) {
				var str = cs[i];
				var obj = new Object();
				var sindex = str.indexOf(" ");
				obj.start = parseInt(str.substring(0, sindex));
				obj.text = str.substring(sindex + 1);
				array.push(obj);
			}
			array.sort(function(a, b) {
				return a.start - b.start;
			});
			popBarrage();
			console.log("success");
		};
		request.send(null);
	}
	;
	/**
	 * 显示一条弹幕
	 */
	function addBarrage(barrage_text) {
		var text = document.createElement("div");
		text.appendChild(document.createTextNode(barrage_text));
		var barrage = document.getElementById("barrage");
		barrage.appendChild(text);
		text.style.right = "-100px";
		var height = 0;
		if (barrage.currentStyle) {
			height = parseInt(barrage.currentStyle["height"]);
		} else {
			height = parseInt(getComputedStyle(barrage, false)["height"]);
		}
		var tsth = Math.random() * (height - 20);
		text.style.top = parseInt(tsth) + "px";
	}
	;

	/**
	 * 发送弹幕
	 * 
	 * @param text
	 *            要发送的内容
	 */
	Barrage.prototype.sendText = function(text) {
		if(testError())return;
		var request = new XMLHttpRequest();
		var start = new Date().getTime() - time;
		var data = 'appkey=' + barrageApi.appkey + '&sid=' + barrageApi.sid
				+ '&start=' + start + '&text=' + text;
		request.open("post", barrageApi.ip);
		request.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
		request.onreadystatechange = function() {
			var c = request.responseText;
		};
		request.send(data);
		addBarrage(text);
	};
	/**
	 * 启动弹幕
	 */
	Barrage.prototype.startMove = function() {
		time = new Date().getTime();
		fp = 0;
		setInterval(
				function() {
					var cnlist = document.getElementById("barrage").childNodes;
					for (var i = 0; i < cnlist.length; i++) {
						cnlist.item(i).style.right = parseInt(cnlist.item(i).style.right)
								+ 1 + "px";
					}
				}, 10);
		getText();
	};

	Barrage.prototype.stop = function() {
		stop = true;
		array = null;
		fp = 0;
	}
	
	function testError(){
		if(barrageApi.appkey==null){
			console.log("请设置appkey;barrageApi.appkey=\"your appkey\"");
			return true;
		}
		if(barrageApi.sid==null){
			console.log("请设置sid:barrageApi.sid=\"your sid\"");
			return true;
		}
		return false;
	}

	/**
	 * 请到官网申请注册appkey www.nathin.cn
	 */
	Barrage.prototype.appkey = null;
	/**
	 * 可动态创建的资源id
	 */
	Barrage.prototype.sid = null;

	/**
	 * api访问地址
	 */
	Barrage.prototype.ip = "http://nathin.cn/BarrageApi.php";
}
/**
* 基础通信能力库
*/
function BarrageCA(){
BarrageCA.prototype.register(userId){
}

}
/**
* 视频弹幕库
*/
function BarrageViewVideo(){

}
/**
* 图片弹幕库
*/
function BarrageViewImage(){

}
Window.prototype.barrageApi = new Barrage();
