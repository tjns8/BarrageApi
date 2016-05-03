<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="static/css/index.css" rel="stylesheet" />
</head>
<body>
<?php include 'ie.include.html';?>
<?php include 'header.include.html';?>
	<?php
	include 'src/include.php';
	$name = $_POST ["username"];
	$pwd = $_POST ["password"];
	// JDBCHelper.init("localhost", "root", "tjns800");
	$user=FDBCHelper::getUser($name);
	if ($user==null) { // 用户不存在
		?>
	<h2>
		<a href="login.php">用户名不存在</a>
	</h2>
	<?php } else if ($user->password==$pwd) { ?>
	<h2>登陆成功</h2>
	<?php  } else { ?>
	<h2>登陆失败</h2>
	<?php
	}
	?>
<?php include 'footer.include.html';?>
</body>
</html>