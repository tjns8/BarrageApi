<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>即时弹幕 - 弹云即时弹幕云</title>
<?php include 'meta.include.html';?>
</head>
<body>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
	<div class="main">

		<div class="func-show mainCon">
			<div class="iphone">
				<div class="iphonePos">
					<div class="screen3"></div>
					<div class="screen2"></div>
				</div>
			</div>
		</div>

<?php include 'rongnav.include.html';?>
		<div class="func-dialogue" id="single">
			<div class="wrap clearfix">
				<div class="func-left">
					<h3>
						<img alt="弹幕" />
					</h3>
					<div class="fea-words">
						<p>有了弹云，弹幕总是能完美融入到每一个应用场景里，</p>
						<p>方寸之间，尽显其能。</p>
					</div>
				</div>
				<div class="func-right">
					<img src="images/newVersion/product_07.png" alt="弹幕" />
				</div>
			</div>
		</div>
		<div class="func-dialogue" id="CustomerService">
			<div class="wrap clearfix">
				<div class="func-left">
					<h3>
						<img src="images/newVersion/product_12.png?0908"
							alt="CustomerService" />
					</h3>
					<div class="fea-words">
						<p>精心设计的弹幕系统，</p>
						<p>几行代码就能让应用获得专业的弹幕能力。</p>
					</div>
					<div class="fea-words">
						<p>无需考虑繁琐细节</p>
						<p>弹云助您一步到位。</p>
					</div>
				</div>
			</div>
		</div>
		<div class="func-dialogue" id="togoDev">
			<div class="wrap clearfix togoDevWrap">
				<span><img src="images/newVersion/product_14.png"
					alt="即刻成为弹云开发者" /></span> <span><a
					href="register.php"><img
						src="images/newVersion/product_15.png" alt="开始体验" /></a></span>
			</div>
		</div>


<?php include 'footer.include.html';?>
	</div>
	<script type="text/javascript">
		$(".func-show-nav a").click(
				function() {
					if ($(this).has(".active")) {
						$(this).addClass("active").parent().find("a").not(this)
								.removeClass("active");
					}
				})
	</script>

	<div style="display: none;">
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "//hm.baidu.com/hm.js?6c40173c3f3182c1f56945e4afa2948a";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>
		<script type='text/javascript'>
			var _vds = _vds || [];
			window._vds = _vds;
			(function() {
				_vds
						.push([ 'setAccountId',
								'089eda6af7a2494dba4bfca5b6c0f096' ]);
				(function() {
					var vds = document.createElement('script');
					vds.type = 'text/javascript';
					vds.async = true;
					vds.src = ('https:' == document.location.protocol ? 'https://'
							: 'http://')
							+ 'dn-growing.qbox.me/vds.js';
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(vds, s);
				})();
			})();
		</script>
	</div>
	<a id="up" class="up" href="javascript:void(0)"
		style="display: none; z-index: 1000;" title="返回顶部"> <img
		id="upImg" src="images/up.png">
	</a>
	<style type="text/css">
#MECHAT-PCBTN {
	background-color: #0099ff !important;
}

#MECHAT-PCBTN:hover {
	background-color: #018fed !important;
}

#MECHAT-LAYOUT {
	border-color: #0099ff !important;
}
</style>
</body>
</html>
<script type="text/javascript">
	$(function() {
		$(".header-logo").bind({
			mouseover : function() {
				$(this).find("img").eq(0).removeClass("cur");
				$(this).find("img").eq(1).addClass("cur");
			},
			mouseout : function() {
				$(this).find("img").eq(1).removeClass("cur");
				$(this).find("img").eq(0).addClass("cur");
			}
		})
	});
	BackTop = function(btnId) {
		var btn = document.getElementById(btnId), upImg = document
				.getElementById("upImg");
		window.onscroll = set;
		btn.onclick = function() {
			var d = document.documentElement.scrollTop
					|| document.body.scrollTop;
			upImg.src = "images/up1.png";
			window.onscroll = null;
			btn.timer = setInterval(function() {
				d -= Math.ceil(d * 0.1);
				document.documentElement.scrollTop = d;
				document.body.scrollTop = d;
				if (d <= 0) {
					clearInterval(btn.timer);
					window.onscroll = set;
					upImg.src = "images/up.png";
					btn.style.display = 'none';
				}
			}, 10);
		};
		function set() {
			var d = document.documentElement.scrollTop
					|| document.body.scrollTop;
			btn.style.display = d > (document.documentElement.clientHeight || document.body.clientHeight) ? 'block'
					: "none";
			/*if(d>(document.documentElement.clientHeight||document.body.clientHeight))
			 {
			 if(btn.style.display!="block"){
			 upImg.src="images/up1.png";
			 btn.style.display='block';
			 window.setTimeout(function(){
			 upImg.src="images/up.png";
			 },300)
			 }
			 }else{
			 btn.style.display='none';
			 }*/
		}
	};
	//BackTop('up');
</script>
<script src='js/browser_ie.js?v=6fca4dfc05617bc9a4b63e1f83632fb4'></script>
<script type="text/javascript" src="http://s.union.360.cn/2486.js"></script>
<script type="text/javascript">
	var _mvq = _mvq || [];
	_mvq.push([ '$setAccount', 'm-182480-0' ]);

	_mvq.push([ '$logConversion' ]);
	(function() {
		var mvl = document.createElement('script');
		mvl.type = 'text/javascript';
		mvl.async = true;
		mvl.src = ('https:' == document.location.protocol ? 'https://static-ssl.mediav.com/mvl.js'
				: 'http://static.mediav.com/mvl.js');
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(mvl, s);
	})();

	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o), m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js',
			'ga');

	ga('create', 'UA-72940215-1', 'auto');
	ga('send', 'pageview');
</script>