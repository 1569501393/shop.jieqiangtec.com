<?php
define('IN_ECTOUCH', true);
require (dirname(__FILE__) . '/../../mobile/include/init.php');
$oid = $_GET['oid'];
$_SESSION['wxch_oid'] = $oid;
$getoid = 'oid=' . $oid;
$appid = $db -> getOne("SELECT appid FROM `wxch_config` WHERE `id` = 1");
$cfg_baseurl = $db -> getOne("SELECT cfg_value FROM wxch_cfg WHERE cfg_name = 'baseurl'");
$back_url = $cfg_baseurl . 'wechat/oauth/wxch_back.php?' . $getoid;
$redirect_uri = urlencode($back_url);
$state = 'wechat';
$scope = 'snsapi_base';
$oauth_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=' . $scope . '&state=' . $state . '#wechat_redirect';
header('Expires: 0');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cahe, must-revalidate');
header('Cache-Control: post-chedk=0, pre-check=0', false);
header('Pragma: no-cache');
header("HTTP/1.1 301 Moved Permanently");
header("Location: $oauth_url");
exit;
