<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月17日上午10:28:43
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'active');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(!isset($_GET['active'])){
    exit("Access Denied!");
}
if(isset($_GET['action']) && isset($_GET['active']) && $_GET['action'] == 'ok') {
    $_active = $_GET['active'];
    if(_fetch_array("SELECT tg_active FROM tg_user WHERE tg_active='$_active' LIMIT 1")) {
        _query("UPDATE tg_user SET tg_active=NULL WHERE tg_active='$_active'");
        if(_affect_rows() == 1) {
            _closeDB();
            _location("账户激活成功，请登录!", 'login.php');
        } else {
            _closeDB();
            _location("账户激活失败,请重新注册!", 'register.php');
        }
    } else {
        _closeDB();
        _alert_back('非法操作!');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--激活账户</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id="active">
<h2>账户激活</h2>
<p>本页面为模拟邮件激活账户，点击下面的链接完成激活</p>
<p><a href="active.php?action=ok&active=<?php echo $_GET['active']?>"><?php echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?action=active&active='. $_GET['active']?></a></p>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>
