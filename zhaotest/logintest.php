<?php
	include('./wechatlogin/phone.php');
	define('APPID',            "fdsafds"); //此处是公众号的appid及appsecret
	define('APPSECRET',        "bgfsbfd");
	define('REDIRECT_URI',     urlEncode('http://www.editbook.cn/zhaotest/indexphone.php'));
	define('SCOPE',            "snsapi_userinfo");
	
	$weixin = new class_app();
	//传入授权临时票据（code）
	$code = $_GET['code'];
	if(!$code){
		$code = $weixin->getcodephone();
	}
	// var_dump($code);die;
	
	$oauth2_info = $weixin->oauth2_access_token($code);
	
	$result = $weixin->oauth2_get_user_info($oauth2_info['access_token'], $oauth2_info['openid']);
	echo '<pre/>';
	var_dump($result);

?>