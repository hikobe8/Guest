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

// 定义防止恶意调用使用的常量,供子页面检查
define ( "IN_TG", true );
//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="style/1/basic.css" />
<link rel="stylesheet" type="text/css" href="style/1/index.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>多用户留言系统--首页</title>
</head>
<body>
	<?php
	require ROOT_PATH."includes/header.inc.php";
	// 使用相对路径效率比使用绝对路径低
	// require 'includes/header.inc.php';
	?>
	<div id="list">
		<h2>帖子列表</h2>
	</div>
	<div id="user">
		<h2>新进会员</h2>
	</div>
	<div id="pics">
		<h2>最新图片</h2>
	</div>
	<?php
	require ROOT_PATH."includes/footer.inc.php";
	//require 'includes/footer.inc.php';
	?>>
</body>
</html>