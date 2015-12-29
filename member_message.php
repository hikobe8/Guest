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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户管理系统--短信查阅</title>
<?php require ROOT_PATH.'includes/title.inc.php';?> 
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
_page("SELECT tg_id FROM tg_message WHERE tg_touser='{$_COOKIE['username']}'", 15);
global $_start_index, $_page_size;
$_sql = "SELECT 
                tg_id,
                tg_fromuser,
                tg_content,
                tg_date 
        FROM 
                tg_message 
        WHERE 
                tg_touser = '{$_COOKIE['username']}' 
        ORDER BY 
                tg_date DESC LIMIT ".$_start_index.",".$_page_size;
//取出所有当前用户接收的消息 并且以发送时间降序排序
$_result = _query($_sql);
?>
<div id="member">
     <?php require ROOT_PATH.'includes/member.inc.php';?>
    <div class='main'>
        <div class="member_message">
        <table>
        <tr><th>发信人</th><th>短信内容</th><th>发信时间</th><th>操作</th></tr>
        <?php 
        while (!!$_row =_fetch_array_list($_result)) {
            $_message = array();
            $_message['id'] = $_row['tg_id'];
            $_message['fromuser'] = $_row['tg_fromuser'];
            $_message['content'] = $_row['tg_content'];
            $_message['date'] = $_row['tg_date'];
            $_message = _html($_message);
        ?>
        <tr><td><?php echo $_message['fromuser']?></td><td><a href="member_message_datail.php?id=<?php echo $_message['id']?>"><?php echo $_message['content']?></a></td><td><?php echo $_message['date']?></td><td>伏伏</td></tr>
        <?php 
            }
        ?>
        </table>
        </div>
    </div>
<?php 
    _free_result($_result);
    _paging(1);
?>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>