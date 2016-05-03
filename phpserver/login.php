<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link
	href="static/css/index.css"
	rel="stylesheet" />
<script
	src="static/js/jquery.1.11.js"
	type="text/javascript"></script>
<script
	src="static/js/jquery.form.js"
	type="text/javascript"></script>
<script
	src="static/js/common.js"
	type="text/javascript"></script>
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
						action="tologin.php"
							method="post">
							<input type='hidden' name='token_id' value='10'> <input
								type='hidden' name='token'
								value='86de97630846d14077e001fa166261c1'> <input
								type="hidden" value="/app" id="returnUrl" name="returnUrl">
							<div class="reg-inner login">
								<div class="title">
									<h2>登陆</h2>
									<p>
										没有帐号？<a href="register.php">立即注册</a>
									</p>
								</div>
								<ol class="clearfix">
									<li><label for="username">AppKey</label> <input
										type="text" class="input" placeholder="请输入注册AppKey"
										target="username" id="username" name="username" /> <span
										class="icon i-un"></span> </li>
									<li><label for="password">密码</label> <input
										type="password" class="input" placeholder="请输入密码"
										target="password" id="password" name="password" /> <span
										class="icon i-pwd" style="top: 14px;"></span> <span
										class="errorinfo" target="password" style="display: none;">请输入您的密码</span>
									</li>
									<li
										style="margin-top: 50px; padding-left: 167px; margin-bottom: 2px;">
										<input type="submit" value="登陆" class="refer" id="devLoginBtn">
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