<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月17日下午2:23:22
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'login');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
//打开session
session_start();
//检查登录状态
_check_login_state();
if($_GET['action'] == 'login') {
    //检查验证码
    _checkcode($_POST['code'],$_SESSION['code']);
    //引入注册检查过滤的函数库
    include ROOT_PATH.'includes/login.func.php';
    $clean = array();
    $clean['username'] = _check_username($_POST['username'], 2, 20);
    $clean['password'] = _check_password($_POST['password'],6);
    $clean['save'] = _check_saved_time($_POST['save']);
    $_sql = "SELECT tg_username,tg_uniqid FROM tg_user WHERE tg_username='{$clean['username']}' AND tg_password='{$clean['password']}' AND tg_active=''";
    if(!!$row = _fetch_array($_sql)){
        _closeDB();
        _session_destroy();
        _set_cookies_user($row['tg_username'],$row['tg_uniqid'], $clean['save']);
        _location(null, "index.php");
    } else {
        _closeDB();
        _session_destroy();
        _location("用户名或者密码错误，请重新登录!", "login.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--登录</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id='login'>
<h2>用户登录</h2>
	<form method="post" name="login" action="login.php?action=login">
	<dl>
	 	<dd>用 户 名：<input type="text" name="username" class="text"/>(*必填，至少两位)</dd>
	 	<dd>密　　码: <input type="password" name="password" class="text"/>(*必填，至少六位)</dd>
	 	<dd>记住账户: <input type="radio" name="save" value="0" checked="checked"/>不记住
	 	            <input type="radio" name="save" value="1"/>一天
	 	            <input type="radio" name="save" value="2"/>一周
	 	            <input type="radio" name="save" value="3"/>一个月 
	 	</dd>	
	 	<dd>验 证 码：<input type="text" name="code" class="text_code"/><img src="authcode.php" id="code"/></dd>
	 	<dd><input type="submit" name="login" value="登录" class="submit"> <input type="button" name='register' value='注册' class="button"/></dd>
	</dl>
	</form>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>
