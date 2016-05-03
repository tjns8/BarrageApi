<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>弹云即时弹幕 - 专注为 App 开发者提供 弹幕 云服务</title>
<?php include 'meta.include.html';?>
</head>
<body>
<?php include_once("baidu_js_push.php") ?>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
	<div class="main">
		<link href="css/typetype.css" type="text/css" rel="stylesheet">
		<style type="text/css">
.main {
	overflow: hidden
}
</style>
		<script src="js/jquery.typetype.min.js"></script>
		<div class="indexBG">
			<div class="wrap banner">
				<div class="bannerInner">
					<img src="images/newVersion/bannerInner.png" alt="开发者首选的即时弹幕云">
				</div>
				<div class="banner-account">
					<a class="banner-signup" href="register.php"><img
						src="images/newVersion/banner-signup.png" /><img
						style="display: none" src="images/newVersion/banner-signup-h.png" /></a>
				</div>
				<div class="phoneBox outer clearfix"></div>
			</div>

		</div>
		<?php include 'rongnav.include.html';?>
		<div class="intro-ser">
			<div class="wrap">
				<dl>
					<dt class="center">稳定可靠的弹幕服务</dt>
					<dd class="center"></dd>
				</dl>
				<div class="intro">
					<p>以版本号的形式进行消息增量同步，弹云使消息不丢、不重、有序，让 App 用户畅享无障碍沟通</p>
					<p>全栈二进制通讯协议，数据全程加密，安全可靠，出色的性能及流量优化，为你带来出众的体验</p>
					<!--             <p>全球多节点服务，为你提供各大洲稳定的海外链路支持，让全球范围内用户实现秒级到达</p> -->
					<p>多活数据中心架构，异地数据备份，为你带来不间断的消息服务</p>
				</div>
				<div class="words">
					<p>
						<i>经过实际使用之后，我们发现弹云提供的 弹幕 云服务稳定、专业，</i>
					</p>
					<!--             <p><i>在业界有着良好的口碑，所以选择接入融云的 IM 云服务。</i></p> -->
					<p class="name">开发者 xxx</p>
				</div>
			</div>
		</div>
		<div class="intro-fea">
			<div class="wrap">
				<dl>
					<dt class="center">海量并发的极致性能</dt>
					<dd class="center"></dd>
				</dl>
				<div class="intro">
					<p>无状态服务集群，服务、数据、网络均可动态伸缩，无限扩展，重新定义高性能</p>
					<p>多点接入，整体接入网络优化，优质的用户体验全面提升，无可比象</p>
					<p>不限制用户数量、不限制存储空间，弹云给你的自由，非比寻常</p>
				</div>
				<div class="words">
					<p>
						<i>作为一款娱乐软件，XX 每天数万用户的沟通都要建立在弹幕业务上，借助弹云，</i>
					</p>
					<p>
						<i>即使在用户量高速增长的情况下，也能保证 XX 聊天私信的到达率和及时性，从而大大提高了我们的用户粘性。</i>
					</p>
					<p class="name">XX开发者 XX</p>
				</div>
			</div>
		</div>
		<div class="intro-fun">
			<div class="wrap">
				<dl>
					<dt class="center">无微不至的技术服务</dt>
					<dd class="center clearfix">
						<div class="fun-word">
							<div class="fun-left">
								<h3>
									<a href="bbs.php" target="_blank">论坛</a>
								</h3>
								<p>包罗万象的论坛</p>
								<p>让你及时获取开发技巧</p>
							</div>
							<div class="fun-left">
								<h3>
									<a href="docs/index.html?doc" target="_blank">文档</a>
								</h3>
								<p>步骤式文档</p>
								<p>让你的集成更轻松</p>
							</div>
						</div>
						<div class="fun-pic"></div>
					</dd>
				</dl>
				<div class="words">
					<p>
						<i>在整个集成的过程中，弹云一直密切配合XXX， </i>
					</p>
					<p>
						<i>确保项目顺利上线，满足用户在移动端与我们服务人员进行及时交流，在此对弹云表示感谢！</i>
					</p>
					<p class="name">XXX XXX</p>
				</div>
			</div>
		</div>
		<style>
.header {
	background: #060509 url(images/newVersion/headerBG.png) 50% 0px/auto
		87px no-repeat;
	margin-bottom: 0;
	height: 87px;
}

* {
	box-sizing: border-box;
}

.footer-nav .items li.contact_us span.icon_phone {
	background: url(images/newVersion/icon_phone.png) 0 0/26px auto
		no-repeat;
}

.footer-nav .items li.contact_us span.icon_qq {
	background: url(images/newVersion/icon_qq.png) 0 0/26px auto no-repeat;
}

.footer-nav .items li.contact_us span.icon_mail {
	background: url(images/newVersion/icon_mail.png) 0 0/26px auto no-repeat;
}

.footer {
	background-color: #0f1014;
}

.footer-nav .items li span {
	color: #c7c7c7;
}

.footer-nav .items li.contact_us div font {
	
}

.footer-nav .items li.liHeader {
	border-color: #009cff;
}

.footer-nav .items a {
	color: #b3b3b3
}

.footer p {
	color: #9ca8af;
}

.footer-inner span a {
	color: #9ca8af
}

.footer-nav .items li.contact_us div font {
	color: #b3b3b3
}

@media screen and (min-width:0\0) {
	/* IE9 , IE10 ,IE11 rule sets go here */
	.phoneBox {
		padding-top: 39px;
	}
	.typeLast {
		margin-bottom: 22px;
	}
}

@
-moz-document url-prefix () { .typeLast {
	margin-bottom: 22px;
}
}
</style>
		<script>
			window.onload = function() {
				$(function() {
					$(".banner-account").find("a").bind({
						mouseover : function() {
							$(this).find("img").eq(0).hide();
							$(this).find("img").eq(1).show();
						},
						mouseout : function() {
							$(this).find("img").eq(1).hide();
							$(this).find("img").eq(0).show();
						}
					})
				});

				var scrollFunc = function(e) {
					e = e || window.event;
					if (e && e.preventDefault) {
						e.preventDefault();
						e.stopPropagation();
					} else {
						e.returnvalue = false;
						return false;
					}
				};
				$('.message-scroll').on('mousewheel', function(e) {
					scrollFunc(e);
				});
				//火狐下的鼠标滚动事件
				$('.message-scroll').on('DOMMouseScroll', function(e) {
					scrollFunc(e);
				});

				//type
				function liShow(selector, time) {
					var cur = $("." + selector);
					cur.animate({
						"margin-top" : "10px"
					}, time);
					cur.removeClass(selector).next().addClass(selector);
				}
				setTimeout(typeShow, 300);
				function initHtml() {
					$(".scrollable ul:eq(0)")[0].scrollTop = 0;
					$(".scrollable ul:eq(1)")[0].scrollTop = 0;
					$(".scrollable").removeClass("pR0");
					$(".scrollable ul").removeClass("oS");
					$('.scrollCover1').css({
						"display" : "block"
					});
					$(".scrollable ul li").removeClass("nextShow1").css({
						"margin-top" : "0px"
					});
					$(".screen1 .scrollable ul li").first().addClass(
							"nextShow1");
					$(".screen2 .scrollable ul li").first().addClass(
							"nextShow2");
					setTimeout(typeShow, 0);
				}

				function typeShow() {
				}
				;
			};
		</script>

<?php include 'footer.include.html';?>
	</div>

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
		style="display: none; z-index: 1000;" title="返回顶部"> <img id="upImg"
		src="images/up.png">
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
<script src='js/browser_ie.js'></script>
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