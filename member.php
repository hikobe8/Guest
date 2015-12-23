<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月23日下午2:28:58
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'member');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(!isset($_COOKIE['username'])){
    _alert_back("非法登录!");
} else {
    $_sql = "SELECT tg_username,tg_sex,tg_face,tg_email,tg_url,tg_qq,tg_reg_time FROM tg_user WHERE tg_username = '".$_COOKIE['username']."'";
    if(!!$_row = _fetch_array($_sql)){
        $_html = array();
        $_html['username'] = $_row['tg_username'];
        $_html['sex'] = $_row['tg_sex'];
        $_html['face'] = $_row['tg_face'];
        $_html['email'] = $_row['tg_email'];
        $_html['url'] = $_row['tg_url'];
        $_html['qq'] = $_row['tg_qq'];
        $_html['reg_time'] = $_row['tg_reg_time'];
        $_html =_html($_html);
    } else {
        _alert_back("用户不存在");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--博友</title>
<?php require ROOT_PATH.'includes/title.inc.php';?> 
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id='member'>
   <?php require ROOT_PATH.'includes/member.inc.php';?>
    <div class="main">
    <h2>会员管理中心</h2>
    <dl>
    <dd>用 户 名：<?php echo $_html['username']?></dd>
    <dd>性　　别: <?php echo $_html['sex']?></dd>
    <dd>头　　像: <?php echo $_html['face']?></dd>
    <dd>电子邮件: <?php echo $_html['email']?></dd>
    <dd>主　　页: <?php echo $_html['url']?></dd>
    <dd>Q　　　Q: <?php echo $_html['qq']?></dd>
    <dd>注册时间: <?php echo $_html['reg_time']?></dd>
    <dd>身　　份: 逗逼</dd>
    </dl>
    </div>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>