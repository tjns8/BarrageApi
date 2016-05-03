<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>用户反馈</title>
<link href="static/css/index.css" rel="stylesheet" />
</head>
<body>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
<div class="main">
		<div class="content">
			<div class="login_wrap">
				<div class="wrap_bak">
					<div class="cont_form">
						<form class="form-horizontal" role="form" id="login_form"
							action="tobbs.php" method="post">
							<div class="reg-inner login">
								<div class="title">
									<h2>反馈</h2>
								</div>
								<ol class="clearfix">
									<li><label for="username">联系方式</label> <input type="text"
										class="input" placeholder="请输入注册邮箱/手机号码/" target="username"
										id="username" name="username" /> <span class="icon i-un"></span>
										<span class="errorinfo" target="username"
										style="display: none;">请输入邮箱</span></li>
									<li>
									<label>反馈内容</label>
									<textarea draggable="false"  style="height: 150px;" cols="5" class="input" name="feedback"></textarea>
									</li>
									<li
										style="margin-top: 50px; padding-left: 167px; margin-bottom: 2px;">
										<input type="submit" value="提交" class="refer" id="devLoginBtn">
									</li>
								</ol>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.include.html';?>
</body>
</html>