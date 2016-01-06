<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月29日下午5:14:35
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'member_message_datail');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(!isset($_COOKIE['username'])){
    _alert_back("请先登录!");
}
if(!isset($_GET['id'])){
    _alert_back("id异常!");
} 
if(isset($_GET['action']) && isset($_GET['id'])) {
    //删除等敏感操作，先验证uniqid
    $_uniqid_sql = "SELECT tg_uniqid FROM tg_user WHERE tg_username='{$_COOKIE['username']}'";
    $_row = _fetch_array($_uniqid_sql);
    _check_cookie_uniqid($_COOKIE['uniqid'], $_row['tg_uniqid']);
    //查询当前信息是否存在
    if (!!_fetch_array("SELECT tg_fromuser,tg_content,tg_date FROM tg_message WHERE tg_id='{$_GET['id']}'")){
        _query("DELETE FROM tg_message WHERE tg_id='{$_GET['id']}'");
        if (_affect_rows() == 1) {
            _closeDB();
            _location('短信删除成功','member_message.php');
        } else {
            _closeDB();
            _alert_back('短信删除失败');
        }
    } else {
        _alert_back("此短信不存在!");
    }
    //删除
}
//根据id获取短信内容
$_sql = "SELECT tg_id, tg_fromuser,tg_content,tg_date FROM tg_message WHERE tg_id='{$_GET['id']}'";
if (!!$_row = _fetch_array($_sql)) {
    $_html = array();
    $_html['id'] = $_row['tg_id'];
    $_html['fromuser'] = $_row['tg_fromuser'];
    $_html['content'] = $_row['tg_content'];
    $_html['date'] = $_row['tg_date'];
    $_html = _html($_html);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--短信内容</title>
<?php require ROOT_PATH.'includes/title.inc.php';?>
<script type="text/javascript" src="js/member_message_datail.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id="member">
     <?php require ROOT_PATH.'includes/member.inc.php';?>
    <div class='main'>
            <dl>
                <dd>发 信 人：<?php echo $_html['fromuser']?></dd>
                <dd>短信内容: <?php echo $_html['content']?></dd>
                <dd>发送时间: <?php echo $_html['date']?></dd>
                <dd class="button"><input type="button"  value="删除" id="delete" name="<?php echo $_html['id']?>"/><input type="button" value="返回列表" id="back"/></dd>
            </dl>
    </div>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>