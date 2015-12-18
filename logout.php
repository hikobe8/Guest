<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月17日下午9:17:14
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
//打开session
session_start();
_logout();
_location(null, "index.php");
?>