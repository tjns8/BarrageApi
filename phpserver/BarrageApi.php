<?php
include 'src/include.php';
header("Access-Control-Allow-Origin:*");
if(!empty($_POST)){//发送弹幕
	$bge=new Barrage();
	$bge->appkey=$_POST["appkey"];
	$bge->sid=$_POST["sid"];
	$bge->text=$_POST["text"];
	$bge->time=$_POST["start"];
	FDBCHelper::addBarrage($bge);
	echo "success";
}else if(!empty($_GET)){//获取弹幕
	header("Content-Type:text/html;charset=UTF-8");
	echo FDBCHelper::getBarrage($_GET["appkey"], $_GET["sid"]);
}else{
	echo "error";
}