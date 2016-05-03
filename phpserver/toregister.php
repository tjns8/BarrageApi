<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link
	href="static/css/index.css"
	rel="stylesheet" />
</head>
<body>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
	<?php 
	include 'src/include.php';
		$name = $_POST["username"];
		$pwd = $_POST["password"];
		$user = FDBCHelper::getUser($name);
		if ($user==null) {//可以注册
			$user = new User();
			$user->appkey= $name;
			$user->password= $pwd;
			FDBCHelper::addUser($user);
	?>
	<h2>
		注册成功，<a href="login.php">立即登陆</a>
	</h2>
	<?php 
		} else {
	?>
	<h2>
		<a href="register.php">注册失败，用户已存在</a>
	</h2>
	<?php 
		}
	?>
<?php include 'footer.include.html';?>
</body>
</html>