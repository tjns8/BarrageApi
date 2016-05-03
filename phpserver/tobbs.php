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
include_once 'src/include.php';
if(!empty($_POST)){
	$fb=new Feedback();
	$fb->email=$_POST["username"];
	$fb->text=$_POST["feedback"];
	FDBCHelper::addFeedback($fb);
	echo "感谢您的支持";
}else {
	echo"提交无效";
}
?>
<?php include 'footer.include.html';?>
</body>
</html>