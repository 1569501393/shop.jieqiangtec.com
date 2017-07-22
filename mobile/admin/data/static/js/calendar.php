<?php

/**
 * TGROUPON 调用日历 JS
 * ============================================================================
 * * 版权所有 2005-2012 TGROUPON中国，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: calendar.php 17217 2011-01-19 06:29:08Z liubo $
*/
define('IN_ECTOUCH', true);

$lang = (!empty($_GET['lang'])) ? trim($_GET['lang']) : 'zh_cn';

if (!file_exists('../../../lang/' . $lang . '/calendar.php') || strrchr($lang,'.'))
{
    $lang = 'zh_cn';
}

require(dirname(dirname(__FILE__)) . '/../config.php');
header('Content-type: application/x-javascript; charset=' . EC_CHARSET);

include_once('../../../lang/' . $lang . '/calendar.php');

foreach ($_LANG['calendar_lang'] AS $cal_key => $cal_data)
{
    echo 'var ' . $cal_key . " = \"" . $cal_data . "\";\r\n";
}

include_once('./calendar/calendar.js');

?>