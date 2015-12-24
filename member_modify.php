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
session_start();
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'member');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(isset($_GET['action']) && $_GET['action'] == 'modify'){
    $_uniqid_sql = "SELECT tg_uniqid FROM tg_user WHERE tg_username='".$_COOKIE['username']."'";
    $_row = _fetch_array($_uniqid_sql);
    _check_cookie_uniqid($_COOKIE['uniqid'], $_row['tg_uniqid']);
    //检查验证码
    _checkcode($_POST['code'],$_SESSION['code']);
    //引入注册检查过滤的函数库
    include ROOT_PATH.'includes/register.func.php';
    //用一个数组保存表单提交个数据
    $clean = array();
    $clean['password'] = _check_password_modify($_POST['password'], 6);
    $clean['sex'] = _mysql_string($_POST['sex']);
    $clean['face'] = _mysql_string($_POST['face']);
    $clean['email'] = _check_email($_POST['email'],6,40);
    $clean['qq'] = _check_qq($_POST['qq']);
    $clean['url'] = _check_url($_POST['url']);
    //更新数据库
    if(empty($clean['password'])){
        $_sql = "UPDATE tg_user SET
                                    tg_sex='{$clean['sex']}',
                                    tg_face='{$clean['face']}',
                                    tg_email='{$clean['email']}',
                                    tg_qq='{$clean['qq']}',
                                        tg_url='{$clean['url']}'
                WHERE tg_username='{$_COOKIE['username']}'";
    } else {
        $_sql = "UPDATE tg_user SET
                                    tg_password='{$clean['password']}',
                                    tg_sex='{$clean['sex']}',
                                    tg_face='{$clean['face']}',
                                    tg_email='{$clean['email']}',
                                    tg_qq='{$clean['qq']}',
                                        tg_url='{$clean['url']}'
                WHERE tg_username='{$_COOKIE['username']}'";
    }
    _query($_sql);
    if(_affect_rows() != 1) {
        _closeDB();
        _session_destroy();
        _location("没有任何改动!", 'member.php');
    } else {
        _closeDB();
        _session_destroy();
        _location("修改成功!", 'member.php');
    }
}

if(!isset($_COOKIE['username'])){
    _alert_back("非法登录!");
} else {
    $_sql = "SELECT tg_username,tg_sex,tg_face,tg_email,tg_url,tg_qq,tg_reg_time,tg_level FROM tg_user WHERE tg_username = '".$_COOKIE['username']."'";
    if(!!$_row = _fetch_array($_sql)){
        $_html = array();
        $_html['username'] = $_row['tg_username'];
        $_html['sex'] = $_row['tg_sex'];
        $_html['face'] = $_row['tg_face'];
        $_html['email'] = $_row['tg_email'];
        $_html['url'] = $_row['tg_url'];
        $_html['qq'] = $_row['tg_qq'];
        $_html['reg_time'] = $_row['tg_reg_time'];
        $_html['level'] = $_row['tg_level'];
        $_html =_html($_html);
        _closeDB();
        if($_html['sex'] == '男') {
            $_html['sex_html'] = '<input type="radio" name="sex" value="男" checked="checked">男'.'<input type="radio" name="sex" value="女">女';
        } else if ($_html['sex'] == '女') {
            $_html['sex_html'] = '<input type="radio" name="sex" value="男" >男'.'<input type="radio" name="sex" value="女"checked="checked">女';
        }
        $_face_no = substr($_html['face'],6,2);
        $_html['face_html'] = '<select name="face" autocomplete="off">';
        foreach (range(1, 64) as $number){
            if(intval($_face_no) == $number){
                $_html['face_html'] .= '<option value="face/m'.($number<10 ? '0'.$number:$number).'.gif selected="selected">face/m'.($number<10?'0'.$number:$number).'.gif</option>';
            }
            $_html['face_html'] .= '<option value="face/m'.($number<10 ? '0'.$number:$number).'.gif">face/m'.($number<10?'0'.$number:$number).'.gif</option>';
        }
        $_html['face_html'] .= '</select>';
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
<script type="text/javascript" src="js/member_modify.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id='member'>
   <?php require ROOT_PATH.'includes/member.inc.php';?>
    <div class="main">
    <h2>会员管理中心</h2>
    <form method="post" action="?action=modify">
    <dl>
    <dd>用 户 名：<?php echo $_html['username']?></dd>
    <dd>密　　码: <input type="password" name="password" class="text"/>(不填则为不修改)</dd>
    <dd>性　　别: <?php echo $_html['sex_html']?></dd>
    <dd>头　　像: <?php echo $_html['face_html']?></dd>
    <dd>电子邮件: <input type="text" class="text" name="email" value='<?php echo $_html['email'];?>'/></dd>
    <dd>主　　页: <input type="text" class="text" name="url" value='<?php echo $_html['url'];?>'/></dd>
    <dd>Q　　　Q: <input type="text" class="text" name="qq" value='<?php echo $_html['qq']?>' /></dd>
    <dd>验 证 码：<input type="text" name="code" class="text_code"/><img src="authcode.php" id="code"/></dd>
	<dd><input type="submit" name="modify" value="完成修改" class="submit"></dd>
    </dl>
    </form>
    </div>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>