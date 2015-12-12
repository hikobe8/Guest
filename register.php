<?php
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'register');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
//判断表单是否提交
if($_GET['action'] != 'register') {
	exit("非法提交!");
}
session_start();
//检查验证码
$authcode = $_POST['code'];
if(!($_SESSION['code'] == $authcode)) {
	_alert_back('验证码错误，请重新输入！');
}
$userinfo = array();
$userinfo['username'] = $_POST['username'];
$userinfo['password'] = $_POST['password'];
$userinfo['notepassword'] = $_POST['notepassword'];
$userinfo['passt'] = $_POST['passt'];
$userinfo['passd'] = $_POST['passd'];
$userinfo['username'] = $_POST['username'];
print_r($userinfo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--注册</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/face.js"></script>
<script type="text/javascript" src="js/code.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id="register">
	<h2>用户注册</h2>
	<form method="post" name="registerform" action="register.php?action=register">
	<dl>
		<dt>请认真填写以下信息</dt>
	 	<dd>用 户 名：<input type="text" name="username" class="text"/>(*必填，至少两位)</dd>
	 	<dd>密　　码: <input type="password" name="password" class="text"/>(*必填，至少六位)</dd>
	 	<dd>确认密码: <input type="password" name="notepassword"class="text"/>(*必填，同上)</dd>
	 	<dd>密码提示: <input type="text" name="passt" class="text"/>(*必填，至少两位)</dd>
	 	<dd>密码回答: <input type="text" name="passd" class="text"/>(*必填，至少两位)</dd>
	 	<dd>性　　别: <input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女"/>女</dd>	
	 	<dd class='face'><input type="hidden" name="facesrc" value="face/m01.gif" /><img src="face/m01.gif" alt="头像选择" id='faceImg'></dd>
	 	<dd>电子邮件: <input type="text" name="email"class="text"/></dd>
	 	<dd>　QQ　　: <input type="text" name="qq"class="text"/></dd>
	 	<dd>主页地址: <input type="text" name="url" value="http://" class="text"/></dd>
	 	<dd>验 证 码：<input type="text" name="code" class="text_yzm"/><img src="authcode.php" id="code"/></dd>
	 	<dd><input type="submit" name="register" value="注册" class="submit"></dd>
	</dl>
	</form>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>