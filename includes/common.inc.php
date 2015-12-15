<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date: 2015-12-7
*/
//设置字符编码
header("Content-Type:text/html;charset=utf-8");
//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Denied!');
}
//设置字符集编码
header('Content-Type: text/html; charset=utf-8');
//定义当前PHP版本的表单自动转义标识符 true 自动转义 false 否
define('GPC', get_magic_quotes_gpc());
/*
 * 拒绝低版本，版本太低可能功能实现不了
 */
if (PHP_VERSION < '4.1.0') {
    exit ( "PHP version is too low!" );
}
/*
 * 定义引用使用的根路径，使用绝对路径加快引用速度
*/
define ( "ROOT_PATH", substr ( dirname ( __FILE__ ), 0, - 8 ) );
//引入公共函数库
require ROOT_PATH.'includes/global.func.php';

//页面执行耗时的开始时间
define('START_TIME', _runtime());
?>
