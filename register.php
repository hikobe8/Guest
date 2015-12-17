<?php
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'register');
//打开session
session_start();
// 引入公共文件d
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(($_GET['action'] == 'register')){
    //检查验证码
    _checkcode($_POST['code'],$_SESSION['code']);
    //引入注册检查过滤的函数库
    include ROOT_PATH.'includes/register.func.php';
    //用一个数组保存表单提交个数据
     $clean = array();
    //生成一个激活id
    $clean['active'] = sha1(uniqid(rand(),true));
    $clean['uniqid'] = _check_uniqid($_POST['uniqid'], $_SESSION['uniqid']);
    $clean['username'] = _check_username($_POST['username'], 2, 20);
    $clean['password'] = _check_password($_POST['password'], $_POST['notpassword'], 6);
    $clean['sex'] = _mysql_string($_POST['sex']);
    $clean['facesrc'] = _mysql_string($_POST['facesrc']);
    $clean['passt'] = _check_pwd_question($_POST['passt'], 2, 8);
    $clean['passd'] = _check_pwd_answer($_POST['passt'], $_POST['passd'], 2, 8);
    $clean['email'] = _check_email($_POST['email'],6,40);
    $clean['qq'] = _check_qq($_POST['qq']);
    $clean['url'] = _check_url($_POST['url']);   
    //防止重复注册
    _is_repeat("SELECT * FROM tg_user WHERE tg_username = '{$clean['username']}'", "用户名重复,请重新注册!");
    _query("INSERT INTO tg_user (
                                                tg_uniqid,
                                                tg_username,
                                                tg_password,
                                                tg_question,
                                                tg_answer,
                                                tg_email,
                                                tg_qq,
                                                tg_url,
                                                tg_active,
                                                tg_sex,
                                                tg_face,
                                                tg_reg_time,
                                                tg_last_time,
                                                tg_last_ip
                                    ) values (
                                                '{$clean['uniqid']}',
                                                '{$clean['username']}',
                                                '{$clean['password']}',
                                                '{$clean['passt']}',
                                                '{$clean['passd']}',
                                                '{$clean['email']}',
                                                '{$clean['qq']}',
                                                '{$clean['url']}',
                                                '{$clean['active']}',
                                                '{$clean['sex']}',
                                                '{$clean['facesrc']}',
                                                NOW(),
                                                NOW(),
                                                '{$_SERVER['REMOTE_ADDR']}'
                                                )");
    if(_affect_rows() != 1) {
        _closeDB();
        _session_destroy();
        _location("注册失败,请重新注册!", 'register.php');
    } else {
        _closeDB();
        _session_destroy();
        _location("恭喜您,注册成功,点击跳转到激活页面!", 'active.php?active='.$clean['active']);
    }
} else {
    //生成uniqid
    $_SESSION['uniqid'] = $uniqid = sha1(uniqid(rand(),true));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--注册</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id="register">
	<h2>用户注册</h2>
	<form method="post" name="registerform" action="register.php?action=register">
	<input type="hidden" name="uniqid" value="<?php echo $uniqid;?>"/>
	<dl>
		<dt>请认真填写以下信息</dt>
	 	<dd>用 户 名：<input type="text" name="username" class="text"/>(*必填，至少两位)</dd>
	 	<dd>密　　码: <input type="password" name="password" class="text"/>(*必填，至少六位)</dd>
	 	<dd>确认密码: <input type="password" name="notpassword"class="text"/>(*必填，同上)</dd>
	 	<dd>密码提示: <input type="text" name="passt" class="text"/>(*必填，至少两位)</dd>
	 	<dd>密码回答: <input type="text" name="passd" class="text"/>(*必填，至少两位)</dd>
	 	<dd>性　　别: <input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女"/>女</dd>	
	 	<dd class='face'><input type="hidden" name="facesrc" value="face/m01.gif" /><img src="face/m01.gif" alt="头像选择" id='faceImg'></dd>
	 	<dd>电子邮件: <input type="text" name="email"class="text"/>(*必填，激活账户)</dd>
	 	<dd>　QQ　　: <input type="text" name="qq"class="text"/></dd>
	 	<dd>主页地址: <input type="text" name="url" value="http://" class="text"/></dd>
	 	<dd>验 证 码：<input type="text" name="code" class="text_code"/><img src="authcode.php" id="code"/></dd>
	 	<dd><input type="submit" name="register" value="注册" class="submit"></dd>
	</dl>
	</form>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>
