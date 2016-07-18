<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月29日下午3:52:42
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'member_message');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
if(!isset($_COOKIE['username'])){
    _alert_back("请先登录!");
}
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_POST['ids'])) {
    //验证用户唯一id
    $_uniqid_sql = "SELECT tg_uniqid FROM tg_user WHERE tg_username='{$_COOKIE['username']}'";
    $_row = _fetch_array($_uniqid_sql);
    _check_cookie_uniqid($_COOKIE['uniqid'], $_row['tg_uniqid']);
    //批量删除
    $_clean = array();
    $_clean['ids'] = _mysql_string(implode(',', $_POST['ids']));
     $_sql = "DELETE FROM tg_message WHERE tg_id in ({$_clean['ids']})";
    _query($_sql);
    if (_affect_rows()) {
        _closeDB();
        _location('删除成功','member_message.php');
    } else {
        _closeDB();
        _alert_back('删除失败');
    } 
}
_page("SELECT tg_id FROM tg_message WHERE tg_touser='{$_COOKIE['username']}'", 3);
global $_start_index, $_page_size;
$_sql = "SELECT
                tg_id,
                tg_fromuser,
                tg_content,
                tg_date,
                tg_state
                FROM 
                tg_message
          WHERE
                tg_touser = '{$_COOKIE['username']}'
         ORDER BY
                tg_date DESC LIMIT ".$_start_index.",".$_page_size;
//取出所有当前用户接收的消息 并且以发送时间降序排序
$_result = _query($_sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户管理系统--短信查阅</title>
<?php require ROOT_PATH.'includes/title.inc.php';?>
<script type="text/javascript" src="js/member_message.js"></script> 
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
?>
<div id="member">
     <?php require ROOT_PATH.'includes/member.inc.php';?>
    <div class='main'>
        <div class="member_message">
        <form action="?action=delete" method="post">
        <table>
        <tr><th>发信人</th><th>短信内容</th><th>发信时间</th><th>状态</th><th>勾选</th></tr>
        <?php 
        while (!!$_row =_fetch_array_list($_result)) {
            $_message = array();
            $_message['id'] = $_row['tg_id'];
            $_message['fromuser'] = $_row['tg_fromuser'];
            $_message['content'] = $_row['tg_content'];
            $_message['date'] = $_row['tg_date'];
            $_message['state'] = $_row['tg_state'];
            $_message = _html($_message);
        ?>
        <tr><td><?php echo $_message['fromuser']?></td><td><a href="member_message_datail.php?id=<?php echo $_message['id']?>"><strong><?php echo $_message['content']?></strong></a></td><td><?php echo $_message['date']?></td><td><?php echo empty($_message['state'])? '未读': '已读';?></td><td><input type="checkbox" name="ids[]" value="<?php echo $_message['id']?>"/></td></tr>
        <?php 
            }
        ?>
        <tr><td colspan="5"><label for="all">全选 <input type="checkbox" name="chkall" id="all" /></label> <input type="submit" value="删除已选项" /></td></tr>
        </table>       
        </form>
        <?php 
        _free_result($_result);
        _paging(1);
        ?>
        </div>
    </div>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>