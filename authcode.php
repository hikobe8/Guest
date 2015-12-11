<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月10日下午9:34:10
 */
define('IN_TG', true);
header("Content-Type:image/png");
session_start();
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
_code();
?>