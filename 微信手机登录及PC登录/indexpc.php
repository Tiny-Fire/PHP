<?php
	include('./wechatlogin/login.php');
	define('APPID',            "vbfdsfd"); //此处为微信开放平台的appid及appsecret
	define('APPSECRET',        "gfdsbvgfdsv");
	define('REDIRECT_URI',     urlEncode('http://www.gfdacv.cn/zhaotest/indexpc.php'));
	define('SCOPE',            "snsapi_login");
	
	$weixin = new class_app();
	//传入授权临时票据（code）
	$code = $_GET['code'];
	if(!$code){
		$code = $weixin->getcode();
	}
	
	$oauth2_info = $weixin->oauth2_access_token($code);
	
	$result = $weixin->oauth2_get_user_info($oauth2_info['access_token'], $oauth2_info['openid']);
	echo '<pre/>';
	var_dump($result);

?>