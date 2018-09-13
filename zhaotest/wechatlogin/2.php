<?php
header("Content-type: text/html; charset=utf-8");
include('./1.php');



// $redirect_url = urlencode('www.editbook.cn');



define('APPID',            "11111");
define('APPSECRET',        "222222");
define('REDIRECT_URI',     urlEncode('http://www.22222.cn/zhaotest/index.php'));
var_dump(REDIRECT_URI);
// $code = "041359a1b393c92a5a509ce24e2ef50f";


$weixin = new class_app();
// echo '<pre/>';
// var_dump($weixin);


//获取code
$code = $weixin->getcode();
var_dump($code);die;


//传入授权临时票据（code）
$oauth2_info = $weixin->oauth2_access_token($code);
var_dump($oauth2_info);

$result = $weixin->oauth2_get_user_info($oauth2_info['access_token'], $oauth2_info['openid']);
var_dump($result);
?>