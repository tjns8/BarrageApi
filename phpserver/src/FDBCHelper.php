<?php
/**
 * 文件数据辅助
 * 主要用于保存弹幕，反馈为文件
 * @author cat
 */
class FDBCHelper {
	const  rootPath="data/";
// 	const  rootPath="/home/cat/workspace/BarrageAPI-android/phpserver/data/";
	static function getPath($key,$sid){
		return FDBCHelper::rootPath.$key."/".$sid.".barrage";
	}
	
	public static function addBarrage(Barrage $barrage){
		$fp=fopen(FDBCHelper::getPath($barrage->appkey,$barrage->sid), "a");
		fputs($fp, $barrage->time." ".$barrage->text."\n");
		fclose($fp);
	}
	public static function getBarrage($appkey,$sid) {
		$bpath=FDBCHelper::getPath($appkey,$sid);
		if(file_exists($bpath)){
		$fp=fopen($bpath, "r");
		while(!feof($fp)){
			echo fgets($fp);
		}
		}
	}
	public static function addFeedback(Feedback $feedback) {
		$fbpath=FDBCHelper::rootPath."feedback/".date('y_m_d_h_i_s',time());
		$fp=fopen($fbpath, "w");
		fputs($fp, $feedback->email."\n".$feedback->text);
		fclose($fp);
	}
	public static function getFeedback(){
		$fbpath=FDBCHelper::rootPath."feedback/";
		$fdsname=dir($fbpath);
		while ($fdname = $fdsname->read()){
		echo $fdname."<p/>";
		echo "			".readfile($fdsname->path."/".$fdname)."<p/>";
		}
	}
	public static function addUser(User $user) {
		$mpath=FDBCHelper::rootPath.$user->appkey."/";
		$upath=$mpath."_info.user";
		mkdir($mpath);
		$fp=fopen($upath, "w");
		fputs($fp, $user->password);
		fclose($fp);
	}
	public static function getUser($name) {
		$upath=FDBCHelper::rootPath.$name."/_info.user";
		if(file_exists($upath)){
			$fp=fopen($upath, "r");
			$pwd=fgets($fp);
			fclose($fp);
			$user=new User();
			$user->appkey=$name;
			$user->password=$pwd;
			return $user;
		}else{
			return null;
		}
	}
	
}
