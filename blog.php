<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月18日上午10:40:24
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'blog');
// 引入公共文件d
require dirname ( __FILE__ ) . '/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--博友</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?> 
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";

?>
<div id='blog'>
<h2>博友列表</h2>
<?php 
    for($i = 10;$i < 30; $i++) {
?>
<dl>
<dd class='user'>狗则</dd>
<dt><img src="face/m01.gif"/></dt>
<dd class='message'>发消息</dd>
<dd class='friend'>加为好友</dd>
<dd class='guest'>写留言</dd>
<dd class='flower'>给他送花</dd>
</dl>
<?php 
   }
?>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>