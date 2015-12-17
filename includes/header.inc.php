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
// 使用判断index页面定义的常量，防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( "Access Denied!" );
}
?>
<div id="header">
	<h1>
		<a href="index.php">瓢城web俱乐部多用户留言系统</a>
	</h1>
	<ul>
		<li><a href="index.php">首页</a></li>
		<li><a href="register.php">注册</a></li>
		<li><a href="login.php">登录</a></li>
		<li>个人中心</li>
		<li>风格</li>
		<li>管理</li>
		<li>退出</li>
	</ul>
</div>