<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月28日下午2:06:22
*/
session_start();
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'message');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if (!isset($_COOKIE['username'])){
    _alert_close('请先登录');
}
if(isset($_GET['action']) && $_GET['action'] == 'write') {
    $_uniqid_sql = "SELECT tg_uniqid FROM tg_user WHERE tg_username='".$_COOKIE['username']."'";
    $_row = _fetch_array($_uniqid_sql);
    _check_cookie_uniqid($_COOKIE['uniqid'], $_row['tg_uniqid']);
    _checkcode($_SESSION['code'], $_POST['code']);
    //引入注册检查过滤的函数库
    include ROOT_PATH.'includes/check.func.php';
    $_clean = array();
    $_clean['fromuser']  = $_COOKIE['username'];
    $_clean['touser'] = $_POST['touser'];
    $_clean['content'] = _check_content($_POST['content']);
    $_clean = _mysql_string($_clean);
    $_sql = "INSERT INTO tg_message (
                                    tg_fromuser,
                                    tg_touser,
                                    tg_content,
                                    tg_date
                                    )
                              VALUES(
                                    '{$_clean['fromuser']}',
                                    '{$_clean['touser']}',
                                    '{$_clean['content']}',
                                    NOW()
                                    )";
    _query($_sql);
    if(_affect_rows() != 1) {
        _closeDB();
        _session_destroy();
        _alert_back("发送失败!");
    } else {
        _closeDB();
        _session_destroy();
        _alert_close("发送成功!");
    }
}

if (isset($_GET['id'])) {
    $_sql = "SELECT tg_username FROM tg_user WHERE tg_id = '{$_GET['id']}' LIMIT 1";
    if(!!$_row=_fetch_array($_sql)){
        $_html = array();
        $_html['username'] = $_row['tg_username'];
        $_html = _html($_html);
    } else {
        _alert_close('用户不存在!');
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--发短信</title>
<?php require ROOT_PATH.'includes/title.inc.php';?>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/message.js"></script>
</head>
<body>
<div id="message">
<h3>写短信</h3>
<form action="?action=write" method="post">
<input type="hidden" name="touser" value="<?php echo $_html['username']?>"/>
<dl>
    <dd><input type="text" readonly="readonly" value="<?php echo "TO:".$_html['username']?>"/></dd>
    <dd><textarea name="content"></textarea></dd>
    <dd>验 证 码：<input type="text" name="code" class="text_code"/><img src="authcode.php" id="code"/><input type="submit" name="emit" value="发送短信" class="submit"></dd>
</dl>
</form>
</div>
</body>
</html>