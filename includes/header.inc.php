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
		<?php 
		//holy shit! damn it !  FUCK !!!!! usename!!!!!! username!!!!!!!!!!
		  if(isset($_COOKIE['username'])){
		      echo '<li><a href="member.php">'.$_COOKIE['username'].'·个人中心</a></li>';
		  } else {
		      echo '<li><a href="register.php">注册</a></li>';
		      echo "\n";
		      echo '<li><a href="login.php">登录</a></li>';
		  }
		?>
		<li><a href="blog.php">博友</a></li>
		<li>风格</li>
		<li>管理</li>
		<?php 
		  if(isset($_COOKIE['username'])){
		    echo '<li><a href="logout.php">退出</a></li>';
		  }
		?>
	</ul>
</div>