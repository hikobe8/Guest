<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date: 2015-12-9
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
// 定义调用样式的常量
define ( "SCRIPT", 'face' );
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>多用户留言系统--头像选择</title>
<?php require ROOT_PATH.'includes/title.inc.php';?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
<body>
	<div id="face">
		<h3>头像选择</h3>
		<dl>
		<?php foreach (range(1, 64) as $number){?>
		<dd>
				<img
					src='face/m<?php
			echo $number < 10 ? '0' . $number : $number;
			?>.gif'
					alt='face/m<?php
			echo $number < 10 ? '0' . $number : $number;
			?>'
					title="avatar<?php echo $number?>" />
			</dd>
		<?php }?>
		</dl>
	</div>
</body>
</html>