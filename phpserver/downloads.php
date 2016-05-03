<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>下载 - 弹云即时弹幕云</title>
<?php include 'meta.include.html';?>
</head>
<body>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
	<div class="main">
		<link href="css/style.css" rel="stylesheet">
		<style>
.header {
	background: #060509 url(images/newVersion/headerBG.png) 50% 0px/auto
		87px no-repeat;
	margin-bottom: 0;
	height: 87px;
}
</style>
		<div class="mainCon">
			<div class="dl_top">
				<div class="wrap">
					<div class="dl_topLight"></div>
					<h2>免费下载 弹云 SDK</h2>
					<p class="d">
						<span>简单几行代码让您集成无难度，</span>方便快捷，稳定可靠。
					</p>
				</div>
			</div>

			<div class="dl_cont">
				<div class="wrap dl_pv clearfix">
					<div class="clearfix">
						<div class="dl_item android">
							<div class="dl_title">
								<i style="margin-left: 87px;"></i> <span>Android</span>
							</div>
							<div class="dl_mid">
								<div class="dl_body">
									<p class="tit clearfix">
										<a target="_blank" href="">V0.0.2</a>
										<span>更新于：<em>2016/03/11</em></span>
									</p>

									<div class="R_dl">
										<div class="button">
											<a target="_blank"
												href="download/android/barrage-0.0.2.jar"
												class="btn"><i class="dl_icon2"></i> SDK 下载</a>
										</div>

										<div class="button">
											<a target="_blank"
												href="download/android/Barrage-android-demo.zip"
												class="btn"><i class="dl_icon2"></i>demo 下载</a>
										</div>
									</div>


								</div>


								<div class="dl_footer">
									<p>
										<i>|</i><a target="_blank" href="docs/android.html">开发指南</a><i>|</i><a
											href="bbs.php" target="_blank">论坛</a><i>|</i><a
											target="_blank"
											href="">历史版本</a><i>|</i>
									</p>
								</div>
							</div>
						</div>
						<!-- end android -->
						<div class="dl_item web">
							<div class="dl_title">
								<i style="margin-left: 87px;"></i> <span>Web</span>
							</div>
							<div class="dl_mid">
								<div class="dl_body">
									<p class="tit clearfix">
										<a target="_blank" href="">V0.0.1</a>
										<span>更新于：<em>2016/03/18</em></span>
									</p>

									<div class="R_dl">
										<div class="button">
											<a target="_blank"
												href="download/web/barrage.js"
												class="btn"><i class="dl_icon2"></i> SDK 下载</a>
										</div>

										<div class="button">
											<a target="_blank"
												href="download/web/jsdemo.html"
												class="btn"><i class="dl_icon2"></i>demo 演示</a>
										</div>
									</div>


								</div>


								<div class="dl_footer">
									<p>
										<i>|</i><a target="_blank" href="docs/web.html">开发指南</a><i>|</i><a
											href="bbs.php" target="_blank">论坛</a><i>|</i><a
											target="_blank"
											href="">历史版本</a><i>|</i>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //wrap -->
			</div>
			<!-- //dl_cont -->
			
<?php include 'rongnav.include.html';?>


			<!-- 2014-11-19 结束 -->

		</div>
		<!-- //main -->
		<script type="text/javascript">
			$(function() {
				var timer = 400;
				$(".edition").hover(function() {
					clearTimeout(timer);
					$("#info").show();
				}, function() {
					timer = setTimeout(function() {
						$("#info").hide();
					}, 400);
				});
				var timer = 400;
				$("#info").hover(function() {
					clearTimeout(timer);
					$("#info").show();
				}, function() {
					timer = setTimeout(function() {
						$("#info").hide();
					}, 400);
				});

				$(".voip_check")
						.bind(
								"click",
								function(event) {
									var isChk = 1;
									if ($(this).prop("checked")) {
										isChk = 1;
									} else {
										isChk = 0;
									}
									if (!$(this).is(".old_voip_checked")) {
										$(this)
												.parent()
												.prev()
												.find("a")
												.each(
														function(index, el) {
															var link = $(this)
																	.attr(
																			"href");
															if (isChk
																	&& !/with_voip/i
																			.test(link)) {
																link = link
																		.replace(
																				/\.zip/i,
																				'_with_voip.zip');
																$(this).attr(
																		"href",
																		link);
															} else if (!isChk
																	&& /with_voip/i
																			.test(link)) {
																link = link
																		.replace(
																				/_with_voip/i,
																				'');
																$(this).attr(
																		"href",
																		link);
															}
														});
									} else {
										$(this)
												.parent()
												.prev()
												.find("a")
												.each(
														function(index, el) {
															var link = $(this)
																	.attr(
																			"href");
															if (isChk
																	&& /no_voip/i
																			.test(link)) {
																link = link
																		.replace(
																				/_no_voip/i,
																				'');
																$(this).attr(
																		"href",
																		link);
															} else if (!isChk
																	&& !/no_voip/i
																			.test(link)) {
																link = link
																		.replace(
																				/\.zip/i,
																				'_no_voip.zip');
																$(this).attr(
																		"href",
																		link);
															}
														});

									}

								});
			});
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